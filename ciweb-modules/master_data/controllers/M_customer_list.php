<?php

class M_customer_list extends Bks_Controller {

    function __construct() 
    {
        $config = array('modules' => 'master_data', 'jsfiles' => array('m_customer_list'));
        parent::__construct($config);        
        $this->auth = $this->session->userdata( 'auth' );        
    }

    function index()
    {
        $this->libauth->check(__METHOD__);
        $this->template->title('Cust. List');
        $this->template->set('tsmall', 'Data');
        $this->template->set('icon', 'fa fa-list');
        $data['auth'] = $this->auth;
        $this->template->build('master_data/m_customer_list_v', $data);
    }

    function getData() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $company_id = $postData['company_id'];
        $this->Bksmdl->table = 'v_m_customer';
        
        $where[0]['field'] = 'company_id';
        $where[0]['data']  = $company_id;
        $where[0]['sql']   = 'where';

        $cpData = $this->Bksmdl->getDataTable($where);
        $this->Bksmdl->outputToJson($cpData);
    }

    function excel(){
        $this->libauth->check(__METHOD__);
        $company_id = $this->uri->segment(4);
        $query = $this->db->query("SELECT customer_code,
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
                                        customer_work_name,
                                        customer_type_name,
                                        customer_data_name,
                                        customer_data_number,
                                        nationality_code,
                                        npwp_number,
                                        npwp_name,
                                        customerprofil,
                                        kode_densus_dttot,                                        
                                        company_address,
                                        IF(status = '1', 'Active', 'Non Active') AS status,
                                        created,
                                        updated,
                                        createdby_name,
                                        updatedby_name
                                    FROM v_m_customer
                                    WHERE company_id = $company_id
                                    ORDER BY customer_code ASC");

        if (!$query)
        return false;

        $fields = $query->list_fields();
        $totcol = $query->num_rows();
        $maxrow = $totcol+1;

        // echo $this->db->last_query();exit;

        $this->load->library('excel');
        $this->excel->getProperties()->setTitle("export")->setDescription("none");
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle("Customer List");

        $bold = array('font' => array('bold' => true));
        $title = array('font' => array('color' => array('rgb' => 'ffffff'), 'bold' => true), 
                       'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => '337AB7')));

        // Field names in the first row
        $fields = $query->list_fields();
        $col = 0;      

        $judul = array('Customer Code',
                    'Name',
                    'Nick Name',
                    'Celluler',
                    'Phone',
                    'address',
                    'RT/RW',
                    'Village',
                    'Sub District',
                    'City',
                    'Place of birth',
                    'Born day',
                    'Gender',
                    'Work',
                    'Type',
                    'Identity Type Name',
                    'Identity Type Number',
                    'Nationality',
                    'Npwp Number',
                    'Npwp Name',
                    'Customer Profil',
                    'DTTOT Code',                    
                    'Branch',
                    'Status',
                    'Created',
                    'Updated',
                    'Created by Name',
                    'Updated by Name');

        foreach ($fields as $key => $field) {
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $judul[$key]);
            $this->excel->getActiveSheet()->getStyleByColumnAndRow($col, 1)->applyFromArray($title);
            $col++;
        }

        // Fetching the table data
        $row = 2;
        foreach ($query->result_array() as $data) {
            $col = 0;
            foreach ($fields as $field) {
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data[$field]); // Retreive Data Value                
                $col++;
            }
            $row++;
        }

        foreach (range('A', 'AC') as $columnID) {
            $this->excel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }
        $this->excel->setActiveSheetIndex(0);
        

        // Sending headers to force the user to download the file
        $filename = 'Customer List';
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
