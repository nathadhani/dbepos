<?php

class Customer extends Bks_Controller {

    function __construct(){
        $config = array('modules' => 'transaction', 'jsfiles' => array('customer'));
        parent::__construct($config);
        $this->Bksmdl->table = 'm_customer';
        $this->auth = $this->session->userdata( 'auth' );       
    }
    
    function index(){
        $this->libauth->check(__METHOD__);
        $this->template->title('New');
        $this->template->set('tsmall', 'Buy / Sel - New');
        $this->template->set('icon', 'fa fa-edit');
        $this->template->build('transaction/customer_v');
    }    
    
    function getdata()
    {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $this->Bksmdl->table = 'v_m_customer';
        $search = $postData['search'];
        $field = array('customer_code',
                       'customer_name',
                       'customer_address',
                       'customer_handphone',
                       'customer_data_number');
        $orderby = "ORDER BY customer_name, customer_address ASC";
        $query = $this->Bksmdl->search_text_query_to_datatable($search, $field, $orderby);
        $this->Bksmdl->outputToJson($query);
    }

    function excel(){
        $this->libauth->check(__METHOD__);
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
        $this->excel->getActiveSheet()->setTitle("temp");

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
                    'Job',
                    'Type',
                    'Identity Type Name',
                    'Identity Type Number',
                    'Nationality',
                    'Npwp Number',
                    'Npwp Name',
                    'Customer Profil',
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
