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
        $storecode  =sprintf("%02d", $store_id);
        $trcode = sprintf("%02d", $tr_id);
        $sql = $this->db->query("SELECT max(right(tr_number,4)) as id
                                 FROM tr_header 
                                 WHERE store_id = $store_id
                                 AND tr_id = $tr_id
                                 AND YEAR(tr_date) = $thn 
                                 AND MONTH(tr_date) = $bln 
                                 ")->result();
        if (count($sql) > 0) {
            foreach ($sql as $data) {
                $Number = intval($data->id) + 1;
            }
        }
        return SUBSTR($thn,2,2) . $bln . $storecode . $trcode . sprintf("%04d", $Number);
    }
   
    function insert_header(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);        
        $postData = $this->input->post();

        $tr_id = $postData['tr_id'];
        $postData['store_id'] = $this->store_id;
        
        if(isset($postData['tr_date'])){
            $postData['tr_date'] = revDate($postData['tr_date']);

            $datetime = date('Y-m-d H:i:s');
            $new_date = $postData['tr_date'];
            $new_datetime = date('Y-m-d H:i:s', strtotime($new_date . ' ' . date('H:i:s', strtotime($datetime))));
            $postData['created'] = $new_datetime;
        } else {
            $postData['tr_date'] = Date('Y-m-d');
        }
                
        $postData['customer_source'] = ucwords(strtolower(trim($postData['customer_source'])));
        $postData['customer_purpose'] = ucwords(strtolower(trim($postData['customer_purpose'])));
        $postData['status'] = '1';
        
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
        $postData['store_id'] = $this->store_id;
        $postData['customer_source'] = ucwords(strtolower(trim($postData['customer_source'])));
        $postData['customer_purpose'] = ucwords(strtolower(trim($postData['customer_purpose'])));
        $postData['status'] = '1';   

        if(isset($postData['tr_date'])){
            unset($postData['tr_date']);
        }

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
        unset($postData['subtotal']);
        if (strpos($postData['price'], ',') !== false) {
            $postData['price'] = str_replace(',','.',$postData['price']);
        }
        $postData['subtotal'] = ( ($postData['nominal'] * $postData['sheet']) * $postData['price'] );
        $postData['status'] = '1';                  
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
        $query = $this->db->query("SELECT * FROM v_tr_detail WHERE customer_id = " . $customer_id . " AND tr_id = " . $tr_id . " AND header_id= " . $header_id ." ORDER BY currency_id, nominal, price ASC")->result();
        echo json_encode($query, true);
    }
    
    function show_customer(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $customer_id = json_decode($postData['customer_id']);
        $query = $this->db->query("SELECT * FROM v_m_customer WHERE id = " . $customer_id . " LIMIT 1")->result();
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
                                          FROM v_st2
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
            $get_header = $this->db->query("SELECT id, store_id, tr_id, tr_date, tr_number FROM tr_header WHERE id = $header_id")->result();                
            if(count($get_header > 0)){
                $store_id = $get_header[0]->store_id;
                $tr_id = $get_header[0]->tr_id;
                $tr_date = $get_header[0]->tr_date;                
                $tr_number = ($get_header[0]->tr_number !== '' &&  $get_header[0]->tr_number !== null ? $get_header[0]->tr_number : $this->generate_code_confirm($store_id, $tr_id, $tr_date));

                $this->db->where(array('id' => $header_id));
                $this->db->update('tr_header', array('tr_number' => $tr_number, 'status' => 3, 'updated' => date('Y-m-d H:i:s', time()), 'updatedby' => $this->userId) );

                $this->db->where(array('header_id' => $header_id));
                $this->db->update('tr_detail', array('status' => 3, 'updated' => date('Y-m-d H:i:s', time()), 'updatedby' => $this->userId) );

                $select = $this->db->select('currency_id, nominal')->where('header_id', $header_id)->get('tr_detail');
                if($select->num_rows()){                           
                    $tahun = (int) SUBSTR($get_header[0]->tr_date,0,4);
                    $bulan = (int) SUBSTR($get_header[0]->tr_date,5,2);
                    foreach($select->result_array() as $row) {
                        $currency_id = $row['currency_id'];
                        $nominal  = $row['nominal'];
                        $this->Bksmdl->generate_stock($store_id, $tahun, $bulan, $currency_id, $nominal);
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
}
