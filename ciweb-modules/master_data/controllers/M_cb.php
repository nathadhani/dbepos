<?php

class M_cb extends Bks_Controller {

    function __construct() {
        $config = array('modules' => 'master_data', 'jsfiles' => array('m_cb'));
        parent::__construct($config);
        $this->Bksmdl->table = 'm_cb';
        $this->auth = $this->session->userdata( 'auth' );        
        $this->store_id = $this->auth['store_id'];
    }
    
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('Cash Bank Account');
        $this->template->set('tsmall', 'File');
        $this->template->set('icon', 'fa fa-navicon');
        $this->template->build('master_data/m_cb_v');
    }

    function generate_code($store_id, $tr_id) {
        $this->libauth->check(__METHOD__);
        $Number = 1;
        $storecode = sprintf("%02d", $store_id);
        $trcode = sprintf("%02d", $tr_id);
        $sql = $this->db->query("SELECT max(right(cb_code,4)) as id 
                                 FROM m_cb 
                                 WHERE store_id = $store_id
                                 AND tr_id = $tr_id")->result();
        if (count($sql) > 0) {
            foreach ($sql as $data) {
                $Number = intval($data->id) + 1;
            }
        }
        return $storecode . $trcode . sprintf("%04d", $Number);
    }
    
    function insert() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $postData['store_id'] = $this->store_id;
        $postData['cb_code'] = $this->generate_code($this->store_id, $postData['tr_id']);
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
        $postData['store_id'] = $this->store_id;
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
        $this->Bksmdl->table = 'm_cb';
        $cpData = $this->Bksmdl->getDataTable();
        $this->Bksmdl->outputToJson($cpData);
    }
    
    function getmcb() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $this->Bksmdl->table = 'm_cb';
        $this->Bksmdl->searchable = array('cb_code','cb_name', 'id');
        $this->Bksmdl->select2fields = array('id' => 'id', 'text' => "cb_name");
        $result['results'] = $this->Bksmdl->getSelect2(array('status' => '1'));
        $result['more'] = true;
        echo json_encode($result);
    }

    function getmcbpayment() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();    
        $payment_type_id = $postData['payment_type_id'];
        if($payment_type_id != null && $payment_type_id != ''){
            $menus = $this->db->order_by('id', 'ASC')
                    ->get_where('m_cb', array('status' => '1', 'payment_type_id' => $payment_type_id))->result();        
            if (count($menus) > 0){
                $option ="<option selected value=''>Pilih...</option>";
                foreach($menus as $row){
                    $option.="<option value='".$row->id."'>" . $row->cb_name ."</option>";
                }
                echo $option;
            }            
        }
    }

}
