<?php

class Api_ap_input extends Bks_Controller {

    function __construct() {
        $config = array('modules' => 'api', 'jsfiles' => array('api_ap_input'));
        parent::__construct($config);        
        $this->auth = $this->session->userdata( 'auth' );
        $this->company_id = $this->auth['company_id'];
    }
    
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('API - buysellInput');
        $this->template->set('tsmall', 'API');
        $this->template->set('icon', 'fa fa-edit');
        $data['auth'] = $this->auth;
        $this->template->build('api/api_ap_input_v', $data);
    }
    
    function getData() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();

        $this->Bksmdl->table = 'v_tr_header';

        $where[0]['field'] = 'company_id';
        $where[0]['data']  = $this->company_id;
        $where[0]['sql']   = 'where';

        $where[1]['field'] = 'api_method';
        $where[1]['data']  = 1;
        $where[1]['sql']   = 'where';

        $where[2]['field'] = 'status';
        $where[2]['data']  = 3;
        $where[2]['sql']   = 'where';

        $cpData = $this->Bksmdl->getDataTable($where);
        $this->Bksmdl->outputToJson($cpData);
    }

}
