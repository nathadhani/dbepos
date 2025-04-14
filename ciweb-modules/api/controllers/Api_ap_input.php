<?php

class Api_ap_input extends Bks_Controller {

    function __construct() {
        $config = array('modules' => 'api', 'jsfiles' => array('api_ap_input'));
        parent::__construct($config);        
        $this->auth = $this->session->userdata( 'auth' );
        $this->store_id = $this->auth['store_id'];
    }
    
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('Buy Sell - API Input');
        $this->template->set('tsmall', 'API');
        $this->template->set('icon', 'fa fa-edit');
        $data['auth'] = $this->auth;
        $this->template->build('api/api_ap_input_v', $data);
    }
    
    function getdata() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();

        $this->Bksmdl->table = 'v_tr_header';

        $where[0]['field'] = 'store_id';
        $where[0]['data']  = $this->store_id;
        $where[0]['sql']   = 'where';

        $where[1]['field'] = 'api_method';
        $where[1]['data']  = 1;
        $where[1]['sql']   = 'where';

        $where[2]['field'] = 'status';
        $where[2]['data']  = ['3','4'];
        $where[2]['sql']   = 'where_in';

        $cpData = $this->Bksmdl->getDataTable($where);
        $this->Bksmdl->outputToJson($cpData);
    }

}
