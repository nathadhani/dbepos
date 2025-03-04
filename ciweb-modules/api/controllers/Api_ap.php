<?php

class Api_ap extends Bks_Controller {

    function __construct() {
        $config = array('modules' => 'api', 'jsfiles' => array(''));
        parent::__construct($config);
        $ApiMdl = New Apimdl;
        $this->auth = $this->session->userdata('auth');
        $this->userId = $this->auth['id'];
        $this->usergroup_id = $this->auth['usergroup_id'];

        $this->api_username = $this->auth['api_username'];
        $this->api_password = $this->auth['api_password'];
        if($this->usergroup_id == 1){
            $this->api_username = 'api.indocev.cgk';
            $this->api_password = 'api.indocev.cgk';    

            // $this->api_username = 'api.indocev.sub';
            // $this->api_password = 'api.indocev.sub';    
        }
    }

    public function ap_login($url){
        // $data = json_encode(array('username' => 'api.icv', 'password' => 'api.icv')); // For Trial
        $data = json_encode(array('username' => $this->api_username, 'password' => $this->api_password)); // For Production
        $result = $this->Apimdl->callcurl($url, $data, null);
        return $result;
    }
    
    function ap_post_api(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();       

        $method = null;
        if(isset($postData['method'])){
            $method = $postData['method'];
        }

        $id = null;
        if(isset($postData['id'])){
            $id = $postData['id'];
        }

        $company_id = null;
        if(isset($postData['company_id'])){
            $company_id = $postData['company_id'];
        }
        
        $store_id = null;
        if(isset($postData['store_id'])){
            $store_id = $postData['store_id'];
        }
        
        $tr_date = Date('Y-m-d');
        if(isset($postData['tr_date'])){
            $tr_date = revDate($postData['tr_date']);
        }                  

        // $url = 'https://api-ecsysdev.angkasapura2.co.id/api/auth/login'; // Trial
        $url  = 'https://api-ecsys.angkasapura2.co.id/api/auth/login'; // Production
        $login = $this->ap_login($url);
        if($login) {
            $resp_login = json_decode($login,true);            
            // var_dump($resp_login);exit;
            $token = (isset($resp_login['token']) ? $resp_login['token'] : '');
            if($token !== null && $token !== ''){
                if($method === 'inputtrx'){
                    // $url = 'https://api-ecsysdev.angkasapura2.co.id/api/v1/transaction/'; // Trial
                    $url = 'https://api-ecsys.angkasapura2.co.id/api/v1/transaction/'; // Production
                    $this->ap_input_trx($url, $token, $method, $id);

                } else if($method === 'adjustmenttrx'){
                    // $url = 'https://api-ecsysdev.angkasapura2.co.id/api/v1/transaction/adjustment'; // Trial
                    $url = 'https://api-ecsys.angkasapura2.co.id/api/v1/transaction/adjustment'; // Production
                    $this->ap_adjustment_trx($url, $token, $method, $id);

                } else if($method === 'gettrx'){
                    // $url = 'https://api-ecsysdev.angkasapura2.co.id/api/v1/simulation/'; // Trial
                    $url = 'https://api-ecsys.angkasapura2.co.id/api/v1/simulation/'; // Production
                    $this->db->truncate('trx_api_ap_get');
                    $this->ap_get_trx($url, $token, $company_id, $store_id, $tr_date, $method);

                } else if($method === 'getstore'){
                    $this->ap_get_store($company_id, $resp_login);
                }
            } else {
                echo "token IS NULL or " . $token;
            }                                            
        } else {
            $resp_login = json_decode($login,true);
            echo "<pre>"; print_r($resp_login); echo "</pre>";
        }        
    }

    public function ap_input_trx($url, $token, $method, $id){
        if($id !== null){
            $status_trx = 1;
            $get_tr_header = $this->db->select('*')
                                           ->where(array('id'=>$id, 'status' => $status_trx))
                                           ->get('v_tr_header')
                                           ->result_array();
            if(count($get_tr_header) > 0){
                $store_id = $get_tr_header[0]['store_id'];
                $get_store_ref_id = $this->db->query("SELECT * FROM m_company_store WHERE id = $store_id")->result();
                if($get_store_ref_id[0]->store_reference_id !== null){
                    $store_ref_id = $get_store_ref_id[0]->store_reference_id;
                    $tr_number = $get_tr_header[0]['tr_number'];

                    // Get trx detail
                    $get_tr_detail = $this->db->select('sequence,
                                                   currency_id,
                                                   currency_code,
                                                   currency_name,
                                                   (nominal * sheet) AS amount,
                                                   price,
                                                   subtotal')
                                            ->where(array('header_id'=>$id, 'status' => $status_trx))
                                            ->get('v_tr_detail');

                    if(count($get_tr_detail) > 0){
                        $data_detail = array();
                        foreach($get_tr_detail->result_array() as $row) {
                            $r = array(                  
                                        'invoice_no' => $tr_number,
                                        'trans_date' => $get_tr_header[0]['tr_date'],
                                        'trans_time' => $get_tr_header[0]['created'],
                                        'sequence_unique' => $row['sequence'],
                                        'item_name' => $row['currency_name'],
                                        'item_code' => $row['currency_id'],
                                        'item_barcode' => '0',
                                        'item_cat_name' => '0',
                                        'item_cat_code' => '0',
                                        'item_qty' => $row['amount'],
                                        'item_unit' => '0',
                                        'item_price_per_unit' => $row['price'],
                                        'item_discount' => '0',
                                        'item_price_amount' => $row['price'],
                                        'item_vat' => '0',
                                        'item_tax' => '0',
                                        'item_total_discount' => '0',
                                        'item_total_price_amount' => $row['subtotal'],
                                        'item_total_vat' => '0',
                                        'item_total_tax' => '0',
                                        'item_total_service_charge' => '0',
                                        'invoice_tax' => '0',
                                        'invoice_discount' => '0',
                                        'transaction_amount' => $row['subtotal'],
                                        'currency' => 'IDR',
                                        'rate' => '1',
                                        'payment_type' => $get_tr_header[0]['payment_type_name'],
                                        'payment_by' => $get_tr_header[0]['customer_name'],
                                        'username' => $get_tr_header[0]['cashier_name'],
                                        'buyer_barcode' => $get_tr_header[0]['flight_barcode'],
                                        'buyer_name' => $get_tr_header[0]['customer_name'],
                                        'buyer_flight_no' => $get_tr_header[0]['flight_no'],
                                        'buyer_destination' => $get_tr_header[0]['flight_destination_code'],
                                        'buyer_nationality' => $get_tr_header[0]['nationality_code'],
                                        'remark' => 'Success',
                                        'tax_id' => 'PPN',
                                        'payment_name' => $get_tr_header[0]['payment_type_name'],
                                        'payment_time' => $get_tr_header[0]['created'],
                                        'distance' => '0',
                                        'journey_time' => '0'
                                    );
                            array_push($data_detail, $r);
                        }

                        $data [] = array(
                                            'store_id' => $store_ref_id,
                                            'transactions' => $data_detail
                                        );
                        $data = array('store' => $data);        
                        $data = json_encode($data);
                        // $this->Apimdl->exportJSONtofile($tr_number, $data);exit;

                        if(isset($data) && count($data) > 0){
                            if(isset($token) && ($token !== null && $token !== '')){
                                $result = $this->Apimdl->callcurl($url, $data, $token);
                                $resArr = json_decode($result,true);
                                // echo json_encode($resArr);

                                $resp_status = $resArr['status'];
                                $resp_success_insert = $resArr['success_insert'];
                                $resp_failed_insert = $resArr['failed_insert'];

                                $get_trx_api_log = $this->db->query("SELECT header_id FROM trx_api_ap_log WHERE header_id = $id AND (ap_status IS NULL OR ap_failed_insert > 0)")->result();
                                if($get_trx_api_log[0]->header_id !== null){
                                    $this->db->where(array('header_id' => $id));
                                    $this->db->update('trx_api_ap_log',
                                                        array(
                                                                'ap_status' => $resp_status,
                                                                'ap_success_insert' => $resp_success_insert,
                                                                'ap_failed_insert' => $resp_failed_insert,
                                                                'created' => date('Y-m-d H:i:s', time()),
                                                                'createdby' => $this->userId
                                                            )
                                                    );            
                                } else {
                                    $this->db->insert('trx_api_ap_log',
                                                        array(
                                                            'header_id' => $id,
                                                            'method' => $method,
                                                            'ap_status' => $resp_status,
                                                            'ap_success_insert' => $resp_success_insert,
                                                            'ap_failed_insert' => $resp_failed_insert,
                                                            'created' => date('Y-m-d H:i:s', time()),
                                                            'createdby' => $this->userId
                                                            )
                                                    );
                                }
                                if(($resp_status == '1' || $resp_status == true) || $resp_success_insert > 0){
                                    $this->db->trans_begin();
                                    $this->db->where(array('id' => $id));
                                    $this->db->update('tr_header', array('status' => 3, 'updated' => date('Y-m-d H:i:s', time()), 'updatedby' => $this->userId) );
                
                                    $this->db->where(array('header_id' => $id));
                                    $this->db->update('tr_detail', array('status' => 3, 'updated' => date('Y-m-d H:i:s', time()), 'updatedby' => $this->userId) );        
                
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
                                } else {
                                    $result = json_encode(array('Msg' => 'faied insert API.!'));    
                                }
                            } else {
                                $result = json_encode(array('Msg' => 'token not found.!'));
                            }                                            
                        } else {
                            $result = json_encode(array('Msg' => 'data not found.!'));
                        }
                    }                            
                } else {
                    $result = json_encode(array('Msg' => 'store id not found.!'));
                }
            }
        } else {
            $result = json_encode(array('Msg' => 'id is null.!'));
        }        
    }

    public function ap_adjustment_trx($url, $token, $method, $id){
        if($id !== null){
            $get_tr_header = $this->db->select('*')
                                 ->where(array('id'=>$id))
                                 ->where_in('status', ['3'])
                                 ->get('v_tr_header')->result_array();
            if(count($get_tr_header) > 0){
                $store_id = $get_tr_header[0]['store_id'];
                $get_store_ref_id = $this->db->query("SELECT * FROM m_company_store WHERE id = $store_id")->result();
                if($get_store_ref_id[0]->store_reference_id !== null){
                    $store_ref_id = $get_store_ref_id[0]->store_reference_id;
                    $tr_number = $get_tr_header[0]['tr_number'];

                    // Get trx detail
                    $get_tr_detail = $this->db->select('sequence,
                                                   currency_id,
                                                   currency_code,
                                                   currency_name,
                                                   (nominal * sheet) AS amount,
                                                   price,
                                                   subtotal')
                                            ->where(array('header_id' => $id))
                                            ->where_in('status', ['1','3'])
                                            ->get('v_tr_detail');

                    if(count($get_tr_detail) > 0){
                        $data_detail = array();
                        $sequence = 1;
                        foreach($get_tr_detail->result_array() as $row) {
                            $r = array(           
                                        'flag_void' => 'false',
                                        'invoice_no' => $tr_number,
                                        'trans_date' => $get_tr_header[0]['tr_date'],
                                        'trans_time' => $get_tr_header[0]['created'],
                                        'sequence_unique' => $sequence,
                                        'item_name' => $row['currency_name'],
                                        'item_code' => $row['currency_id'],
                                        'item_barcode' => '0',
                                        'item_cat_name' => '0',
                                        'item_cat_code' => '0',
                                        'item_qty' => ($row['amount'] * -1),
                                        'item_unit' => '0',
                                        'item_price_per_unit' => $row['price'],
                                        'item_discount' => '0',
                                        'item_price_amount' => $row['price'],
                                        'item_vat' => '0',
                                        'item_tax' => '0',
                                        'item_total_discount' => '0',
                                        'item_total_price_amount' => ($row['subtotal'] * -1),
                                        'item_total_vat' => '0',
                                        'item_total_tax' => '0',
                                        'item_total_service_charge' => '0',
                                        'invoice_tax' => '0',
                                        'invoice_discount' => '0',
                                        'transaction_amount' => ($row['subtotal'] * -1),
                                        'currency' => 'IDR',
                                        'rate' => '1',
                                        'payment_type' => $get_tr_header[0]['payment_type_name'],
                                        'payment_by' => $get_tr_header[0]['customer_name'],
                                        'username' => $get_tr_header[0]['cashier_name'],
                                        'buyer_barcode' => $get_tr_header[0]['flight_barcode'],
                                        'buyer_name' => $get_tr_header[0]['customer_name'],
                                        'buyer_flight_no' => $get_tr_header[0]['flight_no'],
                                        'buyer_destination' => $get_tr_header[0]['flight_destination_code'],
                                        'buyer_nationality' => $get_tr_header[0]['nationality_code'],
                                        'remark' => $get_tr_header[0]['description'],
                                        'tax_id' => 'PPN',
                                        'payment_name' => $get_tr_header[0]['payment_type_name'],
                                        'payment_time' => $get_tr_header[0]['created'],
                                        'distance' => '0',
                                        'journey_time' => '0'
                                    );
                            array_push($data_detail, $r);
                            $sequence++;
                        }

                        $data [] = array(
                                            'store_id' => $store_ref_id,
                                            'transactions' => $data_detail
                                        );
                        $data = array('store' => $data);        
                        $data = json_encode($data);
                        // $this->Apimdl->exportJSONtofile($tr_number, $data);exit;

                        if(isset($data) && count($data) > 0){
                            if(isset($token) && ($token !== null && $token !== '')){                               
                                $result = $this->Apimdl->callcurl($url, $data, $token);
                                $resArr = json_decode($result,true);                                
                                echo json_encode($resArr);                

                                $resp_status = $resArr['status'];
                                $resp_success_insert = $resArr['success_insert'];
                                $resp_failed_insert = $resArr['failed_insert'];
                                
                                $get_trx_api_log = $this->db->query("SELECT header_id FROM trx_api_ap_log WHERE header_id = $id AND (ap_status IS NULL OR ap_failed_insert > 0)")->result();
                                if($get_trx_api_log[0]->header_id !== null){
                                    $this->db->where(array('header_id' => $id));
                                    $this->db->update('trx_api_ap_log',
                                                        array(
                                                                'ap_status' => $resp_status,
                                                                'ap_success_insert' => $resp_success_insert,
                                                                'ap_failed_insert' => $resp_failed_insert,
                                                                'created' => date('Y-m-d H:i:s', time()),
                                                                'createdby' => $this->userId
                                                            )
                                                    );            
                                } else {
                                    $this->db->insert('trx_api_ap_log',
                                                        array(
                                                            'header_id' => $id,
                                                            'method' => $method,
                                                            'ap_status' => $resp_status,
                                                            'ap_success_insert' => $resp_success_insert,
                                                            'ap_failed_insert' => $resp_failed_insert,
                                                            'created' => date('Y-m-d H:i:s', time()),
                                                            'createdby' => $this->userId
                                                            )
                                                    );
                                }
                                
                                if(($resp_status == '1' || $resp_status == true) || $resp_success_insert > 0){
                                    $this->db->trans_begin();
                
                                    $this->db->where(array('id' => $id));
                                    $this->db->update('tr_header', array('status' => 2, 'updated' => date('Y-m-d H:i:s', time()), 'updatedby' => $this->userId) );
                
                                    $this->db->where(array('header_id' => $id));
                                    $this->db->update('tr_detail', array('status' => 2, 'updated' => date('Y-m-d H:i:s', time()), 'updatedby' => $this->userId) );        
                
                                    if ($this->db->trans_status() === FALSE) {
                                        $this->db->trans_rollback();
                                        $err = $this->db->error();
                                        $json['msg'] = $err['code'] . '<br>' . $err['message'];
                                        echo json_encode($json);
                                    } else {
                                        $get_tr_header = $this->db->query("SELECT company_id, store_id, tr_date FROM tr_header WHERE id = $id")->result();
                                        if(!isset($get_tr_header[0]->company_id) ){
                                            $company_id = $get_tr_header[0]->company_id;
                                            $store_id = $get_tr_header[0]->store_id;
                                            $tr_date = $get_tr_header[0]->tr_date;
                                            $tahun = (int) SUBSTR($tr_date,0,4);
                                            $bulan = (int) SUBSTR($tr_date,5,2);

                                            $select = $this->db->select('currency_id')->where('header_id',$id)->get('tr_detail');
                                            if($select->num_rows()){
                                                foreach($select->result_array() as $row) {
                                                    $currency_id = $row['currency_id'];
                                                    $this->Bksmdl->generate_stock($company_id, $store_id, $currency_id, $tahun, $bulan);
                                                }
                                            }
                                        }    
                                        $this->db->trans_commit();
                                        $json['msg'] = '1';
                                        echo json_encode($json);
                                    }
                                }
                            } else {
                                $result = json_encode(array('Msg' => 'token not found.!'));
                            }                                            
                        } else {
                            $result = json_encode(array('Msg' => 'data not found.!'));
                        }
                    }                            
                } else {
                    $result = json_encode(array('Msg' => 'store id not found.!'));
                }
            }
        } else {
            $result = json_encode(array('Msg' => 'id isnull.!'));
        }        
    }
    
    public function ap_get_trx($url, $token, $company_id, $store_id, $tr_date, $method){
        if($store_id !== null){
            $get_store_ref_id = $this->db->query("SELECT * FROM m_company_store WHERE id = $store_id AND company_id = $company_id")->result();
            if($get_store_ref_id[0]->store_reference_id !== null){                
                $store_ref_id = $get_store_ref_id[0]->store_reference_id;                
                $data = array(
                            'store_id' => $store_ref_id,
                            'date' =>	$tr_date
                            );                            
                $data = json_encode($data);                
                $result = $this->Apimdl->callcurl($url, $data, $token);
                if($result){
                    $resArr = json_decode($result,true);                        
                    // echo "<pre>"; print_r($resArr); echo "</pre>";exit;
                    if( (isset($resArr['status']) && $resArr['status'] == 1)  && ( isset($resArr['total_data']) && $resArr['total_data'] > 0) ){                        
                        foreach ($resArr['data'] as $key => $item) {
                            $data_d = array(                         
                                            'company_id' => $company_id,
                                            'store_id' => $store_id,
                                            'tr_id' => (int) SUBSTR($item['invoice_number'],10,2),
                                            'invoice_number' => $item['invoice_number'],
                                            'transaction_date' => $item['transaction_date'],
                                            'transaction_time' => $item['transaction_time'],          
                                            'sequence' => $item['sequence'],
                                            'item_code' => $item['item_code'],
                                            'item_name' => $item['item_name'],
                                            'item_quantity' => (float) $item['item_quantity'],
                                            'item_price_unit' => (float) $item['item_price_unit'],
                                            'item_price_amount' => (float) $item['item_price_amount'],
                                            'item_total_price_amount' => (float) $item['item_total_price_amount'],
                                            'item_vat' => $item['item_vat'],
                                            'transaction_amount' => $item['transaction_amount'],
                                            'item_barcode' => $item['item_barcode'],
                                            'item_category_name' => $item['item_category_name'],
                                            'item_category_code' => $item['item_category_code'],
                                            'item_discount' => $item['item_discount'],
                                            'item_total_discount' => $item['item_total_discount'],
                                            'item_total_vat' => $item['item_total_vat'],
                                            'item_total_tax' => $item['item_total_tax'],
                                            'item_total_service_charge' => $item['item_total_service_charge'],
                                            'rate' => $item['rate'],
                                            'payment_type' => $item['payment_type'],
                                            'payment_by' => $item['payment_by'],
                                            'username' => $item['username'],
                                            'buyer_barcode' => $item['buyer_barcode'],
                                            'buyer_name' => $item['buyer_name'],
                                            'buyer_flight_no' => $item['buyer_flight_no'],
                                            'buyer_destination' => $item['buyer_destination'],
                                            'buyer_nationality' => $item['buyer_nationality'],
                                            'remark' => $item['remark'],
                                            'invoice_tax' => $item['invoice_tax'],
                                            'tax_id' => $item['tax_id'],
                                            'payment_name' => $item['payment_name'],
                                            'payment_time' => $item['payment_time'],
                                            'distance' => $item['distance'],
                                            'journey_time' => $item['journey_time'],
                                            'status' => $resArr['status'],
                                            'created' => date('Y-m-d H:i:s', time()),
                                            'createdby' => $this->userId
                                        );
                            if(count($data_d) > 0){
                                $response = $this->db->insert('trx_api_ap_get', $data_d);
                                // echo $this->db->last_query();exit;
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
                            $json['response'] = $resArr;
                            echo json_encode($json);
                        }
                    } else {
                        $result = json_encode(array('Msg' => "data is null..!"));
                    }
                } else {
                    $result = json_encode(array('Msg' => "can't get data..!"));
                }                                   
            } else {
                $resArr = json_decode($result,true);             
                echo "<pre>"; print_r($resArr); echo "</pre>";exit;
            }            
        } else {
            $result = json_encode(array('Msg' => 'store id not found.!'));
        }        
    }

    public function ap_get_store($company_id, $resArr){
        $this->db->trans_begin();
        if(isset($resArr['user']['store']) && $resArr['user']['store'] !== null){
            foreach ($resArr['user']['store'] as $key => $item) {
                $store_reference_id = $item['store_id'];
                $cek_h = $this->db->query("SELECT * FROM m_company_store WHERE store_reference_id = '$store_reference_id' ")->result();
                if( !isset($cek_h[0]->store_reference_id) ){
                    $data = array(
                                'company_id' => $company_id,
                                'store_reference_id' => $item['store_id'],
                                'store_reference_name' => $item['store_name'],
                                'register_status' => 1,
                                'status' => 1,
                                'created' => date('Y-m-d H:i:s', time()),
                                'createdby' => $this->userId
                            );
                    if(count($data) > 0){
                        $response = $this->db->insert('m_company_store', $data);
                        // echo $this->db->last_query();exit;
                    }
                }            
            }
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $err = $this->db->error();
                $json['msg'] = $err['code'] . '<br>' . $err['message'];
                echo json_encode($json);
            } else {
                $this->db->trans_commit();                
                echo "<pre>"; print_r($resArr); echo "</pre>";
            }
        } else {
            echo "<pre>"; print_r($resArr); echo "</pre>";
        }        
    }
    
}
