<?php

class Cb_list extends Bks_Controller {

    function __construct() {
        $config = array('modules' => 'cb', 'jsfiles' => array('cb_list'));
        parent::__construct($config);        
        $this->auth = $this->session->userdata( 'auth' );      
        $this->userId = $this->auth['id'];
        $this->store_id = $this->auth['store_id'];
    }
    
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('List');
        $this->template->set('tsmall', 'Cash Bank');
        $this->template->set('icon', 'fa fa-edit');
        $data['auth'] = $this->auth;
        $this->template->build('cb/cb_list_v', $data);
    }

    function generate_cb_buysell(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        
        $store_id  = $postData['store_id'];    
        $startDate = revDate($postData['period1']);
        $endDate = revDate($postData['period2']) + 1;

        $start = new DateTime($startDate);
        $end = new DateTime($endDate);
        for($date = $start; $date <= $end; $date->modify('+1 day')){
            $tr_date = $date->format('Y-m-d');
            echo $tr_date . '<br>';
            $data['store_id'] = $store_id;
            $data['tr_date'] = $tr_date;
            $data['buysell_id'] = null;        
            $this->Bksmdl->generate_payment_cb($data);
        }
    }
    
    function getdata() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        
        $store_id  = $postData['store_id'];    
        $tanggal1 = revDate($postData['periode1']);
        $tanggal2 = revDate($postData['periode2']);

        $this->Bksmdl->table = 'v_tr_cb_header';

        $where[0]['field'] = 'store_id';
        $where[0]['data']  = $store_id;
        $where[0]['sql']   = 'where';
       
        $where2 = "tr_date >= '". $tanggal1 ."' AND tr_date <= '". $tanggal2 ."'";

        $cpData = $this->Bksmdl->getDataTable($where, $where2);
        $this->Bksmdl->outputToJson($cpData);
    }    

    function excel(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $this->store_id = ( is_array($postData['store_id']) ? implode(',', $postData['store_id']) : $postData['store_id']) ;
        $this->tr_date1 = revDate($postData['period1']);        
        $this->tr_date2 = revDate($postData['period1']);        

        $profil_usaha = $this->Bksmdl->getprofilusaha($this->store_id);

        $dbquery = "SELECT
                    tr_cb_detail.id AS id,
                    tr_cb_detail.header_id AS header_id,
                    tr_cb_header.store_id AS store_id,
                    tr_cb_header.tr_number AS tr_number,
                    tr_cb_header.tr_date AS tr_date,
                    tr_cb_header.cb_id AS cb_id,
                    m_cb.cb_code AS cb_code,
                    m_cb.cb_name AS cb_name,
                    m_cb.description AS cb_description,
                    tr_cb_header.cb_pos_id AS cb_pos_id,
                    m_cb_pos.cb_pos_code AS cb_pos_code,
                    m_cb_pos.cb_pos_name AS cb_pos_name,
                    m_cb_pos.cb_pos_in_out AS cb_pos_in_out,
                    tr_cb_detail.description AS description,
                    tr_cb_detail.amount AS amount,
                    tr_cb_detail.status AS status,
                    (
                        SELECT
                        ( 
                        CASE 
                            WHEN ( tr_cb_header.status = 2 ) THEN 'Canceled'
                            WHEN ( tr_cb_header.status = 3 ) THEN 'Confirm'
                        END
                        )
                    ) AS status_name,
                    tr_cb_detail.created AS created,
                    tr_cb_detail.updated AS updated,
                    tr_cb_detail.createdby AS createdby,
                    tr_cb_detail.updatedby AS updatedby,
                    usr1.fullname AS createdby_name,
                    usr2.fullname AS updatedby_name 
                    FROM tr_cb_detail
                    JOIN tr_cb_header ON tr_cb_detail.header_id = tr_cb_header.id
                    JOIN m_cb ON tr_cb_header.cb_id = m_cb.id
                    JOIN m_cb_pos ON tr_cb_header.cb_pos_id = m_cb_pos.id
                    LEFT JOIN auth_users usr1 ON tr_cb_header.createdby = usr1.id
                    LEFT JOIN auth_users usr2 ON tr_cb_header.updatedby = usr2.id
                ";
         
        if (!$dbquery())
        return false;

        $fields = $this->dbquery()->list_fields();
        $totcol = $this->dbquery()->num_rows();
        $maxrow = $totcol+1;

        // echo $this->db->last_query();exit;

        $this->load->library('excel');
        $this->excel->getProperties()->setTitle("export")->setDescription("none");
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle("temp");

        // Field names in the first row
        $fields = $this->dbquery()->list_fields();
        $col = 0;
        
        // title column
        $this->excel->setActiveSheetIndex(0)->setCellValue('A1', strtoupper(trim($profil_usaha[0]->store_name))); 
        if(!is_array($postData['store_id'])){
            $this->excel->setActiveSheetIndex(0)->setCellValue('A2', strtoupper(trim($profil_usaha[0]->store_address))); 
            $this->excel->setActiveSheetIndex(0)->setCellValue('A3', 'Rekap Transaksi Beli dan Jual Periode ' . revDate($this->tr_date)); 
            $this->excel->setActiveSheetIndex(0)->getStyle('A1:A3')->getFont()->setBold(TRUE);
            $this->excel->setActiveSheetIndex(0)->getStyle('A1:A3')->getFont()->setSize(11);
            $this->excel->setActiveSheetIndex(0)->mergeCells('A1:K1');
            $this->excel->setActiveSheetIndex(0)->mergeCells('A2:K2');
            $this->excel->setActiveSheetIndex(0)->mergeCells('A3:K3');    

        } else {
            $this->excel->setActiveSheetIndex(0)->setCellValue('A2', 'Konsolidasi Rekap Transaksi Beli dan Jual Periode ' . revDate($this->tr_date)); 
            $this->excel->setActiveSheetIndex(0)->getStyle('A1:A2')->getFont()->setBold(TRUE);
            $this->excel->setActiveSheetIndex(0)->getStyle('A1:A2')->getFont()->setSize(11);
            $this->excel->setActiveSheetIndex(0)->mergeCells('A1:K1');
            $this->excel->setActiveSheetIndex(0)->mergeCells('A2:K2');    
        }

        $this->excel->setActiveSheetIndex(0)->setCellValue('A6', "#"); 
        $this->excel->setActiveSheetIndex(0)->setCellValue('B6', "Curr"); 
        
        $this->excel->setActiveSheetIndex(0)->setCellValue('C5', "Awal"); 
        $this->excel->setActiveSheetIndex(0)->mergeCells('C5:D5');
        $this->excel->setActiveSheetIndex(0)->setCellValue('C6', "Qty"); 
        $this->excel->setActiveSheetIndex(0)->setCellValue('D6', "Rupiah"); 

        $this->excel->setActiveSheetIndex(0)->setCellValue('E5', "Beli"); 
        $this->excel->setActiveSheetIndex(0)->mergeCells('E5:F5');
        $this->excel->setActiveSheetIndex(0)->setCellValue('E6', "Qty"); 
        $this->excel->setActiveSheetIndex(0)->setCellValue('F6', "Rupiah"); 

        $this->excel->setActiveSheetIndex(0)->setCellValue('G5', "Jual"); 
        $this->excel->setActiveSheetIndex(0)->mergeCells('G5:H5');
        $this->excel->setActiveSheetIndex(0)->setCellValue('G6', "Qty"); 
        $this->excel->setActiveSheetIndex(0)->setCellValue('H6', "Rupiah"); 

        $this->excel->setActiveSheetIndex(0)->setCellValue('I5', "Akhir"); 
        $this->excel->setActiveSheetIndex(0)->mergeCells('I5:J5');
        $this->excel->setActiveSheetIndex(0)->setCellValue('I6', "Qty"); 
        $this->excel->setActiveSheetIndex(0)->setCellValue('J6', "Rupiah"); 

        $this->excel->setActiveSheetIndex(0)->setCellValue('K6', "Keterangan");


        $this->excelcellColor('A6:K6', 'FFFF00');
        $this->excel->setActiveSheetIndex(0)->getStyle('A5:K6')->getFont()->setBold(TRUE);
        $this->excel->setActiveSheetIndex(0)->getStyle('A5:K6')->getFont()->setSize(11);
        $this->excel->setActiveSheetIndex(0)->getStyle('C5:K5')->getBorders()
                                                            ->getAllBorders()
                                                            ->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN)
                                                            ->getColor()
                                                            ->setRGB('DDDDDD');
        $this->excel->setActiveSheetIndex(0)->getStyle('A6:L6')->getBorders()
                                                            ->getAllBorders()
                                                            ->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN)
                                                            ->getColor()
                                                            ->setRGB('DDDDDD');                                                            
        $this->excel->setActiveSheetIndex(0)->getStyle('A5:L6')->getAlignment()->applyFromArray(
                                                                    array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                                                                          'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,)
                                                                );

        // Fetching the table data
        $row = 7; $no = 1;
        foreach ($this->dbquery()->result_array() as $data) {            
            $this->excel->setActiveSheetIndex(0)->setCellValue('A'.$row, $no);
            $this->excel->setActiveSheetIndex(0)->setCellValue('B'.$row, $data['currency_code']);

            $this->excel->setActiveSheetIndex(0)->setCellValue('C'.$row, $data['st_beginning_amount']);
            $this->excel->setActiveSheetIndex(0)->setCellValue('D'.$row, $data['st_beginning_equivalent']);

            $this->excel->setActiveSheetIndex(0)->setCellValue('E'.$row, $data['buy_amount']);
            $this->excel->setActiveSheetIndex(0)->setCellValue('F'.$row, $data['buy_equivalent']);

            $this->excel->setActiveSheetIndex(0)->setCellValue('G'.$row, $data['sell_amount']);
            $this->excel->setActiveSheetIndex(0)->setCellValue('H'.$row, $data['sell_equivalent']);

            $this->excel->setActiveSheetIndex(0)->setCellValue('I'.$row, $data['st_end_amount']);
            $this->excel->setActiveSheetIndex(0)->setCellValue('J'.$row, $data['st_end_equivalent']);

            $this->excel->setActiveSheetIndex(0)->setCellValue('K'.$row, ucwords(strtolower(trim($data['currency_name']))) );

            $this->excel->setActiveSheetIndex(0)->getStyle('C'.$row.':'.'J'.$row)->getNumberFormat()->setFormatCode('_(* #,##0_);_(* (#,##0);_(* "-"??_);_(@_)'); // Number Format
            $this->excel->setActiveSheetIndex(0)->getStyle('A'.$row.':'.'L'.$row)->getBorders()
                                                                                ->getAllBorders()
                                                                                ->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN)
                                                                                ->getColor()
                                                                                ->setRGB('DDDDDD');
            $this->excel->setActiveSheetIndex(0)->getStyle('A'.$row.':'.'L'.$row)->getAlignment()->applyFromArray(
                                                                                        array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,)
                                                                                    );
            $row++; $no++;
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
