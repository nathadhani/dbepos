<?php

class M_exchange_rate extends Bks_Controller {

    function __construct() {        
        $config = array('modules' => 'master_data', 'jsfiles' => array('m_exchange_rate'));
        parent::__construct($config);
        $this->Bksmdl->table = 'm_exchange_rate';
        $this->auth = $this->session->userdata( 'auth' );        
    }
    
    function index() {
        $this->template->title('Exchange Rate');
        $this->template->set('tsmall', 'File');
        $this->template->build('master_data/m_exchange_rate_v');
    }   
    
    function insert() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $store_id = $postData['store_id'];
        $tanggal = revDate($postData['periode']);
        $tanggalx = date('Y-m-d', strtotime("-1 day", strtotime($postData['periode'])));        

        $this->db->trans_begin();
        // $this->db->truncate($this->Bksmdl->table);
        $this->db->where('exchange_rate_date =', $tanggal);
        $this->db->delete($this->Bksmdl->table);

        $hsl = $this->db->query("SELECT id, currency_code, currency_name
                                 FROM m_currency
                                 WHERE status = 1
                                 AND NOT EXISTS
                                ( SELECT 1 FROM m_exchange_rate AS p 
                                  WHERE p.store_id = $store_id
                                  AND p.exchange_rate_date = '$tanggal'                                  
                                  AND p.currency_id = m_currency.id
                                )
                                GROUP BY id
                                ORDER BY id ASC")->result();
        $rows = []; 
        if(count($hsl) > 0){       
            foreach ($hsl as $key => $val) {
                $data = [                    
                    'store_id' => $store_id,
                    'currency_id' => $val->id,
                    'exchange_rate_date' => $tanggal,
                    'status' => 1,
                    'created' => date('Y-m-d H:i:s', time()),
                    'createdby' => $this->auth['id']
                ];
                array_push($rows, $data);               
            }             
        }        
        if(count($rows) > 0){   
            $this->db->insert_batch($this->Bksmdl->table, $rows);
            // echo $this->db->last_query(); exit;            
            $hslx = $this->db->query("SELECT
                                            store_id,                                 
                                            currency_id, 
                                            IFNULL(exchange_rate_buy,0) AS exchange_rate_buy,
                                            IFNULL(difference_buy,0) AS difference_buy,                                            
                                            IFNULL(exchange_rate_sell,0) AS exchange_rate_sell,                                                                                        
                                            IFNULL(difference_sell,0) AS difference_sell,                                                                                                                                    
                                            price_buy_bot,
                                            price_buy_top,
                                            price_sell_bot,
                                            price_sell_top            
                                    FROM m_exchange_rate
                                    WHERE store_id = $store_id
                                    AND exchange_rate_date = '$tanggalx'                                    
                                    AND status = 1
                                    AND ( exchange_rate_buy > 0 OR  exchange_rate_sell > 0 ) 
                                    AND EXISTS
                                    ( 
                                        SELECT id FROM m_exchange_rate AS p 
                                        WHERE p.store_id = $store_id                                        
                                        AND p.exchange_rate_date = '$tanggal'
                                        AND p.currency_id = m_exchange_rate.currency_id 
                                    )
                                    GROUP BY id
                                    ORDER BY currency_id ASC")->result();
            // echo $this->db->last_query(); exit;            
            if(count($hslx) > 0){                                
                foreach ($hslx as $key => $val) {
                    $this->db->trans_begin();
                    $data_upd = [
                        'exchange_rate_buy' => ($val->exchange_rate_buy == null ? 0 : $val->exchange_rate_buy),
                        'difference_buy' => ($val->difference_buy == null ? 0 : $val->difference_buy),
                        'exchange_rate_sell' => ($val->exchange_rate_sell == null ? 0 : $val->exchange_rate_sell),
                        'difference_sell' => ($val->difference_sell == null ? 0 : $val->difference_sell),
                        'price_buy_bot' => ($val->price_buy_bot == null ? 0 : $val->price_buy_bot),
                        'price_buy_top' => ($val->price_buy_top == null ? 0 : $val->price_buy_top),
                        'price_sell_bot' => ($val->price_sell_bot == null ? 0 : $val->price_sell_bot),
                        'price_sell_top' => ($val->price_sell_top == null ? 0 : $val->price_sell_top)
                    ];
                    $where = array('store_id' => $store_id, 'exchange_rate_date' => $tanggal, 'currency_id' => $val->currency_id);  
                    $this->db->where($where);
                    $this->db->update('m_exchange_rate',$data_upd);                    
                    // echo $this->db->last_query(); exit;
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
            }                                                          
        } 
        if(count($rows) <= 0){ 
            $json['msg'] = 'Data Empty or Already Exists!';
            echo json_encode($json);            
        }            
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
    
    function update() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();

        $store_id = $postData['store_id'];
        $tanggalx = date('Y-m-d', strtotime("-1 day", strtotime($postData['exchange_rate_date'])));

        $postData['status'] = cekStatus($postData);
        $id = $postData['id'];
        $currency_id = $postData['currency_id'];

        /*difference_buy*/
        $postData['difference_buy'] = 0;
        $cek = $this->db->query("SELECT exchange_rate_buy 
                                 FROM m_exchange_rate 
                                 WHERE store_id = $store_id 
                                 AND exchange_rate_date = '$tanggalx' 
                                 AND currency_id = $currency_id")->row();
        if(isset($cek)){
            if($cek->exchange_rate_buy > 0) {
                if($postData['exchange_rate_buy'] > 0) {
                    $postData['difference_buy'] = $postData['exchange_rate_buy'] - $cek->exchange_rate_buy;
                }
            }
        }         
               
        /*difference_sell*/
        $postData['difference_sell'] = 0;
        $cek = $this->db->query("SELECT exchange_rate_sell 
                                 FROM m_exchange_rate 
                                 WHERE store_id = $store_id
                                 AND exchange_rate_date = '$tanggalx' 
                                 AND currency_id = $currency_id")->row();
        if(isset($cek)){
            if($cek->exchange_rate_sell > 0) {
                if($postData['exchange_rate_sell'] > 0) {
                    $postData['difference_sell'] = $postData['exchange_rate_sell'] - $cek->exchange_rate_sell;
                }
            }
        }       
        
        unset($postData['id']);
        unset($postData['store_id']);
        unset($postData['currency_id']);
        unset($postData['exchange_rate_date']);
        unset($postData['currency_code']);
        unset($postData['currency_name']);

        $this->db->trans_begin();
        $status = $this->Bksmdl->update($postData, 'id=' . $id);
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
    
    function delete() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $id = json_decode($postData['id']);

        $this->db->trans_begin();
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
    
    function getdata() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $store_id = $postData['store_id'];
        $tanggal = revDate($postData['periode']);
        $this->Bksmdl->table = 'v_m_exchange_rate';               

        $where[0]['field'] = 'store_id';
        $where[0]['data']  = $store_id;
        $where[0]['sql']   = 'where';

        $where[1]['field'] = 'exchange_rate_date';
        $where[1]['data']  = $tanggal;
        $where[1]['sql']   = 'where';

        $cpData = $this->Bksmdl->getDataTable($where);
        $this->Bksmdl->outputToJson($cpData);
    }    

}
