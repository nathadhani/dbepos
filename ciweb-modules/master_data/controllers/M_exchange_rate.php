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
        $this->template->set('tsmall', 'Data');
        $this->template->build('master_data/m_exchange_rate_v');
    }   
    
    function insert() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $tanggal = revDate($postData['periode']);
        $tanggalx = date('Y-m-d', strtotime("-1 day", strtotime($postData['periode'])));        

        $hsl = $this->db->query("SELECT id, valas_code, valas_name
                                 FROM m_valas
                                 WHERE status = 1
                                 AND NOT EXISTS
                                ( SELECT 1 FROM m_exchange_rate AS p 
                                  WHERE p.valas_id = m_valas.id
                                  AND p.exchange_rate_date = '$tanggal'                                  
                                )
                                GROUP BY id
                                ORDER BY id ASC")->result();
        $rows = []; 
        if(count($hsl) > 0){       
            foreach ($hsl as $key => $val) {
                $data = [
                    'valas_id' => $val->id,
                    'exchange_rate_date' => $tanggal,
                    'status' => 1,
                    'created' => date('Y-m-d H:i:s', time()),
                    'createdby' => $this->auth['id']
                ];
                array_push($rows, $data);               
            }             
        }

        $this->db->trans_begin();
        // $this->db->truncate($this->Bksmdl->table);
        // $this->db->where('rate_date =', $tanggal);
        // $this->db->delete($this->Bksmdl->table);
        
        if(count($rows) > 0){   
            $this->db->insert_batch($this->Bksmdl->table, $rows);
            // echo $this->db->last_query(); exit;            
            $hslx = $this->db->query("SELECT valas_id, 
                                            exchange_rate_buy,
                                            difference_buy,
                                            exchange_rate_sell,
                                            difference_sell,
                                            price_buy_bot,
                                            price_buy_top,
                                            price_sell_bot,
                                            price_sell_top            
                                    FROM m_exchange_rate
                                    WHERE status = 1 
                                    AND exchange_rate_date = '$tanggalx'                                    
                                    AND EXISTS
                                    ( 
                                        SELECT 1 FROM m_exchange_rate AS p 
                                        WHERE p.valas_id = m_exchange_rate.valas_id 
                                        AND p.exchange_rate_date = '$tanggal'
                                    )
                                    GROUP BY id
                                    ORDER BY id ASC")->result();
            if(count($hslx) > 0){
                foreach ($hslx as $key => $val) {
                    $data_upd = [
                        'valas_id' => $val->valas_id,
                        'exchange_rate_buy' => $val->rate_buy,
                        'difference_buy' => $val->difference_buy,
                        'exchange_rate_sell' => $val->rate_sell,
                        'difference_sell' => $val->difference_sell,
                        'price_buy_bot' => $val->price_buy_bot,
                        'price_buy_top' => $val->price_buy_top,
                        'price_sell_bot' => $val->price_sell_bot,
                        'price_sell_top' => $val->price_sell_top
                    ];
                    $where = array('exchange_rate_date' => $tanggal, 'valas_id' => $val->valas_id);  
                    $this->db->where($where);
                    $this->db->update('m_exchange_rate',$data_upd);             
                    // echo $this->db->last_query(); exit;
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
        $tanggalx = date('Y-m-d', strtotime("-1 day", strtotime($postData['exchange_rate_date'])));

        $postData['status'] = cekStatus($postData);
        $id = $postData['id'];
        $valas_id = $postData['valas_id'];

        $postData['exchange_rate_buy'] = str_replace('.','',$postData['exchange_rate_buy']);
        $postData['exchange_rate_sell'] = str_replace('.','',$postData['exchange_rate_sell']);
        $postData['price_buy_bot'] = str_replace('.','',$postData['price_buy_bot']);
        $postData['price_buy_top'] = str_replace('.','',$postData['price_buy_top']);     
        $postData['price_sell_bot'] = str_replace('.','',$postData['price_sell_bot']);
        $postData['price_sell_top'] = str_replace('.','',$postData['price_sell_top']);

        /*difference_buy*/
        $postData['difference_buy'] = 0;
        $cek = $this->db->query("select exchange_rate_buy FROM m_exchange_rate WHERE exchange_rate_date = '$tanggalx' AND valas_id = $valas_id")->row();
        if(isset($cek)){
            if($cek->rate_buy > 0) {
                if($postData['rate_buy'] > 0) {
                    $postData['difference_buy'] = $postData['rate_buy'] - $cek->rate_buy;
                }
            }
        }         
               
        /*difference_sell*/
        $postData['difference_sell'] = 0;
        $cek = $this->db->query("select exchange_rate_sell FROM m_exchange_rate WHERE exchange_rate_date = '$tanggalx' AND valas_id = $valas_id")->row();
        if(isset($cek)){
            if($cek->rate_sell > 0) {
                if($postData['rate_sell'] > 0) {
                    $postData['difference_sell'] = $postData['exchange_rate_sell'] - $cek->exchange_rate_sell;
                }
            }
        }       
        
        unset($postData['id']);
        unset($postData['valas_id']);
        unset($postData['exchange_rate_date']);
        unset($postData['valas_code']);
        unset($postData['valas_name']);

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
    
    function getData() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $tanggal = revDate($postData['periode']);
        $this->Bksmdl->table = 'v_m_exchange_rate';       
        $where[0]['field'] = 'exchange_rate_date';
        $where[0]['data']  = $tanggal;
        $where[0]['sql']   = 'where';
        $cpData = $this->Bksmdl->getDataTable($where);
        $this->Bksmdl->outputToJson($cpData);
    }    

}
