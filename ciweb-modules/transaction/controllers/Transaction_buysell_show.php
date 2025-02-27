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
        $this->template->set('tsmall', 'Transaction');
        $this->template->set('icon', 'fa fa-previes');
        $data['auth'] = $this->auth;
        $data['profilusaha'] = $this->Bksmdl->getprofileusaha($this->uri->segment(4), null);
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
        $query = $this->db->query("SELECT * FROM v_tr_detail WHERE customer_id = " . $customer_id . " AND tr_id = " . $tr_id . " AND header_id= " . $header_id ." ORDER BY valas_id, nominal, price ASC")->result();
        echo json_encode($query, true);
    }
    
    function cancel_trx() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        
        $postData = $this->input->post();
        $id = json_decode($postData['id']);

        $this->db->trans_begin();
        $this->db->where(array('id' => $id));
        $this->db->update('tr_heder', array('status' => 2, 'updated' => date('Y-m-d H:i:s', time()), 'updatedby' => $this->userId) );
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $err = $this->db->error();
            $json['msg'] = $err['code'] . '<br>' . $err['message'];
            echo json_encode($json);
        } else {
            $this->db->where(array('header_id' => $id));
            $this->db->update('tr_detail', array('status' => 2, 'updated' => date('Y-m-d H:i:s', time()), 'updatedby' => $this->userId) );
            $this->db->trans_commit();
            $json['msg'] = '1';
            echo json_encode($json);
        }            
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    function printdotmatrix(){
        $dir_root = $_SERVER['DOCUMENT_ROOT'];
        // $path_logs = $dir_root.'/public/logs/'; // hosting
        $path_logs = $dir_root.'/logs/'; // local
        $file = $path_logs . $this->generateRandomString() . '.txt';
        $handle = fopen($file, "w");
        
        ## set initialisasi data
        $draftMode   = chr(27) . 'x' . chr(0);
        $CPI10       = chr(27) . 'P';
        $CondON      = chr(15);
        $page33      = chr(27) . 'C' . chr(33);
        $page66      = chr(27) . 'C' . chr(66);
        $Eject       = chr(12);
        $initialized = $page33 . $draftMode . $CPI10 . $CondON;
        $Data        = $initialized;	

        ## set content Profile to print
        $id = $this->uri->segment(4);
        $data_header = $this->db->select('*')->from('v_tr_header')->where('id', $id)->get()->result();
        $customer_id = $data_header[0]->customer_id;
        $profilusaha = $this->Bksmdl->getprofileusaha($customer_id, null);
        $tr_number = $data_header[0]->tr_number;
        $tr_date = revDate($data_header[0]->tr_date);
        $tr_time =  date('H:i:s',strtotime($data_header[0]->created));
        $pageno = '1';
        $counter_name = $data_header[0]->createdby_name;
        $printer_ip = $data_header[0]->printer_ip;

        $Data .= str_repeat(' ', 1) . fBESAR12() . fTEBAL() . strtoupper($profilusaha[0]->company_name) . fUnTEBAL() . fUnBESAR12() . fKECIL10() . chr(10);	
        $Data .= str_repeat(' ', 1) . $profilusaha[0]->company_address . ' ' . $profilusaha[0]->company_city . chr(10);	               
        $Data .= str_repeat(' ', 1) . ' Telpon : ' . $profilusaha[0]->company_phone. chr(10). chr(10);
        
        $Data .= str_repeat(' ', 14) . fBESAR12() . fTEBAL() . '* CUSTOMER *' . fUnTEBAL() . fUnBESAR12() . fKECIL10() . chr(10);

        if($this->uri->segment(5) == 1) { 
            $tr_title = '** BUY SLIP **';
        }
        if($this->uri->segment(5) == 2) {
            $tr_title = '** SELL SLIP **';
        }
        $Data .= str_repeat(' ', 1) . fBESAR12() . fTEBAL() . $tr_title . fUnTEBAL() . fUnBESAR12() . fKECIL10() . chr(10);
        $Data .= str_repeat(' ', 1) . 'No.Reff : ' . $tr_number. chr(10);
        $Data .= str_repeat(' ', 1) . 'Date    : ' . $tr_date . ' | ' . $tr_time;
        $Data .= str_repeat(' ', 14) . 'Page : ' . $pageno . chr(10);
        $Data .= str_repeat(' ', 1) . str_repeat("=",60) . chr(10);       
        
        $Data .= str_repeat(' ', 1) . 'No';
        $Data .= str_repeat(' ', 2) . 'Curr.';
        $Data .= str_repeat(' ', 3) . 'Amount';
        $Data .= str_repeat(' ', 4) . 'Exc.Rate';
        $Data .= str_repeat(' ', 4) . 'Equivalent Rp.'. chr(10);
        $Data .= str_repeat(' ', 1) . str_repeat("-",60) . chr(10);

        ## set content body to print
        $data_content = $this->db->query("SELECT * FROM v_tr_detail WHERE header_id = " . $id)->result();     
        if(count($data_content) > 0) {
            $no = 0;
            $total = 0;
            foreach($data_content as $r){
                $no++;
                
                $valas_code = $r->valas_code;
                $nominal    = ($r->nominal == 'null' || $r->nominal == '' ? '' : (float) $r->nominal);
                $sheet      = ($r->sheet == 'null' || $r->sheet == '' ? '' : (float) $r->sheet);                
                $amount     = ($nominal * $sheet);
                $price      = ($r->price == 'null' || $r->price == '' ? '' : (float) $r->price);
                $subtotal   = ($r->subtotal == 'null' || $r->subtotal == '' ? '' : (float) $r->subtotal);
                $total      = $total + ($amount * $price);

                $Data .= str_repeat(' ', 1) . sprintf("%2d", $no);
                $Data .= str_repeat(' ', 2) . $valas_code;

                if( strlen($valas_code) == 6){
                    $Data .= str_repeat(' ', 2) . number_format($amount, "0", ".", ",");
                } else if( strlen($valas_code) == 5){
                    $Data .= str_repeat(' ', 3) . number_format($amount, "0", ".", ",");
                } else if( strlen($valas_code) == 4){
                    $Data .= str_repeat(' ', 4) . number_format($amount, "0", ".", ",");
                } else {
                    $Data .= str_repeat(' ', 5) . number_format($amount, "0", ".", ",");
                }

                if($amount < 9999999){
                    $Data .= str_repeat(' ', 5) . number_format($price, "0", ".", ",");
                } else if($amount < 999999){
                    $Data .= str_repeat(' ', 6) . number_format($price, "0", ".", ",");
                } else if($amount < 99999){
                    $Data .= str_repeat(' ', 7) . number_format($price, "0", ".", ",");
                } else if($amount < 9999){
                    $Data .= str_repeat(' ', 8) . number_format($price, "0", ".", ",");
                } else if($amount < 999){
                    $Data .= str_repeat(' ', 9) . number_format($price, "0", ".", ",");
                } else if($amount < 99){
                    $Data .= str_repeat(' ', 10) . number_format($price, "0", ".", ",");
                } else {
                    $Data .= str_repeat(' ', 11) . number_format($price, "0", ".", ",");
                }

                if($price < 999){
                    $Data .= str_repeat(' ', 9) . 'Rp. ' . number_format($subtotal, "0", ".", ",") . chr(10);
                } else {
                    $Data .= str_repeat(' ', 6) . 'Rp. ' . number_format($subtotal, "0", ".", ",") . chr(10);                
                }
            }
            $Data .= str_repeat(' ', 1) . str_repeat("-",60) . chr(10);
            $Data .= str_repeat(' ', 35) . 'Rp. ' . number_format($total, "0", ".", ",") . chr(10);
            $Data .= str_repeat(' ', 1) . str_repeat("=",60) . chr(10);
            $Data .= str_repeat(' ', 1) . 'Say : ' . ucwords(terbilang($total)). chr(10). chr(10);          
        }                

        $Data .= str_repeat(' ', 1) . '*Saya menyatakan bahwa transaksi ini belum melebihi thresold'. chr(10);
        $Data .= str_repeat(' ', 1) . 'USD 25.000 dalam bulan ini dan akan menyertakan Underlying'. chr(10);
        $Data .= str_repeat(' ', 1) . 'yang sebenarnya jika melebihi'. chr(10). chr(10);

        $Data .= str_repeat(' ', 30) . fUnderON() . 'Ctr.:' . ucwords($counter_name) . fUnderOFF() . chr(10). chr(10);

        $Data .= $Eject;
        fwrite($handle, $Data);
        fclose($handle);

        ## Setprinter
        if($printer_ip !== null && $printer_ip !== ''){
            $responseprinter = copy($file, "//".$printer_ip);            
            unlink($file);
            $json['msg'] = $responseprinter;
            echo json_encode($json);
        } else {
            $json['msg'] = 'printer not found.!';
            echo json_encode($json);
        }
    }

    function printpdf()
    {          
        $id = $this->uri->segment(4);
        $data_header = $this->db->select('*')->from('v_tr_header')->where('id', $id)->get()->result();
        $customer_id = $data_header[0]->customer_id;
        $profilusaha = $this->Bksmdl->getprofileusaha($customer_id, null);
        $tr_number = $data_header[0]->tr_number;
        $tr_date = revDate($data_header[0]->tr_date);
        $tr_time =  date('H:i:s',strtotime($data_header[0]->created));
        $pageno = '1';
        $counter_name = $data_header[0]->createdby_name;

        $pdf = new Pdf();
        
        // Call before the addPage() method
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);

        $pdf->AddPage('P', 'mm', 'PA5'); // paper size custom in tcpdf_static.php
        // $pdf->AddPage('P', 'mm', array('14','12'), true, 'UTF-8', false);

        // Add Title
        $pdf->SetFont('', 'B', 9);
        $pdf->Cell(01, 01, strtoupper($profilusaha[0]->company_name), 0, 1, 'L');

        $pdf->SetFont('', '', 9);
        $pdf->Cell(01, 01, $profilusaha[0]->company_address . ' ' . $profilusaha[0]->company_city, 0, 1, 'L');
        $pdf->Cell(01, 01, 'Telpon : ' . $profilusaha[0]->company_phone, 0, 1, 'L');

        if($this->uri->segment(5) == 1) { 
            $tr_title = '** BUY SLIP **';
        }
        if($this->uri->segment(5) == 2) {
            $tr_title = '** SELL SLIP **';
        }
        $pdf->Ln(1);
        $pdf->SetFont('', 'B', 9);
        $pdf->Cell(131, 01, '* CUSTOMER *', 0, 1, 'C');
        $pdf->Ln(1);
        $pdf->Cell(01, 01, $tr_title, 0, 1, 'L');

        $pdf->Ln(1);
        $pdf->SetFont('', '', 9);
        $pdf->Cell(01, 01, 'No.Reff : ' . $tr_number, 0, 1, 'L');
        $pdf->Cell(01, 01, 'Date    : ' . $tr_date . '                             Page : ' . $pdf->getAliasNumPage() . '     (' . $tr_time . ')' , 0, 1, 'L');
        
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
                
                $valas_code = $r->valas_code;
                $nominal    = ($r->nominal == 'null' || $r->nominal == '' ? '' : (float) $r->nominal);
                $sheet      = ($r->sheet == 'null' || $r->sheet == '' ? '' : (float) $r->sheet);                
                $amount     = ($nominal * $sheet);
                $price      = ($r->price == 'null' || $r->price == '' ? '' : (float) $r->price);
                $subtotal   = ($r->subtotal == 'null' || $r->subtotal == '' ? '' : (float) $r->subtotal);
                $total      = $total + ($amount * $price);
 
                $pdf->Cell(07,01,$no,0,0);
                $pdf->Cell(17,01,$valas_code,0,0);
                $pdf->Cell(20,01,number_format($amount, "0", ".", ","),0,0);
                $pdf->Cell(18,01,number_format($price, "0", ".", ","),0,0);   
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
            $text = '*Saya menyatakan bahwa transaksi ini belum melebihi thresold';
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