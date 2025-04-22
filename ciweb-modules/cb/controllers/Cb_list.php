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
        $endDate = date('Y-m-t', strtotime($startDate));

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

    function excelcellColor($cells,$color){    
        $this->excel->getActiveSheet(0)->getStyle($cells)
                    ->applyFromArray( 
                        array(
                            'font'  => array(
                                'bold'  => true,
                                'color' => array('rgb' => 'FFFFFF')
                            ))
                    )
                    ->getFill()->applyFromArray(
                        array(
                                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                                'startcolor' => array('rgb' => $color)
                            )
                    );
    }

    function excel(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $this->store_id = ( is_array($postData['store_id']) ? implode(',', $postData['store_id']) : $postData['store_id']) ;
        $this->tr_date1 = revDate($postData['period1']);        
        $this->tr_date2 = revDate($postData['period2']);        

        $profil_usaha = $this->Bksmdl->getprofilusaha($this->store_id);

        $query = "SELECT
                m_cb.cb_name AS cb_name,
                m_cb_pos.cb_pos_name AS cb_pos_name,
                tr_cb_header.tr_number AS tr_number,
                tr_cb_header.tr_date AS tr_date,
                tr_cb_detail.description AS description,
                (
                    SELECT
                    CASE
                        WHEN  m_cb_pos.cb_pos_in_out = 'I' THEN tr_cb_detail.amount
                    END
                ) AS amount_in,

                (
                    SELECT
                    CASE
                        WHEN  m_cb_pos.cb_pos_in_out = 'O' THEN tr_cb_detail.amount
                    END
                ) AS amount_out,

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
                usr1.fullname AS createdby_name,
                usr2.fullname AS updatedby_name,
                m_store.store_name,
                m_store.store_address

                FROM tr_cb_detail
                JOIN tr_cb_header ON tr_cb_detail.header_id = tr_cb_header.id
                JOIN m_store ON tr_cb_header.store_id = m_store.id
                JOIN m_cb ON tr_cb_header.cb_id = m_cb.id
                JOIN m_cb_pos ON tr_cb_header.cb_pos_id = m_cb_pos.id
                LEFT JOIN auth_users usr1 ON tr_cb_header.createdby = usr1.id
                LEFT JOIN auth_users usr2 ON tr_cb_header.updatedby = usr2.id
                WHERE tr_cb_header.store_id = $this->store_id
                AND tr_cb_header.tr_date >= '$this->tr_date1'
                AND tr_cb_header.tr_date <= '$this->tr_date2'
                ORDER BY tr_cb_header.cb_id, tr_cb_header.cb_pos_id, tr_cb_header.tr_date ASC";
         
        if (!$this->db->query($query))
        return false;

        $this->load->library('excel');
        $this->excel->getProperties()->setTitle("export")->setDescription("none");
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle("temp");
        
        // title column
        $this->excel->setActiveSheetIndex(0)->setCellValue('A1', strtoupper(trim($profil_usaha[0]->store_name))); 
        if(!is_array($postData['store_id'])){
            $this->excel->setActiveSheetIndex(0)->setCellValue('A2', strtoupper(trim($profil_usaha[0]->store_address))); 
            $this->excel->setActiveSheetIndex(0)->setCellValue('A3', 'Transaction Cash Bank Period ' . revDate($this->tr_date1) . ' s/d ' . revDate($this->tr_date2));
            $this->excel->setActiveSheetIndex(0)->getStyle('A1:A3')->getFont()->setBold(TRUE);
            $this->excel->setActiveSheetIndex(0)->getStyle('A1:A3')->getFont()->setSize(11);
            $this->excel->setActiveSheetIndex(0)->mergeCells('A1:O1');
            $this->excel->setActiveSheetIndex(0)->mergeCells('A2:O2');
            $this->excel->setActiveSheetIndex(0)->mergeCells('A3:O3');    

        } else {
            $this->excel->setActiveSheetIndex(0)->setCellValue('A2', 'Transaction Cash / Bank Period ' . revDate($this->tr_date1) . ' s/d ' . revDate($this->tr_date2));
            $this->excel->setActiveSheetIndex(0)->getStyle('A1:A2')->getFont()->setBold(TRUE);
            $this->excel->setActiveSheetIndex(0)->getStyle('A1:A2')->getFont()->setSize(11);
            $this->excel->setActiveSheetIndex(0)->mergeCells('A1:O1');
            $this->excel->setActiveSheetIndex(0)->mergeCells('A2:O2');    
        }

        $this->excel->setActiveSheetIndex(0)->setCellValue('A5', "#"); 
        $this->excel->setActiveSheetIndex(0)->setCellValue('B5', "Source");         
        $this->excel->setActiveSheetIndex(0)->setCellValue('C5', "Purpose"); 
        $this->excel->setActiveSheetIndex(0)->setCellValue('D5', "Date"); 
        $this->excel->setActiveSheetIndex(0)->setCellValue('E5', "Number"); 
        $this->excel->setActiveSheetIndex(0)->setCellValue('F5', "Description"); 
        $this->excel->setActiveSheetIndex(0)->setCellValue('G5', "Value In"); 
        $this->excel->setActiveSheetIndex(0)->setCellValue('H5', "Value Out");
        $this->excel->setActiveSheetIndex(0)->setCellValue('I5', "Status"); 
        $this->excel->setActiveSheetIndex(0)->setCellValue('J5', "Created"); 
        $this->excel->setActiveSheetIndex(0)->setCellValue('K5', "Updated");
        $this->excel->setActiveSheetIndex(0)->setCellValue('L5', "Created by"); 
        $this->excel->setActiveSheetIndex(0)->setCellValue('M5', "Updated by");         
        $this->excel->setActiveSheetIndex(0)->setCellValue('N5', "Store Name");
        $this->excel->setActiveSheetIndex(0)->setCellValue('O5', "Store Address");


        $this->excelcellColor('A5:O5', '337AB7');
        $this->excel->setActiveSheetIndex(0)->getStyle('A5:O5')->getFont()->setBold(TRUE);
        $this->excel->setActiveSheetIndex(0)->getStyle('A5:O5')->getFont()->setSize(11);

        // Fetching the table data
        $row = 6; $no = 1;
        foreach ($this->db->query($query)->result_array() as $data) {            
            $this->excel->setActiveSheetIndex(0)->setCellValue('A'.$row, $no);
            $this->excel->setActiveSheetIndex(0)->setCellValue('B'.$row, $data['cb_name']);
            $this->excel->setActiveSheetIndex(0)->setCellValue('C'.$row, $data['cb_pos_name']);
            $this->excel->setActiveSheetIndex(0)->setCellValue('D'.$row, revDate($data['tr_date']));
            $this->excel->setActiveSheetIndex(0)->setCellValue('E'.$row, "'".$data['tr_number']);
            $this->excel->setActiveSheetIndex(0)->setCellValue('F'.$row, ucwords(strtolower(trim($data['description']))) );
            $this->excel->setActiveSheetIndex(0)->setCellValue('G'.$row, $data['amount_in']);
            $this->excel->setActiveSheetIndex(0)->setCellValue('H'.$row, $data['amount_out']);
            $this->excel->setActiveSheetIndex(0)->setCellValue('I'.$row, $data['status_name']);
            $this->excel->setActiveSheetIndex(0)->setCellValue('J'.$row, $data['created']);
            $this->excel->setActiveSheetIndex(0)->setCellValue('K'.$row, $data['updated']);
            $this->excel->setActiveSheetIndex(0)->setCellValue('L'.$row, $data['createdby_name']);
            $this->excel->setActiveSheetIndex(0)->setCellValue('M'.$row, $data['updatedby_name']);
            $this->excel->setActiveSheetIndex(0)->setCellValue('N'.$row, $data['store_name']);
            $this->excel->setActiveSheetIndex(0)->setCellValue('O'.$row, $data['store_address']);


            $this->excel->setActiveSheetIndex(0)->getStyle('G'.$row.':'.'H'.$row)->getNumberFormat()->setFormatCode('_(* #,##0_);_(* (#,##0);_(* "-"??_);_(@_)'); // Number Format
            
            $this->excel->setActiveSheetIndex(0)->getStyle('A'.$row.':'.'O'.$row)->getAlignment()->applyFromArray(
                                                                                        array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,)
                                                                                    );
            $row++; $no++;
        }

        foreach (range('A', 'P') as $columnID) {
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
