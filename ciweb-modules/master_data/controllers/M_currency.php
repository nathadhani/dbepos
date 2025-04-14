<?php

class M_currency extends Bks_Controller {

    function __construct() {
        $config = array('modules' => 'master_data', 'jsfiles' => array('m_currency'));
        parent::__construct($config);
        $this->Bksmdl->table = 'm_currency';
        $this->auth = $this->session->userdata( 'auth' );
        $this->store_id = $this->auth['store_id'];
    }
    
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('Currency');
        $this->template->set('tsmall', 'File');
        $this->template->set('icon', 'fa fa-navicon');
        $this->template->build('master_data/m_currency_v');
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
    
    function getdata() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $this->Bksmdl->table = 'm_currency';
        $cpData = $this->Bksmdl->getDataTable();
        $this->Bksmdl->outputToJson($cpData);
    }   

    function getcurrencybyid() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $currency_id = json_decode($postData['currency_id']);
        $query = $this->db->query("SELECT * FROM m_currency WHERE id = $currency_id")->result();
        echo json_encode($query, true);
    }
    
    function getcurrency() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $this->Bksmdl->table = 'm_currency';
        $this->Bksmdl->searchable = array('currency_code', 'currency_name', 'id');
        $this->Bksmdl->select2fields = array('id' => 'id', 'text' => "concat(currency_code,' - ',currency_name)");
        $result['results'] = $this->Bksmdl->getSelect2(array('status' => '1'));
        $result['more'] = true;
        echo json_encode($result);
    }  
        
    function getcurrencytrx() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();    
        $this->store_id = $postData['store_id'];
        $tr_id = $postData['tr_id'];
        if($tr_id === '2'){
            $menus = $this->db->order_by('currency_id,nominal', 'ASC')
                    ->get_where('v_stock_sell', array('status' => '1', 'store_id' => $this->store_id))->result();        
            if (count($menus) > 0){
                $option ="<option selected value=''>Pilih...</option>";
                foreach($menus as $row){
                    $option.="<option value='".$row->currency_id."'>".$row->currency_code . " - " . $row->currency_name . " [ Nominal : " . number_format($row->nominal, "0", ".", ",") ." ]</option>";
                }
                echo $option;
            }    
        } else {
            $menus = $this->db->order_by('currency_code', 'ASC')->get_where('m_currency', array('status' => '1'))->result();
            if (count($menus) > 0){
                $option ="<option selected value=''>Pilih...</option>";
                foreach($menus as $row){
                    $option.="<option value='".$row->id."'>".$row->currency_code . " - " . $row->currency_name ."</option>";
                }
                echo $option;
            }
        }        
    }

}
