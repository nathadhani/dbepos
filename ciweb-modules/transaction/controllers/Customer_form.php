<?php

class Customer_form extends Bks_Controller {

    function __construct() {
        $config = array('modules' => 'transaction', 'jsfiles' => array('customer_form'));
        parent::__construct($config);
        $this->Bksmdl->table = 'm_customer';
        $this->auth = $this->session->userdata( 'auth' );
        $this->company_id = $this->auth['company_id']; 
    }
    
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('Customer Form');
        $this->template->set('tsmall', 'Customer');
        $this->template->set('icon', 'fa fa-edit');
        $data['auth'] = $this->auth;
        $this->template->build('transaction/customer_form_v', $data);
    }
    
    function generate_code($customer_type_id) {
        $Number = 1;
        $thn = SUBSTR(Date('Y-m-d'),0,4);
        $bln = SUBSTR(Date('Y-m-d'),5,2);
        $branchcode = sprintf("%02d", $this->company_id);
        $type_id = sprintf("%02d", $customer_type_id);
        $sql = $this->db->query("SELECT max(right(customer_code,4)) as id 
                                 FROM m_customer 
                                 WHERE company_id = $this->company_id
                                 AND customer_type_id = $customer_type_id
                                 AND YEAR(created) = $thn
                                 AND MONTH(created) = $bln")->result();
        if (count($sql) > 0) {
            foreach ($sql as $data) {
                $Number = intval($data->id) + 1;
            }
        }
        return SUBSTR($thn,2,2) . $bln . $branchcode  . $type_id . sprintf("%04d", $Number);
    } 

    function insert() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);        
        $postData = $this->input->post();

        $postData['company_id'] = $this->company_id;
        $postData['customer_code'] = $this->generate_code($postData['customer_type_id']);
        $postData['bornday'] = revDate($postData['bornday']);
        $postData['status'] = '1';

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
        $postData['company_id'] = $this->company_id; 
        $postData['bornday'] = revDate($postData['bornday']);
        $postData['status'] = cekStatus($postData);
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
    
    function getByID() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $id = json_decode($postData['id']);
        if($id != null && $id != ''){
            $query = $this->db->query("SELECT * FROM v_m_customer WHERE id = " . $id)->result();
            echo json_encode($query, true);
        }    
    }
    
    function add_image(){
        $postData = $this->input->post();
        if (isset ($_FILES ['upload_foto'] ['name']) && !empty($_FILES ['upload_foto'] ['name'])) {
            $upload_path = base_url().'assets/img/customer_form/';
            $config['upload_path'] = '../public/assets/img/customer_form/';
            $config['file_name'] = $postData['kode'] . '.jpg';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['overwrite'] = TRUE;
            $config['max_size'] = '8000';
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
                $res_config['width'] = 850;
                $res_config['height'] = 660;
                $res_config['source_image'] = $filex;
                $this->load->library('image_lib', $res_config);
                $this->image_lib->initialize($res_config);
                if ($this->image_lib->resize()) {
                    $this->image_lib->clear();
                    // $data['foto_url'] = $upload_path.''.$config['file_name'];
                    // $data['foto_filename'] = $config['file_name'];
                    // $status = $this->Bksmdl->update($data, 'id=' . $id);
                    // if ($status == 'true') {
                    //     $json['msg'] = '1';
                    //     echo json_encode($json);
                    // } else {
                    //     $json['msg'] = $status;
                    //     echo json_encode($json);
                    // }
                } else {
                    echo $this->image_lib->display_errors();
                }
            }
        }
    }

}
