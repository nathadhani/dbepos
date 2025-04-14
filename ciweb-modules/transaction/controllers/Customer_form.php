<?php

class Customer_form extends Bks_Controller {

    function __construct() {
        $config = array('modules' => 'transaction', 'jsfiles' => array('customer_form'));
        parent::__construct($config);
        $this->Bksmdl->table = 'm_customer';
        $this->auth = $this->session->userdata( 'auth' );
        $this->store_id = $this->auth['store_id'];
    }
    
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('Customer Form');
        $this->template->set('tsmall', 'Customer');
        $this->template->set('icon', 'fa fa-edit');
        $data['auth'] = $this->auth;
        $id = $this->uri->segment(4);
        $data['data_customer'] = $this->db->query("SELECT customer_code FROM m_customer WHERE id = $id LIMIT 1")->result();
        $this->template->build('transaction/customer_form_v', $data);
    }
    
    function generate_code() {
        $Number = 1;
        $thn = SUBSTR(Date('Y-m-d'),0,4);
        $bln = SUBSTR(Date('Y-m-d'),5,2);
        $day = SUBSTR(Date('Y-m-d'),8,2);
        $storecode  =sprintf("%02d", $this->store_id);
        $sql = $this->db->query("SELECT max(right(customer_code,4)) as id 
                                 FROM m_customer 
                                 WHERE YEAR(created) = $thn
                                 AND MONTH(created) = $bln
                                 AND DAY(created) = $day")->result();
        if (count($sql) > 0) {
            foreach ($sql as $data) {
                $Number = intval($data->id) + 1;
            }
        }
        return SUBSTR($thn,2,2) . $bln . $day . $storecode . sprintf("%04d", $Number);
    } 

    function insert() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);        
        $postData = $this->input->post();

        $postData['customer_code'] = $this->generate_code();
        $postData['bornday'] = revDate($postData['bornday']);
        $postData['status'] = '1';

        if(isset($postData['permit_date_start'])){
            $postData['permit_date_start'] = revDate($postData['permit_date_start']);
        }
        if(isset($postData['permit_date_end'])){
            $postData['permit_date_end'] = revDate($postData['permit_date_end']);
        }        

        $this->db->trans_begin();
        $status = $this->Bksmdl->insert($postData);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $err = $this->db->error();
            $json['msg'] = $err['code'] . '<br>' . $err['message'];
            echo json_encode($json);
        } else {
            $id = $this->db->insert_id();
            $this->db->trans_commit();
            $json['id'] = $id;
            $json['msg'] = '1';
            echo json_encode($json);
        }
    }
    
    function update() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);        
        $postData = $this->input->post();

        $id = $postData['id'];             
        $postData['bornday'] = revDate($postData['bornday']);
        $postData['status'] = cekStatus($postData);
        unset($postData['id']);      

        if(isset($postData['permit_date_start'])){
            $postData['permit_date_start'] = revDate($postData['permit_date_start']);
        }
        if(isset($postData['permit_date_end'])){
            $postData['permit_date_end'] = revDate($postData['permit_date_end']);
        }
        
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
    
    function getcustomerbyid() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $id = json_decode($postData['id']);
        if($id != null && $id != ''){
            $query = $this->db->query("SELECT * FROM v_m_customer WHERE id = " . $id)->result();
            echo json_encode($query, true);
        }    
    }

    function ceknikdttot() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $nik = trim($postData['nik']);        
        if($nik != null && $nik != ''){
            $query = $this->db->query("SELECT deskripsi FROM ppatk_dttot WHERE deskripsi LIKE '%".$nik."%' LIMIT 1")->result();
            echo json_encode($query, true);
        }    
    }
    
    function add_foto(){
        $postData = $this->input->post();
        if (isset ($_FILES ['upload_foto'] ['name']) && !empty($_FILES ['upload_foto'] ['name'])) {
            $config['upload_path'] = FCPATH . 'assets/arsip/customer/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = $postData['CIF'] . '.jpg';
            $config['overwrite'] = TRUE;
            $config['max_size'] = 15360; // 15MB
            $this->load->library('upload',$config);
            $this->upload->initialize($config);            
            $filex = $config['upload_path'] . $config['file_name'];
            if (!$this->upload->do_upload('upload_foto')) {
                $error = array('error' => $this->upload->display_errors());
                echo $error["error"];
            } else {                
                $res_config['image_library'] = 'gd2';
                $res_config['create_thumb'] = FALSE;
                $res_config['maintain_ratio'] = FALSE;
                $res_config['width'] = 640;
                $res_config['height'] = 480;                
                $res_config['source_image'] = $filex;
                $this->load->library('image_lib', $res_config);
                $this->image_lib->initialize($res_config);
                if ($this->image_lib->resize()) {
                    $this->image_lib->clear();
                } else {
                    echo $this->image_lib->display_errors();
                }
            }
        }
    }

}
