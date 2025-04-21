<?php

class M_cb_pos extends Bks_Controller {

    function __construct() {
        $config = array('modules' => 'master_data', 'jsfiles' => array('m_cb_pos'));
        parent::__construct($config);
        $this->Bksmdl->table = 'm_cb_pos';
        $this->auth = $this->session->userdata( 'auth' );        
        $this->store_id = $this->auth['store_id'];
    }
    
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('Cash Bank Pos');
        $this->template->set('tsmall', 'File');
        $this->template->set('icon', 'fa fa-navicon');
        $this->template->build('master_data/m_cb_pos_v');
    }

    function generate_code() {
        $this->libauth->check(__METHOD__);
        $Number = 1;
        $poscode = 'MP';
        $sql = $this->db->query("SELECT max(right(cb_pos_code,4)) as id 
                                 FROM m_cb_pos ")->result();
        if (count($sql) > 0) {
            foreach ($sql as $data) {
                $Number = intval($data->id) + 1;
            }
        }
        return $poscode . sprintf("%04d", $Number);
    }
    
    function insert() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $postData['cb_pos_code'] = $this->generate_code();
        $postData['status'] = cekStatus($postData);

        $this->db->trans_begin();
        $status = $this->Bksmdl->insert($postData);
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
        $postData['status'] = cekStatus($postData);
        $id = $postData['id'];
        unset($postData['id']);

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
        $this->Bksmdl->table = 'v_m_cb_pos';
        $cpData = $this->Bksmdl->getDataTable();
        $this->Bksmdl->outputToJson($cpData);
    }
    
    function getmcbpos() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();    
        $cb_id = $postData['cb_id'];
        if($cb_id != null && $cb_id != ''){
            $menus = $this->db->order_by('id', 'ASC')
                    ->get_where('m_cb_pos', array('status' => '1', 'cb_id' => $cb_id))->result();        
            if (count($menus) > 0){
                $option ="<option selected value=''>Pilih...</option>";
                foreach($menus as $row){
                    $option.="<option value='".$row->id."'>" . $row->cb_pos_name ."</option>";
                }
                echo $option;
            }    
        } else {
            $menus = $this->db->order_by('id', 'ASC')
                    ->get_where('m_cb_pos', array('status' => '1'))->result();        
            if (count($menus) > 0){
                $option ="<option selected value=''>Pilih...</option>";
                foreach($menus as $row){
                    $option.="<option value='".$row->id."'>" . $row->cb_pos_name ."</option>";
                }
                echo $option;
            }
        }
    }

    function getmcbpospayment() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();    
        $cb_id = $postData['cb_id'];
        $tr_id = $postData['tr_id'];
        $paymenttype_id = $postData['paymenttype_id'];        
        if($cb_id != null && $cb_id != '' && $tr_id != null && $tr_id != '' && $paymenttype_id != null && $paymenttype_id != ''){
            if($tr_id == '1' && $paymenttype_id == '1') {
                $menus = $this->db->order_by('id', 'ASC')
                ->get_where('m_cb_pos', array('status' => '1', 'id' => 2))->result();        
            } else if($tr_id == '1' && $paymenttype_id == '2') {
                $menus = $this->db->order_by('id', 'ASC')
                ->get_where('m_cb_pos', array('status' => '1', 'id' => 9))->result();
            } else if($tr_id == '2' && $paymenttype_id == '1') {
                $menus = $this->db->order_by('id', 'ASC')
                ->get_where('m_cb_pos', array('status' => '1', 'id' => 5))->result();        
            } else if($tr_id == '2' && $paymenttype_id == '2') {
                $menus = $this->db->order_by('id', 'ASC')
                ->get_where('m_cb_pos', array('status' => '1', 'id' => 12))->result();
            } else {
                $menus = $this->db->order_by('id', 'ASC')
                ->get_where('m_cb_pos', array('status' => '1', 'cb_id' => $cb_id))->result();        
            }            
            if (isset($menus) && count($menus) > 0){
                $option ="<option selected value=''>Pilih...</option>";
                foreach($menus as $row){
                    $option.="<option value='".$row->id."'>" . $row->cb_pos_name ."</option>";
                }
                echo $option;
            }    
        } 
    }

}
