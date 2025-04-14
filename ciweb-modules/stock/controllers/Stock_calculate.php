<?php

class Stock_calculate extends Bks_Controller {    

    function __construct() 
    {
        $config = array('modules' => 'stock', 'jsfiles' => array('stock_calculate'));
        parent::__construct($config);        
        $this->auth = $this->session->userdata( 'auth' );        
    }
    
    function index()
    {
        $this->libauth->check(__METHOD__);
        $this->template->title('Calculate');
        $this->template->set('tsmall', 'Stock');
        $this->template->set('icon', 'fa fa-list');
        $data['auth'] = $this->auth;
        $this->template->build('stock/stock_calculate_v', $data);
    }    

    function generate_tr_stock_pull(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();     
        $store_id = $postData['store_id'];

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
                                    AND store_id = $store_id
                                    AND tr_id = 1
                                    GROUP BY currency_id, nominal                                    
                                    ORDER BY currency_id,nominal ASC                                    
                                    ");
        if(count($select) > 0){
            /******************************************************************************************************/
            $where = array(
                    'store_id' => $store_id,
                    'stock_year' => $tahun,
                    'stock_month' => $bulan
            );            
            $this->db->delete('tr_stock', $where);

            /******************************************************************************************************/
            $where = array(
                    'store_id' => $store_id,
                    'stock_year' => $tahun2,
                    'stock_month' => $bulan2
            );            
            $this->db->delete('tr_stock', $where);

            /******************************************************************************************************/
            foreach($select->result_array() as $row) {
                $currency_id = $row['currency_id'];
                $nominal = $row['nominal'];
                $this->Bksmdl->generate_tr_stock($store_id, $tahun, $bulan, $currency_id, $nominal);
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

    function generate_tr_stock_price(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();        
        $store_id = $postData['store_id'];

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
        $tgl1 = $tahun.'-'.sprintf("%02d", $bulan).'-01';
        
        if($bulan == 1){
            $tahun1 = $tahun - 1;
            $bulan1 = 12;
        }else{
            $tahun1 = $tahun;
            $bulan1 = $bulan - 1;
        }
        
        if($bulan == 12){
            $tahun2 = $tahun + 1;
            $bulan2 = 1;
        } else {
            $tahun2 = $tahun;
            $bulan2 = $bulan + 1;
        }        

        $mcurrency = $this->db->query("
                                    SELECT x.currency_id 
                                    FROM v_tr_detail x
                                    WHERE x.status IN (3,4)
                                    AND x.store_id = $store_id 
                                    GROUP BY x.currency_id
                                    ORDER BY currency_id ASC                                    
                                    ");

        // $mcurrency = $this->db->select('currency_id')
        //                    ->where('store_id' => $store_id))
        //                    ->where_in('status', ['3','4'])
        //                    ->group_by('currency_id')
        //                    ->order_by('currency_id')
        //                    ->get('v_tr_detail');
        // if($mcurrency->num_rows()){
        if(count($mcurrency) > 0){
            /** Delete Reccord */
            /***************************************************************************************************************** */
            $where = array(
                    'store_id' => $store_id,
                    'stock_year' => $tahun,
                    'stock_month' => $bulan
            );
            $this->db->trans_begin();
            $this->db->delete('tr_stock_price', $where);            
            foreach($mcurrency->result_array() as $row) {
                $id = 0;
                $currency_id = $row['currency_id'];                

                /** Get Beginning Stock */
                /***************************************************************************************************************** */
                $select_max_date = $this->db->query("SELECT MAX(stock_date) AS max_date
                                                     FROM tr_stock_price 
                                                     WHERE store_id = $store_id 
                                                     AND currency_id = $currency_id 
                                                     AND YEAR(stock_date) = $tahun1 
                                                     AND MONTH(stock_date) = $bulan1")->result();                
                $buy_amount = 0;
                $buy_total = 0;
                $last_stock_amount = 0;
                $last_price_amount = 0;
                $last_price_total = 0;
                if(count($select_max_date) > 0) {
                    $max_date = $select_max_date[0]->max_date;
                    if($max_date !== null) {
                        $select_max_id = $this->db->query("SELECT MAX(id) AS max_id
                                                     FROM tr_stock_price 
                                                     WHERE store_id = $store_id 
                                                     AND currency_id = $currency_id 
                                                     AND stock_date = '$max_date'")->result();                    
                        if(count($select_max_id) > 0) {
                            $max_id = $select_max_id[0]->max_id;
                            if($max_id !== null) {
                                $select_last_stock = $this->db->query("SELECT stock_last_amount,
                                                                        stock_last_price,
                                                                        stock_last_total
                                                        FROM tr_stock_price 
                                                        WHERE store_id = $store_id 
                                                        AND currency_id = $currency_id 
                                                        AND stock_date = '$max_date'
                                                        AND id = $max_id")->result();
                                if(count($select_last_stock) > 0) {
                                    if($select_last_stock[0]->stock_last_amount > 0) {                                        
                                        $id++;
                                        $data = array(            
                                            'id' => $id,                                            
                                            'store_id' => $store_id,
                                            'stock_date' => $tgl1,
                                            'stock_year' => $tahun,
                                            'stock_month' => $bulan,
                                            'currency_id' => $currency_id,                                
                                            'stock_last_amount' => $select_last_stock[0]->stock_last_amount,
                                            'stock_last_price' => $select_last_stock[0]->stock_last_price,
                                            'stock_last_total' => $select_last_stock[0]->stock_last_total,                              
                                            'created' => date('Y-m-d H:i:s', time()),
                                            'createdby' => $this->auth['id']
                                        );
                                        if(count($data) > 0){                                        
                                            $response = $this->db->insert('tr_stock_price', $data);
                                            /***************************************************************************************************************** */
                                            /*Update last stock*/
                                            $last_stock_amount = $select_last_stock[0]->stock_last_amount;
                                            $last_price_amount = $select_last_stock[0]->stock_last_price;
                                            $last_price_total = $select_last_stock[0]->stock_last_total;                                            
                                            $data = array('stock_last_amount' => $last_stock_amount,
                                                          'stock_last_price' => $last_price_amount,
                                                          'stock_last_total' => $last_price_total);                        
                                            if(count($data) > 0){
                                                $where = array('id' => $id, 'currency_id' => $currency_id);
                                                $this->db->update('tr_stock_price', $data, $where);                
                                            }
                                        }
                                    }
                                }
                            }                            
                        }
                    }                    
                }

                /** Get Transaction */
                /***************************************************************************************************************** */
                $tanggal_awal = date($tgl1,time());
                $tanggal_akhir = date('Y-m-t',mktime(0, 0, 0, $bulan + 1, 0, $tahun));
                $maxday = date('d', strtotime($tanggal_akhir));
                $buy_amount = 0;
                $sell_amount = 0;
                // var_dump($tanggal_awal . ' s/d ' .$tanggal_akhir . ' maxday ' . $maxday);exit;
                for ($tgl = 1; $tgl <= $maxday; $tgl++) {
                    $tr_date = $tahun.'-'.sprintf("%02d", $bulan).'-'. sprintf("%02d", $tgl);
                    /***************************************************************************************************************** */
                    /*Get Transaction Buy*/
                    $trxbuy = $this->db->select('tr_date, currency_id, header_id, nominal, SUM(sheet) AS sheet, price')
                                    ->where(array('store_id' => $store_id, 'tr_date' => $tr_date, 'tr_id' => 1, 'currency_id' => $currency_id))
                                    ->where_in('status', ['3','4'])
                                    ->group_by('tr_date, currency_id, header_id, price')
                                    ->get('v_tr_detail');
                    // echo $this->db->last_query();exit;
                    if($trxbuy->num_rows()){
                        foreach($trxbuy->result_array() as $row) {                            
                            $id++;
                            $data = array(                  
                                'id' => $id,                                
                                'store_id' => $store_id,
                                'stock_date' => $row['tr_date'],
                                'stock_year' => $tahun,
                                'stock_month' => $bulan,
                                'currency_id' => $row['currency_id'],                                
                                'buy_tr_header_id' => $row['header_id'],
                                'buy_amount' => $row['nominal'] * $row['sheet'],
                                'buy_price' => $row['price'],                              
                                'buy_total' => ($row['nominal'] * $row['sheet']) * $row['price'],                            
                                'created' => date('Y-m-d H:i:s', time()),
                                'createdby' => $this->auth['id']
                            );
                            if(count($data) > 0){
                                $response = $this->db->insert('tr_stock_price', $data);
                                /***************************************************************************************************************** */
                                /*Update last stock*/
                                $buy_amount = $row['nominal'] * $row['sheet'];
                                $buy_total = ($row['nominal'] * $row['sheet']) * $row['price'];
                                $last_price_amount = ROUND(($last_price_total + $buy_total) / ($last_stock_amount + $buy_amount),2);
                                $last_stock_amount = $last_stock_amount + $buy_amount;
                                $last_price_total = $last_stock_amount * $last_price_amount;                                
                                $data = array('stock_last_amount' => $last_stock_amount,
                                              'stock_last_price' => $last_price_amount,
                                              'stock_last_total' => $last_price_total);
                                if(count($data) > 0){
                                    $where = array('id' => $id, 'currency_id' => $currency_id);
                                    $this->db->update('tr_stock_price', $data, $where);                
                                }
                            }
                        }                
                    }

                    /***************************************************************************************************************** */
                    /*Get Transaction Sell*/
                    $trxsell = $this->db->select('tr_date, currency_id, header_id, nominal, SUM(sheet) AS sheet, price')
                                    ->where(array('store_id' => $store_id, 'tr_date' => $tr_date, 'tr_id' => 2, 'currency_id' => $currency_id))
                                    ->where_in('status', ['3','4'])
                                    ->group_by('tr_date, currency_id, header_id, price')
                                    ->get('v_tr_detail');
                    if($trxsell->num_rows()){
                        foreach($trxsell->result_array() as $row) {                            
                            $id++;
                            $data = array(               
                                'id' => $id,                                
                                'store_id' => $store_id,   
                                'stock_date' => $row['tr_date'],
                                'stock_year' => $tahun,
                                'stock_month' => $bulan,
                                'currency_id' => $row['currency_id'],                                
                                'sell_tr_header_id' => $row['header_id'],
                                'sell_amount' => $row['nominal'] * $row['sheet'],
                                'sell_price' => $row['price'],                              
                                'sell_total' => ($row['nominal'] * $row['sheet']) * $row['price'],
                                'created' => date('Y-m-d H:i:s', time()),
                                'createdby' => $this->auth['id']
                            );
                            if(count($data) > 0){
                                $response = $this->db->insert('tr_stock_price', $data);
                                /***************************************************************************************************************** */
                                /*Update last stock*/
                                $sell_amount = $row['nominal'] * $row['sheet'];
                                $sell_total = ($row['nominal'] * $row['sheet']) * $row['price'];
                                $last_price_amount = ROUND(($last_price_total + $buy_total) / ($last_stock_amount + $buy_amount),2);
                                $last_stock_amount = $last_stock_amount - $sell_amount;
                                $last_price_total = $last_stock_amount * $last_price_amount;
                                $sell_average_total = $last_price_amount * $sell_amount;         
                                $profit = $sell_total - $sell_average_total;             
                                $data = array('stock_last_amount' => $last_stock_amount,
                                              'stock_last_price' => $last_price_amount,
                                              'stock_last_total' => $last_price_total,
                                              'sell_average_total' => $sell_average_total,
                                              'profit' => $profit);
                                if(count($data) > 0){
                                    $where = array('id' => $id, 'currency_id' => $currency_id);
                                    $this->db->update('tr_stock_price', $data, $where);          
                                }
                            }
                        }     
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
                    $json['result'] = 'generate price average success';
                    echo json_encode($json);
                }
            }
        }             

    }

}
