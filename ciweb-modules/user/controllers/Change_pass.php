<?php

class Change_pass extends Bks_Controller {

    function __construct() {
        $config = array('modules' => 'user', 'jsfiles' => array('change_pass'));
        parent::__construct($config);
        $this->Bksmdl->table = 'auth_users';
        $this->auth = $this->session->userdata('auth');
    }
    
    function index() {
       $this->libauth->check(__METHOD__);
        $this->template->title('Ganti Password');
        // $this->template->set('tsmall', '');
        $this->template->set('icon', 'glyphicon glyphicon-user');
        $this->template->build('user/change_pass_v');
    }
    
    function update() {
        checkIfNotAjax();
       $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $id = $this->auth['id'];
        $oldp = $this->db->select('password')->get_where('auth_users', array('id' => $id))->row();
        if ($oldp->password != $this->encrypt->hash($postData['oldpassword'])) {
            $json['msg'] = 'Old Password Wrong';
            echo json_encode($json);
        } else {
            if (strlen($postData['password']) > 0) {
                $datax['password'] = $this->encrypt->hash($postData['password']);
                $datax['password_plain'] = $postData['password'];
                    
                $this->db->trans_begin();
                $status = $this->Bksmdl->update($datax, 'id=' . $id);
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
            } else {
                $json['msg'] = 'Please set password';
                echo json_encode($json);
            }
        }
    }

}
