<?php

class Summary_buysell_by_date extends Bks_Controller {

    function __construct() {
        $config = array('modules' => 'summary', 'jsfiles' => array('summary_buysell_by_date'));
        parent::__construct($config);        
        $this->auth = $this->session->userdata( 'auth' );        
    }
    
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('Buy / Sell by Date');
        $this->template->set('tsmall', 'Summary');
        $this->template->set('icon', 'fa fa-edit');
        $data['auth'] = $this->auth;
        $this->template->build('summary/summary_buysell_by_date_v', $data);
    }
    
    function getdata() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();

        $store_id = $postData['store_id'];
        $tanggal = revDate($postData['periode']);
        $this->Bksmdl->table = 'v_summary_by_date';
        
        $where[0]['field'] = 'store_id';
        $where[0]['data']  = $store_id;
        $where[0]['sql']   = 'where';

        $where[1]['field'] = 'tr_date';
        $where[1]['data']  = $tanggal;
        $where[1]['sql']   = 'where';

        $cpData = $this->Bksmdl->getDataTable($where);
        $this->Bksmdl->outputToJson($cpData);
    }

    function gettotal(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();

        $store_id = $postData['store_id'];
        $tanggal = revDate($postData['periode']);      
        
        $query = $this->db->query("SELECT SUM(buy_equivalent) AS buy_equivalent,
                                SUM(sell_equivalent) AS sell_equivalent
                                FROM v_summary_by_date
                                WHERE store_id = $store_id
                                AND tr_date = '$tanggal'")->result();

        echo json_encode($query, true);
    }

    function getcount(){
        checkIfNotAjax();
        // $this->libauth->check(__METHOD__);
        $postData = $this->input->post();

        $store_id = $postData['store_id'];
        $tanggal = revDate($postData['periode']);      
        
        $query = $this->db->query("SELECT COUNT(CASE WHEN tr_id = 1 AND status IN(3,4) THEN 1 END) AS buy_count,
                                COUNT(CASE WHEN tr_id = 2 AND status IN(3,4) THEN 1 END) AS sell_count
                                FROM tr_header
                                WHERE store_id = $store_id
                                AND tr_date = '$tanggal'
                                AND status IN(3,4)")->result();
        echo json_encode($query, true);
    }
    
}
