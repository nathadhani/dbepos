<?php

class Transaction_buysell extends Bks_Controller {
    
    function __construct() {
        $config = array('modules' => 'transaction', 'jsfiles' => array('transaction_buysell'));
        parent::__construct($config);
        $this->auth = $this->session->userdata( 'auth' );
        $this->userId = $this->auth['id'];
        $this->store_id = $this->auth['store_id'];        
    }
    
    function index(){
        $this->libauth->check(__METHOD__);
        $this->template->title('New');
        $this->template->set('tsmall', 'Buy / Sell - New');
        $this->template->set('icon', 'fa fa-edit');
        $data['auth'] = $this->auth;
        $this->template->build('transaction/transaction_buysell_v', $data);
    }

    function indexs() {
        $config = array('modules' => 'transaction', 'jsfiles' => array('transaction_buysell_show'));
        parent::__construct($config);        
        $this->auth = $this->session->userdata( 'auth' );
        $this->userId = $this->auth['id'];
        $this->libauth->check(__METHOD__);
        $data['auth'] = $this->auth;
        $this->template->build('transaction/transaction_buysell_show_v', $data);
    }

    function cekclosingtrx(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();        
        $cekclosing = $this->Bksmdl->cekclosingdate($this->store_id);
        $tanggal_kemarin = date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d'))));
        if($cekclosing[0]->tr_date !== null && $cekclosing[0]->tr_date < $tanggal_kemarin ){      
            $json['msg'] = '1';
            $json['tr_date'] = $cekclosing[0]->tr_date;
            echo json_encode($json);
        }        
    }  
    
    function generate_code_confirm($store_id, $tr_id, $tr_date) {
        $Number = 1;
        $thn = SUBSTR($tr_date,0,4);
        $bln = SUBSTR($tr_date,5,2);
        $day = SUBSTR($tr_date,8,2);
        $storecode  =sprintf("%02d", $store_id);
        $trcode = sprintf("%02d", $tr_id);
        $sql = $this->db->query("SELECT max(right(tr_number,4)) as id
                                 FROM tr_header 
                                 WHERE store_id = $store_id
                                 AND tr_id = $tr_id
                                 AND YEAR(tr_date) = $thn 
                                 AND MONTH(tr_date) = $bln
                                 AND DAY(tr_date) = $day
                                 ")->result();
        if (count($sql) > 0) {
            foreach ($sql as $data) {
                $Number = intval($data->id) + 1;
            }
        }
        return SUBSTR($thn,2,2) . $bln . $day . $storecode . $trcode . sprintf("%04d", $Number);
    }  
   
    function update_header(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);        
        $postData = $this->input->post();

        $id = $postData['id'];
        $postData['store_id'] = $this->store_id;
        $postData['customer_source'] = ucwords(strtolower(trim($postData['customer_source'])));
        $postData['customer_purpose'] = ucwords(strtolower(trim($postData['customer_purpose'])));
        $postData['status'] = '1';

        $this->db->trans_begin();
        $this->Bksmdl->table = 'tr_header';
        $response = $this->Bksmdl->update($postData, 'id=' . $id);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $err = $this->db->error();
            $json['msg'] = $err['code'] . '<br>' . $err['message'];
            echo json_encode($json);
        } else {
            $this->db->trans_commit();
            $json['msg'] = '1';
            echo json_encode($json);
        }
    }    
    
    function insert_detail(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);                
        $postData = $this->input->post();        
        $postDetail = $this->input->post();

        /** Insert Header */
        /** -------------------------------------------------------------------------------- */        
        if( isset($postData['header_id']) ){
            if(($postData['header_id'] == 'null' || $postData['header_id'] == '')) {            
                $customer_id = $postData['customer_id'];
                unset($postData['header_id']);
                unset($postData['currency_id']);
                unset($postData['nominal']);
                unset($postData['sheet']);
                unset($postData['price']);
                unset($postData['subtotal']);            
                $postData['store_id'] = $this->store_id;        
                if(isset($postData['tr_date'])){
                    $postData['tr_date'] = revDate($postData['tr_date']);
                    /**----------------------------------------------------- */
                    $datetime = date('Y-m-d H:i:s');
                    $new_date = $postData['tr_date'];
                    $new_datetime = date('Y-m-d H:i:s', strtotime($new_date . ' ' . date('H:i:s', strtotime($datetime))));
                    $postData['created'] = $new_datetime;
                } else {
                    $postData['tr_date'] = Date('Y-m-d');
                }
                        
                $postData['status'] = '1';
                
                $this->db->trans_begin();
                $this->Bksmdl->table = 'tr_header';        
                $response = $this->Bksmdl->insert($postData);
                $id_header = $this->db->insert_id();                
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $err = $this->db->error();
                    $json['msg'] = $err['code'] . '<br>' . $err['message'];
                    echo json_encode($json);
                } else {
                    $this->db->trans_commit();
                }
            } else {
                $id_header = (int) $postData['header_id'];
            }
        }        
        /** End of Inser Header -------------------------------------------------------------------------------- */

        /** Insert Detail */
        /** -------------------------------------------------------------------------------- */
        if( isset($id_header) && $id_header > 0 && ( $id_header != 'null' || $id_header !== '') ){
            unset($postDetail['tr_id']);
            unset($postDetail['tr_date']);
            unset($postDetail['customer_id']);
            unset($postDetail['subtotal']);

            $postDetail['header_id'] = $id_header;
            if (strpos($postDetail['price'], ',') !== false) {
                $postDetail['price'] = str_replace(',','.',$postDetail['price']);
            }        
            $postDetail['status'] = '1';
            $this->db->trans_begin();
            $this->Bksmdl->table = 'tr_detail';

            $currency_id = $postDetail['currency_id'];
            $nominal = $postDetail['nominal'];
            $price = $postDetail['price'];
            $cek_curr = $this->db->query("SELECT id, header_id, currency_id, nominal 
                                          FROM tr_detail
                                          WHERE header_id = $id_header 
                                          AND currency_id = $currency_id
                                          AND nominal = $nominal
                                          AND price = $price")->result();
            if( count($cek_curr) == 0){
                $response = $this->Bksmdl->insert($postDetail);
            } else {
                if($cek_curr[0]->id != null){
                    $id = $cek_curr[0]->id;
                    $postDetailupdate['sheet'] = $postDetail['sheet'];
                    $response = $this->Bksmdl->update($postDetailupdate, 'id=' . $id);
                }
            }            
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $err = $this->db->error();
                $json['msg'] = $err['code'] . '<br>' . $err['message'];
                echo json_encode($json);
            } else {
                $this->db->trans_commit();
                $json['msg'] = '1';
                $json['id_header'] = $id_header;
                echo json_encode($json);
            }
        }
        /** End of Inser Detail -------------------------------------------------------------------------------- */
    }
    
    function delete_detail(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);        
        $postData = $this->input->post();
        $id = json_decode($postData['id']);        
        $this->db->trans_begin();
        $this->Bksmdl->table = 'tr_detail';
        $status = $this->Bksmdl->delete('id', $id);        
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $err = $this->db->error();
            $json['msg'] = $err['code'] . '<br>' . $err['message'];
            echo json_encode($json);
        } else {
            $this->db->trans_commit();
            $json['msg'] = '1';
            echo json_encode($json);
        }
    }
    
    function show_header(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $customer_id = json_decode($postData['customer_id']);
        $id = json_decode($postData['id']);
        $query = $this->db->query("SELECT * FROM v_tr_header WHERE customer_id = " . $customer_id . " AND  id= " . $id)->result();
        echo json_encode($query, true);
    }
    
    function show_detail(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $customer_id = json_decode($postData['customer_id']);
        $header_id = json_decode($postData['header_id']);
        $query = $this->db->query("SELECT * FROM v_tr_detail WHERE customer_id = " . $customer_id . " AND header_id= " . $header_id ." ORDER BY currency_id, nominal, price ASC")->result();
        echo json_encode($query, true);
    }  
        
    function getstockbyid(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $tahun    = (int) Date('Y');
        $bulan    = (int) Date('m');
        $currency_id = $postData['currency_id'];
        $nominal = str_replace('.','', $postData['nominal']);
        $query = $this->db->query("SELECT nominal,
                                          last_stock_sheet, 
                                          IF(last_stock_sheet IS NOT NULL, (nominal * last_stock_sheet),0 ) AS last_stock_amount
                                          FROM v_tr_stock_balance
                                   WHERE store_id = $this->store_id
                                   AND stock_year = $tahun 
                                   AND stock_month = $bulan
                                   AND currency_id = $currency_id 
                                   AND nominal = $nominal")->result();
        echo json_encode($query, true);
    }
    
    function getratebyid() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $currency_id = $postData['currency_id'];
        $tr_date  = Date('Y-m-d');
        $tr_id = $postData['tr_id'];  
        if($tr_id == '1'){
            $query = $this->db->query("SELECT exchange_rate_buy AS rate_today, 
                                              price_buy_bot AS rate_today_bot, 
                                              price_buy_top AS rate_today_top
                                              FROM m_exchange_rate
                                    WHERE store_id = $this->store_id
                                    AND currency_id = $currency_id
                                    AND exchange_rate_date = '$tr_date' LIMIT 1")->result();
            echo json_encode($query, true);
        } else {
            $query = $this->db->query("SELECT exchange_rate_sell AS rate_today,
                                              price_sell_bot AS rate_today_bot,
                                              price_sell_top AS rate_today_top 
                                              FROM m_exchange_rate
                                    WHERE store_id = $this->store_id
                                    AND currency_id = $currency_id
                                    AND exchange_rate_date = '$tr_date' LIMIT 1")->result();
            echo json_encode($query, true);
        }        
    }    
    
    function getshowid(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $id = $postData['id'];
        $query = $this->db->query("SELECT id, tr_id, customer_id FROM tr_header WHERE id = $id")->result();
        echo json_encode($query, true);
    }   

    function getthreshold(){
        checkIfNotAjax();
        // $this->libauth->check(__METHOD__ISNUL();
        $postData = $this->input->post();
        $customer_id = $postData['customer_id'];
        $tahun    = (int) Date('Y');
        $bulan    = (int) Date('m');
        $tr_date  =  Date('Y-m-d');
        $query = $this->db->query("SELECT 
                                          SUM(v_tr_detail.subtotal) AS subtotal,
                                          (
                                                SELECT COALESCE(x.exchange_rate_sell,0) FROM v_m_exchange_rate x
                                                WHERE x.currency_code LIKE '%USD%'
                                                AND x.exchange_rate_date = '$tr_date'
                                                LIMIT 1
                                          ) AS rate_price,
                                          (
                                            25000 * 
                                            (
                                                SELECT COALESCE(x.exchange_rate_sell,0) FROM v_m_exchange_rate x
                                                WHERE x.currency_code LIKE '%USD%'
                                                AND x.exchange_rate_date = '$tr_date'
                                                LIMIT 1
                                            )
                                          ) as total_threshold                                          
                                          FROM v_tr_detail
                                          JOIN v_tr_header ON v_tr_detail.header_id = v_tr_header.id
                                   WHERE v_tr_header.tr_id = 2 
                                   AND v_tr_header.customer_id = $customer_id
                                   AND year(v_tr_header.tr_date) = $tahun 
                                   AND month(v_tr_header.tr_date) = $bulan
                                   AND v_tr_header.status IN (1,3,4)")->result();
        echo json_encode($query, true);
    }
        
    function confirm_task() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);                
        $postData = $this->input->post();
        $header_id = $postData['id'];
        $tr_id = $postData['tr_id'];
        $this->db->trans_begin();
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $err = $this->db->error();
            $json['msg'] = $err['code'] . '<br>' . $err['message'];
            echo json_encode($json);
        } else {
            $get_header = $this->db->query("SELECT id, store_id, tr_id, tr_date, tr_number FROM tr_header WHERE id = $header_id")->result();                
            if(count($get_header > 0)){
                $store_id = $get_header[0]->store_id;
                $tr_date = $get_header[0]->tr_date;
                $tr_number = ($get_header[0]->tr_number !== '' &&  $get_header[0]->tr_number !== null ? $get_header[0]->tr_number : $this->generate_code_confirm($store_id, $tr_id, $tr_date));

                $this->db->where(array('id' => $header_id));
                $this->db->update('tr_header', array('tr_id' => $tr_id,'tr_number' => $tr_number, 'status' => 3, 'updated' => date('Y-m-d H:i:s', time()), 'updatedby' => $this->userId) );

                $this->db->where(array('header_id' => $header_id));
                $this->db->update('tr_detail', array('status' => 3, 'updated' => date('Y-m-d H:i:s', time()), 'updatedby' => $this->userId) );

                $select = $this->db->select('currency_id, nominal')->where('header_id', $header_id)->get('tr_detail');
                if($select->num_rows()){                           
                    $tahun = (int) SUBSTR($get_header[0]->tr_date,0,4);
                    $bulan = (int) SUBSTR($get_header[0]->tr_date,5,2);
                    foreach($select->result_array() as $row) {
                        $currency_id = $row['currency_id'];
                        $nominal  = $row['nominal'];
                        $this->Bksmdl->generate_tr_stock($store_id, $tahun, $bulan, $currency_id, $nominal);
                    }
                }

                $this->db->trans_commit();
                $json['msg'] = '1';
                $json['tr_header_id'] = $header_id;
                echo json_encode($json);
            }            
        }
    }

    function cancel_trx(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $header_id = json_decode($postData['id']);        
        if( isset($postData['description']) ){
            $postData['description'] = ucwords(strtolower(trim($postData['description']))); 
        } else {
            $postData['description'] = 'Canceled';
        }
        $this->db->trans_begin();
        $this->db->where(array('id' => $header_id));
        $this->db->update('tr_header', array('status' => 2, 'description' => $postData['description'], 'updated' => date('Y-m-d H:i:s', time()), 'updatedby' => $this->userId) );
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $err = $this->db->error();
            $json['msg'] = $err['code'] . '<br>' . $err['message'];
            echo json_encode($json);
        } else {
            $this->db->where(array('header_id' => $header_id));
            $this->db->update('tr_detail', array('status' => 2, 'updated' => date('Y-m-d H:i:s', time()), 'updatedby' => $this->userId) );

            $this->db->trans_commit();
            $json['msg'] = '1';
            echo json_encode($json);
        }            
    }

    function insert_payment(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);                
        $postData = $this->input->post();
        $header_id = $postData['header_id'];
        $payment_type = $postData['modal_payment_type'];
        $cashierby = $postData['cashierby'];
        $postData['payment_type'] = $postData['modal_payment_type'];
        $postData['amount'] = $postData['modal_payment_amount'];
        if (strpos($postData['modal_payment_amount'], ',') !== false) {
            $postData['amount'] = str_replace(',','.',$postData['modal_payment_amount']);
        }
        $postData['status'] = '1';      
        
        unset($postData['modal_payment_type']);
        unset($postData['modal_payment_amount']);
        unset($postData['cashierby']);

        $get_tr_payment = $this->db->query("SELECT id,header_id FROM tr_payment WHERE header_id = $header_id AND payment_type = $payment_type LIMIT 1")->result();
        if(count($get_tr_payment) == 0){
            $this->db->trans_begin();
            $this->Bksmdl->table = 'tr_payment';
            $response = $this->Bksmdl->insert($postData);
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $err = $this->db->error();
                $json['msg'] = $err['code'] . '<br>' . $err['message'];
                echo json_encode($json);
            } else {
                /** update tr_header */
                $this->db->where(array('id' => $header_id));
                $this->db->update('tr_header', array('status' => 4, 'cashierby' => $cashierby, 'updated' => date('Y-m-d H:i:s', time()), 'updatedby' => $this->userId) );

                /** insert cash_bank */
                $get_tr_header = $this->db->query("SELECT id, store_id, tr_date FROM tr_header WHERE id = $header_id LIMIT 1")->result();
                if(isset($get_tr_header) && $get_tr_header[0]->store_id != null && $get_tr_header[0]->store_id != ''){
                    $data['store_id'] = $get_tr_header[0]->store_id;
                    $data['tr_date'] = $get_tr_header[0]->tr_date;
                    $data['buysell_id'] = $get_tr_header[0]->id;
                    $this->Bksmdl->generate_payment_cb($data);
                }

                $this->db->trans_commit();
                $json['msg'] = '1';
                echo json_encode($json);
            }
        } else {
            $id = $get_tr_payment[0]->id;
            $this->db->where(array('id' => $id));
            $this->db->update('tr_payment', $postData );
        }
    }

    function show_detail_payment(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $header_id = json_decode($postData['header_id']);
        $query = $this->db->query("SELECT * FROM v_tr_payment WHERE header_id= " . $header_id ." ORDER BY payment_type,id ASC")->result();
        echo json_encode($query, true);
    }

    function delete_detail_payment(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);        
        $postData = $this->input->post();
        $id = json_decode($postData['id']);        
        $this->db->trans_begin();
        $this->Bksmdl->table = 'tr_payment';
        $status = $this->Bksmdl->delete('id', $id);        
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $err = $this->db->error();
            $json['msg'] = $err['code'] . '<br>' . $err['message'];
            echo json_encode($json);
        } else {
            $this->db->trans_commit();
            $json['msg'] = '1';
            echo json_encode($json);
        }
    }

    function update_payment_cashierby(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $header_id = json_decode($postData['id']);    
        $cashierby = $postData['cashierby'];    
        $this->db->trans_begin();
        $this->db->where(array('id' => $header_id));
        $this->db->update('tr_header', array('cashierby' => $cashierby, 'updated' => date('Y-m-d H:i:s', time()), 'updatedby' => $this->userId) );
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $err = $this->db->error();
            $json['msg'] = $err['code'] . '<br>' . $err['message'];
            echo json_encode($json);
        } else {
            $this->db->trans_commit();
            $json['msg'] = '1';
            echo json_encode($json);
        }            
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
        $customer_permit_number = $data_header[0]->permit_number;
        $customer_permit_date = revDate($data_header[0]->permit_date_start) . ' s/d ' . revDate($data_header[0]->permit_date_end) ;
        $tr_time =  date('H:i:s',strtotime($data_header[0]->created));        
        $counter_name = $data_header[0]->createdby_name;
        $status = $data_header[0]->status;

        $pdf = new Pdf();
        
        // Call before the addPage() method
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);

        // $pdf->AddPage('P', 'mm', 'PA5'); // paper size custom in tcpdf_static.php
        // $pdf->AddPage('P', 'mm', array('14','12'), true, 'UTF-8', false);

        if($this->uri->segment(5) == 1) { 
            $tr_name = 'BUY';
        }
        if($this->uri->segment(5) == 2) {
            $tr_name = 'SELL';
        }
        if($status == 2){
            $tr_name .= ' ( Cancel )';
        }        

        // Add Content Body
        $pdf->SetFont('', '', 9);
        $data_content = $this->db->query("SELECT * FROM v_tr_detail WHERE header_id = " . $id)->result();     
        if(count($data_content) > 0) {
            $no = 0;
            $total = 0;
            $pageno = 0;
            foreach($data_content as $r){
                $no++;
                if($no == 1 || $no == 7){
                    $pdf->AddPage('P', 'mm', 'PA5'); // paper size custom in tcpdf_static.php
                    $pdf->Ln(1);
                    $pdf->SetFont('', 'B', 12);
                    $pdf->Cell(131, 01, '** ' . $tr_name . ' **', 0, 1, 'C');
                    
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

                    if(strlen(trim($profil_usaha[0]->store_permit_number)) > 0){
                        $pdf->Cell(01, 01, 'Authorized Money Changer ' . trim($profil_usaha[0]->store_permit_number), 0, 1, 'L');
                    }


                    $pdf->SetFont('', '', 9);
                    $pdf->Cell(01, 01, "------------------------------------------------------------------------------------", 0, 1, 'L');
                    if($data_header[0]->customer_type_id == '1'){
                        $pdf->Cell(01, 01, 'Date        : ' . $tr_date . '           ' . 'Number : ' . trim($tr_number), 0, 1, 'L');
                        $pdf->Cell(01, 01, 'CIF          : ' . trim($profil_customer[0]->customer_code) . '     ID No     : ' . $profil_customer[0]->customer_data_number, 0, 1, 'L');
                        $pdf->Cell(01, 01, 'Phone     : ' . $profil_customer[0]->customer_handphone . '   Job         : ' . $profil_customer[0]->customer_job_name, 0, 1, 'L');
                        $pdf->Cell(01, 01, 'Name      : ' . SUBSTR(trim($profil_customer[0]->customer_name),0,45), 0, 1, 'L');
                        $pdf->Cell(01, 01, 'Address  : ' . SUBSTR(trim($profil_customer[0]->customer_address),0,45), 0, 1, 'L');
                        $pdf->Cell(01, 01, 'Source    : ' . SUBSTR(trim($customer_source),0,50), 0, 1, 'L');
                        $pdf->Cell(01, 01, 'Purpose  : ' . SUBSTR(trim($customer_puprpose),0,50), 0, 1, 'L');    
                    } else {
                        $pdf->Cell(01, 01, 'Date             : ' . $tr_date . '           ' . 'Number : ' . trim($tr_number), 0, 1, 'L');
                        $pdf->Cell(01, 01, 'CIF               : ' . trim($profil_customer[0]->customer_code), 0, 1, 'L');
                        $pdf->Cell(01, 01, 'Phone          : ' . $profil_customer[0]->customer_handphone, 0, 1, 'L');
                        $pdf->Cell(01, 01, 'Name           : ' . SUBSTR(trim($profil_customer[0]->customer_name),0,45), 0, 1, 'L');
                        $pdf->Cell(01, 01, 'Address       : ' . SUBSTR(trim($profil_customer[0]->customer_address),0,45), 0, 1, 'L');
                        $pdf->Cell(01, 01, 'Licensi No    : ' . SUBSTR(trim($customer_permit_number),0,50), 0, 1, 'L');
                        $pdf->Cell(01, 01, 'Licensi Date : ' . SUBSTR(trim($customer_permit_date),0,50), 0, 1, 'L');    
                    }
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
                }

                $currency_code = $r->currency_code;
                $nominal    = ($r->nominal == 'null' || $r->nominal == '' ? '' : (float) $r->nominal);
                $sheet      = ($r->sheet == 'null' || $r->sheet == '' ? '' : (float) $r->sheet);                
                $amount     = ($nominal * $sheet);
                $price      = ($r->price == 'null' || $r->price == '' ? 0 :  floatval($r->price));
                $subtotal   = ($amount > 0 ? $amount * $price : 0);
                $total      = $total + $subtotal;

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
            $pdf->Cell(01, 01, 'Attention : No Claim after leaving our counter.', 0, 1, 'L');

            // $pdf->Ln(1);
            $text = 'I declare that this transaction has not exceeded the threshold ';
            $pdf->Cell(01, 01, $text, 0, 1, 'L');
            $text = 'of USD 25,000 in this month and will include the actual Underlying';
            $pdf->Cell(01, 01, $text, 0, 1, 'L');
            $text = 'if it does.';
            $pdf->Cell(01, 01, $text, 0, 1, 'L');

            $pdf->SetFont('', '', 9);
            $pdf->Ln(2);
            $pdf->Cell(01, 01, 'Counter,           Cashier,           Customer,', 0, 1, 'L');                                    
        }        
        $pdf->Output($tr_number.'.pdf','I');
    }
}
