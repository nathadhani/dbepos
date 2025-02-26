<?php

class M_store extends Bks_Controller {

    function __construct() {
        $config = array('modules' => 'master_data', 'jsfiles' => array('m_store'));
        parent::__construct($config);
        $this->Bksmdl->table = 'm_company_store';
        $this->auth = $this->session->userdata( 'auth' );
        $this->company_id = $this->auth['company_id'];
    }
    
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('Store');
        $this->template->set('tsmall', 'Location');
        $this->template->set('icon', 'fa fa-navicon');
        $this->template->build('master_data/m_store_v');
    }
    
    function insert() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $postData['store_name'] = trim($postData['store_name']);
        $postData['status'] = cekStatus($postData);
        $postData['register_status'] = '0';

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
        $this->Bksmdl->table = 'v_m_company_store';
        $cpData = $this->Bksmdl->getDataTable();
        $this->Bksmdl->outputToJson($cpData);
    }
    
    function getStore() {        
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $company_id = $this->input->post('company_id');
        $menus = $this->db->get_where('m_company_store', array('status' => '1', 'company_id' => $company_id))->result();
        if (count($menus) > 0)
        {
            $option ="<option selected value=''>-- Pilih Store --</option>";
            foreach($menus as $row){
                $option.="<option value='".$row->id."'>".$row->store_address."</option>";
            }
            echo $option;
        }
    }
    
    function getStoryTrx() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $this->Bksmdl->table = 'm_company_store';
        $this->Bksmdl->searchable = array('store_name', 'store_address', 'id');
        $this->Bksmdl->select2fields = array('id' => 'id', 'text' => 'store_address');        
        $result['results'] = $this->Bksmdl->getSelect2(array('status' => '1', 'company_id' => $this->auth['company_id']));

        $result['more'] = true;
        echo json_encode($result);
    }
    

}
