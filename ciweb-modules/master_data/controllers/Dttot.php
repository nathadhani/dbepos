<?php

class Dttot extends Bks_Controller {

    function __construct() {        
        $config = array('modules' => 'master_data', 'jsfiles' => array('dttot'));
        parent::__construct($config);
        $this->Bksmdl->table = 'dttot';
        $this->auth = $this->session->userdata( 'auth' ); 
    }
    
    function index() {
        $this->template->title('Suspected Terrorist');
        $this->template->set('tsmall', 'Data');
        $this->template->build('master_data/dttot_v');
    }
    
    function insert() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);        
        
        $rows = []; 
        if(isset($_FILES["file"]["name"])){
            $path = $_FILES["file"]["tmp_name"];        
            $this->load->library('excel');
            $object = PHPExcel_IOFactory::load($path);
            $rows = [];
            foreach($object->getWorksheetIterator() as $worksheet){
                $highestRow = $worksheet->getHighestRow();        
                $highestColumn = $worksheet->getHighestColumn();       
                for($row=2; $row<=$highestRow; $row++){                                
                    $nama         = $worksheet->getCellByColumnAndRow(0, $row)->getValue();            
                    $deskripsi    = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $terduga      = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $kode_densus  = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $tpt_lahir    = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $tgl_lahir    = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $warga_negara = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $alamat       = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $data = [
                                'nama'         => $nama,            
                                'deskripsi'    => $deskripsi,
                                'terduga'      => $terduga,
                                'kode_densus'  => $kode_densus,
                                'tpt_lahir'    => $tpt_lahir,
                                'tgl_lahir'    => $tgl_lahir,
                                'warga_negara' => $warga_negara,
                                'alamat'       => $alamat,
                                'status'       => 1,
                                'created'      => date('Y-m-d H:i:s', time()),
                                'createdby'    => $this->auth['id']
                            ]; 
                    array_push($rows, $data);            
                }        
            }                       
        }      
        
        // var_dump($rows);exit;

        $this->db->trans_begin();
        $this->db->truncate($this->Bksmdl->table);        
        if(count($rows) > 0){
            $this->db->insert_batch($this->Bksmdl->table, $rows);
            // echo $this->db->last_query(); exit;                                                                                 
        } 
        if(count($rows) <= 0){ 
            $json['msg'] = 'Data Empty or Already Exists!';
            echo json_encode($json);            
        }            
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $err = $this->db->error();
            $json['msg'] = $err['code'] . '<br>' . $err['message'];
            echo json_encode($json);
        } else {
            $this->db->trans_commit();
            $json['msg'] = '1';
            echo json_encode($json);
        }            
    }    
    
    function update() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $postData['status'] = cekStatus($postData);
        $id = $postData['id'];
        unset($postData['id']);

        $this->db->trans_begin();
        $status = $this->Bksmdl->update($postData, 'id=' . $id);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $err = $this->db->error();
            $json['msg'] = $err['code'] . '<br>' . $err['message'];
            echo json_encode($json);
        } else {
            $this->db->trans_commit();
            $json['msg'] = '1';
            echo json_encode($json);
        }
    }
    
    function delete() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $id = json_decode($postData['id']);

        $this->db->trans_begin();
        $status = $this->Bksmdl->delete('id', $id);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $err = $this->db->error();
            $json['msg'] = $err['code'] . '<br>' . $err['message'];
            echo json_encode($json);
        } else {
            $this->db->trans_commit();
            $json['msg'] = '1';
            echo json_encode($json);
        }
    }
   
    function getData() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $cpData = $this->Bksmdl->getDataTable();
        $this->Bksmdl->outputToJson($cpData);
    }

}
