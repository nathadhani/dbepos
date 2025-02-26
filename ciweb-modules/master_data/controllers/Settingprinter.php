<?php

class Settingprinter extends Bks_Controller {

    function __construct() {
        $config = array('modules' => 'master_data', 'jsfiles' => array('settingprinter'));
        parent::__construct($config);
        $this->auth = $this->session->userdata( 'auth' );
        $this->Bksmdl->table = 'printer_setting';
    }
    
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('Printer Setting');
        $this->template->set('tsmall', 'Main');
        $data['auth'] = $this->auth;
        $this->template->build('master_data/settingprinter_v', $data);
    }
    
    function insert() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $postData['status'] = cekStatus($postData);

        $this->db->trans_begin();
        $status = $this->Bksmdl->insert($postData);
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
        $postData = $this->input->post();

        $company_id = $postData['company_id'];        

        $this->Bksmdl->table = 'v_printer_setting';

        $where[0]['field'] = 'company_id';
        $where[0]['data']  = $company_id;
        $where[0]['sql']   = 'where';

        $cpData = $this->Bksmdl->getDataTable($where);
        $this->Bksmdl->outputToJson($cpData);
    }

    function setting_printer() {     
        ini_set('display_errors', 0);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $Ip_printer = $_POST['ip_printer'];
            if(!empty($Ip_printer) && $Ip_printer != '') {
                $dir_root = $_SERVER['DOCUMENT_ROOT'];
                $file_handle = fopen($dir_root . '/logs/setprinter.txt', 'w');
                fwrite($file_handle, $Ip_printer);
                fclose($file_handle);
            }    
        }
        return redirect('admin/setting/index');
    }
    

}
