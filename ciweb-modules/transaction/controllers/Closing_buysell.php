<?php

class Closing_buysell extends Bks_Controller {

    function __construct()
    {
        $config = array('modules' => 'transaction', 'jsfiles' => array('closing_buysell'));
        parent::__construct($config);
        $this->auth = $this->session->userdata( 'auth' );
        $this->userId = $this->auth['id'];
    }
    
    function index()
    {
        $this->libauth->check(__METHOD__);
        $this->template->title('Closing');
        $this->template->set('tsmall', 'Buy / Sell');
        $this->template->set('icon', 'fa fa-list');
        $data['auth'] = $this->auth;
        $this->template->build('transaction/closing_buysell_v', $data);
    }

    function closing_trxdate(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $store_id = $postData['store_id'];
        if(isset($postData['tr_date'])){
            $tr_date = revDate($postData['tr_date']);
        } else {                        
            $tr_date = date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d'))));
        }
        $this->db->trans_begin();
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $err = $this->db->error();
            $json['msg'] = $err['code'] . '<br>' . $err['message'];
            echo json_encode($json);
        } else {
            $this->db->where_in(tr_id,['1','2']);
            $this->db->where(array('store_id' => $store_id));
            $this->db->update('m_transaction_date', array('tr_date' => $tr_date, 'status' => 1, 'updated' => date('Y-m-d H:i:s', time()), 'updatedby' => $this->userId) );
            $this->db->trans_commit();
            $json['msg'] = '1';
            echo json_encode($json);
        }
    }

}
