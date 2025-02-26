<?php

class Dashboard extends Bks_Controller {

    function __construct() {        
        $config = array('modules' => 'dashboard', 'jsfiles' => array('dashboard'));
        parent::__construct($config);
        $this->auth = $this->session->userdata('auth');
        $this->userid = $this->auth['id'];
    }
    
    Public function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('Dashboard');
        $this->template->set('tsmall', 'Chart');
        $this->template->set('icon', 'fa fa-chart');
        $this->template->build('dashboard/dashboard_v');
    }    

    function getlastupdated(){
        checkIfNotAjax();
        // $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $company_id = $postData['company_id'];
        $store_id = $postData['store_id'];
    
        $query = $this->db->query("SELECT MAX(created) AS lastupdated FROM tr_header WHERE company_id = $company_id")->result();
        if($store_id !== null && $store_id !== ''){
            $query = $this->db->query("SELECT MAX(created) AS lastupdated FROM tr_header WHERE company_id = $company_id AND store_id = $store_id")->result();            
        }
        
        echo json_encode($query, true);
    }
    
    function getdatatable1() {
        checkIfNotAjax();
        // $this->libauth->check(__METHOD__);
        $postData = $this->input->post();

        $company_id = $postData['company_id'];
        $store_id = $postData['store_id'];
        $tahun = intval($postData['periode']);
    
        $query = $this->db->query("SELECT tr_month, SUM(buy_equivalent) AS buy_equivalent, SUM(sales_equivalent) AS sales_equivalent                                   
                                   FROM v_summary_by_month
                                   WHERE company_id = $company_id
                                    AND tr_year = $tahun
                                    GROUP BY tr_year,tr_month
                                    ORDER BY tr_month ASC")->result();

        if($store_id !== null && $store_id !== ''){
            $query = $this->db->query("SELECT tr_month, SUM(buy_equivalent) AS buy_equivalent, SUM(sales_equivalent) AS sales_equivalent
                                        FROM v_summary_by_month
                                        WHERE company_id = $company_id
                                        AND store_id = $store_id
                                        AND tr_year = $tahun
                                        GROUP BY tr_year,tr_month
                                        ORDER BY tr_month ASC")->result();
        }

        echo json_encode($query, true);
    }

    function getchart1() {
        checkIfNotAjax();
        // $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $company_id = $postData['company_id'];
        $store_id = $postData['store_id'];
        $tahun = intval($postData['periode']);

        $query = $this->db->query("SELECT tr_month,
                                        SUM( buy_equivalent ) AS buy_equivalent,
                                        SUM( sales_equivalent ) AS sales_equivalent
                                    FROM v_summary_by_month
                                    WHERE company_id = $company_id
                                    AND tr_year = $tahun
                                    GROUP BY tr_month
                                    ORDER BY tr_month ASC")->result();

        if($store_id !== null && $store_id !== ''){
            $query = $this->db->query("SELECT tr_month,
                                        SUM( buy_equivalent ) AS buy_equivalent,
                                        SUM( sales_equivalent ) AS sales_equivalent
                                    FROM v_summary_by_month
                                    WHERE company_id = $company_id
                                    AND store_id = $store_id
                                    AND tr_year = $tahun
                                    GROUP BY tr_month
                                    ORDER BY tr_month ASC")->result();
        }
        echo json_encode($query, true);
    }

    function getdatatable2() {
        checkIfNotAjax();
        // $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $company_id = $postData['company_id'];
        $store_id = $postData['store_id'];
        $tahun = intval($postData['periode']);

        $query = $this->db->query("SELECT 
                                    tr_detail.valas_id,
                                    m_valas.valas_code,
                                    SUM(IF((tr_detail.status IN ( 1, 3, 4 ) AND ( tr_header.tr_id = 1 )),((tr_detail.nominal * tr_detail.sheet) * tr_detail.price ),0)) AS buy_equivalent,
                                    SUM(IF((tr_detail.status IN ( 1, 3, 4 ) AND ( tr_header.tr_id = 2 )),((tr_detail.nominal * tr_detail.sheet) * tr_detail.price),0)) AS sales_equivalent,
                                    SUM(IF((tr_detail.status IN ( 1, 3, 4 )),((tr_detail.nominal * tr_detail.sheet) * tr_detail.price),0)) AS total
                                    FROM tr_detail
                                    LEFT JOIN tr_header ON tr_detail.header_id = tr_header.id
                                    LEFT JOIN m_valas ON tr_detail.valas_id = m_valas.id
                                    WHERE tr_header.company_id = $company_id
                                    AND YEAR(tr_header.tr_date) = $tahun
                                    GROUP BY tr_detail.valas_id, m_valas.valas_code
                                    ORDER BY total DESC")->result();

        if($store_id !== null && $store_id !== ''){
            $query = $this->db->query("SELECT 
                                    tr_detail.valas_id,
                                    m_valas.valas_code,
                                    SUM(IF((tr_detail.status IN ( 1, 3, 4 ) AND ( tr_header.tr_id = 1 )),((tr_detail.nominal * tr_detail.sheet) * tr_detail.price),0)) AS buy_equivalent,
                                    SUM(IF((tr_detail.status IN ( 1, 3, 4 ) AND ( tr_header.tr_id = 2 )),((tr_detail.nominal * tr_detail.sheet) * tr_detail.price),0)) AS sales_equivalent,
                                    SUM(IF((tr_detail.status IN ( 1, 3, 4 )),((tr_detail.nominal * tr_detail.sheet) * tr_detail.price),0)) AS total
                                    FROM tr_detail
                                    LEFT JOIN tr_header ON tr_detail.header_id = tr_header.id
                                    LEFT JOIN m_valas ON tr_detail.valas_id = m_valas.id
                                    WHERE tr_header.company_id = $company_id
                                    AND tr_header.store_id = $store_id
                                    AND YEAR(tr_header.tr_date) = $tahun
                                    GROUP BY tr_detail.valas_id, m_valas.valas_code
                                    ORDER BY total DESC")->result();
        }
        echo json_encode($query, true);
    }
    
    function getchart2() {
        checkIfNotAjax();
        // $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $company_id = $postData['company_id'];
        $store_id = $postData['store_id'];
        $tahun = intval($postData['periode']);

        $query = $this->db->query("SELECT 
                                    tr_detail.valas_id,
                                    m_valas.valas_code,
                                    SUM(IF((tr_detail.status IN ( 1, 3, 4 ) AND ( tr_header.tr_id = 1 )),((tr_detail.nominal * tr_detail.sheet) * tr_detail.price ),0)) AS buy_equivalent,
                                    SUM(IF((tr_detail.status IN ( 1, 3, 4 ) AND ( tr_header.tr_id = 2 )),((tr_detail.nominal * tr_detail.sheet) * tr_detail.price),0)) AS sales_equivalent,
                                    SUM(IF((tr_detail.status IN ( 1, 3, 4 )),((tr_detail.nominal * tr_detail.sheet) * tr_detail.price),0)) AS total
                                    FROM tr_detail
                                    LEFT JOIN tr_header ON tr_detail.header_id = tr_header.id
                                    LEFT JOIN m_valas ON tr_detail.valas_id = m_valas.id
                                    WHERE tr_header.company_id = $company_id
                                    AND YEAR(tr_header.tr_date) = $tahun
                                    GROUP BY tr_detail.valas_id, m_valas.valas_code
                                    ORDER BY total DESC
                                    LIMIT 5")->result();

        if($store_id !== null && $store_id !== ''){
            $query = $this->db->query("SELECT 
                                    tr_detail.valas_id,
                                    m_valas.valas_code,
                                    SUM(IF((tr_detail.status IN ( 1, 3, 4 ) AND ( tr_header.tr_id = 1 )),((tr_detail.nominal * tr_detail.sheet) * tr_detail.price),0)) AS buy_equivalent,
                                    SUM(IF((tr_detail.status IN ( 1, 3, 4 ) AND ( tr_header.tr_id = 2 )),((tr_detail.nominal * tr_detail.sheet) * tr_detail.price),0)) AS sales_equivalent,
                                    SUM(IF((tr_detail.status IN ( 1, 3, 4 )),((tr_detail.nominal * tr_detail.sheet) * tr_detail.price),0)) AS total
                                    FROM tr_detail
                                    LEFT JOIN tr_header ON tr_detail.header_id = tr_header.id
                                    LEFT JOIN m_valas ON tr_detail.valas_id = m_valas.id
                                    WHERE tr_header.company_id = $company_id
                                    AND tr_header.store_id = $store_id
                                    AND YEAR(tr_header.tr_date) = $tahun
                                    GROUP BY tr_detail.valas_id, m_valas.valas_code
                                    ORDER BY total DESC
                                    LIMIT 5")->result();
        }
        echo json_encode($query, true);
    }
    
        
}
