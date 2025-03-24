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
    
    function getdata() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();    
        $this->store_id = ( is_array($postData['store_id']) ? implode(',', $postData['store_id']) : $postData['store_id']);
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

        $this->Bksmdl->table = 'v_tr_stock_balance';
        $cpData = $this->Bksmdl->getDataTable($where);
        $this->Bksmdl->outputToJson($cpData);
    }
    
    function excel(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $this->store_id = ( is_array($postData['store_id']) ? implode(',', $postData['store_id']) : $postData['store_id']);
        $tahun = date('Y');
        $bulan = date('m');
        if(isset($postData['period'])){
            $tahun = intval(SUBSTR($postData['period'],3,4));
            $bulan = intval(SUBSTR($postData['period'],0,2));
        }        
        
        $profil_usaha = $this->Bksmdl->getprofilusaha($this->store_id);

        $query = $this->db->query("SELECT CONCAT(currency_code,' - ',currency_name) AS currency_code,
                                                nominal,
                                                beginning_stock_sheet,
                                                buy_sheet,
                                                sell_sheet,
                                                sell_alocation_sheet,
                                                last_stock_sheet,
                                                IF( last_stock_sheet > 0 , (nominal * last_stock_sheet), 0) AS last_stock_amount,
                                                store_name,
                                                store_address,
                                                IF(updated IS NULL, created, updated) AS updated
                                        FROM v_tr_stock_balance
                                        WHERE store_id IN ($this->store_id)
                                        AND stock_year = $tahun
                                        AND stock_month = $bulan
                                        ORDER BY currency_id ASC ");        

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
        if(!is_array($postData['store_id'])){
            $this->excel->setActiveSheetIndex(0)->setCellValue('A2', strtoupper(trim($profil_usaha[0]->store_address))); 
            $this->excel->setActiveSheetIndex(0)->setCellValue('A3', "Stock in sheet period " . namabulan($bulan) . ' - ' . $tahun); 
            $this->excel->getActiveSheet()->getStyle('A1:A3')->getFont()->setBold(TRUE);
            $this->excel->getActiveSheet()->getStyle('A1:A3')->getFont()->setSize(11);
            $this->excel->getActiveSheet()->mergeCells('A1:K1');
            $this->excel->getActiveSheet()->mergeCells('A2:K2');
            $this->excel->getActiveSheet()->mergeCells('A3:K3');    
        } else {
            $this->excel->setActiveSheetIndex(0)->setCellValue('A2', "Konsolidasi Stock in sheet period " . namabulan($bulan) . ' - ' . $tahun); 
            $this->excel->getActiveSheet()->getStyle('A1:A2')->getFont()->setBold(TRUE);
            $this->excel->getActiveSheet()->getStyle('A1:A2')->getFont()->setSize(11);
            $this->excel->getActiveSheet()->mergeCells('A1:K1');
            $this->excel->getActiveSheet()->mergeCells('A2:K2');
        }

        $judul = array('Currency',
                        'Nominal',
                        'Beginning Sheet',
                        'Buy Sheet',
                        'Sell Sheet',
                        'Task Sheet',
                        'Balance Sheet',
                        'Balance Amount',
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
                $this->excel->getActiveSheet()->getStyle('B'.$row.':'.'H'.$row)->getNumberFormat()->setFormatCode('#,##0'); // Number Format
                $col++;
            }
            $row++;
        }

        foreach (range('A', 'L') as $columnID) {
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
        die(json_encode($response));
    }    

}
