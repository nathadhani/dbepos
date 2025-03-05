<?php

class Home extends Bks_Controller {

    function __construct() {
        $this->auth = $this->session->userdata('auth');
        $this->userid = $this->auth['id'];
        $config = array('modules' => 'home', 'jsfiles' => array('home'));
        parent::__construct($config);
    }
    
    Public function index() {
        $this->libauth->check(__METHOD__);        
        $data['user_information'] = $this->get_user_information($this->userid);
        $this->template->title('Home');
        $this->template->set('tsmall', 'Home');
        $this->template->set('icon', 'fa fa-home');
        $this->template->build('home/home_v',$data);
    }
    
    protected function get_user_information($user_id)
    {
        $result = $this->db->get_where('v_auth_users', array('id' => $user_id));
        if($result->num_rows() > 0){
            return $result->result();
        }
        else{
            exit("User not found");
        }
    }
    
        
}
