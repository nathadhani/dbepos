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
        $this->Bksmdl->table = 'v_m_store2';

        $where[0]['field'] = 'status';
        $where[0]['data']  = 1;
        $where[0]['sql']   = 'where';

        $cpData = $this->Bksmdl->getDataTable($where);
        $this->Bksmdl->outputToJson($cpData);
    }        

}
