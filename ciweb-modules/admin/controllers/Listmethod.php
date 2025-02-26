<?php

class Listmethod extends Bks_Controller {

    function __construct() {
        $config = array('modules' => 'admin', 'jsfiles' => array('listmethod'));
        parent::__construct($config);
        $this->Bksmdl->table = 'auth_listmethod';
        $this->folder = '../ciweb-modules/';
    }
    
    function index() {
        $auth = $this->session->userdata('auth');
        if ($auth['id'] != '1')
            redirect('accessdenied');
        $this->template->title('Method List');
        $this->template->set('tsmall', 'Main');
        $this->template->build('admin/listmethod_v');
    }
    
    function getDirContents($dir, &$results = array()) {
        $files = scandir($dir);
        foreach ($files as $key => $value) {
            if ($value == 'auth' || $value == 'admin') {
                continue;
            }
            $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
            if (!is_dir($path)) {
                if (substr($path, -4) == '.php' && substr($path, -6) != '_v.php') {
                    $results[] = $path;
                }
            } else if ($value != "." && $value != "..") {
                $this->getDirContents($path, $results);
                if (substr($path, -4) == '.php' && substr($path, -6) != '_v.php') {
                    $results[] = $path;
                }
            }
        }
        return $results;
    }
    
    function getDataClass() {
        $files = $this->getDirContents($this->folder);
        foreach ($files as $key => $file) {
            $d[$key]['path'] = $file;
            $class = explode("\\", $file);
            $d[$key]['controller'] = substr(end($class), 0, -4);
            $classname = $d[$key]['controller'];
            require_once($file);
            $reflector = new ReflectionClass($d[$key]['controller']);
            $methodNames = array();
            $lowerClassName = strtolower($classname);
            foreach ($reflector->getMethods(ReflectionMethod::IS_PUBLIC) as $k => $method) {
                if (strtolower($method->class) == $lowerClassName) {
                    if ($method->name != "__construct" && substr($method->name, 0, 1) != "_") {
                        $methodNames[$k]['name'] = $method->name;
                        $info = $reflector->getMethod($method->name)->getDocComment();
                        $methodNames[$k]['info'] = trim(str_replace(array('/', '*'), '', $info));
                    }
                }
            }
            $d[$key]['method'] = $methodNames;
        }
        return $d;
    }
    
    function insert() {
        checkIfNotAjax();
        $hsl = $this->getDataClass();
        $auth = $this->session->userdata('auth');
        $i = 0;
        foreach ($hsl as $key => $val) {
            foreach ($val['method'] as $k => $v) {
                $rows[$i]['path'] = $val['path'];
                $rows[$i]['controller'] = $val['controller'];
                $rows[$i]['method'] = $v['name'];
                $rows[$i]['info'] = $v['info'];
                $rows[$i]['created'] = date('Y-m-d H:i:s', time());
                $rows[$i]['createdby'] = $auth['id'];
                $i++;
            }
        }
    
        $this->db->trans_begin();
        $this->db->truncate($this->Bksmdl->table);
        $this->db->insert_batch($this->Bksmdl->table, $rows);
        // echo $this->db->last_query(); exit;
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
        $cpData = $this->Bksmdl->getDataTable();
        $this->Bksmdl->outputToJson($cpData);
    }

}
