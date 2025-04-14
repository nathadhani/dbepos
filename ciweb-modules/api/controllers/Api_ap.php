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

            // $this->api_username = 'api.icv';
            // $this->api_password = 'api.icv';    
        }
    }

    public function ap_login($url){
        $data = json_encode(array('username' => $this->api_username, 'password' => $this->api_password));
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
        
        if(isset($postData['period1'])){
            $tr_date1 = revDate($postData['period1']);
        }

        if(isset($postData['period2'])){
            $tr_date2 = revDate($postData['period2']);
        }

        $url = 'https://api-ecsysdev.angkasapura2.co.id/api/auth/login'; // Trial
        // $url  = 'https://api-ecsys.angkasapura2.co.id/api/auth/login'; // Production
        $login = $this->ap_login($url);
        if($login) {
            $resp_login = json_decode($login,true);            
            // var_dump($resp_login);exit;
            $token = (isset($resp_login['token']) ? $resp_login['token'] : '');
            if($token !== null && $token !== ''){
                if($method === 'inputtrx'){
                    $url = 'https://api-ecsysdev.angkasapura2.co.id/api/v1/transaction/'; // Trial
                    // $url = 'https://api-ecsys.angkasapura2.co.id/api/v1/transaction/'; // Production
                    $this->ap_input_trx($url, $token, $method, $id);

                } else if($method === 'adjustmenttrx'){
                    $url = 'https://api-ecsysdev.angkasapura2.co.id/api/v1/transaction/adjustment'; // Trial
                    // $url = 'https://api-ecsys.angkasapura2.co.id/api/v1/transaction/adjustment'; // Production
                    $this->ap_adjustment_trx($url, $token, $method, $id);

                } else if($method === 'gettrx'){
                    $url = 'https://api-ecsysdev.angkasapura2.co.id/api/v1/simulation/'; // Trial
                    // $url = 'https://api-ecsys.angkasapura2.co.id/api/v1/simulation/'; // Production                    
                    $this->ap_get_trx($url, $token, $store_id, $tr_date1, $tr_date2, $method);

                } else if($method === 'getstore'){
                    $this->ap_get_store($company_id, $resp_login);
                }
            } else {
                echo "empty token";
            }                                            
        } else {
            $resp_login = json_decode($login,true);
            echo "<pre>"; print_r($resp_login); echo "</pre>";
        }        
    }

    public function ap_input_trx($url, $token, $method, $id){
        if($id !== null){
            $status_trx = [3,4,9];
            $get_tr_header = $this->db->select('*')
                                           ->where(array('id'=>$id))
                                           ->where_in('status', $status_trx)
                                           ->get('v_tr_header')
                                           ->result_array();
            if(count($get_tr_header) > 0){
                $store_id = $get_tr_header[0]['store_id'];
                $get_store_ref_id = $this->db->query("SELECT * FROM m_store WHERE id = $store_id")->result();
                if($get_store_ref_id[0]->api_store_id !== null){
                    $store_ref_id = $get_store_ref_id[0]->api_store_id;
                    $tr_number = $get_tr_header[0]['tr_number'];

                    // Get trx detail
                    $get_tr_detail = $this->db->select('id,
                                                   currency_id,
                                                   currency_code,
                                                   currency_name,
                                                   (nominal * sheet) AS amount,
                                                   price,
                                                   subtotal')
                                            ->where(array('header_id'=>$id))
                                            ->where_in('status', $status_trx)
                                            ->get('v_tr_detail');

                    if(count($get_tr_detail) > 0){
                        $data_detail = array();
                        $sequence_unique = 1;
                        foreach($get_tr_detail->result_array() as $row) {
                            $r = array(                  
                                        'invoice_no' => $tr_number,
                                        'trans_date' => $get_tr_header[0]['tr_date'],
                                        'trans_time' => $get_tr_header[0]['created'],
                                        'sequence_unique' => $sequence_unique,
                                        'item_name' => $row['currency_name'],
                                        'item_code' => $row['currency_code'],
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
                                        'payment_type' => 'Cash',
                                        'payment_by' => $get_tr_header[0]['customer_name'],
                                        'username' => $get_tr_header[0]['createdby_name'],
                                        'buyer_barcode' => '',
                                        'buyer_name' => $get_tr_header[0]['customer_name'],
                                        'buyer_flight_no' => '',
                                        'buyer_destination' => '',
                                        'buyer_nationality' => '',
                                        'remark' => 'Success',
                                        'tax_id' => 'PPN',
                                        'payment_name' => 'Cash',
                                        'payment_time' => $get_tr_header[0]['created'],
                                        'distance' => '0',
                                        'journey_time' => '0'
                                    );
                            array_push($data_detail, $r);
                            $sequence_unique++;
                        }

                        $data [] = array(
                                            'store_id' => $store_ref_id,
                                            'transactions' => $data_detail
                                        );
                        $data = array('store' => $data);        
                        $data = json_encode($data);
                        // $this->Apimdl->exportJSONtofile($tr_number, $data);exit;
                        // echo stripslashes($data);exit;                        

                        if(isset($data) && count($data) > 0){
                            if(isset($token) && ($token !== null && $token !== '')){
                                $result = $this->Apimdl->callcurl($url, $data, $token);
                                $resArr = json_decode($result,true);
                                echo json_encode($resArr);

                                $resp_status = $resArr['status'];
                                $resp_success_insert = $resArr['success_insert'];
                                $resp_failed_insert = $resArr['failed_insert'];

                                $get_tr_log_api = $this->db->query("SELECT header_id FROM tr_log_api WHERE header_id = $id AND api_method = '$method' AND (api_status IS NULL OR api_failed_insert > 0)")->result();
                                if(count($get_tr_log_api) <= 0){
                                    $this->db->insert('tr_log_api',
                                                        array(
                                                            'header_id' => $id,
                                                            'api_method' => $method,
                                                            'api_status' => $resp_status,
                                                            'api_success_insert' => $resp_success_insert,
                                                            'api_failed_insert' => $resp_failed_insert,
                                                            'created' => date('Y-m-d H:i:s', time()),
                                                            'createdby' => $this->userId
                                                            )
                                                    );
                                }
                                $this->db->where(array('header_id' => $id, 'api_method' => $method));
                                $this->db->update('tr_log_api',
                                                    array(
                                                            'updated' => date('Y-m-d H:i:s', time()),
                                                            'updatedby' => $this->userId
                                                        )
                                                );
                                if(($resp_status == '1' || $resp_status == true) || $resp_success_insert > 0){
                                    $this->db->trans_begin();
                                    $this->db->where(array('id' => $id));
                                    $this->db->update('tr_header', array('status' => 9, 'updated' => date('Y-m-d H:i:s', time()), 'updatedby' => $this->userId) );
                
                                    $this->db->where(array('header_id' => $id));
                                    $this->db->update('tr_detail', array('status' => 9, 'updated' => date('Y-m-d H:i:s', time()), 'updatedby' => $this->userId) );        
                
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
            $status_trx = [2];
            $get_tr_header = $this->db->select('*')
                                 ->where(array('id'=>$id))
                                 ->where_in('status', $status_trx)
                                 ->get('v_tr_header')->result_array();
            if(count($get_tr_header) > 0){
                $store_id = $get_tr_header[0]['store_id'];
                $get_store_ref_id = $this->db->query("SELECT * FROM m_store WHERE id = $store_id")->result();
                if($get_store_ref_id[0]->api_store_id !== null){
                    $store_ref_id = $get_store_ref_id[0]->api_store_id;
                    $tr_number = $get_tr_header[0]['tr_number'];

                    // Get trx detail
                    $get_tr_detail = $this->db->select('id,
                                                   currency_id,
                                                   currency_code,
                                                   currency_name,
                                                   (nominal * sheet) AS amount,
                                                   price,
                                                   subtotal')
                                            ->where(array('header_id'=>$id))
                                            ->where_in('status', $status_trx)
                                            ->get('v_tr_detail');

                    if(count($get_tr_detail) > 0){
                        $data_detail = array();
                        $sequence_unique = 1;
                        foreach($get_tr_detail->result_array() as $row) {
                            $r = array(           
                                        'flag_void' => 'true',
                                        'invoice_no' => $tr_number,
                                        'trans_date' => $get_tr_header[0]['tr_date'],
                                        'trans_time' => $get_tr_header[0]['created'],
                                        'sequence_unique' => $sequence_unique,
                                        'item_name' => $row['currency_name'],
                                        'item_code' => $row['currency_code'],
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
                                        'payment_type' => 'Cash',
                                        'payment_by' => $get_tr_header[0]['customer_name'],
                                        'username' => $get_tr_header[0]['createdby_name'],
                                        'buyer_barcode' => '',
                                        'buyer_name' => $get_tr_header[0]['customer_name'],
                                        'buyer_flight_no' => '',
                                        'buyer_destination' => '',
                                        'buyer_nationality' => '',
                                        'remark' => $get_tr_header[0]['description'],
                                        'tax_id' => 'PPN',
                                        'payment_name' => 'Cash',
                                        'payment_time' => $get_tr_header[0]['created'],
                                        'distance' => '0',
                                        'journey_time' => '0'
                                    );
                            array_push($data_detail, $r);
                            $sequence_unique++;
                        }

                        $data [] = array(
                                            'store_id' => $store_ref_id,
                                            'transactions' => $data_detail
                                        );
                        $data = array('store' => $data);        
                        $data = json_encode($data);
                        // $this->Apimdl->exportJSONtofile($tr_number, $data);exit;
                        // echo stripslashes($data);exit;

                        if(isset($data) && count($data) > 0){
                            if(isset($token) && ($token !== null && $token !== '')){                               
                                $result = $this->Apimdl->callcurl($url, $data, $token);
                                $resArr = json_decode($result,true);                                
                                echo json_encode($resArr);                

                                $resp_status = $resArr['status'];
                                $resp_success_insert = $resArr['success_insert'];
                                $resp_failed_insert = $resArr['failed_insert'];
                                $response_success = '';
                                if(isset($resArr['response_success'])){
                                    foreach($resArr['response_success'] AS $resp){
                                        echo $resp;
                                        $response_success = $resp;
                                    }
                                }                                
                                
                                $get_tr_log_api = $this->db->query("SELECT header_id FROM tr_log_api WHERE header_id = $id AND api_method = '$method' AND (api_status IS NULL OR api_failed_insert > 0)")->result();
                                if(count($get_tr_log_api) <= 0){
                                    $this->db->insert('tr_log_api',
                                                        array(
                                                            'header_id' => $id,
                                                            'api_method' => $method,
                                                            'api_status' => $resp_status,
                                                            'api_success_insert' => $resp_success_insert,
                                                            'api_failed_insert' => $resp_failed_insert,
                                                            'created' => date('Y-m-d H:i:s', time()),
                                                            'createdby' => $this->userId
                                                            )
                                                    );
                                }
                                $this->db->where(array('header_id' => $id, 'api_method' => $method));
                                $this->db->update('tr_log_api',
                                                    array(
                                                            'api_reason' => $response_success,
                                                            'updated' => date('Y-m-d H:i:s', time()),
                                                            'updatedby' => $this->userId
                                                        )
                                                );
                                
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
                                        $get_tr_header = $this->db->query("SELECT store_id, tr_date FROM tr_header WHERE id = $id")->result();
                                        if(!isset($get_tr_header[0]->company_id) ){
                                            $store_id = $get_tr_header[0]->store_id;
                                            $tr_date = $get_tr_header[0]->tr_date;
                                            $tahun = (int) SUBSTR($tr_date,0,4);
                                            $bulan = (int) SUBSTR($tr_date,5,2);

                                            $select = $this->db->select('currency_id,nominal')->where('header_id',$id)->get('tr_detail');
                                            if($select->num_rows()){
                                                foreach($select->result_array() as $row) {
                                                    $currency_id = $row['currency_id'];
                                                    $nominal = $row['nominal'];
                                                    $this->Bksmdl->generate_tr_stock($store_id, $tahun, $bulan, $currency_id, $nominal);
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
    
    public function ap_get_trx($url, $token, $store_id, $tr_date1, $tr_date2, $method){
        $dataget = [];
        if($store_id !== null){
            $get_store_ref_id = $this->db->query("SELECT * FROM m_store WHERE id = $store_id")->result();
            $store_ref_id = $get_store_ref_id[0]->api_store_id;
            $start = new DateTime($tr_date1);
            $end = new DateTime($tr_date2);
            for($date = $start; $date <= $end; $date->modify('+1 day')){
                $tr_date = $date->format('Y-m-d');
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
                                            'journey_time' => $item['journey_time']
                                        );
                            if(count($data_d) > 0){
                                array_push($dataget, $data_d);
                            }
                        }
                    } else {
                        $result = json_encode(array('Msg' => "data is null..!"));
                    }
                } else {
                    $result = json_encode(array('Msg' => "can't get data..!"));
                }
            }
            if(count($dataget) > 0){
                // var_dump($dataget);
                $profil_usaha = $this->Bksmdl->getprofilusaha($store_id);
                $this->load->library('excel');
                $this->excel->getProperties()->setTitle("export")->setDescription("none");
                $this->excel->setActiveSheetIndex(0);
                $this->excel->getActiveSheet()->setTitle("temp");

                $this->excel->setActiveSheetIndex(0)->setCellValue('A1', strtoupper(trim($profil_usaha[0]->store_name))); 
                $this->excel->setActiveSheetIndex(0)->setCellValue('A2', strtoupper(trim($profil_usaha[0]->store_address))); 
                $this->excel->setActiveSheetIndex(0)->setCellValue('A3', 'Get Data from ECSys Period ' . revDate($tr_date1) . ' s/d ' . revDate($tr_date2));
                $this->excel->setActiveSheetIndex(0)->getStyle('A1:A3')->getFont()->setBold(TRUE);
                $this->excel->setActiveSheetIndex(0)->getStyle('A1:A3')->getFont()->setSize(11);
                $this->excel->setActiveSheetIndex(0)->mergeCells('A1:O1');
                $this->excel->setActiveSheetIndex(0)->mergeCells('A2:O2');
                $this->excel->setActiveSheetIndex(0)->mergeCells('A3:O3');
        
                $this->excel->setActiveSheetIndex(0)->setCellValue('A5', "Invoice Number"); 
                $this->excel->setActiveSheetIndex(0)->setCellValue('B5', "Transaction Date");         
                $this->excel->setActiveSheetIndex(0)->setCellValue('C5', "Transaction Time"); 
                $this->excel->setActiveSheetIndex(0)->setCellValue('D5', "Sequence"); 
                $this->excel->setActiveSheetIndex(0)->setCellValue('E5', "Item Code"); 
                $this->excel->setActiveSheetIndex(0)->setCellValue('F5', "Item Name"); 
                $this->excel->setActiveSheetIndex(0)->setCellValue('G5', "Item Quantity"); 
                $this->excel->setActiveSheetIndex(0)->setCellValue('H5', "Item Price Unit");
                $this->excel->setActiveSheetIndex(0)->setCellValue('I5', "Item Price Amount"); 
                $this->excel->setActiveSheetIndex(0)->setCellValue('J5', "Item Total Price Amount"); 
                $this->excel->setActiveSheetIndex(0)->setCellValue('K5', "Item Vat");
                $this->excel->setActiveSheetIndex(0)->setCellValue('L5', "Transaction Amount"); 
                $this->excel->setActiveSheetIndex(0)->setCellValue('M5', "Item Barcode");         
                $this->excel->setActiveSheetIndex(0)->setCellValue('N5', "Item Category Name");
                $this->excel->setActiveSheetIndex(0)->setCellValue('O5', "Item Category Code");
                $this->excel->setActiveSheetIndex(0)->setCellValue('P5', "Item Discount");
                $this->excel->setActiveSheetIndex(0)->setCellValue('Q5', "Item Total Discount");
                $this->excel->setActiveSheetIndex(0)->setCellValue('R5', "Item Total Vat");
                $this->excel->setActiveSheetIndex(0)->setCellValue('S5', "Item Total Tax");
                $this->excel->setActiveSheetIndex(0)->setCellValue('T5', "Item Total Service Charge");
                $this->excel->setActiveSheetIndex(0)->setCellValue('U5', "Rate");
                $this->excel->setActiveSheetIndex(0)->setCellValue('V5', "Payment Type");
                $this->excel->setActiveSheetIndex(0)->setCellValue('W5', "Payment By");
                $this->excel->setActiveSheetIndex(0)->setCellValue('X5', "User Name");
                $this->excel->setActiveSheetIndex(0)->setCellValue('Y5', "Buyer Barcode");
                $this->excel->setActiveSheetIndex(0)->setCellValue('Z5', "Buyer Name");
                $this->excel->setActiveSheetIndex(0)->setCellValue('AA5', "Buyer Flight No");
                $this->excel->setActiveSheetIndex(0)->setCellValue('AB5', "Buyer Destination");
                $this->excel->setActiveSheetIndex(0)->setCellValue('AC5', "Buyer Nationality");
                $this->excel->setActiveSheetIndex(0)->setCellValue('AD5', "Remark");
                $this->excel->setActiveSheetIndex(0)->setCellValue('AE5', "Invoice Tax");
                $this->excel->setActiveSheetIndex(0)->setCellValue('AF5', "Tax Id");
                $this->excel->setActiveSheetIndex(0)->setCellValue('AG5', "Payment Name");
                $this->excel->setActiveSheetIndex(0)->setCellValue('AH5', "Payment Time");
                $this->excel->setActiveSheetIndex(0)->setCellValue('AI5', "Distance");
                $this->excel->setActiveSheetIndex(0)->setCellValue('AJ5', "Journey Time");


                $this->excelcellColor('A5:AJ5', '337AB7');
                $this->excel->setActiveSheetIndex(0)->getStyle('A5:AJ5')->getFont()->setBold(TRUE);
                $this->excel->setActiveSheetIndex(0)->getStyle('A5:AJ5')->getFont()->setSize(11);

                foreach (range('A', 'AK') as $columnID) {
                    $this->excel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
                }
                $this->excel->setActiveSheetIndex(0);

                $row = 6;
                foreach ($dataget as $d) {            
                    $this->excel->setActiveSheetIndex(0)->setCellValue('A'.$row, "'".$d['invoice_number']);
                    $this->excel->setActiveSheetIndex(0)->setCellValue('B'.$row, $d['transaction_date']);
                    $this->excel->setActiveSheetIndex(0)->setCellValue('C'.$row, $d['transaction_time']);
                    $this->excel->setActiveSheetIndex(0)->setCellValue('D'.$row, $d['sequence']);
                    $this->excel->setActiveSheetIndex(0)->setCellValue('E'.$row, $d['item_code']);
                    $this->excel->setActiveSheetIndex(0)->setCellValue('F'.$row, $d['item_name']);
                    $this->excel->setActiveSheetIndex(0)->setCellValue('G'.$row, $d['item_quantity']);
                    $this->excel->setActiveSheetIndex(0)->setCellValue('H'.$row, $d['item_price_unit']);
                    $this->excel->setActiveSheetIndex(0)->setCellValue('I'.$row, $d['item_price_amount']);
                    $this->excel->setActiveSheetIndex(0)->setCellValue('J'.$row, $d['item_total_price_amount']);
                    $this->excel->setActiveSheetIndex(0)->setCellValue('K'.$row, $d['item_vat']);
                    $this->excel->setActiveSheetIndex(0)->setCellValue('L'.$row, $d['transaction_amount']);
                    $this->excel->setActiveSheetIndex(0)->setCellValue('M'.$row, $d['item_barcode']);
                    $this->excel->setActiveSheetIndex(0)->setCellValue('N'.$row, $d['item_category_name']);
                    $this->excel->setActiveSheetIndex(0)->setCellValue('O'.$row, $d['item_category_code']);
                    $this->excel->setActiveSheetIndex(0)->setCellValue('P'.$row, $d['item_discount']);
                    $this->excel->setActiveSheetIndex(0)->setCellValue('Q'.$row, $d['item_total_discount']);
                    $this->excel->setActiveSheetIndex(0)->setCellValue('R'.$row, $d['item_total_vat']);
                    $this->excel->setActiveSheetIndex(0)->setCellValue('S'.$row, $d['item_total_tax']);
                    $this->excel->setActiveSheetIndex(0)->setCellValue('T'.$row, $d['item_total_service_charge']);
                    $this->excel->setActiveSheetIndex(0)->setCellValue('U'.$row, $d['rate']);
                    $this->excel->setActiveSheetIndex(0)->setCellValue('V'.$row, $d['payment_type']);
                    $this->excel->setActiveSheetIndex(0)->setCellValue('W'.$row, $d['payment_by']);
                    $this->excel->setActiveSheetIndex(0)->setCellValue('X'.$row, $d['username']);
                    $this->excel->setActiveSheetIndex(0)->setCellValue('Y'.$row, $d['buyer_barcode']);
                    $this->excel->setActiveSheetIndex(0)->setCellValue('Z'.$row, $d['buyer_name']);
                    $this->excel->setActiveSheetIndex(0)->setCellValue('AA'.$row, $d['buyer_flight_no']);
                    $this->excel->setActiveSheetIndex(0)->setCellValue('AB'.$row, $d['buyer_destination']);
                    $this->excel->setActiveSheetIndex(0)->setCellValue('AC'.$row, $d['buyer_nationality']);
                    $this->excel->setActiveSheetIndex(0)->setCellValue('AD'.$row, $d['remark']);
                    $this->excel->setActiveSheetIndex(0)->setCellValue('AE'.$row, $d['invoice_tax']);
                    $this->excel->setActiveSheetIndex(0)->setCellValue('AF'.$row, $d['tax_id']);
                    $this->excel->setActiveSheetIndex(0)->setCellValue('AG'.$row, $d['payment_name']);
                    $this->excel->setActiveSheetIndex(0)->setCellValue('AH'.$row, $d['payment_time']);
                    $this->excel->setActiveSheetIndex(0)->setCellValue('AI'.$row, $d['distance']);
                    $this->excel->setActiveSheetIndex(0)->setCellValue('AJ'.$row, $d['journey_time']);
                    $row++;
                }
        
                // Sending headers to force the user to download the file
                ob_start();
                $objWriter = new PHPExcel_Writer_Excel2007($this->excel); 
                // $objWriter->setOffice2003Compatibility(true);
                $objWriter->save('php://output');
                $xlsData = ob_get_contents();
                ob_end_clean();
                $response =  array(
                    'op' => 'ok',
                    'file' => "data:application/vnd.ms-excel;base64,".base64_encode($xlsData)
                );
                die(json_encode($response));

            }                    
        } else {
            $result = json_encode(array('Msg' => 'store id not found.!'));
        }        
    }

    public function ap_get_store($company_id, $resArr){
        $this->db->trans_begin();
        if(isset($resArr['user']['store']) && $resArr['user']['store'] !== null){
            foreach ($resArr['user']['store'] as $key => $item) {
                $api_store_id = $item['store_id'];
                $cek_h = $this->db->query("SELECT * FROM m_store WHERE api_store_id = '$api_store_id' ")->result();
                if( !isset($cek_h[0]->api_store_id) ){
                    $data = array(
                                'company_id' => $company_id,
                                'api_store_id' => $api_store_id,
                                'api_store_name' => $item['store_name'],
                                'status' => 1,
                                'created' => date('Y-m-d H:i:s', time()),
                                'createdby' => $this->userId
                            );
                    if(count($data) > 0){
                        $response = $this->db->insert('m_store', $data);
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

    function excelcellColor($cells,$color){    
        $this->excel->getActiveSheet(0)->getStyle($cells)
                    ->applyFromArray( 
                        array(
                            'font'  => array(
                                'bold'  => true,
                                'color' => array('rgb' => 'FFFFFF')
                            ))
                    )
                    ->getFill()->applyFromArray(
                        array(
                                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                                'startcolor' => array('rgb' => $color)
                            )
                    );
    }
    
}
