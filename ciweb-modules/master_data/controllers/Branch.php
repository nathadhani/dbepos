<?php

class Branch extends Bks_Controller {

    function __construct() {
        $config = array('modules' => 'master_data', 'jsfiles' => array('branch'));
        parent::__construct($config);
    }
    
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('Branch');
        $this->template->set('tsmall', 'Location');
        $this->template->set('icon', 'fa fa-navicon');
        $this->template->build('master_data/branch_v');
    }   
    
    function getdata() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $this->Bksmdl->table = 'm_company';
        $cpData = $this->Bksmdl->getDataTable();
        $this->Bksmdl->outputToJson($cpData);
    }        

}
