<?php

class Menu extends Bks_Controller {

    function __construct() {
        $config = array('modules' => 'menu', 'jsfiles' => array('menu'));
        parent::__construct($config);
        $this->Bksmdl->table = 'auth_menu';
    }
    
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('List Menu');
        $this->template->set('tsmall', 'Menu');
        $this->template->set('icon', 'fa fa-navicon');
        $this->template->build('menu/menu_v');
    }
    
    function insert() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
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
    
    function getData() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $cpData = $this->Bksmdl->getDataTable();
        $this->Bksmdl->outputToJson($cpData);
    }

    function _createMenu_sidebar($group_id = null, $pid = 0) {
        $query = $this->db->order_by("menuorder")->get_where('v_auth_menu_group_create', array('usergroup_id' => $group_id, 'parent_id' => $pid, 'status' => '1'))->result_array();
        if (count($query) > 0) {
            foreach ($query as $val) {
                if ($val['h_child'] == 1) {
                    $c1 = 'xn-openable';
                    if ($val['parent'] == NULL) {
                        $c2 = '<span class="xn-text">' . $val['menu'] . '</span>';
                    } else {
                        $c2 = '<span>' . $val['menu'] . '</span>';
                    }
                    
                    $c3 = '<ul>';
                } else {
                    $c1 = '';
                    if ($val['parent'] == NULL) {
                        $c2 = '<span class="xn-text">' . $val['menu'] . '</span>';
                    } else {
                        $c2 = '<span>' . $val['menu'] . '</span>';
                    }
                    $c3 = '</li>';
                }
                echo '<li class="' . $c1 . '">
                        <a href="' . $val['link'] . '"><span class="' . $val['icon'] . '"></span> ' . $c2 . '</a>';
                echo $c3;
                if ($val['h_child'] == 1) {
                    $this->_createMenu_sidebar($group_id, $val['menu_id']);
                }
            }
            echo '</ul></li>';
        }
    }

    function _createMenuAplikasi($group_id = null, $pid = 0) {
        $query = $this->db->query("SELECT * FROM menu WHERE link = '#' ORDER BY menu")->result_array();
        if (count($query) > 0) {
            foreach ($query as $val) {
                $c2 = '<span>' . $val['menu'] . '</span>';
                echo '<li>
                        <a href="' . $val['link'] . '"><span class="' . $val['icon'] . '"></span> ' . $c2 . '</a>
                      </li>';
            }
        }
    }

}
