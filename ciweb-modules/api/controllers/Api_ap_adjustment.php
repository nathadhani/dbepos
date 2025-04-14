<?php

class Api_ap_adjustment extends Bks_Controller {

    function __construct() {
        $config = array('modules' => 'api', 'jsfiles' => array('api_ap_adjustment'));
        parent::__construct($config);        
        $this->auth = $this->session->userdata( 'auth' );        
    }
    
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('Transaction Adjustment');
        $this->template->set('tsmall', 'API');
        $this->template->set('icon', 'fa fa-edit');
        $data['auth'] = $this->auth;
        $this->template->build('api/api_ap_adjustment_v', $data);
    }
    
    function getdata() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        
        $company_id = $postData['company_id'];
        $store_id  = $postData['store_id'];
    
        $tanggal = revDate($postData['periode']);

        $this->Bksmdl->table = 'v_tr_header';

        $where[0]['field'] = 'company_id';
        $where[0]['data']  = $company_id;
        $where[0]['sql']   = 'where';

        $where[1]['field'] = 'store_id';
        $where[1]['data']  = $store_id;
        $where[1]['sql']   = 'where';
        
        $where[2]['field'] = 'tr_date';
        $where[2]['data']  = $tanggal;
        $where[2]['sql']   = 'where';
        
        $where2 = "status IN (2)";

        $cpData = $this->Bksmdl->getDataTable($where, $where2);
        $this->Bksmdl->outputToJson($cpData);
    }

}
