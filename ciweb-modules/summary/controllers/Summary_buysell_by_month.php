<?php

class Summary_buysell_by_month extends Bks_Controller {

    function __construct(){
        $config = array('modules' => 'summary', 'jsfiles' => array('summary_buysell_by_month'));
        parent::__construct($config);        
        $this->auth = $this->session->userdata( 'auth' );       
    }
    
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('Buy / Sell by Month');
        $this->template->set('tsmall', 'Summary');
        $this->template->set('icon', 'fa fa-edit');
        $data['auth'] = $this->auth;
        $this->template->build('summary/summary_buysell_by_month_v', $data);
    }
    
    function getdata() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();

        $store_id = $postData['store_id'];
        $tahun = Date('Y');
        $bulan = Date('m');
        if(isset($postData['periode'])){
            $tahun = intval(SUBSTR($postData['periode'],3,4));
            $bulan = intval(SUBSTR($postData['periode'],0,2));
        }
        
        $this->Bksmdl->table = 'v_summary_by_month';

        $where[0]['field'] = 'store_id';
        $where[0]['data']  = $store_id;
        $where[0]['sql']   = 'where';

        $where[1]['field'] = 'tr_year';
        $where[1]['data']  = $tahun;
        $where[1]['sql']   = 'where';

        $where[2]['field'] = 'tr_month';
        $where[2]['data']  = $bulan;
        $where[2]['sql']   = 'where';

        $cpData = $this->Bksmdl->getDataTable($where);
        $this->Bksmdl->outputToJson($cpData);
    }

    function gettotal(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();

        $store_id = $postData['store_id'];
        $tahun = Date('Y');
        $bulan = Date('m');
        if(isset($postData['periode'])){
            $tahun = intval(SUBSTR($postData['periode'],3,4));
            $bulan = intval(SUBSTR($postData['periode'],0,2));
        }

        $query = $this->db->query("SELECT SUM(buy_equivalent) AS buy_equivalent,
                                   SUM(sell_equivalent) AS sell_equivalent
                                   FROM v_summary_by_month
                                   WHERE store_id = $store_id
                                   AND tr_year = $tahun
                                   AND tr_month = $bulan")->result();

        echo json_encode($query, true);
    }

    function getcount(){
        checkIfNotAjax();
        // $this->libauth->check(__METHOD__);
        $postData = $this->input->post();

        $store_id = $postData['store_id'];
        $tahun = Date('Y');
        $bulan = Date('m');
        if(isset($postData['periode'])){
            $tahun = intval(SUBSTR($postData['periode'],3,4));
            $bulan = intval(SUBSTR($postData['periode'],0,2));
        }
        
        $query = $this->db->query("SELECT COUNT(CASE WHEN tr_id = 1 AND status IN(3,4) THEN 1 END) AS buy_count,
                                COUNT(CASE WHEN tr_id = 2 AND status IN(3,4) THEN 1 END) AS sell_count
                                FROM tr_header
                                WHERE store_id = $store_id
                                AND YEAR(tr_date) = $tahun
                                AND MONTH(tr_date) = $bulan
                                AND status IN(3,4)")->result();
        echo json_encode($query, true);
    }
        
}
