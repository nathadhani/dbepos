<?php

class Summary_buysell_by_chart extends Bks_Controller {

    function __construct() {        
        $config = array('modules' => 'summary', 'jsfiles' => array('summary_buysell_by_chart'));
        parent::__construct($config);
        $this->auth = $this->session->userdata('auth');
        $this->userid = $this->auth['id'];
    }
    
    Public function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('Summary');
        $this->template->set('tsmall', 'Chart');
        $this->template->set('icon', 'fa fa-chart');
        $this->template->build('summary/summary_buysell_by_chart_v');
    }    

    function getlastupdated(){
        checkIfNotAjax();
        // $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $store_id = $postData['store_id'];    
        $query = $this->db->query("SELECT MAX(created) AS lastupdated FROM tr_header WHERE store_id = $store_id")->result();        
        echo json_encode($query, true);
    }
    
    function getdatatable1() {
        checkIfNotAjax();
        // $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $store_id = $postData['store_id'];
        $tahun = intval($postData['period']);    
        $query = $this->db->query("SELECT MONTH(tr_header.tr_date) AS tr_month,
                                        SUM(IF((tr_detail.status IN ( 1, 3, 4 ) AND ( tr_header.tr_id = 1 )),((tr_detail.nominal * tr_detail.sheet) * tr_detail.price ),0)) AS buy_equivalent,
                                        SUM(IF((tr_detail.status IN ( 1, 3, 4 ) AND ( tr_header.tr_id = 2 )),((tr_detail.nominal * tr_detail.sheet) * tr_detail.price),0)) AS sell_equivalent
                                    FROM tr_detail
                                    LEFT JOIN tr_header ON tr_detail.header_id = tr_header.id
                                    WHERE tr_header.store_id = $store_id
                                    AND YEAR(tr_header.tr_date) = $tahun
                                    GROUP BY MONTH(tr_header.tr_date)
                                    ORDER BY MONTH(tr_header.tr_date) ASC")->result();        
        echo json_encode($query, true);
    }

    function getchart1() {
        checkIfNotAjax();
        // $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $store_id = $postData['store_id'];
        $tahun = intval($postData['period']);
        $query = $this->db->query("SELECT MONTH(tr_header.tr_date) AS tr_month,
                                        SUM(IF((tr_detail.status IN ( 1, 3, 4 ) AND ( tr_header.tr_id = 1 )),((tr_detail.nominal * tr_detail.sheet) * tr_detail.price ),0)) AS buy_equivalent,
                                        SUM(IF((tr_detail.status IN ( 1, 3, 4 ) AND ( tr_header.tr_id = 2 )),((tr_detail.nominal * tr_detail.sheet) * tr_detail.price),0)) AS sell_equivalent
                                    FROM tr_detail
                                    LEFT JOIN tr_header ON tr_detail.header_id = tr_header.id
                                    WHERE tr_header.store_id = $store_id
                                    AND YEAR(tr_header.tr_date) = $tahun
                                    GROUP BY MONTH(tr_header.tr_date)
                                    ORDER BY MONTH(tr_header.tr_date) ASC")->result();   
        echo json_encode($query, true);
    }

    function getdatatable2() {
        checkIfNotAjax();
        // $this->libauth->check(__METHOD__);
        $postData = $this->input->post();        
        $store_id = $postData['store_id'];
        $tahun = intval($postData['period']);
        $query = $this->db->query("SELECT 
                                    tr_detail.currency_id,
                                    m_currency.currency_code,
                                    SUM(IF((tr_detail.status IN ( 1, 3, 4 ) AND ( tr_header.tr_id = 1 )),((tr_detail.nominal * tr_detail.sheet) * tr_detail.price ),0)) AS buy_equivalent,
                                    SUM(IF((tr_detail.status IN ( 1, 3, 4 ) AND ( tr_header.tr_id = 2 )),((tr_detail.nominal * tr_detail.sheet) * tr_detail.price),0)) AS sell_equivalent,
                                    SUM(IF((tr_detail.status IN ( 1, 3, 4 )),((tr_detail.nominal * tr_detail.sheet) * tr_detail.price),0)) AS total
                                    FROM tr_detail
                                    LEFT JOIN tr_header ON tr_detail.header_id = tr_header.id
                                    LEFT JOIN m_currency ON tr_detail.currency_id = m_currency.id
                                    WHERE tr_header.store_id = $store_id
                                    AND YEAR(tr_header.tr_date) = $tahun
                                    GROUP BY tr_detail.currency_id, m_currency.currency_code
                                    ORDER BY total DESC")->result();        
        echo json_encode($query, true);
    }
    
    function getchart2() {
        checkIfNotAjax();
        // $this->libauth->check(__METHOD__);
        $postData = $this->input->post();        
        $store_id = $postData['store_id'];
        $tahun = intval($postData['period']);

        $query = $this->db->query("SELECT 
                                    tr_detail.currency_id,
                                    m_currency.currency_code,
                                    SUM(IF((tr_detail.status IN ( 1, 3, 4 ) AND ( tr_header.tr_id = 1 )),((tr_detail.nominal * tr_detail.sheet) * tr_detail.price ),0)) AS buy_equivalent,
                                    SUM(IF((tr_detail.status IN ( 1, 3, 4 ) AND ( tr_header.tr_id = 2 )),((tr_detail.nominal * tr_detail.sheet) * tr_detail.price),0)) AS sell_equivalent,
                                    SUM(IF((tr_detail.status IN ( 1, 3, 4 )),((tr_detail.nominal * tr_detail.sheet) * tr_detail.price),0)) AS total
                                    FROM tr_detail
                                    LEFT JOIN tr_header ON tr_detail.header_id = tr_header.id
                                    LEFT JOIN m_currency ON tr_detail.currency_id = m_currency.id
                                    WHERE tr_header.store_id = $store_id
                                    AND YEAR(tr_header.tr_date) = $tahun
                                    GROUP BY tr_detail.currency_id, m_currency.currency_code
                                    ORDER BY total DESC
                                    LIMIT 5")->result();        
        echo json_encode($query, true);
    }
    
        
}
