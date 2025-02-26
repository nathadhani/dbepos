<?php

class User extends Bks_Controller {

    function __construct() {
        $config = array('modules' => 'user', 'jsfiles' => array('user'));
        parent::__construct($config);
        $this->Bksmdl->table = 'auth_users';
        $this->auth = $this->session->userdata( 'auth' );
        $this->companyId = $this->auth['company_id'];

    }
    
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('User');
        $this->template->set('tsmall', 'User');
        $this->template->set('icon', 'glyphicon glyphicon-user');
        $this->template->build('user/user_v');
    }
    
    function insert() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();

        $postData['username'] = trim(trim(strtolower($postData['username'])));        
        $postData['password'] = $this->encrypt->hash($postData['password']);
        $postData['password_plain'] = $postData['password'];
        $postData['fullname'] = trim(trim(ucwords($postData['fullname'])));
        $postData['status'] = cekStatus($postData);

        if(isset($postData['region'])){
            $postData['region'] = implode(',', $postData['region']);
            $mystring = $postData['region'];
            $findme   = ',';
            $pos = strpos($mystring, $findme);
            if($pos === false) {
                $postData['region'] = (int) $postData['region'];                                     
            }
        } else {
            $postData['region'] = Null;
        }

        $this->db->trans_begin();
        $status = $this->Bksmdl->insert($postData);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $err = $this->db->error();
            $json['msg'] = $err['code'] . '<br>' . $err['message'];
            echo json_encode($json);
        } else {
            $this->db->trans_commit();
            $id = $this->db->insert_id();
            $json['msg'] = '1';
            echo json_encode($json);
        }      
    }
    
    function update() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $postData['username'] = strtolower($postData['username']);
        if (strlen($postData['password']) > 0) {
            $postData['password'] = $this->encrypt->hash($postData['password']);
            $postData['password_plain'] = $postData['password'];
        } else {
            unset($postData['password']);
        }
        $postData['fullname'] = trim(trim(ucwords($postData['fullname'])));        
        $postData['status'] = cekStatus($postData);
        
        if(isset($postData['region'])){
            $postData['region'] = implode(',', $postData['region']);
            // $mystring = $postData['region'];
            // $findme   = ',';
            // $pos = strpos($mystring, $findme);
            // if($pos === false) {
            //     $postData['region'] = (int) $postData['region'];                                     
            // }
        } else {
            $postData['region'] = Null;
        }

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
        $this->Bksmdl->table = 'v_auth_users';
        $usergroup_id = $this->auth['usergroup_id'];
        if ($usergroup_id == '1') {
            $cpData = $this->Bksmdl->getDataTable();
        } else {
            $where[0]['field'] = 'company_id';
            $where[0]['data']  = $this->auth['company_id'];
            $where[0]['sql']   = 'where';
            $where[1]['field'] = 'usergroup_id > 1';
            $where[1]['data']  = NULL;
            $where[1]['sql']   = 'where';  
            $cpData = $this->Bksmdl->getDataTable($where);
        }    
        $this->Bksmdl->outputToJson($cpData);
    }
    
    function getUsergroup() {
        checkIfNotAjax();
        $usergroup_id = $this->auth['usergroup_id'];
        if ($usergroup_id != '1')
        {
            $this->libauth->check(__METHOD__);    
        }
        
        $this->Bksmdl->table = 'auth_usergroup';
        $this->Bksmdl->searchable = array('usergroupname');
        $this->Bksmdl->select2fields = array('id' => 'id', 'text' => "usergroupname");

        if ($usergroup_id == '1') {
            $result['results'] = $this->Bksmdl->getSelect2(array('status' => '1'));
        } else {
            $where2 = "id NOT IN (1,2)";
            $result['results'] = $this->Bksmdl->getSelect2(array('status' => '1'), $where2);
        }    

        $result['more'] = true;
        // echo $this->db->last_query(); exit;
        echo json_encode($result);
    } 
    
    function getUserlevel() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $this->Bksmdl->table = 'auth_userlevel';
        $this->Bksmdl->searchable = array('userlevelname', 'id');
        $this->Bksmdl->select2fields = array('id' => 'id', 'text' => "concat(userlevelname,' [', id,']')");
        $result['results'] = $this->Bksmdl->getSelect2(array('status' => '1'));
        $result['more'] = true;
        echo json_encode($result);
    }
    
    function getDataUser() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $this->Bksmdl->table = 'v_auth_users';
        $select = 'id,username,fullname,usergroupname';
        $searchfield = array('username','fullname','usergroupname');
        $where = array('status' => '1');
        $addwhere = array();
        $result['results'] = $this->Bksmdl->getSelect2bit($select, $searchfield, $where, $addwhere);
        $result['more'] = true;
        echo json_encode($result);
    }    
    
    function getCreatedby() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $this->Bksmdl->table = 'v_auth_users';
        $this->Bksmdl->searchable = array('username', 'fullname');
        $this->Bksmdl->select2fields = array('id' => 'id', 'text' => "fullname");
        $result['results'] = $this->Bksmdl->getSelect2(array('status' => '1', 'company_id' => $this->companyId), 'id <> 1');
        $result['more'] = true;
        echo json_encode($result);
    }
    
    function getuserbyId() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $id = $postData['id'];
        $query = $this->db->query("SELECT * FROM v_auth_users WHERE id = $id")->result();
        echo json_encode($query, true);
    }
    
    function getcountuserbyCompanyId() {
        checkIfNotAjax();
        $postData = $this->input->post();
        $company_id = $postData['company_id'];
        $query1 = $this->db->query("SELECT user_limits AS user_limits FROM m_company WHERE id = $company_id")->result();
        $query2 = $this->db->query("SELECT COUNT(id) AS count_users FROM auth_users WHERE company_id = $company_id")->result();
        $data = array(
                      'user_limits' => $query1[0]->user_limits , 
                      'count_users' => $query2[0]->count_users 
                     );
        echo json_encode($data, true);
    }

}
