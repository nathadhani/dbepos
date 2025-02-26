<?php

class Role extends Bks_Controller {

    function __construct() {
        $config = array('modules' => 'admin', 'jsfiles' => array('role'));
        parent::__construct($config);
        $this->Bksmdl->table = 'auth_group_role';
    }    

    function index() {
        //$this->libauth->check(__METHOD__);
        $auth = $this->session->userdata('auth');
        if ($auth['id'] != '1')
            redirect('accessdenied');
        $this->template->title('Role Setting');
        $this->template->set('tsmall', 'Main');
        $this->template->build('admin/role_v');
    }
    
    function insert() {
        checkIfNotAjax();
        //$this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $gid = $postData['usergroup_id'];
        $auth = $this->session->userdata('auth');
        $userid = $auth['id'];
        $created = date('Y-m-d H:i:s', time());
        $dx = $this->db->select('controller,method,info')
                        ->select("'$gid' as usergroup_id")
                        ->select("'$created' as created")
                        ->select("'$userid' as createdby")
                        ->where_in('id', json_decode($postData['id']))
                        ->get('auth_listmethod')->result_array();
        $co = count($dx);
        $status = $this->db->insert_batch('auth_group_role', $dx);
        if ($status == $co) {
            $json['msg'] = '1';
            echo json_encode($json);
        } else {
            $err = $this->db->error();
            $json['msg'] = $err['code'] . '<br>' . $err['message'];
            echo json_encode($json);
        }
    }
    
    function update() {
        checkIfNotAjax();
        //$this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $postData['status'] = cekStatus($postData);
        $id = $postData['id'];
        unset($postData['id']);
        $status = $this->Bksmdl->update($postData, 'id=' . $id);
        if ($status == 'true') {
            $json['msg'] = '1';
            echo json_encode($json);
        } else {
            $json['msg'] = $status;
            echo json_encode($json);
        }
    }
    
    function delete() {
        checkIfNotAjax();
        //$this->libauth->check(__METHOD__);
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
    
    function getDataRole($id = '') {
        checkIfNotAjax();
        //$this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $where[0]['field'] = 'usergroup_id';
        $where[0]['data'] = isset($postData['gid']) ? $postData['gid'] : NULL;
        $where[0]['sql'] = 'where';
        $this->Bksmdl->table = 'auth_group_role';
        $cpData = $this->Bksmdl->getDataTable($where);
        $this->Bksmdl->outputToJson($cpData);
    }
    
    function getDataListMethod() {
        checkIfNotAjax();
//        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $this->Bksmdl->table = 'v_auth_listmethod';
        $dx = $this->db->select('classmethod')->get_where('v_auth_group_role', array('usergroup_id' => $postData['gid']))->result_array();
        $arr = array();
        foreach ($dx as $val) {
            $arr[] = $val['classmethod'];
        }
        $where[0]['field'] = 'classmethod';
        $where[0]['data'] = (count($arr) > 0) ? $arr : NULL;
        $where[0]['sql'] = 'where_not_in';
        $cpData = $this->Bksmdl->getDataTable($where);
        $this->Bksmdl->outputToJson($cpData);
    }
    
    function updateStatus() {
        checkIfNotAjax();
        //$this->libauth->check(__METHOD__);
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

}
