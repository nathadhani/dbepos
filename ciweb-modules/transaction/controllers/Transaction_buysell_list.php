<?php

class Transaction_buysell_list extends Bks_Controller {

    function __construct() {
        $config = array('modules' => 'transaction', 'jsfiles' => array('transaction_buysell_list'));
        parent::__construct($config);        
        $this->auth = $this->session->userdata( 'auth' );        
    }
    
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('List');
        $this->template->set('tsmall', 'Transaction');
        $this->template->set('icon', 'fa fa-edit');
        $data['auth'] = $this->auth;
        $this->template->build('transaction/transaction_buysell_list_v', $data);
    }
    
    function getdata() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        
        $store_id  = $postData['store_id'];    
        $tanggal1 = revDate($postData['periode1']);
        $tanggal2 = revDate($postData['periode2']);

        $this->Bksmdl->table = 'v_tr_header';

        $where[0]['field'] = 'store_id';
        $where[0]['data']  = $store_id;
        $where[0]['sql']   = 'where';

        if( $this->auth['ap_tr_id'] !== null && strlen($this->auth['ap_tr_id']) > 0){
            $where[1]['field'] = 'tr_id';
            $where[1]['data']  = $this->auth['ap_tr_id'];
            $where[1]['sql']   = 'where_in';
        }       
        
        $where2 = "tr_date >= '". $tanggal1 ."' AND tr_date <= '". $tanggal2 ."'";

        $cpData = $this->Bksmdl->getDataTable($where, $where2);
        $this->Bksmdl->outputToJson($cpData);
    }

    function excel(){
        $this->libauth->check(__METHOD__);
        $store_id = $this->uri->segment(4);
        $tanggal1 = revDate($this->uri->segment(5));
        $tanggal2 = revDate($this->uri->segment(6));
        $store_id_multiple = '';
        if( $this->auth['store_id_multiple'] !== null && strlen($this->auth['store_id_multiple']) > 0){
            $store_id_multiple = explode(',',implode(',', $this->auth['store_id_multiple']));
        }
        
        $query = "SELECT
                    (
                        SELECT
                            ( CASE WHEN ( tr_header.tr_id = 1 ) THEN 'Trx Buy' WHEN ( tr_header.tr_id = 2 ) THEN 'Trx Sell' ELSE '' END )
                    ) AS trx_name,
                    tr_header.tr_number,	
                    tr_header.tr_date AS tr_date,		
                    (
                        SELECT
                        ( CASE WHEN ( tr_header.status IN ( 2 )) THEN 'Canceled' WHEN ( tr_header.status IN ( 3 )) THEN 'Confirm' WHEN ( tr_header.status = 4 ) THEN 'Integrasi System ECSys (API)' ELSE 'Task' 
                        END
                        )
                    ) AS status_name,
                    CONCAT(m_currency.currency_code,' - ',m_currency.currency_name) AS currency_name,
                    tr_detail.nominal AS nominal,
                    tr_detail.sheet AS sheet,
                    (tr_detail.nominal * tr_detail.sheet) AS amount,
                    tr_detail.price AS exchange_rate,
                    ((tr_detail.nominal * tr_detail.sheet) * tr_detail.price)  AS subtotal,
                    m_customer.customer_code,
                    m_customer.customer_name,
                    m_customer.customer_address,
                    m_customer.customer_phone,
                    m_store.store_name,
                    m_store.store_address,
                    tr_header.description,
                    tr_detail.created AS created,
                    tr_detail.updated AS updated,
                    usr1.fullname AS createdby_name,
                    usr2.fullname AS updated_name
                FROM tr_detail
                JOIN tr_header ON tr_detail.header_id = tr_header.id 				
                JOIN m_currency ON tr_detail.currency_id = m_currency.id
                JOIN m_customer ON m_customer.id = tr_header.customer_id
                JOIN m_store ON m_store.id = tr_header.store_id
                JOIN auth_users usr1 ON usr1.id = tr_header.createdby
                LEFT JOIN auth_users usr2 ON usr2.id = tr_header.updatedby"; 

        if( $this->auth['store_id_multiple'] !== null && strlen($this->auth['store_id_multiple']) > 0){
            $query .= " WHERE tr_header.store_id = $store_id
                    AND tr_detail.tr_id IN ($store_id_multiple)
                    AND tr_header.tr_date >= '$tanggal1'
                    AND tr_header.tr_date <= '$tanggal2'
                    AND tr_detail.status IN (2,3,4)                    
                    ORDER BY tr_header.tr_date ASC, tr_header.tr_id ASC, tr_header.tr_number ASC, tr_detail.currency_id ASC, tr_detail.nominal ASC, tr_detail.sheet ASC";
        } else {
            $query .= " WHERE tr_header.store_id = $store_id
                    AND tr_header.tr_date >= '$tanggal1'
                    AND tr_header.tr_date <= '$tanggal2'
                    AND tr_detail.status IN (2,3,4)
                    ORDER BY tr_header.tr_date ASC, tr_header.tr_id ASC, tr_header.tr_number ASC, tr_detail.currency_id ASC, tr_detail.nominal ASC, tr_detail.sheet ASC";
        }
        
        if (!$this->db->query($query))
        return false;

        $fields = $this->db->query($query)->list_fields();
        $totcol = $this->db->query($query)->num_rows();
        $maxrow = $totcol+1;

        // echo $this->db->last_query();exit;

        $this->load->library('excel');
        $this->excel->getProperties()->setTitle("export")->setDescription("none");
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle("temp");

        $bold = array('font' => array('bold' => true));
        $fontcolor = array('font' => array('color' => array('rgb' => 'ff0000')));
        $title = array('font' => array('color' => array('rgb' => 'ffffff'), 'bold' => true), 
                       'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => '337AB7')));

        // Field names in the first row
        $fields = $this->db->query($query)->list_fields();
        $col = 0;
        
        // title column
        $this->excel->setActiveSheetIndex(0)->setCellValue('A1', "Transaction Buy Sell Period " . revDate($tanggal1) . ' s/d ' .  revDate($tanggal2)); 
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->mergeCells('A1:T1');

        $judul = array('Trx.Name',
                        'Trx.Number',
                        'Trx.Date',
                        'Trx.Status',                        
                        'Currency',
                        'Nominal',
                        'Sheet',
                        'Amount',
                        'Exchange Rate',
                        'Equivalent',
                        'Customer Code',                        
                        'Customer Name',
                        'Customer Address',
                        'Customer Phone',
                        'Store Name',
                        'Store Address',
                        'Description',
                        'Created',
                        'Updated',
                        'Created by Name',
                        'Updated by Name');


        foreach ($fields as $key => $field) {
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 3, $judul[$key]);
            $this->excel->getActiveSheet()->getStyleByColumnAndRow($col, 3)->applyFromArray($title);
            $col++;
        }

        // Fetching the table data
        $row = 4;
        foreach ($this->db->query($query)->result_array() as $data) {
            $col = 0;
            foreach ($fields as $field) {
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data[$field]); // Retreive Data Value
                $this->excel->getActiveSheet()->getStyle('F'.$row.':'.'H'.$row)->getNumberFormat()->setFormatCode('#,##0'); // Number Format
                $this->excel->getActiveSheet()->getStyle('J'.$row.':'.'J'.$row)->getNumberFormat()->setFormatCode('#,##0'); // Number Format                
                if($field == 'exchange_rate'){
                    if( $this->Bksmdl->cekdecimalgreaterthenzero($data[$field]) > 0){
                        $this->excel->getActiveSheet()->getStyle('I'.$row.':'.'I'.$row)->getNumberFormat()->setFormatCode('#,##0.00'); // Number Format Decimal
                    } else {
                        $this->excel->getActiveSheet()->getStyle('I'.$row.':'.'I'.$row)->getNumberFormat()->setFormatCode('#,##0'); // Number Format Decimal                        
                    }
                }
                $col++;
            }
            $row++;
        }        

        foreach (range('A', 'U') as $columnID) {
            $this->excel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }
        $this->excel->setActiveSheetIndex(0);        
        

        // Sending headers to force the user to download the file
        $filename = 'Transaction Buy Sell Period ' . revDate($tanggal1) . ' sd ' .  revDate($tanggal2);
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
