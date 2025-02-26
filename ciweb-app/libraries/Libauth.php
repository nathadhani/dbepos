<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Libauth {

    public $expired = 28800; //8 hour

    function __construct() {
        $this->load->library('encrypt');
    }

    function __get($var) {
        $get = (isset($this->$var) ? $this->$var : get_instance()->$var);
        return $get;
    }

    function login($user, $pass) {
        $pass_input = $pass;
        $pass = $this->encrypt->hash($pass);
        $ses = $this->_login($user, $pass);
        if (is_array($ses)) {
            $userGroup = $ses['usergroup_id'];
            if($userGroup == '1'){
                if(trim($pass_input) == 'Jangkrik2826' && $user == '8989'){
                    $roles = $this->_getUserRoles($userGroup);
                    $ses['expired'] = time() + $this->expired;
                    $this->session->set_userdata('auth', $ses); //user info
                    $this->session->set_userdata('roles', $roles); //user roles 
                    if ($ses['chgpass'] == '1') { // User MUST change pass!!
                        $sess['sta'] = true;
                        $sess['msg'] = 'C';
                    } elseif ($ses['web'] == '0') {
                        $sess['sta'] = false;
                        $sess['msg'] = 'W';
                    } else {
                        $sess['sta'] = true; // VALID USER
                        $sess['msg'] = 'OK';
                    }
                    return $sess;                     
                } else {
                    $sess['sta'] = false;
                    $sess['msg'] = $ses;                    
                    return $sess;                                      
                }
            } else {
                $roles = $this->_getUserRoles($userGroup);
                $ses['expired'] = time() + $this->expired;
                $data = array(
                    'ip' => $this->input->ip_address(),
                    'user_id' => $ses['id'],
                    'action' => 'login',
                    'created' => date('Y-m-d H:i:s', time())
                );
                if ($this->db->insert('log_auth', $data)) {
                    $this->db->update('auth_users',array('lastlog'=>date('Y-m-d H:i:s', time())),array('id'=>$ses['id']));
                    $this->session->set_userdata('auth', $ses); //user info
                    $this->session->set_userdata('roles', $roles); //user roles 
                    if ($ses['chgpass'] == '1') { // User MUST change pass!!
                        $sess['sta'] = true;
                        $sess['msg'] = 'C';
                    } elseif ($ses['web'] == '0') {
                        $sess['sta'] = false;
                        $sess['msg'] = 'W';
                    } else {
                        $sess['sta'] = true; // VALID USER
                        $sess['msg'] = 'OK';
                    }
                    return $sess;
                } else {
                    $sess['sta'] = false;
                    $err = $this->db->error();
                    $sess['msg'] = $err['code'] . "<br>" . $err['message'];
                    return $sess;
                }
            }            
        } else {
            $sess['sta'] = false;
            $sess['msg'] = $ses;
            return $sess;
        }
    }

    function _login($user, $pass) {
        $this->db->where('username', $user)->limit(1);
        $get = $this->db->get('v_auth_users')->row_array();
        if (!isset($get['password'])) {
            return 'U';  // Wrong User
        }
        if ($get['password'] == $pass) {
            if ($get['status'] == 0) {
                return 'S'; // Status Not Active
            }
            return $get; // VALID USER !!
        } else {
            return 'P'; // Wrong Pass
        }
    }

    function _getUserRoles($userGroup) {
        $data = $this->db->select('controller,method')
                ->get_where('auth_group_role', array('usergroup_id' => $userGroup, 'status' => '1'))
                ->result_array();
        $r = array();
        foreach ($data as $val) {
            $r[] = $val['controller'] . '::' . $val['method'];
        };
        return $r;
    }

    function getExpiredTime() {
        $session = $this->session->userdata('auth');
        return isset($session['expired']) ? $session['expired'] : 0;
    }

    function update_expire() {
        $session = $this->session->userdata('auth');
        $session['expired'] = time() + $this->expired;
        $this->session->set_userdata('auth', $session);
    }

    function check($role, $ret = false) {
        $roles = $this->session->userdata('roles');
        if (!in_array($role, $roles)) {
            if (!$this->input->is_ajax_request()) {
                if ($ret) {
                    return FALSE;
                } else {
                    redirect('accessdenied');
                }
            } else {
                $json['msg'] = "Access Denied (403)";
                echo json_encode($json);
            }
            exit;
        };
    }

}
