<?php

class Summary_buysell_by_date extends Bks_Controller {
    
    public $store_id, $tr_date, $query;

    function __construct() {
        $config = array('modules' => 'summary', 'jsfiles' => array('summary_buysell_by_date'));
        parent::__construct($config);        
        $this->auth = $this->session->userdata( 'auth' );        
        $this->store_id = 0;
        $this->tr_date = date('Y-m-d');
        $this->query = '';
    }
    
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('Buy / Sell by Date');
        $this->template->set('tsmall', 'Summary');
        $this->template->set('icon', 'fa fa-edit');
        $data['auth'] = $this->auth;
        $this->template->build('summary/summary_buysell_by_date_v', $data);
    }

    function dbquery(){
        return $this->db->query("SELECT tr_header.store_id AS store_id,
                                        tr_detail.currency_id AS currency_id,
                                        m_currency.currency_code AS currency_code,
                                        m_currency.currency_name AS currency_name,
                                        tr_header.tr_date AS tr_date,

                                        (
                                            SELECT stock_last_amount FROM stock_price x
                                            WHERE x.store_id = $this->store_id
                                            and x.stock_date < '$this->tr_date'
                                            and x.currency_id = tr_detail.currency_id
                                            ORDER BY x.stock_date DESC, x.id DESC
                                            limit 1					
                                        ) AS st_beginning_amount,

                                        (
                                            SELECT (stock_last_amount * stock_last_price) FROM stock_price x
                                            WHERE x.store_id = $this->store_id
                                            and x.stock_date < '$this->tr_date'
                                            and x.currency_id = tr_detail.currency_id
                                            ORDER BY x.stock_date DESC, x.id DESC
                                            limit 1					
                                        ) AS st_beginning_equivalent,

                                        SUM(IF( tr_header.tr_id = 1 AND tr_detail.status IN ( 3, 4 ), (tr_detail.nominal * tr_detail.sheet), 0 )) AS buy_amount,
                                        SUM(IF( tr_header.tr_id = 1 AND tr_detail.status IN ( 3, 4 ), ( (tr_detail.nominal * tr_detail.sheet) * tr_detail.price ), 0 )) AS buy_equivalent,

                                        SUM(IF( tr_header.tr_id = 2 AND tr_detail.status IN ( 3, 4 ), (tr_detail.nominal * tr_detail.sheet), 0 )) AS sell_amount,
                                        SUM(IF( tr_header.tr_id = 2 AND tr_detail.status IN ( 3, 4 ), ( (tr_detail.nominal * tr_detail.sheet) * tr_detail.price ), 0 )) AS sell_equivalent,

                                        (
                                            SELECT stock_last_amount FROM stock_price x
                                            WHERE x.store_id = $this->store_id
                                            and x.stock_date = '$this->tr_date'
                                            and x.currency_id = tr_detail.currency_id
                                            ORDER BY x.stock_date DESC, x.id DESC
                                            limit 1					
                                        ) AS st_end_amount,

                                        (
                                            SELECT (stock_last_amount * stock_last_price) FROM stock_price x
                                            WHERE x.store_id = $this->store_id
                                            and x.stock_date = '$this->tr_date'
                                            and x.currency_id = tr_detail.currency_id
                                            ORDER BY x.stock_date DESC, x.id DESC
                                            limit 1					
                                        ) AS st_end_equivalent

                                FROM tr_detail
                                JOIN tr_header ON tr_header.id = tr_detail.header_id 				
                                JOIN m_currency ON tr_detail.currency_id = m_currency.id
                                WHERE tr_header.store_id = $this->store_id
                                AND tr_header.tr_date = '$this->tr_date'
                                AND tr_detail.status IN (3,4) 
                                GROUP BY
                                    tr_header.store_id,
                                    tr_detail.currency_id,
                                    m_currency.currency_code,
                                    m_currency.currency_name,
                                    tr_header.tr_date
                                ORDER BY tr_detail.currency_id ASC");
    }
        
    function getdata() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $this->store_id = $postData['store_id'];
        $this->tr_date = revDate($postData['periode']);        
        echo json_encode($this->dbquery()->result(), true);
    }
    
    function exportpdf()
    {   
        $this->store_id = $this->uri->segment(4);;
        $this->tr_date = revDate($this->uri->segment(5));        
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
        $html_header .= '<br>' . trim($profil_usaha[0]->store_address) . '</br>';   
        if(strlen(trim($profil_usaha[0]->store_permit_number)) > 0){
            $html_header .= '<br>' . 'Authorized Money Changer ' . trim($profil_usaha[0]->store_permit_number) . '</br>';        
        }                   
        $html_header .= '<br>' . 'Summary by date period : ' . revDate($this->tr_date) . '</br><br></br><br></br>';        
        
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
                $html_table .= '<th width="5%" rowspan="2">Beginning Amount</th>';
                $html_table .= '<th width="15%" colspan="2">Buy</th>';
                $html_table .= '<th width="15%" colspan="2">Sell</th>';
                $html_table .= '<th width="5%" rowspan="2">End Amount</th>';
                $html_table .= '<th width="53%" rowspan="2">Description</th>';
            $html_table .= '</tr>'; 
            $html_table .= '<tr>';  
                $html_table .= '<th width="5%">Amount</th>'; 
                $html_table .= '<th width="10%">Equivalent</th>'; 
                $html_table .= '<th width="5%">Amount</th>'; 
                $html_table .= '<th width="10%">Equivalent</th>'; 
            $html_table .= '</tr>';               

            $pdf->SetFont('', 'B', 9);
            foreach($data_content as $r){
                $no++;
                $totalbuy = $totalbuy + (int) $r->buy_equivalent;
                $totalsell = $totalsell + (int) $r->st_end_amount;

                $html_table .= '<tr>';
                $html_table .= '<td>' . $no . '</td>';
                $html_table .= '<td>' . $r->currency_code . '</td>';
                
                $html_table .= '<td>' .  ( (int) $r->st_beginning_amount > 0 ? number_format($r->st_beginning_amount, "0", ".", ",") : '-' ). '</td>';
                
                $html_table .= '<td>' . ( (int) $r->buy_amount > 0 ? number_format($r->buy_amount, "0", ".", ",") : '-' ) . '</td>';
                $html_table .= '<td>' . ( (int) $r->buy_equivalent > 0 ? number_format($r->buy_equivalent, "0", ".", ",") : '-' ) . '</td>';

                $html_table .= '<td>' . ( (int) $r->sell_amount > 0 ? number_format($r->sell_amount, "0", ".", ",") : '-' ) . '</td>';
                $html_table .= '<td>' . ( (int) $r->sell_equivalent > 0 ? number_format($r->sell_equivalent, "0", ".", ",") : '-' ) . '</td>';

                $html_table .= '<td>' . ( (int) $r->st_end_amount > 0 ? number_format($r->st_end_amount, "0", ".", ",") : '-' ) . '</td>';

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
            $pdf->Cell(01, 01, 'Createdby,                       Spv,', 0, 1, 'L');
        }        
        $pdf->Output('Summary by date ' . revDate($this->tr_date).'.pdf','I');
    }

    function excel(){
        $this->libauth->check(__METHOD__);
        $this->store_id = $this->uri->segment(4);;
        $this->tr_date = revDate($this->uri->segment(5));        
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

        $bold = array('font' => array('bold' => true));
        $fontcolor = array('font' => array('color' => array('rgb' => 'ff0000')));
        $title = array('font' => array('color' => array('rgb' => 'ffffff'), 'bold' => true), 
                       'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => '337AB7')));

        // Field names in the first row
        $fields = $this->dbquery()->list_fields();
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
        foreach ($this->dbquery()->result_array() as $data) {
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
        $filename = 'Summary Buy Sell by date ' . revDate($tanggal1) . ' sd ' .  revDate($tanggal2);
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
