<?php

class Transaction_buysell_show extends Bks_Controller {

    function __construct() {
        $config = array('modules' => 'transaction', 'jsfiles' => array('transaction_buysell_show'));
        parent::__construct($config);        
        $this->auth = $this->session->userdata( 'auth' );
        $this->userId = $this->auth['id'];
    }
    
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('Show');
        $this->template->set('tsmall', 'Buy / Sell');
        $this->template->set('icon', 'fa fa-previes');
        $data['auth'] = $this->auth;
        $this->template->build('transaction/transaction_buysell_show_v', $data);
    }   
        
    function show_header() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $customer_id = json_decode($postData['customer_id']);
        $tr_id = json_decode($postData['tr_id']);
        $id = json_decode($postData['id']);
        $query = $this->db->query("SELECT * FROM v_tr_header WHERE customer_id = " . $customer_id . " AND tr_id = " . $tr_id . " AND  id= " . $id)->result();
        echo json_encode($query, true);
    }
    
    function show_detail() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $customer_id = json_decode($postData['customer_id']);
        $tr_id = json_decode($postData['tr_id']);
        $header_id = json_decode($postData['header_id']);
        $query = $this->db->query("SELECT * FROM v_tr_detail WHERE customer_id = " . $customer_id . " AND tr_id = " . $tr_id . " AND header_id= " . $header_id ." ORDER BY currency_id, nominal, price ASC")->result();
        echo json_encode($query, true);
    }     
    
    function printnota()
    {          
        $id = $this->uri->segment(4);
        $data_header = $this->db->select('*')->from('v_tr_header')->where('id', $id)->get()->result();
        $customer_id = $data_header[0]->customer_id;
        $profil_usaha = $this->Bksmdl->getprofilusaha($data_header[0]->store_id);
        $profil_customer = $this->Bksmdl->getprofilcustomer($data_header[0]->customer_id);
        $tr_number = $data_header[0]->tr_number;
        $tr_date = revDate($data_header[0]->tr_date);
        $customer_source = $data_header[0]->customer_source;
        $customer_puprpose = $data_header[0]->customer_purpose;
        $tr_time =  date('H:i:s',strtotime($data_header[0]->created));
        $pageno = '1';
        $counter_name = $data_header[0]->createdby_name;
        $status = $data_header[0]->status;

        $pdf = new Pdf();
        
        // Call before the addPage() method
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);

        $pdf->AddPage('P', 'mm', 'PA5'); // paper size custom in tcpdf_static.php
        // $pdf->AddPage('P', 'mm', array('14','12'), true, 'UTF-8', false);

        if($this->uri->segment(5) == 1) { 
            $tr_name = '** BUY **';
        }
        if($this->uri->segment(5) == 2) {
            $tr_name = '** SELL **';
        }
        if($status == 2){
            $tr_name .= ' Cancel';
        }
        $pdf->Ln(1);
        $pdf->SetFont('', 'B', 12);
        $pdf->Cell(131, 01, $tr_name, 0, 1, 'C');
        
        // Add Title
        $pdf->Ln(1);
        $pdf->SetFont('', 'B', 9);
        $pdf->Cell(01, 01, strtoupper(trim($profil_usaha[0]->store_name)), 0, 1, 'L');
        $pdf->SetFont('', '', 9);
        if(strlen(trim($profil_usaha[0]->store_address)) > 50){
            $pdf->Cell(01, 01, SUBSTR(trim($profil_usaha[0]->store_address),0,50), 0, 1, 'L');
            $pdf->Cell(01, 01, SUBSTR(trim($profil_usaha[0]->store_address),51,100), 0, 1, 'L');
        } else {
            $pdf->Cell(01, 01, trim($profil_usaha[0]->store_address), 0, 1, 'L');
        }

        $pdf->SetFont('', '', 9);
        $pdf->Cell(01, 01, 'Date ' . $tr_date . '     No. ' . trim($tr_number), 0, 1, 'L');
        $pdf->Cell(01, 01, "------------------------------------------------------------------------------------", 0, 1, 'L');
        $pdf->Cell(01, 01, 'CIF : ' . trim($profil_customer[0]->customer_code) . '     ID No. : ' . $profil_customer[0]->customer_data_number, 0, 1, 'L');
        $pdf->Cell(01, 01, 'Name : ' . SUBSTR(trim($profil_customer[0]->customer_name),0,45), 0, 1, 'L');
        $pdf->Cell(01, 01, 'Address : ' . SUBSTR(trim($profil_customer[0]->customer_address),0,45), 0, 1, 'L');
        $pdf->Cell(01, 01, 'Phone : ' . $profil_customer[0]->customer_handphone . '     Job : ' . $profil_customer[0]->customer_job_name, 0, 1, 'L');
        $pdf->Cell(01, 01, 'Source : ' . SUBSTR(trim($customer_source),0,50), 0, 1, 'L');
        $pdf->Cell(01, 01, 'Purpose : ' . SUBSTR(trim($customer_puprpose),0,50), 0, 1, 'L');
        $pdf->SetAutoPageBreak(true, 0);
 
        // Add Header Column
        // $pdf->Ln(1);
        $pdf->SetFont('', '', 9);
        $pdf->Cell(01, 01, "------------------------------------------------------------------------------------", 0, 1, 'L');
        $pdf->Cell(07, 01, "#", 0, 0, 'C');
        $pdf->Cell(17, 01, "Curr", 0, 0, 'L');
        $pdf->Cell(20, 01, "Amount", 0, 0, 'L');
        $pdf->Cell(18, 01, "Exc.Rate", 0, 0, 'L');
        $pdf->Cell(30, 01, "Equivalent Rp.", 0, 0, 'L');
        $pdf->Ln(3);
        $pdf->Cell(01, 01, "------------------------------------------------------------------------------------", 0, 1, 'L');

        // Add Content Body
        $pdf->SetFont('', '', 9);
        $data_content = $this->db->query("SELECT * FROM v_tr_detail WHERE header_id = " . $id)->result();     
        if(count($data_content) > 0) {
            $no = 0;
            $total = 0;
            foreach($data_content as $r){
                $no++;
                
                $currency_code = $r->currency_code;
                $nominal    = ($r->nominal == 'null' || $r->nominal == '' ? '' : (float) $r->nominal);
                $sheet      = ($r->sheet == 'null' || $r->sheet == '' ? '' : (float) $r->sheet);                
                $amount     = ($nominal * $sheet);
                $price      = ($r->price == 'null' || $r->price == '' ? 0 :  floatval($r->price));
                $subtotal   = ($r->subtotal == 'null' || $r->subtotal == '' ? '' : (float) $r->subtotal);
                $total      = $total + ($amount * $price); 

                $pdf->Cell(07,01,$no,0,0);
                $pdf->Cell(17,01,$currency_code,0,0);
                $pdf->Cell(20,01,number_format($amount, "0", ".", ","),0,0);
                if( $this->Bksmdl->cekdecimalgreaterthenzero($price) > 0){
                    $pdf->Cell(18,01,number_format($price, "2", ".", ","),0,0);   
                } else {
                    $pdf->Cell(18,01,number_format($price, "0", ".", ","),0,0);   
                }                
                $pdf->Cell(30,01,number_format($subtotal, "0", ".", ","),0,0);
                $pdf->Ln(4);
            }
            $pdf->SetFont('', '', 9);            
            $pdf->Cell(01, 01, "------------------------------------------------------------------------------------", 0, 1, 'L');
            $pdf->Cell(127, 01, 'Total Rp. ' . number_format($total, "0", ".", ","), 0, 1, 'C');

            $pdf->SetFont('', '', 9);
            $pdf->Ln(1);

            $terbilangtotal = ucwords(terbilang($total));
            if(strlen($terbilangtotal) > 50){
                $pdf->Cell(01, 01, 'Say : ' . SUBSTR($terbilangtotal,0,50), 0, 1, 'L');
                $pdf->Cell(01, 01, SUBSTR($terbilangtotal,51,100), 0, 6, 'L');
            } else {
                $pdf->Cell(01, 01, 'Say : ' . SUBSTR($terbilangtotal,0,50), 0, 1, 'L');
            }

            $pdf->SetFont('', '', 9);
            $pdf->Ln(2);
            $text = 'Saya menyatakan bahwa transaksi ini belum melebihi threshold';
            $pdf->Cell(01, 01, $text, 0, 1, 'L');
            $text = 'USD 25.000 dalam bulan ini dan akan menyertakan Underlying';
            $pdf->Cell(01, 01, $text, 0, 1, 'L');
            $text = 'yang sebenarnya jika melebihi';
            $pdf->Cell(01, 01, $text, 0, 1, 'L');

            $pdf->SetFont('', '', 9);
            $pdf->Ln(2);
            $pdf->Cell(01, 01, 'Counter,           Cashier,           Customer,', 0, 1, 'L');
        }        
        $pdf->Output('Trx No '.$tr_number.'.pdf','I');    
    }
    

}