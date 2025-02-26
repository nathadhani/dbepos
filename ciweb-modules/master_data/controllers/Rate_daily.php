<?php

class Rate_daily extends Bks_Controller {

    function __construct() {        
        $config = array('modules' => 'master_data', 'jsfiles' => array('rate_daily'));
        parent::__construct($config);
        $this->Bksmdl->table = 'rate_daily';
        $this->auth = $this->session->userdata( 'auth' );
        $this->company_id = $this->auth['company_id'];
    }
    
    function index() {
        $this->template->title('Rate by Date');
        $this->template->set('tsmall', 'Data');
        $this->template->build('master_data/rate_daily_v');
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
                                ( SELECT 1 FROM rate_daily AS p 
                                  WHERE p.valas_id = m_valas.id
                                  AND p.rate_date = '$tanggal'
                                  AND p.company_id = $this->company_id
                                )
                                GROUP BY id
                                ORDER BY id ASC")->result();
        $rows = []; 
        if(count($hsl) > 0){       
            foreach ($hsl as $key => $val) {
                $data = [
                    'company_id' => $this->company_id,
                    'valas_id' => $val->id,
                    'rate_date' => $tanggal,
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
                                            rate_buy,
                                            difference_buy,
                                            rate_sale,
                                            difference_sale,
                                            price_buy_bot,
                                            price_buy_top,
                                            price_sale_bot,
                                            price_sale_top            
                                    FROM rate_daily
                                    WHERE status = 1 
                                    AND rate_date = '$tanggalx'
                                    AND company_id = $this->company_id
                                    AND EXISTS
                                    ( 
                                        SELECT 1 FROM rate_daily AS p 
                                        WHERE p.valas_id = rate_daily.valas_id 
                                        AND p.rate_date = '$tanggal'
                                        AND p.company_id = $this->company_id
                                    )
                                    GROUP BY id
                                    ORDER BY id ASC")->result();
            if(count($hslx) > 0){
                foreach ($hslx as $key => $val) {
                    $data_upd = [
                        'valas_id'        => $val->valas_id,
                        'rate_buy'        => $val->rate_buy,
                        'difference_buy'  => $val->difference_buy,
                        'rate_sale'       => $val->rate_sale,
                        'difference_sale' => $val->difference_sale,
                        'price_buy_bot'   => $val->price_buy_bot,
                        'price_buy_top'   => $val->price_buy_top,
                        'price_sale_bot'  => $val->price_sale_bot,
                        'price_sale_top'  => $val->price_sale_top
                    ];
                    $where = array('rate_date' => $tanggal, 'valas_id' => $val->valas_id, 'company_id' => $this->company_id);   
                    $this->db->where($where);
                    $this->db->update('rate_daily',$data_upd);             
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
        $tanggalx = date('Y-m-d', strtotime("-1 day", strtotime($postData['rate_date2'])));

        $postData['status'] = cekStatus($postData);
        $id = $postData['id'];
        $valas_id = $postData['valas_id'];

        $postData['rate_buy'] = str_replace('.','',$postData['rate_buy']);
        $postData['rate_sale'] = str_replace('.','',$postData['rate_sale']);
        $postData['price_buy_bot'] = str_replace('.','',$postData['price_buy_bot']);
        $postData['price_buy_top'] = str_replace('.','',$postData['price_buy_top']);     
        $postData['price_sale_bot'] = str_replace('.','',$postData['price_sale_bot']);
        $postData['price_sale_top'] = str_replace('.','',$postData['price_sale_top']);

        /*difference_buy*/
        $postData['difference_buy'] = 0;
        $cek = $this->db->query("select rate_buy FROM rate_daily WHERE rate_date = '$tanggalx' AND valas_id = $valas_id AND company_id = $this->company_id")->row();
        if(isset($cek)){
            if($cek->rate_buy > 0) {
                if($postData['rate_buy'] > 0) {
                    $postData['difference_buy'] = $postData['rate_buy'] - $cek->rate_buy;
                }
            }
        }         
               
        /*difference_sale*/
        $postData['difference_sale'] = 0;
        $cek = $this->db->query("select rate_sale FROM rate_daily WHERE rate_date = '$tanggalx' AND valas_id = $valas_id AND company_id = $this->company_id")->row();
        if(isset($cek)){
            if($cek->rate_sale > 0) {
                if($postData['rate_sale'] > 0) {
                    $postData['difference_sale'] = $postData['rate_sale'] - $cek->rate_sale;
                }
            }
        }       
        
        unset($postData['id']);
        unset($postData['valas_id']);
        unset($postData['rate_date2']);
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
        $this->Bksmdl->table = 'v_rate_daily';
        $where[0]['field'] = 'company_id';
        $where[0]['data']  = $this->company_id;
        $where[0]['sql']   = 'where';
        $where[1]['field'] = 'rate_date';
        $where[1]['data']  = $tanggal;
        $where[1]['sql']   = 'where';
        $cpData = $this->Bksmdl->getDataTable($where);
        $this->Bksmdl->outputToJson($cpData);
    }    

}
