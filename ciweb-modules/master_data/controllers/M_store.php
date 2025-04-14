<?php

class M_store extends Bks_Controller {

    function __construct() {
        $config = array('modules' => 'master_data', 'jsfiles' => array('m_store'));
        parent::__construct($config);
        $this->Bksmdl->table = 'm_store';
        $this->auth = $this->session->userdata( 'auth' );       
    }
    
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('Store');
        $this->template->set('tsmall', 'File');
        $this->template->set('icon', 'fa fa-navicon');
        $this->template->build('master_data/m_store_v');
    }
    
    function insert() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $postData['store_name'] = trim($postData['store_name']);
        $postData['status'] = cekStatus($postData);
        if(isset($postData['ap_tr_id'])){
            $postData['ap_tr_id'] = implode(',', $postData['ap_tr_id']);
            $mystring = $postData['ap_tr_id'];
            $findme   = ',';
            $pos = strpos($mystring, $findme);
            if($pos === false) {
                $postData['ap_tr_id'] = (int) $postData['ap_tr_id'];                                     
            }
        }        

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
        $postData['store_name'] = trim($postData['store_name']);
        $postData['status'] = cekStatus($postData);
        if(isset($postData['ap_tr_id'])){
            $postData['ap_tr_id'] = implode(',', $postData['ap_tr_id']);
            // $mystring = $postData['tr_id'];
            // $findme   = ',';
            // $pos = strpos($mystring, $findme);
            // if($pos === false) {
            //     $postData['tr_id'] = (int) $postData['tr_id'];
            // }
        }
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
        $this->Bksmdl->table = 'v_m_store2';
        $cpData = $this->Bksmdl->getDataTable();
        $this->Bksmdl->outputToJson($cpData);
    }   
        
    function getstore() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $this->Bksmdl->table = 'm_store';
        $this->Bksmdl->searchable = array('store_name', 'store_address', 'id');
        $this->Bksmdl->select2fields = array('id' => 'id', 'text' => 'store_address');
        $result['results'] = $this->Bksmdl->getSelect2(array('status' => '1'));
        $result['more'] = true;
        echo json_encode($result);
    }

    function getregion() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $this->Bksmdl->table = 'm_store';
        $this->Bksmdl->searchable = array('store_address', 'store_name', 'id');
        $this->Bksmdl->select2fields = array('id' => 'id', 'text' => 'store_address');
        if($this->auth['store_id_multiple'] !== NULL && $this->auth['store_id_multiple'] !== ''){
            $result['results'] = $this->Bksmdl->getSelect2(array('status' => '1'), null, explode(',', $this->auth['store_id_multiple']) );
        } else {
            $result['results'] = $this->Bksmdl->getSelect2(array('status' => '1', 'id' => $this->auth['store_id']));
        }
        $result['more'] = true;
        echo json_encode($result);
    }
    

}
