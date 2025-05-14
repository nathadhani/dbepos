<?php

class Stock extends Bks_Controller {
    

    function __construct() 
    {
        $config = array('modules' => 'stock', 'jsfiles' => array('stock'));
        parent::__construct($config);        
        $this->auth = $this->session->userdata( 'auth' );
        $this->store_id = $this->auth['store_id'];
    }
    
    function index()
    {
        $this->libauth->check(__METHOD__);
        $this->template->title('Stock in Nominal');
        $this->template->set('tsmall', 'Summary');
        $this->template->set('icon', 'fa fa-list');
        $data['auth'] = $this->auth;
        $this->template->build('stock/stock_v', $data);
    }
    
    function getdata1() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();    
        
        if(isset($postData['store_id'])){
            $this->store_id = $postData['store_id'];
        } else {
            $this->store_id = $this->auth['store_id'];
        }
        $tahun = date('Y');
        $bulan = date('m');
        if(isset($postData['period'])){
            $tahun = intval(SUBSTR($postData['period'],3,4));
            $bulan = intval(SUBSTR($postData['period'],0,2));
        }        

        $where[0]['field'] = 'store_id';
        $where[0]['data']  = $this->store_id;
        $where[0]['sql']   = 'where_in';

        $where[1]['field'] = 'stock_year';
        $where[1]['data']  = $tahun;
        $where[1]['sql']   = 'where';

        $where[2]['field'] = 'stock_month';
        $where[2]['data']  = $bulan;
        $where[2]['sql']   = 'where';

        $this->Bksmdl->table = 'v_tr_stock_balance_total';
        $cpData = $this->Bksmdl->getDataTable($where);
        $this->Bksmdl->outputToJson($cpData);
    }

    function getdata2() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();    
        
        if(isset($postData['store_id'])){
            $this->store_id = $postData['store_id'];
        } else {
            $this->store_id = $this->auth['store_id'];
        }
        $tahun = date('Y');
        $bulan = date('m');
        if(isset($postData['period'])){
            $tahun = intval(SUBSTR($postData['period'],3,4));
            $bulan = intval(SUBSTR($postData['period'],0,2));
        }        

        $where[0]['field'] = 'store_id';
        $where[0]['data']  = $this->store_id;
        $where[0]['sql']   = 'where_in';

        $where[1]['field'] = 'stock_year';
        $where[1]['data']  = $tahun;
        $where[1]['sql']   = 'where';

        $where[2]['field'] = 'stock_month';
        $where[2]['data']  = $bulan;
        $where[2]['sql']   = 'where';

        $where[3]['field'] = 'last_stock_sheet > 0';
        $where[3]['data']  = null;
        $where[3]['sql']   = 'where';

        $this->Bksmdl->table = 'v_tr_stock_balance_sheet';
        $cpData = $this->Bksmdl->getDataTable($where);
        $this->Bksmdl->outputToJson($cpData);
    }

    function generate_tr_stock_pull(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();     

        if(isset($postData['store_id'])){
            $this->store_id = $postData['store_id'];
        } else {
            $this->store_id = $this->auth['store_id'];
        }

        $tahun = (int) date('Y');
        $bulan = (int) date('m');
        if(isset($postData['period'])){
            $tahun = (int) SUBSTR($postData['period'],3,4);
            $bulan = (int) SUBSTR($postData['period'],0,2);
        }
        if(isset($postData['tr_date'])){
            $tahun = (int) SUBSTR(revDate($postData['tr_date']),0,4);
            $bulan = (int) SUBSTR(revDate($postData['tr_date']),5,2);
        }
        $tahun2 = $tahun;
        $bulan2 = $bulan + 1;
        if($bulan == 12){
            $tahun2 = $tahun + 1;
            $bulan2 = 1;
        }
        $this->db->trans_begin();

        /*Transaction Buy*/        
        $select = $this->db->query("
                                    SELECT currency_id, nominal 
                                    FROM v_tr_detail 
                                    WHERE status IN (3,4)
                                    AND store_id = $this->store_id
                                    AND tr_id = 1
                                    GROUP BY currency_id, nominal                                    
                                    ORDER BY currency_id,nominal ASC                          
                                    ");
        if(count($select) > 0){
            /******************************************************************************************************/
            $where = array(
                    'store_id' => $this->store_id,
                    'stock_year' => $tahun,
                    'stock_month' => $bulan
            );            
            $this->db->delete('tr_stock', $where);

            /******************************************************************************************************/
            $where = array(
                    'store_id' => $this->store_id,
                    'stock_year' => $tahun2,
                    'stock_month' => $bulan2
            );            
            $this->db->delete('tr_stock', $where);

            /******************************************************************************************************/
            foreach($select->result_array() as $row) {
                $currency_id = $row['currency_id'];
                $nominal = $row['nominal'];
                $this->Bksmdl->generate_tr_stock($this->store_id, $tahun, $bulan, $currency_id, $nominal);
            }
        }
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $err = $this->db->error();
            $json['msg'] = $err['code'] . '<br>' . $err['message'];
            echo json_encode($json);
        } else {
            $this->db->trans_commit();
            $json['msg'] = '1';
            $json['result'] = 'generate stock pull success';
            echo json_encode($json);
        }
    }

}
