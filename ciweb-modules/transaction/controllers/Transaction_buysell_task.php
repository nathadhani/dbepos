<?php

class Transaction_buysell_task extends Bks_Controller {

    function __construct() {
        $config = array('modules' => 'transaction', 'jsfiles' => array('transaction_buysell_task'));
        parent::__construct($config);        
        $this->auth = $this->session->userdata( 'auth' );
        $this->store_id = $this->auth['store_id'];
    }
    
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('Task');
        $this->template->set('tsmall', 'Transaction');
        $this->template->set('icon', 'fa fa-edit');
        $data['auth'] = $this->auth;
        $this->template->build('transaction/transaction_buysell_task_v', $data);
    }
    
    function getdata() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();

        $this->Bksmdl->table = 'v_tr_header';

        $where[0]['field'] = 'store_id';
        $where[0]['data']  = $this->store_id;
        $where[0]['sql']   = 'where';

        $where[1]['field'] = 'status';
        $where[1]['data']  = 1;
        $where[1]['sql']   = 'where';

        $cpData = $this->Bksmdl->getDataTable($where);
        $this->Bksmdl->outputToJson($cpData);
    }

}
