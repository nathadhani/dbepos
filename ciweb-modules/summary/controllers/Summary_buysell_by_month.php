<?php

class Summary_buysell_by_month extends Bks_Controller {

    function __construct(){
        $config = array('modules' => 'summary', 'jsfiles' => array('summary_buysell_by_month'));
        parent::__construct($config);        
        $this->auth = $this->session->userdata( 'auth' );       
    }
    
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('Buy / Sell by Month');
        $this->template->set('tsmall', 'Summary');
        $this->template->set('icon', 'fa fa-edit');
        $data['auth'] = $this->auth;
        $this->template->build('summary/summary_buysell_by_month_v', $data);
    }
    
    function getData() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();

        $company_id = $postData['company_id'];
        $store_id = $postData['store_id'];
        $tahun = Date('Y');
        $bulan = Date('m');
        if(isset($postData['periode'])){
            $tahun = intval(SUBSTR($postData['periode'],3,4));
            $bulan = intval(SUBSTR($postData['periode'],0,2));
        }
        
        $this->Bksmdl->table = 'v_summary_by_month';

        $where[0]['field'] = 'company_id';
        $where[0]['data']  = $company_id;
        $where[0]['sql']   = 'where';

        $where[1]['field'] = 'store_id';
        $where[1]['data']  = $store_id;
        $where[1]['sql']   = 'where';

        $where[2]['field'] = 'tr_year';
        $where[2]['data']  = $tahun;
        $where[2]['sql']   = 'where';

        $where[3]['field'] = 'tr_month';
        $where[3]['data']  = $bulan;
        $where[3]['sql']   = 'where';

        $cpData = $this->Bksmdl->getDataTable($where);
        $this->Bksmdl->outputToJson($cpData);
    }

    function gettotal(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();

        $company_id = $postData['company_id'];
        $store_id = $postData['store_id'];
        $tahun = Date('Y');
        $bulan = Date('m');
        if(isset($postData['periode'])){
            $tahun = intval(SUBSTR($postData['periode'],3,4));
            $bulan = intval(SUBSTR($postData['periode'],0,2));
        }

        $query = $this->db->query("SELECT SUM(buy_equivalent) AS buy_equivalent,
                                   SUM(sell_equivalent) AS sell_equivalent
                                   FROM v_summary_by_month
                                   WHERE company_id = $company_id
                                   AND store_id = $store_id
                                   AND tr_year = $tahun
                                   AND tr_month = $bulan")->result();

        echo json_encode($query, true);
    }

    function getcount(){
        checkIfNotAjax();
        // $this->libauth->check(__METHOD__);
        $postData = $this->input->post();

        $company_id = $postData['company_id'];
        $store_id = $postData['store_id'];
        $tahun = Date('Y');
        $bulan = Date('m');
        if(isset($postData['periode'])){
            $tahun = intval(SUBSTR($postData['periode'],3,4));
            $bulan = intval(SUBSTR($postData['periode'],0,2));
        }
        
        $query = $this->db->query("SELECT COUNT(CASE WHEN tr_id = 1 AND status IN(3,4) THEN 1 END) AS buy_count,
                                COUNT(CASE WHEN tr_id = 2 AND status IN(3,4) THEN 1 END) AS sell_count
                                FROM tr_header
                                WHERE company_id = $company_id
                                AND store_id = $store_id
                                AND YEAR(tr_date) = $tahun
                                AND MONTH(tr_date) = $bulan
                                AND status IN(3,4)")->result();
        echo json_encode($query, true);
    }

    function excel(){
        $this->libauth->check(__METHOD__);
        $company_id = $this->uri->segment(5);
        $store_id = $this->uri->segment(6);        
        $tahun = SUBSTR($this->uri->segment(4),3,4);
        $bulan = SUBSTR($this->uri->segment(4),0,2);
        
        $query = $this->db->query("SELECT
                                        (
                                            SELECT
                                                ( CASE WHEN ( `tr_header`.`tr_id` = 1 ) THEN 'Trx Buy' WHEN ( `tr_header`.`tr_id` = 2 ) THEN 'Trx Sell' ELSE '' END )
                                        ) AS `trx_name`,
                                        tr_header.tr_number,	
                                        tr_header.tr_date AS tr_date,		
                                        CONCAT(m_currency.currency_code,' - ',m_currency.currency_name) AS currency_name,
                                        tr_detail.nominal AS nominal,
                                        tr_detail.sheet AS sheet,
                                        (tr_detail.nominal * tr_detail.sheet) AS amount,
                                        tr_detail.price AS price,
                                        tr_detail.subtotal AS subtotal,
                                        m_customer.customer_code,
                                        m_customer.customer_name,
                                        m_customer.customer_address,
                                        m_customer.customer_phone,
                                        m_company.company_name,
                                        m_company.company_address,
                                        m_company_store.store_name,
                                        m_company_store.store_address,
                                        tr_detail.created AS created,
                                        tr_detail.updated AS updated,
                                        usr1.fullname AS createdby_name,
                                        usr2.fullname AS updated_name
                                    FROM tr_detail
                                    JOIN tr_header ON tr_detail.header_id = tr_header.id 				
                                    JOIN m_currency ON tr_detail.currency_id = m_currency.id
                                    JOIN m_customer ON m_customer.id = tr_header.customer_id
                                    JOIN m_company ON m_company.id = tr_header.company_id
                                    JOIN m_company_store ON m_company_store.id = tr_header.store_id
                                    JOIN auth_users usr1 ON usr1.id = tr_header.createdby
                                    LEFT JOIN auth_users usr2 ON usr2.id = tr_header.updatedby            
                                    WHERE tr_header.company_id = $company_id
                                    AND tr_header.store_id = $store_id
                                    AND year(tr_header.tr_date) = $tahun
                                    AND month(tr_header.tr_date) = $bulan
                                    AND tr_detail.status IN(3,4)                
                                    ORDER BY tr_header.tr_date, tr_header.tr_id, tr_header.tr_number, tr_detail.currency_id, tr_detail.nominal ASC");        

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
        $this->excel->setActiveSheetIndex(0)->setCellValue('A1', "Transaction Buy / Sell Period " . $tahun . ' - ' . namabulan($bulan) ); 
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->mergeCells('A1:U1');

        $judul = array('Trx.Name',
                        'Trx.Number',
                        'Trx.Date',
                        'Currency',
                        'Nominal',
                        'Sheet',
                        'Amount',
                        'Equivalent',
                        'Total Price',
                        'Customer Code',                        
                        'Customer Name',
                        'Customer Address',
                        'Customer Phone',
                        'Company Name',
                        'Company Address',
                        'Store Name',
                        'Store Address',
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
        foreach ($query->result_array() as $data) {
            $col = 0;
            foreach ($fields as $field) {
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data[$field]); // Retreive Data Value                
                $this->excel->getActiveSheet()->getStyle('E'.$row.':'.'I'.$row)->getNumberFormat()->setFormatCode('#,##0'); // Number Format
                $col++;
            }
            $row++;
        }

        foreach (range('A', 'U') as $columnID) {
            $this->excel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }
        $this->excel->setActiveSheetIndex(0);        
        

        // Sending headers to force the user to download the file
        $filename = 'Summary Buy-Sell by by Month';
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
