<?php

class Transaction_buysell extends Bks_Controller {
    
    function __construct() {
        $config = array('modules' => 'transaction', 'jsfiles' => array('transaction_buysell'));
        parent::__construct($config);
        $this->auth = $this->session->userdata( 'auth' );
        $this->userId = $this->auth['id'];
        $this->company_id = $this->auth['company_id'];
    }
    
    function index(){
        $this->libauth->check(__METHOD__);
        $this->template->title('New');
        $this->template->set('tsmall', 'Buy / Sell - New');
        $this->template->set('icon', 'fa fa-edit');
        $data['auth'] = $this->auth;
        $this->template->build('transaction/transaction_buysell_v', $data);
    }    
    
    function generate_code_temp($company_id, $store_id, $tr_id, $tr_date){
        $Number = 1;
        $thn = SUBSTR($tr_date,0,4);
        $bln = SUBSTR($tr_date,5,2);        
        $branchcode = sprintf("%02d", $company_id);
        $storecode  =sprintf("%02d", $store_id);
        $trcode = sprintf("%02d", $tr_id);
        $sql = $this->db->query("SELECT max(right(tr_number_temp,4)) as id 
                                 FROM tr_header
                                 WHERE company_id = $company_id
                                 AND store_id = $store_id 
                                 AND tr_id = $tr_id
                                 AND YEAR(tr_date) = $thn 
                                 AND MONTH(tr_date) = $bln 
                                 ")->result();
        if (count($sql) > 0) {
            foreach ($sql as $data) {
                $Number = intval($data->id) + 1;
            }
        }        
        return SUBSTR($thn,2,2) . $bln . '-' . $branchcode . $storecode . '-' . $trcode . sprintf("%04d", $Number);
    }    
    
    function generate_code_confirm($company_id, $store_id, $tr_id, $tr_date) {
        $Number = 1;
        $thn = SUBSTR($tr_date,0,4);
        $bln = SUBSTR($tr_date,5,2);
        $branchcode = sprintf("%02d", $company_id);
        $storecode  =sprintf("%02d", $store_id);
        $trcode = sprintf("%02d", $tr_id);
        $sql = $this->db->query("SELECT max(right(tr_number,4)) as id 
                                 FROM tr_header 
                                 WHERE company_id = $company_id
                                 AND store_id = $store_id
                                 AND tr_id = $tr_id
                                 AND YEAR(tr_date) = $thn 
                                 AND MONTH(tr_date) = $bln 
                                 ")->result();
        if (count($sql) > 0) {
            foreach ($sql as $data) {
                $Number = intval($data->id) + 1;
            }
        }
        return SUBSTR($thn,2,2) . $bln . '-' . $branchcode . $storecode . '-' . $trcode . sprintf("%04d", $Number);
    }
   
    function insert_header(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);        
        $postData = $this->input->post();

        $tr_id = $postData['tr_id'];
        $postData['company_id'] = $this->company_id;
        $postData['tr_date'] = revDate($postData['tr_date']);
        $postData['tr_number_temp'] = $this->generate_code_temp($this->company_id, $postData['store_id'], $tr_id, $postData['tr_date']);
        $postData['createdby'] = $postData['user_id'];
        $postData['status'] = '1';
        unset($postData['user_id']);       
        
        $this->db->trans_begin();
        $this->Bksmdl->table = 'tr_header';        
        $response = $this->Bksmdl->insert($postData);
        $id = $this->db->insert_id();
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $err = $this->db->error();
            $json['msg'] = $err['code'] . '<br>' . $err['message'];
            echo json_encode($json);
        } else {
            $this->db->trans_commit();
            $json['id'] = $id;
            $json['msg'] = '1';
            echo json_encode($json);
        }
    }
    
    function update_header(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);        
        $postData = $this->input->post();

        $id = $postData['id'];
        $postData['company_id'] = $this->company_id;
        $postData['updatedby'] = $postData['user_id'];
        $postData['status'] = '1';   
        unset($postData['tr_date']);   
        unset($postData['user_id']);   

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

        $header_id = $postData['header_id'];
        $tr_id = $postData['tr_id'];

        unset($postData['subtotal']);
        if (strpos($postData['price'], ',') !== false) {
            $postData['price'] = str_replace(',','.',$postData['price']);
        }
        $postData['subtotal'] = ( ($postData['nominal'] * $postData['sheet']) * $postData['price'] );
        $postData['createdby'] = $postData['user_id'];
        $postData['updatedby'] = $postData['user_id'];
        $postData['status'] = '1';          

        unset($postData['tr_id']);
        unset($postData['user_id']);       
        
        $this->db->trans_begin();
        $this->Bksmdl->table = 'tr_detail';
        $response = $this->Bksmdl->insert($postData);
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
        $tr_id = json_decode($postData['tr_id']);
        $id = json_decode($postData['id']);
        $query = $this->db->query("SELECT * FROM v_tr_header WHERE customer_id = " . $customer_id . " AND tr_id = " . $tr_id . " AND  id= " . $id)->result();
        echo json_encode($query, true);
    }
    
    function show_detail(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $customer_id = json_decode($postData['customer_id']);
        $tr_id = json_decode($postData['tr_id']);
        $header_id = json_decode($postData['header_id']);
        $query = $this->db->query("SELECT * FROM v_tr_detail WHERE customer_id = " . $customer_id . " AND tr_id = " . $tr_id . " AND header_id= " . $header_id ." ORDER BY valas_id, nominal, price ASC")->result();
        echo json_encode($query, true);
    }
    
    function show_customer(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $customer_id = json_decode($postData['customer_id']);
        $query = $this->db->query("SELECT * FROM m_customer WHERE id = " . $customer_id . " LIMIT 1")->result();
        echo json_encode($query, true);
    }
    
    function getstockbyid(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $company_id = $postData['company_id']; 
        $store_id = $postData['store_id'];
        $tahun    = (int) Date('Y');
        $bulan    = (int) Date('m');
        $valas_id = $postData['valas_id'];
        $nominal = str_replace('.','', $postData['nominal']);
        $query = $this->db->query("SELECT nominal,
                                          last_stock_sheet, 
                                          IF(last_stock_sheet IS NOT NULL, (nominal * last_stock_sheet),0 ) AS last_stock_amount
                                          FROM v_stock_tr9
                                   WHERE company_id = $company_id 
                                   AND store_id = $store_id                                   
                                   AND stock_year = $tahun 
                                   AND stock_month = $bulan
                                   AND valas_id = $valas_id 
                                   AND nominal = $nominal")->result();
        echo json_encode($query, true);
    }
    
    function getratebyid() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $store_id = $postData['store_id'];
        $valas_id = $postData['valas_id'];
        $tr_date  = Date('Y-m-d');
        $tr_id = $postData['tr_id'];  
        if($tr_id == '1'){
            $query = $this->db->query("SELECT exchange_rate_buy AS rate_today, 
                                              price_buy_bot AS rate_today_bot, 
                                              price_buy_top AS rate_today_top
                                              FROM m_exchange_rate
                                    WHERE company_id = $this->company_id 
                                    AND store_id = $store_id
                                    AND valas_id = $valas_id
                                    AND exchange_rate_date = '$tr_date' LIMIT 1")->result();
            echo json_encode($query, true);
        } else {
            $query = $this->db->query("SELECT exchange_rate_sell AS rate_today,
                                              price_sell_bot AS rate_today_bot,
                                              price_sell_top AS rate_today_top 
                                              FROM m_exchange_rate
                                    WHERE company_id = $this->company_id 
                                    AND store_id = $store_id
                                    AND valas_id = $valas_id
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
        
    function confirm_task() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);                
        $postData = $this->input->post();
        $header_id = $postData['id'];
        $this->db->trans_begin();
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $err = $this->db->error();
            $json['msg'] = $err['code'] . '<br>' . $err['message'];
            echo json_encode($json);
        } else {
            $get_header = $this->db->query("SELECT id,company_id,store_id,tr_id,tr_date,tr_number FROM tr_header WHERE id = $header_id")->result();                
            if(count($get_header > 0)){
                $company_id = $get_header[0]->company_id;
                $store_id = $get_header[0]->store_id;
                $tr_id = $get_header[0]->tr_id;
                $tr_date = $get_header[0]->tr_date;                
                $tr_number = ($get_header[0]->tr_number !== '' &&  $get_header[0]->tr_number !== null ? $get_header[0]->tr_number : $this->generate_code_confirm($company_id, $store_id, $tr_id, $tr_date));

                $this->db->where(array('id' => $header_id));
                $this->db->update('tr_header', array('tr_number' => $tr_number, 'status' => 3, 'updated' => date('Y-m-d H:i:s', time()), 'updatedby' => $this->userId) );

                $this->db->where(array('header_id' => $header_id));
                $this->db->update('tr_detail', array('status' => 3, 'updated' => date('Y-m-d H:i:s', time()), 'updatedby' => $this->userId) );

                $select = $this->db->select('valas_id,nominal')->where('header_id',$header_id)->get('tr_detail');
                if($select->num_rows()){                           
                    $tahun = (int) SUBSTR($get_header[0]->tr_date,0,4);
                    $bulan = (int) SUBSTR($get_header[0]->tr_date,5,2);
                    foreach($select->result_array() as $row) {
                        $valas_id = $row['valas_id'];
                        $nominal  = $row['nominal'];
                        $this->Bksmdl->generate_stock($company_id, $store_id, $tahun, $bulan, $valas_id, $nominal);
                    }
                }

                $this->db->trans_commit();
                $json['msg'] = '1';
                $json['tr_header_id'] = $header_id;
                echo json_encode($json);
            }            
        }
    }

    function cancel_task(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $header_id = json_decode($postData['id']);
        $this->db->trans_begin();
        $this->db->where(array('id' => $header_id));
        $this->db->update('tr_header', array('status' => 2, 'description' => 'Canceled', 'updated' => date('Y-m-d H:i:s', time()), 'updatedby' => $this->userId) );
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
}
