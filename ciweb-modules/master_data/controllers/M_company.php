<?php

class M_company extends Bks_Controller {

    function __construct() {
        $config = array('modules' => 'master_data', 'jsfiles' => array('m_company'));
        parent::__construct($config);
        $this->Bksmdl->table = 'm_company';
        $this->auth = $this->session->userdata( 'auth' );
    }
    
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('Branch');
        $this->template->set('tsmall', 'Location');
        $this->template->set('icon', 'fa fa-navicon');
        $this->template->build('master_data/m_company_v');
    }
    
    function insert() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $postData['company_name'] = trim($postData['company_name']);
        $postData['company_address'] = ucwords(strtolower(trim($postData['company_address'])));
        $postData['company_city'] = ucwords(strtolower(trim($postData['company_city'])));
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
        $postData['company_name'] = trim($postData['company_name']);
        $postData['company_address'] = ucwords(strtolower(trim($postData['company_address'])));
        $postData['company_city'] = ucwords(strtolower(trim($postData['company_city'])));
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
    
    function getData() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $this->Bksmdl->table = 'v_m_company';
        $cpData = $this->Bksmdl->getDataTable();
        $this->Bksmdl->outputToJson($cpData);
    }
    
    function getBranch() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $this->Bksmdl->table = 'm_company';
        $this->Bksmdl->searchable = array('company_address', 'company_name', 'id');
        $this->Bksmdl->select2fields = array('id' => 'id', 'text' => 'company_address');
        $result['results'] = $this->Bksmdl->getSelect2(array('status' => '1'));
        $result['more'] = true;
        echo json_encode($result);
    }
    
    function getRegion() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $this->Bksmdl->table = 'm_company';
        $this->Bksmdl->searchable = array('company_address', 'company_name', 'id');
        $this->Bksmdl->select2fields = array('id' => 'id', 'text' => 'company_address');
        if($this->auth['region'] !== NULL && $this->auth['region'] !== ''){
            $result['results'] = $this->Bksmdl->getSelect2(array('status' => '1'), null, explode(',', $this->auth['region']) );
        } else {
            $result['results'] = $this->Bksmdl->getSelect2(array('status' => '1', 'id' => $this->auth['company_id']));
        }
        $result['more'] = true;
        echo json_encode($result);
    }

}
