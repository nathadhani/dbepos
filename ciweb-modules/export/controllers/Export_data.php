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
                $this->excel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
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
                    npwp_number
                FROM v_m_customer
                WHERE  customer_type_id IN (1)
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

            $this->excelcellColor('A1:J1', '337AB7');
            $this->excel->setActiveSheetIndex(0)->getStyle('A1:J1')->getFont()->setBold(TRUE);
            $this->excel->setActiveSheetIndex(0)->getStyle('A1:J1')->getFont()->setSize(11);

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
                $this->excel->setActiveSheetIndex(0)->getStyle('A'.$row.':'.'J'.$row)->getAlignment()->applyFromArray(
                                                                                            array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,)                                                                                  );
                
            }
            foreach (range('A', 'K') as $columnID) {
                $this->excel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
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
