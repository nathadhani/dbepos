<?php

class Cb_balance extends Bks_Controller {

    function __construct() {
        $config = array('modules' => 'cb', 'jsfiles' => array('cb_balance'));
        parent::__construct($config);        
        $this->auth = $this->session->userdata( 'auth' );      
        $this->userId = $this->auth['id'];
        $this->store_id = $this->auth['store_id'];
    }
    
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('Balance');
        $this->template->set('tsmall', 'Cash Bank');
        $this->template->set('icon', 'fa fa-edit');
        $data['auth'] = $this->auth;
        $this->template->build('cb/cb_balance_v', $data);
    }
    
    function getdata() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();        
        $store_id  = $postData['store_id'];    
        $tanggal1 = revDate($postData['period']);

        $query = $this->db->query("SELECT v_tr_cb_saldo.cb_name,
                                        (
                                            SELECT cbs_saldo FROM  v_tr_cb_saldo x
                                            WHERE x.store_id = $store_id
                                            and x.cbs_date < '$tanggal1'
                                            and x.cb_id = v_tr_cb_saldo.cb_id
                                            ORDER BY x.cbs_date DESC, x.id DESC
                                            limit 1					
                                        ) AS beginning_saldo,
                                        
                                        SUM(v_tr_cb_saldo.cbs_in) AS cbs_in,
                                        SUM(v_tr_cb_saldo.cbs_out) AS cbs_out,

                                        (
                                            SELECT cbs_saldo FROM  v_tr_cb_saldo x
                                            WHERE x.store_id = $store_id
                                            and x.cbs_date = '$tanggal1'
                                            and x.cb_id = v_tr_cb_saldo.cb_id
                                            ORDER BY x.cbs_date DESC, x.id DESC
                                            limit 1					
                                        ) AS last_saldo
                                        
                                    FROM v_tr_cb_saldo
                                    WHERE v_tr_cb_saldo.store_id = $store_id
                                    AND v_tr_cb_saldo.cbs_date = '$tanggal1'
                                    GROUP BY v_tr_cb_saldo.cb_id
                                    ORDER BY v_tr_cb_saldo.cb_id ASC")->result();

        // echo $this->db->last_query();exit;                            
        echo json_encode($query, true);
    }

    function generate_cb_balance(){
        checkIfNotAjax();
        // $this->libauth->check(__METHOD__);
        $postData = $this->input->post();        
        $store_id = $postData['store_id'];

        $tahun = (int) date('Y');
        $bulan = (int) date('m');
        if(isset($postData['period'])){
            $tahun = (int) SUBSTR(revDate($postData['period']),0,4);
            $bulan = (int) SUBSTR(revDate($postData['period']),5,2);
        }
        $tgl1 = $tahun.'-'.sprintf("%02d", $bulan).'-01';
        
        if($bulan == 1){
            $tahun1 = $tahun - 1;
            $bulan1 = 12;
        }else{
            $tahun1 = $tahun;
            $bulan1 = $bulan - 1;
        }
        
        if($bulan == 12){
            $tahun2 = $tahun + 1;
            $bulan2 = 1;
        } else {
            $tahun2 = $tahun;
            $bulan2 = $bulan + 1;
        }        

        $mcb = $this->db->query("SELECT x.id AS cb_id FROM m_cb x ORDER BY id ASC");
        if(count($mcb) > 0){
            /** Delete Reccord */
            /***************************************************************************************************************** */
            $where = array(
                        'store_id' => $store_id,
                        'cbs_year' => $tahun,
                        'cbs_month' => $bulan
                    );
            
            $this->db->trans_begin();
            $this->db->delete('tr_cb_saldo', $where);            
            // echo $this->db->last_query();exit;
            foreach($mcb->result_array() as $row) {
                $id = 0;
                $cb_id = $row['cb_id'];                

                /** Get Beginning */
                /***************************************************************************************************************** */
                $select_max_date = $this->db->query("SELECT MAX(cbs_date) AS max_date
                                                     FROM tr_cb_saldo 
                                                     WHERE store_id = $store_id 
                                                     AND cb_id = $cb_id 
                                                     AND YEAR(cbs_date) = $tahun1 
                                                     AND MONTH(cbs_date) = $bulan1")->result();                
                $cbs_in = 0;
                $last_cbs_in = 0;
                $last_saldo = 0;
                if(count($select_max_date) > 0) {
                    $max_date = $select_max_date[0]->max_date;
                    if($max_date !== null) {
                        $select_max_id = $this->db->query("SELECT MAX(id) AS max_id
                                                     FROM tr_cb_saldo 
                                                     WHERE store_id = $store_id 
                                                     AND cb_id = $cb_id 
                                                     AND cbs_date = '$max_date'")->result();                    
                        if(count($select_max_id) > 0) {
                            $max_id = $select_max_id[0]->max_id;
                            if($max_id !== null) {
                                $select_last_saldo = $this->db->query("SELECT cbs_saldo
                                                        FROM tr_cb_saldo 
                                                        WHERE store_id = $store_id 
                                                        AND cb_id = $cb_id 
                                                        AND cbs_date = '$max_date'
                                                        AND id = $max_id")->result();
                                if(count($select_last_saldo) > 0) {
                                    if($select_last_saldo[0]->cbs_saldo > 0) {
                                        $id++;
                                        $data = array(        
                                            'store_id' => $store_id,
                                            'cb_id' => $cb_id,
                                            'cbs_date' => $tgl1,
                                            'cbs_year' => $tahun,
                                            'cbs_month' => $bulan,
                                            'cbs_in' => 0,
                                            'cbs_out' => 0,
                                            'cbs_saldo' => 0,
                                            'created' => date('Y-m-d H:i:s', time()),
                                            'createdby' => $this->auth['id']
                                        );
                                        if(count($data) > 0){                                        
                                            $response = $this->db->insert('tr_cbs_saldo', $data);
                                            /***************************************************************************************************************** */
                                            /*Update last saldo*/
                                            $last_saldo = $select_last_saldo[0]->cbs_saldo;                                            
                                            $data = array('cbs_saldo' => $last_saldo);
                                            if(count($data) > 0){
                                                $where = array('id' => $id, 'cb_id' => $cb_id);
                                                $this->db->update('tr_cb_saldo', $data, $where);                
                                            }
                                        }
                                    }
                                }
                            }                            
                        }
                    }
                }

                /** Get Transaction */
                /***************************************************************************************************************** */
                $tanggal_awal = date($tgl1,time());
                $tanggal_akhir = date('Y-m-t',mktime(0, 0, 0, $bulan + 1, 0, $tahun));
                $maxday = date('d', strtotime($tanggal_akhir));
                for ($tgl = 1; $tgl <= $maxday; $tgl++) {
                    $tr_date = $tahun.'-'.sprintf("%02d", $bulan).'-'. sprintf("%02d", $tgl);
                    /***************************************************************************************************************** */
                    $trxcb = $this->db->select('tr_date, cb_id, 
                                                  SUM(IF( cb_pos_in_out = "I" AND status IN ( 3, 4 ), (amount), 0 )) AS amount_in,
                                                  SUM(IF( cb_pos_in_out = "O" AND status IN ( 3, 4 ), (amount), 0 )) AS amount_out
                                                ')
                                    ->where(array('store_id' => $store_id, 'tr_date' => $tr_date, 'cb_id' => $cb_id))
                                    ->where_in('status', ['3','4'])
                                    ->group_by('tr_date, cb_id')
                                    ->get('v_tr_cb_detail');
                    if($trxcb->num_rows()){
                        foreach($trxcb->result_array() as $row) {                                                        
                            $data = array(                                
                                'store_id' => $store_id,   
                                'cb_id' => $cb_id,   
                                'cbs_date' => $row['tr_date'],
                                'cbs_year' => $tahun,
                                'cbs_month' => $bulan,
                                'cbs_in' => $row['amount_in'],                              
                                'cbs_out' => $row['amount_out'],
                                'cbs_saldo' => 0,
                                'created' => date('Y-m-d H:i:s', time()),
                                'createdby' => $this->auth['id']
                            );
                            if(count($data) > 0){
                                $response = $this->db->insert('tr_cb_saldo', $data);
                                $id = $this->db->insert_id();
                                /***************************************************************************************************************** */
                                /*Update last saldo*/
                                $last_saldo = $last_saldo + $row['amount_in'] - $row['amount_out'];
                                $data = array('cbs_saldo' => $last_saldo);
                                if(count($data) > 0){
                                    $where = array('id' => $id, 'cb_id' => $cb_id);
                                    $this->db->update('tr_cb_saldo', $data, $where);
                                }
                            }
                        }     
                    } else {
                        $data = array(                                
                            'store_id' => $store_id,   
                            'cb_id' => $cb_id,   
                            'cbs_date' => $tr_date,
                            'cbs_year' => $tahun,
                            'cbs_month' => $bulan,
                            'cbs_in' => 0,                              
                            'cbs_out' => 0,
                            'cbs_saldo' => 0,
                            'created' => date('Y-m-d H:i:s', time()),
                            'createdby' => $this->auth['id']
                        );
                        if(count($data) > 0){
                            $response = $this->db->insert('tr_cb_saldo', $data);
                            $id = $this->db->insert_id();
                            /***************************************************************************************************************** */
                            /*Update last saldo*/
                            $last_saldo = $last_saldo;
                            $data = array('cbs_saldo' => $last_saldo);
                            if(count($data) > 0){
                                $where = array('id' => $id, 'cb_id' => $cb_id);
                                $this->db->update('tr_cb_saldo', $data, $where);
                            }
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
                    $json['msg'] = '1';
                    $json['result'] = 'calculate done';
                    echo json_encode($json);
                }
            }
        }             

    }


}
