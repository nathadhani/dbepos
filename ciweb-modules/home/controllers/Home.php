<?php

class Home extends Bks_Controller {

    function __construct() {
        $this->auth = $this->session->userdata('auth');
        $this->userid = $this->auth['id'];
        $this->usergroup_id = $this->auth['usergroup_id'];
        $this->userlevel_id = $this->auth['userlevel_id'];    
        $this->company_id = $this->auth['company_id'];
        $this->api_method = $this->auth['api_method'];  
        // $config = array('modules' => 'home', 'jsfiles' => array('c3/d3.v3.min', 'c3/c3'), 'cssfiles' => array('c3/c3.min'));
        // if(in_array($this->userlevel_id, array('1','2')) && $this->usergroup_id > 1) {
        //     $config = array('modules' => 'dashboard', 'jsfiles' => array('dashboard'));
        // } else {
            $config = array('modules' => 'home', 'jsfiles' => array('home2212'));
        // }    
        parent::__construct($config);
    }
    
    Public function index() {
        $this->libauth->check(__METHOD__);        
        // if(in_array($this->userlevel_id, array('1','2')) && $this->usergroup_id > 1) {
        //     $this->template->title('Dashboard');
        //     $this->template->set('tsmall', 'Chart');
        //     $this->template->set('icon', 'fa fa-chart');
        //     $this->template->build('dashboard/dashboard_v');            
        // } else {
            $data['user_information'] = $this->get_user_information($this->userid);
            $this->template->title('Home');
            $this->template->set('tsmall', 'Home');
            $this->template->set('icon', 'fa fa-home');
            $this->template->build('home/home_v',$data);
        // }            
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
