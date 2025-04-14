<?php

class Auth extends MX_Controller {

    function __construct() {
        $this->auth = $this->session->userdata('auth');
    }

    function index() {
        $lang = 'id'; //$this->meta->get_option( 'loginlang' );
        $cookie = array('name' => 'loginlang', 'value' => $lang, 'expire' => '86500');
        $this->input->set_cookie($cookie);
        $this->load->view('auth/auth_v');
    }
    
    function login() {
        checkIfNotAjax();
        $postData = $this->input->post();
        $username = strtolower($postData['username']);
        $password = $postData['password'];
        $check = $this->libauth->login($username, $password);
        if ($check['sta']) {
            if ($check['msg'] == 'C') {
                echo $check['msg'];
            } else {
                echo true;
            }
        } else {
            echo $check['msg'];
        }
        return false;
    }
    
    function logout() {
        $this->auth = $this->session->userdata('auth');
        $this->session->sess_destroy();
        redirect(base_url() . 'auth');
    }

}
