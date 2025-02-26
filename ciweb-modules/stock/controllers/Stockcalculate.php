<?php

class Stockcalculate extends Bks_Controller {    

    function __construct() 
    {
        $config = array('modules' => 'stock', 'jsfiles' => array('stockcalculate'));
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
        $this->template->build('stock/stockcalculate_v', $data);
    }    

    function generate_stock_pull(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();     

        $company_id = $postData['company_id'];
        $store_id = $postData['store_id'];

        $tahun = (int) date('Y');
        $bulan = (int) date('m');
        if(isset($postData['periode'])){
            $tahun = (int) SUBSTR($postData['periode'],3,4);
            $bulan = (int) SUBSTR($postData['periode'],0,2);
        }
        $tahun2 = $tahun;
        $bulan2 = $bulan + 1;
        if($bulan == 12){
            $tahun2 = $tahun + 1;
            $bulan2 = 1;
        }
        $this->db->trans_begin();
        $select = $this->db->query("
                                    SELECT valas_id, nominal 
                                    FROM v_tr_detail 
                                    WHERE status IN (1,3,4) 
                                    AND company_id = $company_id
                                    AND store_id = $store_id
                                    AND tr_id = 1
                                    GROUP BY valas_id, nominal                                    
                                    UNION                                    
                                    SELECT valas_id, nominal 
                                    FROM v_inventory_detail
                                    WHERE status IN (3)                            
                                    AND company_id = $company_id
                                    AND store_id = $store_id
                                    AND tr_id = 3
                                    GROUP BY valas_id, nominal
                                    ORDER BY valas_id,nominal ASC                                    
                                    ");
        if(count($select) > 0){
            /******************************************************************************************************/
            $where = array(
                    'company_id' => $company_id,
                    'store_id' => $store_id,
                    'stock_year' => $tahun,
                    'stock_month' => $bulan
            );            
            $this->db->delete('stock', $where);

            /******************************************************************************************************/
            $where = array(
                    'company_id' => $company_id,
                    'store_id' => $store_id,
                    'stock_year' => $tahun2,
                    'stock_month' => $bulan2
            );            
            $this->db->delete('stock', $where);

            /******************************************************************************************************/
            foreach($select->result_array() as $row) {
                $valas_id = $row['valas_id'];
                $nominal = $row['nominal'];
                $this->Bksmdl->generate_stock($company_id, $store_id, $tahun, $bulan, $valas_id, $nominal);
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

    function generate_stock_price_average(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();     

        $company_id = $postData['company_id'];
        $store_id = $postData['store_id'];

        $tahun = (int) date('Y');
        $bulan = (int) date('m');
        if(isset($postData['periode'])){
            $tahun = (int) SUBSTR($postData['periode'],3,4);
            $bulan = (int) SUBSTR($postData['periode'],0,2);
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

        $mvalas = $this->db->query("
                                    SELECT x.valas_id 
                                    FROM v_tr_detail x
                                    WHERE x.status IN (1,3) 
                                    AND x.company_id = $company_id 
                                    AND x.store_id = $store_id 
                                    GROUP BY x.valas_id
                                    UNION                                    
                                    SELECT y.valas_id
                                    FROM v_inventory_detail y
                                    WHERE y.status IN (3) 
                                    AND y.company_id = $company_id 
                                    AND y.store_id = $store_id
                                    AND NOT EXISTS
                                    (
                                        SELECT valas_id FROM v_tr_detail
                                        WHERE status IN (1,3) 
                                        AND company_id = $company_id 
                                        AND store_id = $store_id
                                        AND valas_id = y.valas_id
                                    ) 
                                    GROUP BY valas_id
                                    ORDER BY valas_id ASC                                    
                                    ");

        // $mvalas = $this->db->select('valas_id')
        //                    ->where(array('company_id' => $company_id, 'store_id' => $store_id))
        //                    ->where_in('status', ['1','3'])
        //                    ->group_by('valas_id')
        //                    ->order_by('valas_id')
        //                    ->get('v_tr_detail');
        // if($mvalas->num_rows()){
        if(count($mvalas) > 0){
            /** Delete Reccord */
            /***************************************************************************************************************** */
            $where = array(
                    'company_id' => $company_id,
                    'store_id' => $store_id,
                    'stock_year' => $tahun,
                    'stock_month' => $bulan
            );
            $this->db->trans_begin();
            $this->db->delete('stock_price_average', $where);
            foreach($mvalas->result_array() as $row) {
                $id = 0;
                $valas_id = $row['valas_id'];                

                /** Get Beginning Stock */
                /***************************************************************************************************************** */
                $select_max_date = $this->db->query("SELECT MAX(stock_date) AS max_date
                                                     FROM stock_price_average 
                                                     WHERE valas_id = $valas_id 
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
                                                     FROM stock_price_average 
                                                     WHERE valas_id = $valas_id 
                                                     AND stock_date = '$max_date'")->result();                    
                        if(count($select_max_id) > 0) {
                            $max_id = $select_max_id[0]->max_id;
                            if($max_id !== null) {
                                $select_last_stock = $this->db->query("SELECT stock_last_amount,
                                                                        stock_last_price,
                                                                        stock_last_total
                                                        FROM stock_price_average 
                                                        WHERE valas_id = $valas_id 
                                                        AND stock_date = '$max_date'
                                                        AND id = $max_id")->result();
                                if(count($select_last_stock) > 0) {
                                    if($select_last_stock[0]->stock_last_amount > 0) {                                        
                                        $id++;
                                        $data = array(            
                                            'id' => $id,
                                            'company_id' => $company_id,
                                            'store_id' => $store_id,
                                            'stock_date' => $tgl1,
                                            'stock_year' => $tahun,
                                            'stock_month' => $bulan,
                                            'valas_id' => $valas_id,                                
                                            'stock_last_amount' => $select_last_stock[0]->stock_last_amount,
                                            'stock_last_price' => $select_last_stock[0]->stock_last_price,
                                            'stock_last_total' => $select_last_stock[0]->stock_last_total,                              
                                            'created' => date('Y-m-d H:i:s', time()),
                                            'createdby' => $this->auth['id']
                                        );
                                        if(count($data) > 0){                                        
                                            $response = $this->db->insert('stock_price_average', $data);
                                            /***************************************************************************************************************** */
                                            /*Update last stock*/
                                            $last_stock_amount = $select_last_stock[0]->stock_last_amount;
                                            $last_price_amount = $select_last_stock[0]->stock_last_price;
                                            $last_price_total = $select_last_stock[0]->stock_last_total;                                            
                                            $data = array('stock_last_amount' => $last_stock_amount,
                                                          'stock_last_price' => $last_price_amount,
                                                          'stock_last_total' => $last_price_total);                        
                                            if(count($data) > 0){
                                                $where = array('id' => $id, 'valas_id' => $valas_id);
                                                $this->db->update('stock_price_average', $data, $where);                
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
                $tanggal_akhir = date($tahun."-".$bulan."-t",time());
                $maxday = date('d', strtotime($tanggal_akhir));
                $buy_amount = 0;
                $sale_amount = 0;      
                for ($tgl = 1; $tgl <= $maxday; $tgl++) {        
                    $tr_date = $tahun.'-'.sprintf("%02d", $bulan).'-'. sprintf("%02d", $tgl);
                    /***************************************************************************************************************** */
                    /*Get Inventory In*/
                    $trxbuy = $this->db->select('tr_date, valas_id, header_id, nominal, sheet, price, subtotal')
                                    ->where(array('tr_date' => $tr_date, 'tr_id' => 3, 'valas_id' => $valas_id))
                                    ->where_in('status', ['3'])
                                    ->get('v_inventory_detail');
                    if($trxbuy->num_rows()){
                        foreach($trxbuy->result_array() as $row) {                            
                            $id++;
                            $data = array(                  
                                'id' => $id,
                                'company_id' => $company_id,
                                'store_id' => $store_id,
                                'stock_date' => $row['tr_date'],
                                'stock_year' => $tahun,
                                'stock_month' => $bulan,
                                'valas_id' => $row['valas_id'],                                
                                'buy_tr_header_id' => $row['header_id'],
                                'buy_amount' => $row['nominal'] * $row['sheet'],
                                'buy_price' => $row['price'],                              
                                'buy_total' => ($row['nominal'] * $row['sheet']) * $row['price'],                            
                                'created' => date('Y-m-d H:i:s', time()),
                                'createdby' => $this->auth['id']
                            );
                            if(count($data) > 0){
                                $response = $this->db->insert('stock_price_average', $data);
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
                                    $where = array('id' => $id, 'valas_id' => $valas_id);
                                    $this->db->update('stock_price_average', $data, $where);                
                                }
                            }
                        }                
                    }

                    /***************************************************************************************************************** */
                    /*Get Inventory Out*/
                    $trxbuy = $this->db->select('tr_date, valas_id, header_id, nominal, sheet, price, subtotal')
                                    ->where(array('tr_date' => $tr_date, 'tr_id' => 4, 'valas_id' => $valas_id))
                                    ->where_in('status', ['3'])
                                    ->get('v_inventory_detail');
                    if($trxbuy->num_rows()){
                        foreach($trxbuy->result_array() as $row) {                            
                            $id++;
                            $data = array(               
                                'id' => $id,
                                'company_id' => $company_id,
                                'store_id' => $store_id,   
                                'stock_date' => $row['tr_date'],
                                'stock_year' => $tahun,
                                'stock_month' => $bulan,
                                'valas_id' => $row['valas_id'],                                
                                'sale_tr_header_id' => $row['header_id'],
                                'sale_amount' => $row['nominal'] * $row['sheet'],
                                'sale_price' => $row['price'],                              
                                'sale_total' => ($row['nominal'] * $row['sheet']) * $row['price'],
                                'created' => date('Y-m-d H:i:s', time()),
                                'createdby' => $this->auth['id']
                            );
                            if(count($data) > 0){
                                $response = $this->db->insert('stock_price_average', $data);
                                /***************************************************************************************************************** */
                                /*Update last stock*/
                                $sale_amount = $row['nominal'] * $row['sheet'];
                                $sale_total = ($row['nominal'] * $row['sheet']) * $row['price'];
                                $last_price_amount = ROUND(($last_price_total + $buy_total) / ($last_stock_amount + $buy_amount),2);
                                $last_stock_amount = $last_stock_amount - $sale_amount;
                                $last_price_total = $last_stock_amount * $last_price_amount;
                                $sale_average_total = $last_price_amount * $sale_amount;         
                                $profit = $sale_total - $sale_average_total;             
                                $data = array('stock_last_amount' => $last_stock_amount,
                                              'stock_last_price' => $last_price_amount,
                                              'stock_last_total' => $last_price_total,
                                              'sale_average_total' => $sale_average_total,
                                              'profit' => $profit);
                                if(count($data) > 0){
                                    $where = array('id' => $id, 'valas_id' => $valas_id);
                                    $this->db->update('stock_price_average', $data, $where);          
                                }
                            }
                        }     
                    }

                    /***************************************************************************************************************** */
                    /*Get Transaction Buy*/
                    $trxbuy = $this->db->select('tr_date, valas_id, header_id, nominal, sheet, price, subtotal')
                                    ->where(array('tr_date' => $tr_date, 'tr_id' => 1, 'valas_id' => $valas_id))
                                    ->where_in('status', ['1','3'])
                                    ->get('v_tr_detail');
                    if($trxbuy->num_rows()){
                        foreach($trxbuy->result_array() as $row) {                            
                            $id++;
                            $data = array(                  
                                'id' => $id,
                                'company_id' => $company_id,
                                'store_id' => $store_id,
                                'stock_date' => $row['tr_date'],
                                'stock_year' => $tahun,
                                'stock_month' => $bulan,
                                'valas_id' => $row['valas_id'],                                
                                'buy_tr_header_id' => $row['header_id'],
                                'buy_amount' => $row['nominal'] * $row['sheet'],
                                'buy_price' => $row['price'],                              
                                'buy_total' => ($row['nominal'] * $row['sheet']) * $row['price'],                            
                                'created' => date('Y-m-d H:i:s', time()),
                                'createdby' => $this->auth['id']
                            );
                            if(count($data) > 0){
                                $response = $this->db->insert('stock_price_average', $data);
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
                                    $where = array('id' => $id, 'valas_id' => $valas_id);
                                    $this->db->update('stock_price_average', $data, $where);                
                                }
                            }
                        }                
                    }

                    /***************************************************************************************************************** */
                    /*Get Transaction Sale*/
                    $trxbuy = $this->db->select('tr_date, valas_id, header_id, nominal, sheet, price, subtotal')
                                    ->where(array('tr_date' => $tr_date, 'tr_id' => 2, 'valas_id' => $valas_id))
                                    ->where_in('status', ['1','3'])
                                    ->get('v_tr_detail');
                    if($trxbuy->num_rows()){
                        foreach($trxbuy->result_array() as $row) {                            
                            $id++;
                            $data = array(               
                                'id' => $id,
                                'company_id' => $company_id,
                                'store_id' => $store_id,   
                                'stock_date' => $row['tr_date'],
                                'stock_year' => $tahun,
                                'stock_month' => $bulan,
                                'valas_id' => $row['valas_id'],                                
                                'sale_tr_header_id' => $row['header_id'],
                                'sale_amount' => $row['nominal'] * $row['sheet'],
                                'sale_price' => $row['price'],                              
                                'sale_total' => ($row['nominal'] * $row['sheet']) * $row['price'],
                                'created' => date('Y-m-d H:i:s', time()),
                                'createdby' => $this->auth['id']
                            );
                            if(count($data) > 0){
                                $response = $this->db->insert('stock_price_average', $data);
                                /***************************************************************************************************************** */
                                /*Update last stock*/
                                $sale_amount = $row['nominal'] * $row['sheet'];
                                $sale_total = ($row['nominal'] * $row['sheet']) * $row['price'];
                                $last_price_amount = ROUND(($last_price_total + $buy_total) / ($last_stock_amount + $buy_amount),2);
                                $last_stock_amount = $last_stock_amount - $sale_amount;
                                $last_price_total = $last_stock_amount * $last_price_amount;
                                $sale_average_total = $last_price_amount * $sale_amount;         
                                $profit = $sale_total - $sale_average_total;             
                                $data = array('stock_last_amount' => $last_stock_amount,
                                              'stock_last_price' => $last_price_amount,
                                              'stock_last_total' => $last_price_total,
                                              'sale_average_total' => $sale_average_total,
                                              'profit' => $profit);
                                if(count($data) > 0){
                                    $where = array('id' => $id, 'valas_id' => $valas_id);
                                    $this->db->update('stock_price_average', $data, $where);          
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
