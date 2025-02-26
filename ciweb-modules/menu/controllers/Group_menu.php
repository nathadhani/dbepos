<?php

class Group_menu extends Bks_Controller {

    function __construct() {
        $config = array('modules' => 'menu', 'jsfiles' => array('group_menu'));
        parent::__construct($config);
        $this->Bksmdl->table = 'auth_menu_group';
    }
    
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('Group Menu');
        $this->template->set('tsmall', 'Menu');
        $this->template->set('icon', 'fa fa-list-alt');
        $this->template->build('menu/group_menu_v');
    }
    
    function insert() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $postData = cekSelect2(array('usergroup_id', 'menu_id'), $postData);
        $postData['parent_id'] = isset($postData['parent_id']) ? $postData['parent_id'] : 0;
        $postData['status'] = cekStatus($postData);
        $this->db->trans_begin();
        $awal = '>=' . $postData['menuorder'];
        $setorder = 'menuorder + 1';
        $this->db->set('menuorder', $setorder, FALSE);
        $this->db->where('menuorder ' . $awal);
        $this->db->where('usergroup_id ', $postData['usergroup_id']);
        $this->db->update('auth_menu_group');
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
        $postData = cekSelect2(array('usergroup_id', 'menu_id'), $postData);
        $postData['parent_id'] = isset($postData['parent_id']) ? $postData['parent_id'] : 0;
        $postData['status'] = cekStatus($postData);
        $id = $postData['id'];
        unset($postData['id']);
        $this->db->trans_begin();
        $orderm = $this->db->select("menuorder")->get_where('auth_menu_group', array('id' => $id))->row();
        if ($postData['menuorder'] < $orderm->menuorder) {
            $awal = '>=' . $postData['menuorder'];
            $akhir = '<' . $orderm->menuorder;
            $setorder = 'menuorder + 1';
        } else {
            $awal = '>' . $orderm->menuorder;
            $akhir = '<=' . $postData['menuorder'];
            $setorder = 'menuorder - 1';
        }
        $this->db->set('menuorder', $setorder, FALSE);
        $this->db->where('menuorder ' . $awal);
        $this->db->where('menuorder ' . $akhir);
        $this->db->where('usergroup_id ', $postData['usergroup_id']);
        $this->db->update('auth_menu_group');
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
        $orderm = $this->db->select("menuorder,usergroup_id")->get_where('auth_menu_group', array('id' => $id[0]))->row();
        $awal = '>' . $orderm->menuorder;
        $setorder = 'menuorder - 1';
        $this->db->set('menuorder', $setorder, FALSE);
        $this->db->where('menuorder ' . $awal);
        $this->db->where('usergroup_id ', $orderm->usergroup_id);
        $this->db->update('auth_menu_group');
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
    
    function getDataMenu($id = '') {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $where[0]['field'] = 'usergroup_id';
        $where[0]['data'] = isset($postData['gid']) ? $postData['gid'] : NULL;
        $where[0]['sql'] = 'where';
        $this->Bksmdl->table = 'v_auth_menu_group_create';
        $cpData = $this->Bksmdl->getDataTable($where);
        $this->Bksmdl->outputToJson($cpData);
    }
    
    function getMenu() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $this->Bksmdl->table = 'auth_menu';
        $this->Bksmdl->searchable = array('menu', 'link');
        $this->Bksmdl->select2fields = array('id' => 'id', 'text' => "concat(menu,' [', link,']')");
        $result['results'] = $this->Bksmdl->getSelect2(array('status' => '1'));
        $result['more'] = true;
        echo json_encode($result);
    }
}
