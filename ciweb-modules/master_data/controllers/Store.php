<?php

class Store extends Bks_Controller {

    function __construct() {
        $config = array('modules' => 'master_data', 'jsfiles' => array('store'));
        parent::__construct($config);
    }
    
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('Store');
        $this->template->set('tsmall', 'File');
        $this->template->set('icon', 'fa fa-navicon');
        $this->template->build('master_data/store_v');
    }   
    
    function getdata() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $this->Bksmdl->table = 'v_m_store';
        $cpData = $this->Bksmdl->getDataTable();
        $this->Bksmdl->outputToJson($cpData);
    }        

}
