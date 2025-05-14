<?php

class Export_data extends Bks_Controller {

    function __construct() {        
        $config = array('modules' => 'export', 'jsfiles' => array('export_data'));
        parent::__construct($config);
        $this->auth = $this->session->userdata('auth');
        $this->userid = $this->auth['id'];
    }
    
    Public function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('Data');
        $this->template->set('tsmall', 'Export');
        $this->template->set('icon', 'fa fa-chart');
        $this->template->build('export/export_data_v');
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

    function export_data(){
        $postData = $this->input->post();
        $export_id = $postData['export_id'];
        if(isset($postData['store_id'])){
            $store_id = ( is_array($postData['store_id']) ? implode(',', $postData['store_id']) : $postData['store_id']);
        }
        if(isset($postData['period_year'])){
            $year = $postData['period_year'];
        }
        if(isset($postData['triwulan_ke'])){
            $triwulan_ke = $postData['triwulan_ke'];
            $bulan_ke1 = '';
            $bulan_ke3 = '';
            if($triwulan_ke == '1'){
                $bulan_ke1 = 1;
                $bulan_ke3 = 3;    
            }
            if($triwulan_ke == '2'){
                $bulan_ke1 = 4;
                $bulan_ke3 = 6;    
            }
            if($triwulan_ke == '3'){
                $bulan_ke1 = 7;
                $bulan_ke3 = 9;    
            }
            if($triwulan_ke == '4'){
                $bulan_ke1 = 10;
                $bulan_ke3 = 12;    
            }            
        }

        /** Export - Data Customer */
        /************************************************************************************************************************************************************/
        if($export_id == '1'){
            $query = "SELECT 
                        customer_code,
                        customer_name,
                        customer_nick_name,
                        customer_handphone,
                        customer_phone,
                        customer_address,
                        rt_rw,
                        village,
                        sub_district,
                        city,
                        placeofbirth,
                        bornday,
                        gender_name,
                        customer_job_name,
                        customer_type_name,
                        customer_data_name,
                        customer_data_number,
                        nationality_desc,
                        npwp_number,
                        npwp_name,
                        customerprofil,
                        IF(status = '1', 'Active', 'Non Active') AS status,
                        created,
                        updated,
                        createdby_name,
                        updatedby_name
                    FROM v_m_customer
                    ORDER BY customer_code ASC";       
         
            if (!$this->db->query($query))
            return false;        

            $this->load->library('excel');
            $this->excel->getProperties()->setTitle("export")->setDescription("none");
            $this->excel->setActiveSheetIndex(0);
            $this->excel->getActiveSheet()->setTitle("temp");
            
            $this->excel->setActiveSheetIndex(0)->setCellValue('A1', "CIF");
            $this->excel->setActiveSheetIndex(0)->setCellValue('B1', "Name"); 
            $this->excel->setActiveSheetIndex(0)->setCellValue('C1', "Nick Name");
            $this->excel->setActiveSheetIndex(0)->setCellValue('D1', "Celluler");
            $this->excel->setActiveSheetIndex(0)->setCellValue('E1', "Phone"); 
            $this->excel->setActiveSheetIndex(0)->setCellValue('F1', "Address");
            $this->excel->setActiveSheetIndex(0)->setCellValue('G1', "RT/RW"); 
            $this->excel->setActiveSheetIndex(0)->setCellValue('H1', "Village");
            $this->excel->setActiveSheetIndex(0)->setCellValue('I1', "Sub District"); 
            $this->excel->setActiveSheetIndex(0)->setCellValue('J1', "City");
            $this->excel->setActiveSheetIndex(0)->setCellValue('K1', "Place of birth");
            $this->excel->setActiveSheetIndex(0)->setCellValue('L1', "Born day");
            $this->excel->setActiveSheetIndex(0)->setCellValue('M1', "Gender");
            $this->excel->setActiveSheetIndex(0)->setCellValue('N1', "Job");
            $this->excel->setActiveSheetIndex(0)->setCellValue('O1', "Type");
            $this->excel->setActiveSheetIndex(0)->setCellValue('P1', "Identity Type Name");
            $this->excel->setActiveSheetIndex(0)->setCellValue('Q1', "Identity Type Number");
            $this->excel->setActiveSheetIndex(0)->setCellValue('R1', "Nationality");
            $this->excel->setActiveSheetIndex(0)->setCellValue('S1', "Npwp Number");
            $this->excel->setActiveSheetIndex(0)->setCellValue('T1', "Npwp Name");
            $this->excel->setActiveSheetIndex(0)->setCellValue('U1', "Profil");
            $this->excel->setActiveSheetIndex(0)->setCellValue('V1', "Status");
            $this->excel->setActiveSheetIndex(0)->setCellValue('W1', "Created");
            $this->excel->setActiveSheetIndex(0)->setCellValue('X1', "Updated");
            $this->excel->setActiveSheetIndex(0)->setCellValue('Y1', "Created by");
            $this->excel->setActiveSheetIndex(0)->setCellValue('Z1', "Updated by");

            $this->excelcellColor('A1:Z1', '337AB7');
            $this->excel->setActiveSheetIndex(0)->getStyle('A1:Z1')->getFont()->setBold(TRUE);
            $this->excel->setActiveSheetIndex(0)->getStyle('A1:Z1')->getFont()->setSize(11);

            $row = 1;
            foreach ($this->db->query($query)->result_array() as $data) {         
                $row++;   
                $this->excel->setActiveSheetIndex(0)->setCellValue('A'.$row, "'".$data['customer_code']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('B'.$row, $data['customer_name']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('C'.$row, $data['customer_nick_name']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('D'.$row, "'".$data['customer_handphone']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('E'.$row, "'".$data['customer_phone']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('F'.$row, $data['customer_address']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('G'.$row, $data['rt_rw']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('H'.$row, $data['village']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('I'.$row, $data['sub_district']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('J'.$row, $data['city']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('K'.$row, $data['placeofbirth']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('L'.$row, $data['bornday']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('M'.$row, $data['gender_name']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('N'.$row, $data['customer_job_name']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('O'.$row, $data['customer_type_name']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('P'.$row, $data['customer_data_name']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('Q'.$row, "'".$data['customer_data_number']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('R'.$row, $data['nationality_desc']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('S'.$row, "'".$data['npwp_number']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('T'.$row, $data['npwp_name']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('U'.$row, $data['customerprofil']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('V'.$row, $data['status']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('W'.$row, $data['created']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('X'.$row, $data['updated']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('Y'.$row, $data['createdby_name']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('Z'.$row, $data['updatedby_name']);                
                $this->excel->setActiveSheetIndex(0)->getStyle('A'.$row.':'.'J'.$row)->getAlignment()->applyFromArray(
                                                                                            array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,)                                                                                        );
                
            }
            foreach (range('A', 'AA') as $columnID) {
                $this->excel->getActiveSheet(0)->getColumnDimension($columnID)->setAutoSize(true);
            }
            $this->excel->setActiveSheetIndex(0);
        }

        /** Export - Data Sipesat */
        /************************************************************************************************************************************************************/
        if($export_id == '2'){
            $query = "SELECT 
                    NULL AS idpjk,
                    customer_type_id,
                    customer_name,
                    placeofbirth,
                    bornday,
                    customer_address,                 
                    (
                        SELECT
                        CASE WHEN customer_data_id = 1 THEN customer_data_number END
                    )
                    AS customer_data_number_ktp,
                    (
                        SELECT
                        CASE WHEN customer_data_id <> 1 THEN customer_data_number END
                    )
                    AS customer_data_number_other,

                    NULL as no_id,
                    customer_code,
                    npwp_number,
                    created
                FROM v_m_customer
                WHERE  customer_type_id IN (1)
                AND YEAR(created) = $year
                AND MONTH(created) >= $bulan_ke1
                AND MONTH(created) <= $bulan_ke3
                ORDER BY customer_code ASC";
         
            if (!$this->db->query($query))
            return false;

            $this->load->library('excel');
            $this->excel->getProperties()->setTitle("export")->setDescription("none");
            $this->excel->setActiveSheetIndex(0);
            $this->excel->getActiveSheet()->setTitle("temp");
            
            $this->excel->setActiveSheetIndex(0)->setCellValue('A1', "idpjk");
            $this->excel->setActiveSheetIndex(0)->setCellValue('B1', "kode_nasabah"); 
            $this->excel->setActiveSheetIndex(0)->setCellValue('C1', "nama_nasabah");
            $this->excel->setActiveSheetIndex(0)->setCellValue('D1', "tempat_lahir");
            $this->excel->setActiveSheetIndex(0)->setCellValue('E1', "tanggal_lahir"); 
            $this->excel->setActiveSheetIndex(0)->setCellValue('F1', "alamat");
            $this->excel->setActiveSheetIndex(0)->setCellValue('G1', "no_ktp"); 
            $this->excel->setActiveSheetIndex(0)->setCellValue('H1', "no_id");
            $this->excel->setActiveSheetIndex(0)->setCellValue('I1', "no_cif"); 
            $this->excel->setActiveSheetIndex(0)->setCellValue('J1', "npwp");
            $this->excel->setActiveSheetIndex(0)->setCellValue('K1', "created");

            $this->excelcellColor('A1:K1', '337AB7');
            $this->excel->setActiveSheetIndex(0)->getStyle('A1:K1')->getFont()->setBold(TRUE);
            $this->excel->setActiveSheetIndex(0)->getStyle('A1:K1')->getFont()->setSize(11);

            $row = 1;
            foreach ($this->db->query($query)->result_array() as $data) {
                $row++;
                $this->excel->setActiveSheetIndex(0)->setCellValue('A'.$row, "");
                $this->excel->setActiveSheetIndex(0)->setCellValue('B'.$row, $data['customer_type_id']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('C'.$row, $data['customer_name']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('D'.$row, $data['placeofbirth']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('E'.$row, $data['bornday']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('F'.$row, $data['customer_address']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('G'.$row, $data['customer_data_number_ktp']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('H'.$row, $data['customer_data_number_other']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('I'.$row, $data['customer_code']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('J'.$row, $data['npwp_number']);           
                $this->excel->setActiveSheetIndex(0)->setCellValue('K'.$row, $data['created']);           
                $this->excel->setActiveSheetIndex(0)->getStyle('A'.$row.':'.'K'.$row)->getAlignment()->applyFromArray(
                                                                                            array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,)                                                                                  );
                
            }
            foreach (range('A', 'L') as $columnID) {
                $this->excel->getActiveSheet(0)->getColumnDimension($columnID)->setAutoSize(true);
            }
            $this->excel->setActiveSheetIndex(0);
        }

        /** Export - Data Summary Transaction By Currency */
        /************************************************************************************************************************************************************/
        if($export_id == '3'){
            $query = "SELECT
                    year(tr_header.tr_date) AS tr_year,
                    month(tr_header.tr_date) AS tr_month,

                    m_currency.currency_code,

                    SUM(IF(tr_header.tr_id = 1 AND tr_detail.status IN (3,4,9), (tr_detail.nominal * tr_detail.sheet),0)) AS buy_amount,
                    SUM(IF(tr_header.tr_id = 1 AND tr_detail.status IN (3,4,9), (tr_detail.nominal * tr_detail.sheet) * tr_detail.price,0)) AS buy_equivalent,

                    SUM(IF(tr_header.tr_id = 2 AND tr_detail.status IN (3,4,9), (tr_detail.nominal * tr_detail.sheet),0)) AS sell_amount,
                    SUM(IF(tr_header.tr_id = 2 AND tr_detail.status IN (3,4,9), (tr_detail.nominal * tr_detail.sheet) * tr_detail.price,0)) AS sell_equivalent,

                    m_currency.currency_name,
                    m_store.store_name,
                    m_store.store_address

                    FROM tr_detail
                    JOIN tr_header ON tr_detail.header_id = tr_header.id
                    JOIN m_currency ON tr_detail.currency_id = m_currency.id
                    JOIN m_store ON tr_header.store_id = m_store.id
                    WHERE tr_header.store_id =  $store_id
                    AND year(tr_header.tr_date) = $year
                    AND tr_detail.status IN (3,4,9)
                    GROUP BY year(tr_header.tr_date), month(tr_header.tr_date), m_currency.currency_code, m_currency.currency_name
                    ORDER BY m_currency.id ASC";
         
            if (!$this->db->query($query))
            return false;

            $this->load->library('excel');
            $this->excel->getProperties()->setTitle("export")->setDescription("none");
            $this->excel->setActiveSheetIndex(0);
            $this->excel->getActiveSheet()->setTitle("temp");
            
            $this->excel->setActiveSheetIndex(0)->setCellValue('A1', "Year");
            $this->excel->setActiveSheetIndex(0)->setCellValue('B1', "Month"); 
            $this->excel->setActiveSheetIndex(0)->setCellValue('C1', "Currency");
            $this->excel->setActiveSheetIndex(0)->setCellValue('D1', "Buy - Amount");
            $this->excel->setActiveSheetIndex(0)->setCellValue('E1', "Buy - Equivalent"); 
            $this->excel->setActiveSheetIndex(0)->setCellValue('F1', "Sell - Amount");
            $this->excel->setActiveSheetIndex(0)->setCellValue('G1', "Sell - Equivalent"); 
            $this->excel->setActiveSheetIndex(0)->setCellValue('H1', "Description");

            $this->excel->setActiveSheetIndex(0)->setCellValue('I1', "Store Name");
            $this->excel->setActiveSheetIndex(0)->setCellValue('J1', "Store Address");

            $this->excelcellColor('A1:J1', '337AB7');
            $this->excel->setActiveSheetIndex(0)->getStyle('A1:J1')->getFont()->setBold(TRUE);
            $this->excel->setActiveSheetIndex(0)->getStyle('A1:J1')->getFont()->setSize(11);

            $row = 1;
            foreach ($this->db->query($query)->result_array() as $data) {
                $row++;
                $this->excel->setActiveSheetIndex(0)->setCellValue('A'.$row, $data['tr_year']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('B'.$row, $data['tr_month']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('C'.$row, $data['currency_code']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('D'.$row, $data['buy_amount']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('E'.$row, $data['buy_equivalent']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('F'.$row, $data['sell_amount']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('G'.$row, $data['sell_equivalent']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('H'.$row, $data['currency_name']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('I'.$row, $data['store_name']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('J'.$row, $data['store_address']);
                
                $this->excel->setActiveSheetIndex(0)->getStyle('A'.$row.':'.'J'.$row)->getAlignment()->applyFromArray(
                                                                                            array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,)                                                                                  );
                
            }
            foreach (range('A', 'J') as $columnID) {
                $this->excel->getActiveSheet(0)->getColumnDimension($columnID)->setAutoSize(true);
            }
            $this->excel->setActiveSheetIndex(0);
        }

        /** Export - Data Summary Transaction By Job Customer */
        /************************************************************************************************************************************************************/
        if($export_id == '4'){
            $query = "select
                        year(tr_header.tr_date) as tr_year,
                        month(tr_header.tr_date) as tr_month,

                        m_customer_job.customer_job_name,

                        (select count( distinct b.customer_id) from tr_header as b
                                left join m_customer as c
                                on b.customer_id = c.id
                                left join m_customer_job as d
                                on c.job_id = d.id
                                where b.store_id = tr_header.store_id
                                and year(b.tr_date) = year(tr_header.tr_date)
                                and month(b.tr_date) = month(tr_header.tr_date)
                                and b.tr_id = 1
                                and b.status in (3,4,9)
                                and d.id = c.job_id) as buy_count,
                                
                        (select sum( (a.nominal * a.sheet) * a.price) from tr_detail as a
                                join tr_header as b on a.header_id = b.id
                                left join m_customer as c
                                on b.customer_id = c.id
                                left join m_customer_job as d
                                on c.job_id = d.id
                                where b.store_id = tr_header.store_id
                                and year(b.tr_date) = year(tr_header.tr_date)
                                and month(b.tr_date) = month(tr_header.tr_date)
                                and b.tr_id = 1
                                and b.status in (3,4,9)
                                and d.id = c.job_id) as buy_equivalent,		   

                        (select count( distinct b.customer_id) from tr_header as b
                                left join m_customer as c
                                on b.customer_id = c.id
                                left join m_customer_job as d
                                on c.job_id = d.id
                                where b.store_id = tr_header.store_id
                                and year(b.tr_date) = year(tr_header.tr_date)
                                and month(b.tr_date) = month(tr_header.tr_date)
                                and b.tr_id = 2
                                and b.status in (3,4,9)
                                and d.id = c.job_id) as sell_count,
                                
                        (select sum( (a.nominal * a.sheet) * a.price) from tr_detail as a
                                join tr_header as b on a.header_id = b.id
                                left join m_customer as c
                                on b.customer_id = c.id
                                left join m_customer_job as d
                                on c.job_id = d.id
                                where b.store_id = tr_header.store_id
                                and year(b.tr_date) = year(tr_header.tr_date)
                                and month(b.tr_date) = month(tr_header.tr_date)
                                and b.tr_id = 2
                                and b.status in (3,4,9)
                                and d.id = c.job_id) as sell_equivalent,
                                
                        (
                            select 
                            case 
                                when m_customer_job.risk_category = 1 then 'biasa'
                                when m_customer_job.risk_category = 2 then 'sedang'
                                when m_customer_job.risk_category = 3 then 'pep'
                            end
                        ) as risk_category,

                        m_store.store_name,
                        m_store.store_address

                        from tr_header
                        join m_customer on tr_header.customer_id = m_customer.id
                        join m_customer_job on m_customer.job_id = m_customer_job.id
                        join m_store on tr_header.store_id = m_store.id
                        where tr_header.store_id =  $store_id
                        and year(tr_header.tr_date) = $year
                        and tr_header.status in (3,4,9)
                        group by year(tr_header.tr_date), month(tr_header.tr_date), m_customer_job.customer_job_name
                        order by m_customer_job.customer_job_name asc";
         
            if (!$this->db->query($query))
            return false;

            $this->load->library('excel');
            $this->excel->getProperties()->setTitle("export")->setDescription("none");
            $this->excel->setActiveSheetIndex(0);
            $this->excel->getActiveSheet()->setTitle("temp");
            
            $this->excel->setActiveSheetIndex(0)->setCellValue('A1', "Year");
            $this->excel->setActiveSheetIndex(0)->setCellValue('B1', "Month"); 
            $this->excel->setActiveSheetIndex(0)->setCellValue('C1', "Job Name");
            
            $this->excel->setActiveSheetIndex(0)->setCellValue('D1', "Buy - Count");
            $this->excel->setActiveSheetIndex(0)->setCellValue('E1', "Buy - Equivalent"); 

            $this->excel->setActiveSheetIndex(0)->setCellValue('F1', "Sell - Count");
            $this->excel->setActiveSheetIndex(0)->setCellValue('G1', "Sell - Equivalent"); 

            $this->excel->setActiveSheetIndex(0)->setCellValue('H1', "Risk Category");

            $this->excel->setActiveSheetIndex(0)->setCellValue('I1', "Store Name");
            $this->excel->setActiveSheetIndex(0)->setCellValue('J1', "Store Address");

            $this->excelcellColor('A1:J1', '337AB7');
            $this->excel->setActiveSheetIndex(0)->getStyle('A1:J1')->getFont()->setBold(TRUE);
            $this->excel->setActiveSheetIndex(0)->getStyle('A1:J1')->getFont()->setSize(11);

            $row = 1;
            foreach ($this->db->query($query)->result_array() as $data) {
                $row++;
                $this->excel->setActiveSheetIndex(0)->setCellValue('A'.$row, $data['tr_year']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('B'.$row, $data['tr_month']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('C'.$row, $data['customer_job_name']);

                $this->excel->setActiveSheetIndex(0)->setCellValue('D'.$row, $data['buy_count']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('E'.$row, $data['buy_equivalent']);
                
                $this->excel->setActiveSheetIndex(0)->setCellValue('F'.$row, $data['sell_count']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('G'.$row, $data['sell_equivalent']);
                
                $this->excel->setActiveSheetIndex(0)->setCellValue('H'.$row, $data['risk_category']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('I'.$row, $data['store_name']);
                $this->excel->setActiveSheetIndex(0)->setCellValue('J'.$row, $data['store_address']);

                $this->excel->setActiveSheetIndex(0)->getStyle('A'.$row.':'.'J'.$row)->getAlignment()->applyFromArray(
                                                                                            array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,)                                                                                  );
                
            }
            foreach (range('A', 'J') as $columnID) {
                $this->excel->getActiveSheet(0)->getColumnDimension($columnID)->setAutoSize(true);
            }
            $this->excel->setActiveSheetIndex(0);
        }

        ob_start();
        $objWriter = new PHPExcel_Writer_Excel2007($this->excel);
        $objWriter->setOffice2003Compatibility(true);
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
