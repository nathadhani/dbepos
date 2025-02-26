<?php

class Api_ap_get extends Bks_Controller {

    function __construct() {
        $config = array('modules' => 'api', 'jsfiles' => array('api_ap_get'));
        parent::__construct($config);        
        $this->auth = $this->session->userdata( 'auth' );  
    }
    
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('API - Get');
        $this->template->set('tsmall', 'API');
        $this->template->set('icon', 'fa fa-edit');
        $data['auth'] = $this->auth;
        $this->template->build('api/api_ap_get_v', $data);
    }
    
    function excel(){
        $this->libauth->check(__METHOD__);
        $tanggal = revDate($this->uri->segment(4));
        $company_id = $this->uri->segment(5);
        $store_id = $this->uri->segment(6);
        
        if($store_id !== null && $store_id !== ''){
            $query = $this->db->query("SELECT invoice_number,
                                                transaction_date,
                                                transaction_time,
                                                sequence,
                                                item_id,
                                                item_name,
                                                item_quantity,
                                                item_price_unit,
                                                item_price_amount,
                                                item_total_price_amount,
                                                item_vat,
                                                transaction_amount,
                                                item_barcode,
                                                item_category_name,
                                                item_category_code,
                                                item_unit,
                                                item_discount,
                                                item_tax,
                                                item_total_discount,
                                                item_total_vat,
                                                item_total_tax,
                                                item_total_service_charge,
                                                currency,
                                                rate,
                                                payment_type,
                                                payment_by,
                                                username,
                                                buyer_barcode,
                                                buyer_name,
                                                buyer_flight_no,
                                                buyer_destination,
                                                buyer_nationality,
                                                remark,
                                                invoice_tax,
                                                tax_id,
                                                payment_name,
                                                payment_time,
                                                distance,
                                                journey_time,
                                                store_reference_id,
                                                store_name,
                                                store_address                                                
                                        FROM v_trx_api_ap_get_detail
                                        WHERE transaction_date = '$tanggal'
                                        AND company_id = $company_id
                                        AND store_id = $store_id
                                        ORDER BY store_reference_id, invoice_number, sequence ASC ");
        } else {
            $query = $this->db->query("SELECT invoice_number,
                                                transaction_date,
                                                transaction_time,
                                                sequence,
                                                item_id,
                                                item_name,
                                                item_quantity,
                                                item_price_unit,
                                                item_price_amount,
                                                item_total_price_amount,
                                                item_vat,
                                                transaction_amount,
                                                item_barcode,
                                                item_category_name,
                                                item_category_code,
                                                item_unit,
                                                item_discount,
                                                item_tax,
                                                item_total_discount,
                                                item_total_vat,
                                                item_total_tax,
                                                item_total_service_charge,
                                                currency,
                                                rate,
                                                payment_type,
                                                payment_by,
                                                username,
                                                buyer_barcode,
                                                buyer_name,
                                                buyer_flight_no,
                                                buyer_destination,
                                                buyer_nationality,
                                                remark,
                                                invoice_tax,
                                                tax_id,
                                                payment_name,
                                                payment_time,
                                                distance,
                                                journey_time,
                                                store_reference_id,
                                                store_name,
                                                store_address                                                
                                        FROM v_trx_api_ap_get_detail
                                        WHERE transaction_date = '$tanggal'
                                        AND company_id = $company_id
                                        ORDER BY store_reference_id, invoice_number, sequence ASC ");
        }
        

        if (!$query)
        return false;

        $fields = $query->list_fields();
        $totcol = $query->num_rows();
        $maxrow = $totcol+1;

        // echo $this->db->last_query();exit;

        $this->load->library('excel');
        $this->excel->getProperties()->setTitle("export")->setDescription("none");
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle("API-GetDataTrx");

        $bold = array('font' => array('bold' => true));
        $title = array('font' => array('color' => array('rgb' => 'ffffff'), 'bold' => true), 
                       'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => '337AB7')));

        // Field names in the first row
        $fields = $query->list_fields();
        $col = 0;
        
        // title column
        $this->excel->setActiveSheetIndex(0)->setCellValue('A1', "API - Get Data Transaction " . revDate($tanggal) ); 
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->mergeCells('A1:AP1');

        $judul = array('invoice_number',
                        'transaction_date',
                        'transaction_time',
                        'sequence',
                        'item_id',
                        'item_name',
                        'item_quantity',
                        'item_price_unit',
                        'item_price_amount',
                        'item_total_price_amount',
                        'item_vat',
                        'transaction_amount',
                        'item_barcode',
                        'item_category_name',
                        'item_category_code',
                        'item_unit',
                        'item_discount',
                        'item_tax',
                        'item_total_discount',
                        'item_total_vat',
                        'item_total_tax',
                        'item_total_service_charge',
                        'currency',
                        'rate',
                        'payment_type',
                        'payment_by',
                        'username',
                        'buyer_barcode',
                        'buyer_name',
                        'buyer_flight_no',
                        'buyer_destination',
                        'buyer_nationality',
                        'remark',
                        'invoice_tax',
                        'tax_id',
                        'payment_name',
                        'payment_time',
                        'distance',
                        'journey_time',
                        'store_id',
                        'store_name',
                        'store_address');


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
                $this->excel->getActiveSheet()->getStyle('G'.$row.':'.'V'.$row)->getNumberFormat()->setFormatCode('#,##0'); // Number Format
                $col++;
            }
            $row++;
        }

        foreach (range('A', 'AQ') as $columnID) {
            $this->excel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }
        $this->excel->setActiveSheetIndex(0);
        

        // Sending headers to force the user to download the file
        $filename = 'API - Get Data Transaction ' . revDate($tanggal);
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
