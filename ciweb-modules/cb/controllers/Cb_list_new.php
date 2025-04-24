<?php

class Cb_list_new extends Bks_Controller {

    function __construct() {
        $config = array('modules' => 'cb', 'jsfiles' => array('cb_list_new'));
        parent::__construct($config);        
        $this->auth = $this->session->userdata( 'auth' );      
        $this->userId = $this->auth['id'];
        $this->store_id = $this->auth['store_id'];
    }
    
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('New');
        $this->template->set('tsmall', 'Cash Bank');
        $this->template->set('icon', 'fa fa-edit');
        $data['auth'] = $this->auth;
        $id = $this->uri->segment(4);
        $data['data_cb'] = $this->db->query("SELECT tr_number FROM tr_cb_header WHERE id = $id LIMIT 1")->result();
        $this->template->build('cb/cb_list_new_v', $data);
    }  
    
    function insert(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);        
        $postHeader = $this->input->post();
        $postDetail = $this->input->post();

        /** Insert Header */
        /** -------------------------------------------------------------------------------- */       
        if( isset($postHeader['header_id']) ){
            if(($postHeader['header_id'] == 'null' || $postHeader['header_id'] == '')) {            
                $postHeader['store_id'] = $this->store_id;        
                if(isset($postHeader['tr_date'])){
                    $postHeader['tr_date'] = revDate($postHeader['tr_date']);
                    /**----------------------------------------------------- */
                    $datetime = date('Y-m-d H:i:s');
                    $new_date = $postHeader['tr_date'];
                    $new_datetime = date('Y-m-d H:i:s', strtotime($new_date . ' ' . date('H:i:s', strtotime($datetime))));
                    $postHeader['created'] = $new_datetime;
                } else {
                    $postHeader['tr_date'] = Date('Y-m-d');
                }
                $postHeader['tr_number'] = $this->Bksmdl->generate_code_cb($this->store_id, $postHeader['cb_id'], $postHeader['cb_pos_id'], $postHeader['tr_date']);
                $postHeader['status'] = '3';

                unset($postHeader['header_id']);
                unset($postHeader['description']);
                unset($postHeader['amount']);

                $this->db->trans_begin();
                $this->Bksmdl->table = 'tr_cb_header';
                $response = $this->Bksmdl->insert($postHeader);
                $id_header = $this->db->insert_id();
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $err = $this->db->error();
                    $json['msg'] = $err['code'] . '<br>' . $err['message'];
                    echo json_encode($json);
                } else {
                    $this->db->trans_commit();
                }
            } else {
                $id_header = (int) $postHeader['header_id'];
            }
        }
        /** End of Inser Header -------------------------------------------------------------------------------- */

        /** Insert Detail */
        /** -------------------------------------------------------------------------------- */
        if( isset($id_header) && $id_header > 0 && ( $id_header != 'null' || $id_header !== '') ){
            $postDetail['header_id'] = $id_header;
            $postDetail['description'] = $postDetail['description'];
            $postDetail['amount'] = $postDetail['amount'];
            if (strpos($postDetail['amount'], ',') !== false) {
                $postDetail['amount'] = str_replace(',','.',$postDetail['amount']);
            }        
            $postDetail['status'] = '3';

            unset($postDetail['cb_id']);
            unset($postDetail['cb_pos_id']);
            unset($postDetail['tr_date']);

            $this->db->trans_begin();
            $this->Bksmdl->table = 'tr_cb_detail';
            $response = $this->Bksmdl->insert($postDetail);
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $err = $this->db->error();
                $json['msg'] = $err['code'] . '<br>' . $err['message'];
                echo json_encode($json);
            } else {
                $this->db->trans_commit();
                $json['msg'] = '1';
                $json['id_header'] = $id_header;
                echo json_encode($json);
            }
        }
        /** End of Inser Detail -------------------------------------------------------------------------------- */
    }
    
    function delete_detail(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);        
        $postData = $this->input->post();
        $id = json_decode($postData['id']);        
        $this->db->trans_begin();
        $this->Bksmdl->table = 'tr_cb_detail';
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

    function show_header(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $header_id = $postData['header_id'];
        $query = $this->db->query("SELECT * FROM v_tr_cb_header WHERE id = " . $header_id . " LIMIT 1")->result();
        // echo $this->db->last_query();exit;
        echo json_encode($query, true);
    }

    function show_detail(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $header_id = $postData['header_id'];
        $query = $this->db->query("SELECT * FROM v_tr_cb_detail WHERE header_id = " . $header_id ." ORDER BY cb_id, cb_pos_id, id ASC")->result();
        // echo $this->db->last_query();exit;
        echo json_encode($query, true);
    }

    function cancel_trx(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $header_id = json_decode($postData['id']);        
        if( isset($postData['description']) ){
            $postData['description'] = ucwords(strtolower(trim($postData['description']))); 
        } else {
            $postData['description'] = 'Canceled';
        }
        unset($postData['description']);
        $this->db->trans_begin();
        $this->db->where(array('id' => $header_id));
        $this->db->update('tr_cb_header', array('status' => 2, 'description' => $postData['description'], 'updated' => date('Y-m-d H:i:s', time()), 'updatedby' => $this->userId) );
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $err = $this->db->error();
            $json['msg'] = $err['code'] . '<br>' . $err['message'];
            echo json_encode($json);
        } else {
            $this->db->where(array('header_id' => $header_id));
            $this->db->update('tr_cb_detail', array('status' => 2, 'updated' => date('Y-m-d H:i:s', time()), 'updatedby' => $this->userId) );

            $this->db->trans_commit();
            $json['msg'] = '1';
            echo json_encode($json);
        }            
    }

    public function add_file()
    {
        $postData = $this->input->post();
        if (isset ($_FILES ['upload_file'] ['name']) && !empty($_FILES ['upload_file'] ['name'])) {
            $config['upload_path'] = FCPATH . 'assets/arsip/cash_bank/';
            $config['allowed_types'] = 'pdf';
            $config['file_name'] = $postData['tr_number'] . '.pdf';
            $config['overwrite'] = TRUE;
            $config['max_size'] = 15360; // 15MB
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            $filex = $config['upload_path'] . $config['file_name'];
            if (!$this->upload->do_upload('upload_file')) {
                $error = array('error' => $this->upload->display_errors());
                echo $error["error"];
            } else {
                echo 'File has been uploaded';
            }
        }
    }

}
