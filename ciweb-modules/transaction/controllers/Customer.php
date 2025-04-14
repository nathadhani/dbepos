<?php

class Customer extends Bks_Controller {

    function __construct(){
        $config = array('modules' => 'transaction', 'jsfiles' => array('customer'));
        parent::__construct($config);
        $this->Bksmdl->table = 'm_customer';
        $this->auth = $this->session->userdata( 'auth' );       
    }
    
    function index(){
        $this->libauth->check(__METHOD__);
        $this->template->title('New');
        $this->template->set('tsmall', 'Buy / Sel - New');
        $this->template->set('icon', 'fa fa-edit');
        $this->template->build('transaction/customer_v');
    }    
    
    function getdata()
    {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $this->Bksmdl->table = 'v_m_customer';
        $search = $postData['search'];
        $field = array('customer_code',
                       'customer_name',
                       'customer_address',
                       'customer_handphone',
                       'customer_data_number');
        $orderby = "ORDER BY customer_name, customer_address ASC";
        $query = $this->Bksmdl->search_text_query_to_datatable($search, $field, $orderby);
        $this->Bksmdl->outputToJson($query);
    }    
    
}
