<?php

class M_trxlist extends Bks_Controller {

    function __construct() {
        $config = array('modules' => 'master_data', 'jsfiles' => array('m_trxlist'));
        parent::__construct($config);
        $this->Bksmdl->table = 'm_transaction';
    }
    
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('Transaksi List');
        $this->template->set('tsmall', 'Transaksi Setting');
        $this->template->set('icon', 'fa fa-navicon');
        $this->template->build('master_data/m_trxlist_v');
    }
    
    function insert() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $postData['transaction_name'] = ucwords(strtolower(trim($postData['transaction_name'])));
        $postData['description'] = ucwords(strtolower(trim($postData['description'])));
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
        $postData['transaction_name'] = ucwords(strtolower(trim($postData['transaction_name'])));
        $postData['description'] = ucwords(strtolower(trim($postData['description'])));
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
        $this->Bksmdl->table = 'm_transaction';
        $cpData = $this->Bksmdl->getDataTable();
        $this->Bksmdl->outputToJson($cpData);
    }
    
    function gettrxlistbuysell() {
        checkIfNotAjax();
        // $this->libauth->check(__METHOD__);
        $this->Bksmdl->table = 'm_transaction';
        $this->Bksmdl->searchable = array('description', 'transaction_name', 'id');
        $this->Bksmdl->select2fields = array('id' => 'id', 'text' => 'transaction_name');
        $result['results'] = $this->Bksmdl->getSelect2(array('status' => '1'),null,['1','2']);
        $result['more'] = true;
        echo json_encode($result);
    }

    function gettrxlistcashbank() {
        checkIfNotAjax();
        // $this->libauth->check(__METHOD__);
        $this->Bksmdl->table = 'm_transaction';
        $this->Bksmdl->searchable = array('description', 'transaction_name', 'id');
        $this->Bksmdl->select2fields = array('id' => 'id', 'text' => 'transaction_name');
        $result['results'] = $this->Bksmdl->getSelect2(array('status' => '1'),null,['3','4']);
        $result['more'] = true;
        echo json_encode($result);
    }

}
