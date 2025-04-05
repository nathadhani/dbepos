<?php

class Home extends Bks_Controller {

    function __construct() {
        $this->auth = $this->session->userdata('auth');
        $this->userid = $this->auth['id'];
        $this->usergroupid = $this->auth['usergroup_id'];
        if($this->usergroupid == '4'){
            $config = array('modules' => 'transaction', 'jsfiles' => array('customer'));
        } else if($this->usergroupid == '5'){
            $config = array('modules' => 'cb', 'jsfiles' => array('cb_list'));
        } else if($this->usergroupid == '6'){
            $config = array('modules' => 'transaction', 'jsfiles' => array('transaction_buysell_list'));
        } else {
            $config = array('modules' => 'home', 'jsfiles' => array('home'));
        }
        parent::__construct($config);
    }
    
    Public function index() {
        $this->libauth->check(__METHOD__);        
        if($this->usergroupid == '4'){
            $this->template->title('New');
            $this->template->set('tsmall', 'Buy / Sel - New');
            $this->template->set('icon', 'fa fa-edit');
            $this->template->build('transaction/customer_v');
        } else if($this->usergroupid == '5'){
            $this->template->title('List');
            $this->template->set('tsmall', 'Cash Bank');
            $this->template->set('icon', 'fa fa-edit');
            $data['auth'] = $this->auth;
            $this->template->build('cb/cb_list_v', $data);
        } else if($this->usergroupid == '6'){
            $this->template->title('List');
            $this->template->set('tsmall', 'Transaction');
            $this->template->set('icon', 'fa fa-edit');
            $data['auth'] = $this->auth;
            $this->template->build('transaction/transaction_buysell_list_v', $data);
        } else {
            $this->template->title('Home');
            $this->template->set('tsmall', 'Home');
            $this->template->set('icon', 'fa fa-home');
            $data['auth'] = $this->auth;
            $this->template->build('home/home_v',$data);
        }        
    }   
    
    
        
}
