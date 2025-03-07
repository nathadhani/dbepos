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
    
    function getshowid() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $id = $postData['id'];
        $query = $this->db->query("SELECT id, tr_id, customer_id FROM tr_header WHERE id = $id")->result();
        echo json_encode($query, true);
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
        $profilusaha = $this->Bksmdl->getprofileusaha($id, null);
        $tr_number = $data_header[0]->tr_number;
        $tr_date = revDate($data_header[0]->tr_date);
        $CIF = $data_header[0]->customer_code;
        $tr_time =  date('H:i:s',strtotime($data_header[0]->created));
        $pageno = '1';
        $counter_name = $data_header[0]->createdby_name;

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
        $pdf->Ln(1);
        $pdf->SetFont('', 'B', 9);
        $pdf->Cell(131, 01, $tr_name, 0, 1, 'C');
        $pdf->Ln(1);
        
        // Add Title
        $pdf->SetFont('', 'B', 9);
        $pdf->Cell(01, 01, strtoupper($profilusaha[0]->store_name), 0, 1, 'L');

        $pdf->SetFont('', '', 9);
        $pdf->Cell(01, 01, $profilusaha[0]->store_address, 0, 1, 'L');

        $pdf->Ln(1);
        $pdf->SetFont('', '', 9);
        $pdf->Cell(01, 01, 'Trx.No : ' . $tr_number, 0, 1, 'L');
        $pdf->Cell(01, 01, 'Trs.Date : ' . $tr_date, 0, 1, 'L');
        $pdf->Cell(01, 01, 'CIF : ' . $CIF, 0, 1, 'L');
        
        $pdf->SetAutoPageBreak(true, 0);
 
        // Add Header Column
        $pdf->Ln(1);
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
            $pdf->Cell(01, 01, 'Say : ' . ucwords(terbilang($total)), 0, 1, 'L');

            $pdf->SetFont('', '', 9);
            $pdf->Ln(2);
            $text = '*Saya menyatakan bahwa transaksi ini belum melebihi threshold';
            $pdf->Cell(01, 01, $text, 0, 1, 'L');
            $text = 'USD 25.000 dalam bulan ini dan akan menyertakan Underlying';
            $pdf->Cell(01, 01, $text, 0, 1, 'L');
            $text = 'yang sebenarnya jika melebihi';
            $pdf->Cell(01, 01, $text, 0, 1, 'L');

            $pdf->SetFont('', '', 9);
            $pdf->Ln(2);
            $pdf->Cell(01, 01, 'Counter : ' . ucwords($counter_name), 0, 1, 'L');
        }        
        $pdf->Output('Trx No '.$tr_number.'.pdf','I');    
    }
    

}