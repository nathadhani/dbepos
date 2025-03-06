<?php

class Stock_price extends Bks_Controller {
    

    function __construct() 
    {
        $config = array('modules' => 'stock', 'jsfiles' => array('stock_price'));
        parent::__construct($config);        
        $this->auth = $this->session->userdata( 'auth' );        
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
        $store_id = $this->input->post('store_id');
        $menus = $this->db->group_by('currency_id')
                          ->order_by('currency_id, currency_code, currency_name', 'ASC')
                          ->get_where('v_stock_price', array('store_id' => $store_id))->result();        
        if (count($menus) > 0){
            $option ="<option selected value=''>-- Pilih Mata Uang --</option>";
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

        $store_id = $postData['store_id'];
        $currency_id = $postData['currency_id'];

        $tahun = date('Y');
        $bulan = date('m');
        if(isset($postData['periode'])){
            $tahun = intval(SUBSTR($postData['periode'],3,4));
            $bulan = intval(SUBSTR($postData['periode'],0,2));
        }       

        $where[0]['field'] = 'store_id';
        $where[0]['data']  = $store_id;
        $where[0]['sql']   = 'where';

        $where[1]['field'] = 'stock_year';
        $where[1]['data']  = $tahun;
        $where[1]['sql']   = 'where';

        $where[2]['field'] = 'stock_month';
        $where[2]['data']  = $bulan;
        $where[2]['sql']   = 'where';

        $where[3]['field'] = 'currency_id';
        $where[3]['data']  = $currency_id;
        $where[3]['sql']   = 'where';

        $this->Bksmdl->table = 'v_stock_price';
        $cpData = $this->Bksmdl->getDataTable($where);
        $this->Bksmdl->outputToJson($cpData);
    }
    
    function excel(){
        $this->libauth->check(__METHOD__);
        $store_id = $this->uri->segment(4);
        $tahun = SUBSTR($this->uri->segment(5),3,4);
        $bulan = SUBSTR($this->uri->segment(5),0,2);
        
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
                                        FROM v_stock_price
                                        WHERE store_id = $store_id
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
        $this->excel->setActiveSheetIndex(0)->setCellValue('A1', "Stock In Average Rate Period " . namabulan($bulan) . ' - ' . $tahun ); 
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->mergeCells('A1:O1');

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
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 3, $judul[$key]);
            $this->excel->getActiveSheet()->getStyleByColumnAndRow($col, 3)->applyFromArray($title);
            $col++;
        }

        // Fetching the table data
        $row = 4;
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

        foreach (range('A', 'O') as $columnID) {
            $this->excel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }
        $this->excel->setActiveSheetIndex(0);        
        

        // Sending headers to force the user to download the file
        $filename = 'Stock in Average Rate';
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");;
        header("Content-Disposition: attachment;filename=$filename.xlsx");
        header("Content-Transfer-Encoding: binary ");
        $objWriter = new PHPExcel_Writer_Excel2007($this->excel); 
        $objWriter->setOffice2003Compatibility(true);
        $objWriter->save('php://output');
    }    

}
