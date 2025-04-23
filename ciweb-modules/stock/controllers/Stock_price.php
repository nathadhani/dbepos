<?php

class Stock_price extends Bks_Controller {
    

    function __construct() 
    {
        $config = array('modules' => 'stock', 'jsfiles' => array('stock_price'));
        parent::__construct($config);        
        $this->auth = $this->session->userdata( 'auth' );
        $this->store_id = $this->auth['store_id'];       
    }
    
    function index()
    {
        $this->libauth->check(__METHOD__);
        $this->template->title('Stock in Avg Rate');
        $this->template->set('tsmall', 'Stock');
        $this->template->set('icon', 'fa fa-list');
        $data['auth'] = $this->auth;
        $this->template->build('stock/stock_price_v', $data);
    }

    function getcurrencystock() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        
        if(isset($postData['store_id'])){
            $this->store_id = $postData['store_id'];
        } else {
            $this->store_id = $this->auth['store_id'];
        }

        $menus = $this->db->group_by('currency_id')
                          ->order_by('currency_id, currency_code, currency_name', 'ASC')
                          ->get_where('v_tr_stock_balance_price', array('store_id' => $this->store_id))->result();
        if (count($menus) > 0){
            $option ="<option selected value=''>Pilih...</option>";
            foreach($menus as $row){
                $option.="<option value='".$row->currency_id."'>".$row->currency_code . " - " . $row->currency_name ."</option>";
            }
            echo $option;
        }
    }
    
    function getdata() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        
        if(isset($postData['store_id'])){
            $this->store_id = $postData['store_id'];
        } else {
            $this->store_id = $this->auth['store_id'];
        }
        
        $currency_id = $postData['currency_id'];
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

        $where[3]['field'] = 'currency_id';
        $where[3]['data']  = $currency_id;
        $where[3]['sql']   = 'where';

        $this->Bksmdl->table = 'v_tr_stock_balance_price';
        $cpData = $this->Bksmdl->getDataTable($where);
        $this->Bksmdl->outputToJson($cpData);
    }
    
    function excel(){
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
        
        $profil_usaha = $this->Bksmdl->getprofilusaha($this->store_id);

        $query = $this->db->query("SELECT CONCAT(currency_code,' - ',currency_name) AS currency_code,
                                                stock_date,                                                
                                                buy_tr_number,
                                                buy_amount,
                                                buy_price,
                                                buy_total,
                                                sell_tr_number,
                                                sell_amount,
                                                sell_price,
                                                sell_total,
                                                stock_last_amount,                                                
                                                stock_last_price,
                                                stock_last_total,
                                                profit,
                                                store_name,
                                                store_address,
                                                created
                                        FROM v_tr_stock_balance_price
                                        WHERE store_id IN ($this->store_id)
                                        AND stock_year = $tahun
                                        AND stock_month = $bulan
                                        ORDER BY currency_id, stock_date, id ASC ");
        

        if (!$query)
        return false;

        $fields = $query->list_fields();
        $totcol = $query->num_rows();
        $maxrow = $totcol+1;

        // echo $this->db->last_query();exit;

        $this->load->library('excel');
        $this->excel->getProperties()->setTitle("export")->setDescription("none");
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle("temp");

        $bold = array('font' => array('bold' => true));
        $title = array('font' => array('color' => array('rgb' => 'ffffff'), 'bold' => true), 
                       'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => '337AB7')));

        // Field names in the first row
        $fields = $query->list_fields();
        $col = 0;
        
        // title column
        $this->excel->setActiveSheetIndex(0)->setCellValue('A1', strtoupper(trim($profil_usaha[0]->store_name)));        
        $this->excel->setActiveSheetIndex(0)->setCellValue('A2', strtoupper(trim($profil_usaha[0]->store_address))); 
        $this->excel->setActiveSheetIndex(0)->setCellValue('A3', "Stock in averege price period " . namabulan($bulan) . ' - ' . $tahun); 
        $this->excel->getActiveSheet()->getStyle('A1:A3')->getFont()->setBold(TRUE);
        $this->excel->getActiveSheet()->getStyle('A1:A3')->getFont()->setSize(11);
        $this->excel->getActiveSheet()->mergeCells('A1:K1');
        $this->excel->getActiveSheet()->mergeCells('A2:K2');
        $this->excel->getActiveSheet()->mergeCells('A3:K3');
        
        $judul = array('Currency',
                        'Date',                        
                        'Buy Number',
                        'Buy Amount',
                        'Buy Price',                        
                        'Buy Equivalent',
                        'Sell Number',
                        'Sell Amount',
                        'Sell Price',
                        'Sell Equivalent',                        
                        'Balance Stock Amount',
                        'Avg Price',
                        'Balance Stock Equivalent',
                        'Gross Profit',
                        'Store Name',                        
                        'Store Address',
                        'Updated');        

        foreach ($fields as $key => $field) {
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 5, $judul[$key]);
            $this->excel->getActiveSheet()->getStyleByColumnAndRow($col, 5)->applyFromArray($title);
            $col++;
        }

        // Fetching the table data
        $row = 6;
        foreach ($query->result_array() as $data) {
            $col = 0;
            foreach ($fields as $field) {
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data[$field]); // Retreive Data Value                
                $this->excel->getActiveSheet()->getStyle('D'.$row.':'.'F'.$row)->getNumberFormat()->setFormatCode('#,##0'); // Number Format
                $this->excel->getActiveSheet()->getStyle('H'.$row.':'.'N'.$row)->getNumberFormat()->setFormatCode('#,##0'); // Number Format
                $col++;
            }
            $row++;
        }

        foreach (range('A', 'Q') as $columnID) {
            $this->excel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }
        $this->excel->setActiveSheetIndex(0);        
        

        // Sending headers to force the user to download the file
        ob_start();
        $objWriter = new PHPExcel_Writer_Excel2007($this->excel); 
        // $objWriter->setOffice2003Compatibility(true);
        $objWriter->save('php://output');
        $xlsData = ob_get_contents();
        ob_end_clean();
        $response =  array(
            'op' => 'ok',
            'file' => "data:application/vnd.ms-excel;base64,".base64_encode($xlsData)
        );
        die(json_encode($response));;
    }

    function generate_tr_stock_price(){
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
                                    AND x.store_id = $this->store_id 
                                    GROUP BY x.currency_id
                                    ORDER BY currency_id ASC                                    
                                    ");

        // $mcurrency = $this->db->select('currency_id')
        //                    ->where('store_id' => $this->store_id))
        //                    ->where_in('status', ['3','4'])
        //                    ->group_by('currency_id')
        //                    ->order_by('currency_id')
        //                    ->get('v_tr_detail');
        // if($mcurrency->num_rows()){
        if(count($mcurrency) > 0){
            /** Delete Reccord */
            /***************************************************************************************************************** */
            $where = array(
                    'store_id' => $this->store_id,
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
                                                     WHERE store_id = $this->store_id 
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
                                                     WHERE store_id = $this->store_id 
                                                     AND currency_id = $currency_id 
                                                     AND stock_date = '$max_date'")->result();                    
                        if(count($select_max_id) > 0) {
                            $max_id = $select_max_id[0]->max_id;
                            if($max_id !== null) {
                                $select_last_stock = $this->db->query("SELECT stock_last_amount,
                                                                        stock_last_price,
                                                                        stock_last_total
                                                        FROM tr_stock_price 
                                                        WHERE store_id = $this->store_id 
                                                        AND currency_id = $currency_id 
                                                        AND stock_date = '$max_date'
                                                        AND id = $max_id")->result();
                                if(count($select_last_stock) > 0) {
                                    if($select_last_stock[0]->stock_last_amount > 0) {                                        
                                        $id++;
                                        $data = array(            
                                            'id' => $id,                                            
                                            'store_id' => $this->store_id,
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
                                    ->where(array('store_id' => $this->store_id, 'tr_date' => $tr_date, 'tr_id' => 1, 'currency_id' => $currency_id))
                                    ->where_in('status', ['3','4'])
                                    ->group_by('tr_date, currency_id, header_id, price')
                                    ->get('v_tr_detail');
                    // echo $this->db->last_query();exit;
                    if($trxbuy->num_rows()){
                        foreach($trxbuy->result_array() as $row) {                            
                            $id++;
                            $data = array(                  
                                'id' => $id,                                
                                'store_id' => $this->store_id,
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
                                    ->where(array('store_id' => $this->store_id, 'tr_date' => $tr_date, 'tr_id' => 2, 'currency_id' => $currency_id))
                                    ->where_in('status', ['3','4'])
                                    ->group_by('tr_date, currency_id, header_id, price')
                                    ->get('v_tr_detail');
                    if($trxsell->num_rows()){
                        foreach($trxsell->result_array() as $row) {                            
                            $id++;
                            $data = array(               
                                'id' => $id,                                
                                'store_id' => $this->store_id,   
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
