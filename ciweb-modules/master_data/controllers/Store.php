<?php

class Store extends Bks_Controller {

    function __construct() {
        $config = array('modules' => 'master_data', 'jsfiles' => array('store'));
        parent::__construct($config);
        $this->auth = $this->session->userdata( 'auth' );
        $this->company_id = $this->auth['company_id'];
        $this->usergroup_id = $this->auth['usergroup_id'];
    }
    
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('Store');
        $this->template->set('tsmall', 'Data');
        $this->template->set('icon', 'fa fa-navicon');
        $this->template->build('master_data/store_v');
    }   
    
    function getData() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $this->Bksmdl->table = 'v_m_company_store';
        $cpData = $this->Bksmdl->getDataTable();
        if($this->usergroup_id !== '2'){
            $where[0]['field'] = 'company_id';
            $where[0]['data']  = $this->company_id;
            $where[0]['sql']   = 'where';
            $cpData = $this->Bksmdl->getDataTable($where);
        }      
        $this->Bksmdl->outputToJson($cpData);
    }        

}
