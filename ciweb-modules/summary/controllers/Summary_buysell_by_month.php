<?php

class Summary_buysell_by_month extends Bks_Controller {

    function __construct(){
        $config = array('modules' => 'summary', 'jsfiles' => array('summary_buysell_by_month'));
        parent::__construct($config);        
        $this->auth = $this->session->userdata( 'auth' );
        $this->store_id = 0;
        $this->query = '';

        $this->tr_year = (int) date('Y');
        $this->tr_month = (int) date('m');

        $this->tr_year_old = (int) date('Y');
        $this->tr_month_old = ((int) date('m')) -1 ;
        if ( $this->tr_month == 1) {
            $this->tr_year_old = ((int) date('Y'))-1;
            $this->tr_month_old = 12;
        }             
    }
    
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('Buy / Sell by Month');
        $this->template->set('tsmall', 'Summary');
        $this->template->set('icon', 'fa fa-edit');
        $data['auth'] = $this->auth;
        $this->template->build('summary/summary_buysell_by_month_v', $data);
    }
    
    function dbquery(){
        return $this->db->query("SELECT tr_header.store_id AS store_id,
                                        tr_detail.currency_id AS currency_id,
                                        m_currency.currency_code AS currency_code,
                                        m_currency.currency_name AS currency_name,
                                        tr_header.tr_date AS tr_date,

                                        (
                                            SELECT SUM(stock_last_amount) FROM tr_stock_price x
                                            WHERE x.store_id IN ($this->store_id)
                                            and YEAR(x.stock_date) = $this->tr_year_old
                                            and MONTH(x.stock_date) = $this->tr_month_old
                                            and x.currency_id = tr_detail.currency_id
                                            ORDER BY x.stock_date DESC, x.id DESC
                                            limit 1					
                                        ) AS st_beginning_amount,                                        

                                        (
                                            SELECT (SUM(stock_last_amount) * stock_last_price) FROM tr_stock_price x
                                            WHERE x.store_id IN ($this->store_id)
                                            and YEAR(x.stock_date) = $this->tr_year_old
                                            and MONTH(x.stock_date) = $this->tr_month_old
                                            and x.currency_id = tr_detail.currency_id
                                            ORDER BY x.stock_date DESC, x.id DESC
                                            limit 1					
                                        ) AS st_beginning_equivalent,

                                        SUM(IF( tr_header.tr_id = 1 AND tr_detail.status IN ( 3, 4 ), (tr_detail.nominal * tr_detail.sheet), 0 )) AS buy_amount,
                                        SUM(IF( tr_header.tr_id = 1 AND tr_detail.status IN ( 3, 4 ), ( (tr_detail.nominal * tr_detail.sheet) * tr_detail.price ), 0 )) AS buy_equivalent,

                                        SUM(IF( tr_header.tr_id = 2 AND tr_detail.status IN ( 3, 4 ), (tr_detail.nominal * tr_detail.sheet), 0 )) AS sell_amount,
                                        SUM(IF( tr_header.tr_id = 2 AND tr_detail.status IN ( 3, 4 ), ( (tr_detail.nominal * tr_detail.sheet) * tr_detail.price ), 0 )) AS sell_equivalent,

                                        (
                                            SELECT SUM(stock_last_amount) FROM tr_stock_price x
                                            WHERE x.store_id IN ($this->store_id)
                                            and YEAR(x.stock_date) = $this->tr_year
                                            and MONTH(x.stock_date) = $this->tr_month
                                            and x.currency_id = tr_detail.currency_id
                                            ORDER BY x.stock_date DESC, x.id DESC
                                            limit 1					
                                        ) AS st_end_amount,

                                        (
                                            SELECT (SUM(stock_last_amount) * stock_last_price) FROM tr_stock_price x
                                            WHERE x.store_id IN ($this->store_id)
                                            and YEAR(x.stock_date) = $this->tr_year
                                            and MONTH(x.stock_date) = $this->tr_month
                                            and x.currency_id = tr_detail.currency_id
                                            ORDER BY x.stock_date DESC, x.id DESC
                                            limit 1					
                                        ) AS st_end_equivalent

                                FROM tr_detail
                                JOIN tr_header ON tr_header.id = tr_detail.header_id 				
                                JOIN m_currency ON tr_detail.currency_id = m_currency.id
                                WHERE tr_header.store_id IN ($this->store_id)
                                AND YEAR(tr_header.tr_date) = $this->tr_year
                                and MONTH(tr_header.tr_date) = $this->tr_month
                                AND tr_detail.status IN (3,4) 
                                GROUP BY
                                    tr_header.store_id,
                                    tr_detail.currency_id,
                                    m_currency.currency_code,
                                    m_currency.currency_name,
                                    YEAR(tr_header.tr_date),
                                    MONTH(tr_header.tr_date)
                                ORDER BY tr_detail.currency_id ASC");
    }
        
    function getdata() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $this->store_id = ( is_array($postData['store_id']) ? implode(',', $postData['store_id']) : $postData['store_id']);
        if(isset($postData['period'])){ 
            $this->tr_year = intval(SUBSTR($postData['period'],3,4));
            $this->tr_month = intval(SUBSTR($postData['period'],0,2));
            $this->tr_year_old = $this->tr_year;
            $this->tr_month_old = $this->tr_month -1 ;
            if ( $this->tr_month == 1) {
                $this->tr_year_old = $this->tr_year-1;
                $this->tr_month_old = 12;
            }
        }
        echo json_encode($this->dbquery()->result(), true);
    }
    
    function exportpdf()
    {   
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $this->store_id = ( is_array($postData['store_id']) ? implode(',', $postData['store_id']) : $postData['store_id']);
        $this->tr_year = intval(SUBSTR($postData['period'],3,4));
        $this->tr_month = intval(SUBSTR($postData['period'],0,2));
        $this->tr_year_old = $this->tr_year;
        $this->tr_month_old = $this->tr_month -1 ;
        if ( $this->tr_month == 1) {
            $this->tr_year_old = $this->tr_year-1;
            $this->tr_month_old = 12;
        }
        
        $profil_usaha = $this->Bksmdl->getprofilusaha($this->store_id);

        // Call Pdf libraries
        $pdf = new Pdf();
        
        // Call before the addPage() method
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);

        // set font
        $pdf->SetFont('times', '', 12);
        $pdf->AddPage('L', 'A4');
        
        $style = '
                <style>
                    table {
                        border-collapse: collapse;
                        border: 1px solid #333;                        
                    }
                    th{ 
                        padding: 8px;
                        text-align: center;                        
                        background-color:#FFFF00;
                    }
                    td {                       
                        padding: 8px;
                        text-align: left;                     
                    }
                </style>';

        // Add Title        
        $html_header = strtoupper(trim($profil_usaha[0]->store_name));
        if(!is_array($postData['store_id'])){
            $html_header .= '<br>' . trim($profil_usaha[0]->store_address) . '</br>';
        }       
        $html_header .= '<br>' . 'Rekap Transaksi Beli dan Jual Bulan ' . namabulan(sprintf("%02d", $this->tr_month)) . ' Tahun  ' . sprintf("%04d", $this->tr_year) . '</br><br></br><br></br>';
        
        // Add Content Body
        $data_content = $this->dbquery()->result();
        if(count($data_content) > 0) {
            $no = 0;
            $totalbuy = 0;
            $totalsell = 0;
            $pageno = 0;

            $html_table = '<table border="1" width="100%">';
            $html_table .= '<tr>';
                $html_table .= '<th width="2%" rowspan="2">#</th>';
                $html_table .= '<th width="5%" rowspan="2">Curr</th>';
                $html_table .= '<th width="15%" colspan="2">Awal</th>';
                $html_table .= '<th width="15%" colspan="2">Beli</th>';
                $html_table .= '<th width="15%" colspan="2">Jual</th>';
                $html_table .= '<th width="15%" colspan="2">Akhir</th>';
                $html_table .= '<th width="33%" rowspan="2">Keterangan</th>';
            $html_table .= '</tr>'; 
            $html_table .= '<tr>';  
                $html_table .= '<th width="5%">Qty</th>'; 
                $html_table .= '<th width="10%">Rupiah</th>'; 
                $html_table .= '<th width="5%">Qty</th>'; 
                $html_table .= '<th width="10%">Rupiah</th>'; 
                $html_table .= '<th width="5%">Qty</th>'; 
                $html_table .= '<th width="10%">Rupiah</th>'; 
                $html_table .= '<th width="5%">Qty</th>'; 
                $html_table .= '<th width="10%">Rupiah</th>'; 
            $html_table .= '</tr>';               

            $pdf->SetFont('', 'B', 9);
            foreach($data_content as $r){
                $no++;
                $totalbuy = $totalbuy + (int) $r->buy_equivalent;
                $totalsell = $totalsell + (int) $r->sell_equivalent;

                $html_table .= '<tr>';
                $html_table .= '<td>' . $no . '</td>';
                $html_table .= '<td>' . $r->currency_code . '</td>';
                
                $html_table .= '<td>' .  ( (int) $r->st_beginning_amount > 0 ? number_format($r->st_beginning_amount, "0", ".", ",") : '-' ). '</td>';
                $html_table .= '<td>' .  ( (int) $r->st_beginning_equivalent > 0 ? number_format($r->st_beginning_equivalent, "0", ".", ",") : '-' ). '</td>';
                
                $html_table .= '<td>' . ( (int) $r->buy_amount > 0 ? number_format($r->buy_amount, "0", ".", ",") : '-' ) . '</td>';
                $html_table .= '<td>' . ( (int) $r->buy_equivalent > 0 ? number_format($r->buy_equivalent, "0", ".", ",") : '-' ) . '</td>';

                $html_table .= '<td>' . ( (int) $r->sell_amount > 0 ? number_format($r->sell_amount, "0", ".", ",") : '-' ) . '</td>';
                $html_table .= '<td>' . ( (int) $r->sell_equivalent > 0 ? number_format($r->sell_equivalent, "0", ".", ",") : '-' ) . '</td>';

                $html_table .= '<td>' . ( (int) $r->st_end_amount > 0 ? number_format($r->st_end_amount, "0", ".", ",") : '-' ) . '</td>';
                $html_table .= '<td>' . ( (int) $r->st_end_equivalent > 0 ? number_format($r->st_end_equivalent, "0", ".", ",") : '-' ) . '</td>';

                $html_table .= '<td>' . ucwords(strtolower(trim($r->currency_name))) . '</td>';

                $html_table .= '</tr>';                
                $pdf->Ln(4);
            }
            $html_table .= '</table>';
            $html_table .= '<br></br><br>Total Buy Equivalent Rp. ' . number_format($totalbuy, "0", ".", ",") . '</br>';
            $html_table .= '<br>Total Sell Equivalent Rp. ' . number_format($totalsell, "0", ".", ",") . '</br>';

            $html = $style . $html_header . $html_table;
            $pdf->SetX(10); // Mengatur posisi top menjadi 10 mm dari kiri halaman
            $pdf->SetY(10); // Mengatur posisi top menjadi 10 mm dari atas halaman
            $pdf->writeHTML($html, true, false, true, false, '');

            $pdf->Ln(4);
            $pdf->Cell(01, 01, 'Created by,                       Checked by,', 0, 1, 'L');
        }                
        ob_start();
        $pdf_output = $pdf->Output('Summary Buy and Sell Period ' . namabulan(sprintf("%02d", $this->tr_month)) . ' ' . sprintf("%04d", $this->tr_year) .'.pdf','S');
        ob_end_clean();
        echo json_encode(['pdf' => base64_encode($pdf_output)]); // Display Pdf in new tab
    }

    function excelcellColor($cells,$color){    
        $this->excel->getActiveSheet(0)->getStyle($cells)->getFill()->applyFromArray(array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                 'rgb' => $color
            )
        ));
    }

    function excel(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $this->store_id = ( is_array($postData['store_id']) ? implode(',', $postData['store_id']) : $postData['store_id']);
        $this->tr_year = intval(SUBSTR($postData['period'],3,4));
        $this->tr_month = intval(SUBSTR($postData['period'],0,2));
        $this->tr_year_old = $this->tr_year;
        $this->tr_month_old = $this->tr_month -1 ;
        if ( $this->tr_month == 1) {
            $this->tr_year_old = $this->tr_year-1;
            $this->tr_month_old = 12;
        }  
        $profil_usaha = $this->Bksmdl->getprofilusaha($this->store_id);
         
        if (!$this->dbquery())
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
            $this->excel->setActiveSheetIndex(0)->setCellValue('A3', 'Rekap Transaksi Beli dan Jual Bulan ' . namabulan(sprintf("%02d", $this->tr_month)) . ' Tahun ' . sprintf("%04d", $this->tr_year)); 
            $this->excel->setActiveSheetIndex(0)->getStyle('A1:A3')->getFont()->setBold(TRUE);
            $this->excel->setActiveSheetIndex(0)->getStyle('A1:A3')->getFont()->setSize(11);
            $this->excel->setActiveSheetIndex(0)->mergeCells('A1:K1');
            $this->excel->setActiveSheetIndex(0)->mergeCells('A2:K2');
            $this->excel->setActiveSheetIndex(0)->mergeCells('A3:K3');
        } else {
            $this->excel->setActiveSheetIndex(0)->setCellValue('A2', 'Rekap Transaksi Beli dan Jual Bulan ' . namabulan(sprintf("%02d", $this->tr_month)) . ' Tahun ' . sprintf("%04d", $this->tr_year)); 
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
