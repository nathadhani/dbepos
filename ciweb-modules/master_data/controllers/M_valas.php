<?php

class M_valas extends Bks_Controller {

    function __construct() {
        $config = array('modules' => 'master_data', 'jsfiles' => array('m_valas'));
        parent::__construct($config);
        $this->Bksmdl->table = 'm_valas';
        $this->auth = $this->session->userdata( 'auth' );
        $this->companyId = $this->auth['company_id'];
    }
    
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('Currency');
        $this->template->set('tsmall', 'Data');
        $this->template->set('icon', 'fa fa-navicon');
        $this->template->build('master_data/m_valas_v');
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
        $this->Bksmdl->table = 'v_m_valas';
        $cpData = $this->Bksmdl->getDataTable();
        $this->Bksmdl->outputToJson($cpData);
    }   

    function getvalasbyid() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $valas_id = json_decode($postData['valas_id']);
        $query = $this->db->query("SELECT * FROM m_valas WHERE id = $valas_id")->result();
        echo json_encode($query, true);
    }
    
    function getValas() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $this->Bksmdl->table = 'm_valas';
        $this->Bksmdl->searchable = array('valas_code', 'valas_name', 'id');
        $this->Bksmdl->select2fields = array('id' => 'id', 'text' => "concat(valas_code,' - ',valas_name)");
        $result['results'] = $this->Bksmdl->getSelect2(array('status' => '1'));
        $result['more'] = true;
        echo json_encode($result);
    }  
        
    function getValasTrx() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $company_id = $this->input->post('company_id'); 
        $store_id = $this->input->post('store_id');
        $tr_id = $this->input->post('tr_id');
        if($tr_id === '2'){
            $menus = $this->db->order_by('valas_id,nominal', 'ASC')->get_where('v_stocksale', array('status' => '1', 'company_id' => $company_id, 'store_id' => $store_id))->result();        
            if (count($menus) > 0){
                $option ="<option selected value=''>-- Pilih Mata Uang --</option>";
                foreach($menus as $row){
                    $option.="<option value='".$row->valas_id."'>".$row->valas_code . " - " . $row->valas_name . " [ Nominal : " . number_format($row->nominal, "0", ".", ",") ." ]</option>";
                }
                echo $option;
            }    
        } else {
            $menus = $this->db->order_by('valas_code', 'ASC')->get_where('m_valas', array('status' => '1'))->result();
            if (count($menus) > 0){
                $option ="<option selected value=''>-- Pilih Mata Uang --</option>";
                foreach($menus as $row){
                    $option.="<option value='".$row->id."'>".$row->valas_code . " - " . $row->valas_name ."</option>";
                }
                echo $option;
            }
        }        
    }

}
