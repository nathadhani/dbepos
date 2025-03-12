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

        /*
         SELECT
            tr_api_get.id AS id,
            tr_api_get.store_id AS store_id,
            tr_api_get.tr_id AS tr_id,
            tr_header.id AS tr_number,
            tr_api_get.invoice_number AS invoice_number,
            tr_api_get.transaction_date AS transaction_date,
            tr_api_get.transaction_time AS transaction_time,
            tr_api_get.created AS created,
            tr_api_get.updated AS updated,
            tr_api_get.createdby AS createdby,
            tr_api_get.updatedby AS updatedby,
            auth_users.fullname AS createdby_name,
            tr_api_get.sequence AS sequence,
            tr_api_get.item_code AS item_id,
            m_currency.currency_code AS item_code,
            tr_api_get.item_name AS item_name,
            tr_api_get.item_quantity AS item_quantity,
            tr_api_get.item_price_unit AS item_price_unit,
            tr_api_get.item_price_amount AS item_price_amount,
            tr_api_get.item_total_price_amount AS item_total_price_amount,
            tr_api_get.item_vat AS item_vat,
            tr_api_get.transaction_amount AS transaction_amount,
            tr_api_get.item_barcode AS item_barcode,
            tr_api_get.item_category_name AS item_category_name,
            tr_api_get.item_category_code AS item_category_code,
            tr_api_get.item_unit AS item_unit,
            tr_api_get.item_discount AS item_discount,
            tr_api_get.item_tax AS item_tax,
            tr_api_get.item_total_discount AS item_total_discount,
            tr_api_get.item_total_vat AS item_total_vat,
            tr_api_get.item_total_tax AS item_total_tax,
            tr_api_get.item_total_service_charge AS item_total_service_charge,
            tr_api_get.currency AS currency,
            tr_api_get.rate AS rate,
            tr_api_get.payment_type AS payment_type,
            tr_api_get.payment_by AS payment_by,
            tr_api_get.username AS username,
            tr_api_get.buyer_barcode AS buyer_barcode,
            tr_api_get.buyer_name AS buyer_name,
            tr_api_get.buyer_flight_no AS buyer_flight_no,
            tr_api_get.buyer_destination AS buyer_destination,
            tr_api_get.buyer_nationality AS buyer_nationality,
            tr_api_get.remark AS remark,
            tr_api_get.invoice_tax AS invoice_tax,
            tr_api_get.tax_id AS tax_id,
            tr_api_get.payment_name AS payment_name,
            tr_api_get.payment_time AS payment_time,
            tr_api_get.distance AS distance,
            tr_api_get.journey_time AS journey_time,
            m_store.store_name AS store_name,
            m_store.store_address AS store_address 
        FROM
            ((((
                            tr_api_get
                            JOIN tr_header ON (((
                                        tr_header.tr_number = tr_api_get.invoice_number 
                                        ) 
                                AND ( tr_header.tr_id = tr_api_get.tr_id ))))
                        JOIN m_currency ON ((
                                m_currency.id = tr_api_get.item_code 
                            )))
                    JOIN auth_users ON ((
                            auth_users.id = tr_api_get.createdby 
                        )))
                LEFT JOIN m_store ON ((
                    m_store.id = tr_api_get.store_id 
            )))
         */
        
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
