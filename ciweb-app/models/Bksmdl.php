<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class Bksmdl extends Bks_Model {

    public $fillable = array();
    public $table = '';
    public $primary_key = 'id';
    public $searchable = array();
    public $select2fields = array('id' => 'id', 'text' => 'nama', 'icons' => 'icons');

    function __construct() {
        parent::__construct();
    }

    public function getprofileusaha($customer_id, $user_id){
        if($customer_id !== null && $customer_id !== ''){
            $getId = $this->db->query("SELECT company_id FROM m_customer WHERE id = $customer_id")->result();
            $id = $getId[0]->company_id;
            $hasil = $this->db->query("SELECT * FROM m_company WHERE id = $id")->result();
            return $hasil;
        }
    }

    public function setTableName($tableName) {
        $this->table = $tableName;
    }

    public function setSearchable($search) {
        $this->searchable = $search;
    }

    //--- Insert
    function insert($data, $show_last_id = false) {
        $s = date('Y-m-d H:i:s', time());
        $data['created'] = $s;
        $auth = $this->session->userdata('auth');        
        if(!isset($data['createdby'])){
            $data['createdby'] = $auth['id'];
        }
        $result = $this->db->insert($this->table, $data);
        if (false == $result) {
            $err = $this->db->error();
            $result = $err['code'] . "<br>" . $err['message'];
        }
        return $result;
    }

    //--- Update
    function update($dataUpdate, $where) {
        $s = date('Y-m-d H:i:s', time());
        $user_session = $this->session->userdata('auth');
        $dataUpdate['updated'] = $s;       
        if(!isset($data['updatedby'])){
            $dataUpdate['updatedby'] = $user_session['id'];
        }
        $result = $this->db->update($this->table, $dataUpdate, $where);
        // echo $this->db->last_query(); exit;
        if (false == $result) {
            $err = $this->db->error();
            $result = $err['code'] . "<br>" . $err['message'];
        }
        return $result;
    }

    //--- Delete
    public function delete($col, $where) {
        $this->db->where_in($col, $where);
        $result = $this->db->delete($this->table);
        if (false == $result) {
            $err = $this->db->error();
            $result = $err['code'] . "<br>" . $err['message'];
        }
        return $result;
    }

    //--- Get Datatables
    function getDatatable($where = array(), $where2 = null) {
        $postData = $this->input->post();
        $index = 0;
        $select = array();
        $searchable = array();
        $orderable = array();
        foreach ($postData['columns'] as $key => $columns) {
            if (strlen($columns['data'])) {
                if ($columns['data'] == "#")
                    continue;
                $select[] = $columns['data'];
                if ($columns['orderable'] == "true") {
                    $orderable[$key] = $columns['data'];
                }
                if ($columns['searchable'] == "true") {
                    $searchable[$key]['column'] = $columns['data'];
                    $searchable[$key]['query'] = $columns['search']['value'];
                }
            }
        };
        $this->db->select('count(*) as nrow');
        $total = $this->db->get($this->table)->first_row();
        $this->db->start_cache();
        $arrOrLike = array();
        foreach ($searchable as $whatToSearch) {
            if (strlen($whatToSearch['query']) > 0) {
                $qu = $whatToSearch['column'] . " LIKE '%" . $whatToSearch['query'] . "%'";
                $this->db->where($qu);
            } else {
                $arrOrLike[] = $whatToSearch['column'] . " LIKE '%" . $postData['search']['value'] . "%'";
            }
        }
        if (!empty($arrOrLike)) {
            $this->db->where('(' . implode(' OR ', $arrOrLike) . ')');
        }
        //--- ADDITIONAL WHERE 
        if (!empty($where)) {
            foreach ($where as $k => $v) {
                $s = $v['sql'];
                $f = $v['field'];
                $d = $v['data'];
                $this->db->$s($f, $d);
            }
        };
        if(isset($where2)){            
            $this->db->where($where2);            
        }        
        // var_dump($where2);exit;
        $this->db->stop_cache();
        $select = array_unique($select);
        $select = count($select) > 0 ? implode(',', $select) : '*';
        $this->db->select($select);
        if ($postData['length'] != -1) {
            $this->db->limit($postData['length'], $postData['start']);
        }
        foreach ($postData['order'] as $orderBy) {
            $this->db->order_by($orderable[$orderBy['column']], $orderBy['dir']);
        }
        $get = $this->db->get($this->table);
        // echo $this->db->last_query(); exit;
        $result = $get->result_array();
        // var_dump($result);exit;
        $start = $postData['start']; // Penomeran
        $start++;
        foreach ($result as $key => $val) {
            $result[$key]['#'] = (string) $start;
            $start++;
        }
        $this->db->select('count(*) AS num_row');
        $totalFiltered = $this->db->get($this->table)->first_row();
        $this->db->flush_cache();
        return array('draw' => $postData['draw'],
            'data' => $result,
            'recordsFiltered' => $totalFiltered->num_row,
            'recordsTotal' => $total->nrow,
        );
    }

    function getSelect2($where = array(), $where2 = null, $whereIn = null ) {
        $postData = $this->input->post();
        if(isset($where2)){     
            if($where2 !== null){
                $this->db->where($where2);            
            }            
        }  

        if(isset($whereIn)){   
            if($whereIn !== null){
                // var_dump($whereIn);exit;         
                $this->db->where_in('id', $whereIn);
            }    
        }      
        
        // var_dump($where2);exit;
        $this->db->where($where, false);
        $this->db->select($this->select2fields['id'] . ' as id');
        $this->db->select($this->select2fields['text'] . ' as text', false);
        if (isset($postData['action']) && $postData['action'] == 'initSelection') {
            $getByID = $this->getById($postData['id']);
            $data = new stdClass();
            if (count($getByID) > 0) {
                $data->id = $postData['id'];
                $data->text = $getByID['text'];
            } else {
                $data->id = '';
                $data->text = '';
            }
            echo '[' . json_encode($data) . ']';
            exit;
        }
        $this->db->limit($postData['limit']);
        $last = end($this->searchable);
        if (isset($postData['q'])) {
            $sql = "(";
            foreach ($this->searchable as $field) {
                $sql .= $field . " LIKE '%" . $postData['q'] . "%'";
                if ($field != $last) {
                    $sql .= " OR ";
                }
            };
            $sql .= ")";
            if ($sql != '()') {
                $this->db->where($sql);
            }
        }
        $get = $this->db->get($this->table);
        // var_dump($this->db->last_query());exit;
        return $get->result_array();
    }

    function getSelect2bit($select, $search, $where = array(), $addwhere = array()) {
        $arrsearch = array();
        $postData = $this->input->post();
        $this->db->select($select);
        $last = end($search);
        $sql = "(";
        foreach ($search as $val) {
            $sql .= $val . " LIKE '%" . $postData['q'] . "%'";
            if ($val != $last) {
                $sql .= " OR ";
            }
        };
        $sql .= ")";
        $this->db->where($sql);
        $this->db->limit($postData['limit']);
        if (isset($postData['action']) && $postData['action'] == 'initSelection') {
            $getByID = $this->getById($postData['id']);
            $data = new stdClass();
            if (count($getByID) > 0) {
                $data->id = $postData['id'];
                $data->text = $getByID['text'];
            } else {
                $data->id = '';
                $data->text = '';
            }
            echo '[' . json_encode($data) . ']';
            exit;
        }
        //--- ADDITIONAL WHERE 
        if (!empty($addwhere)) {
            foreach ($addwhere as $k => $v) {
                $sql = $v['sql'];
                $field = $v['field'];
                $data = $v['data'];
                $this->db->$sql($field, $data);
            }
        };
        $hsl = $this->db->get_where($this->table, $where);
        var_dump($this->db->last_query());exit;
        return $hsl->result_array();
    }

    function getById($id) {
        $this->db->where($this->primary_key, $id);
        $get = $this->db->get($this->table);
        return $get->row_array();
    }

    function getByShaId($shaId) {
        $this->db->where('sha1('.$this->primary_key.')', $shaId);
        $get = $this->db->get($this->table);
        return $get->row_array();
    }

    //--- Output JSON    
    function outputToJson($DataOutput, $stringOrArray = 'array') {
        $this->output->set_content_type('application/json');
        $DataOutput = ( $stringOrArray == 'array' ) ? json_encode($DataOutput) : $DataOutput;
        $this->output->set_output($DataOutput);
    }

    function _extArray($arr, $name) {
        if (!empty($arr)) {
            foreach ($arr as $val) {
                $hsl[] = $val[$name];
            }
            return $hsl;
        }
    }

    function exportDataTable($where = array(), $exportfield = array()) {
        $limitexport = 30000;
        $je = $this->input->post();
        $postData = json_decode($je['exparams'], true);
        $index = 0;
        $select = array();
        $searchable = array();
        $orderable = array();
        foreach ($postData['columns'] as $key => $columns) {
            if (strlen($columns['data'])) {
                if ($columns['data'] == "#")
                    continue;
                $select[] = $columns['data'];
                if ($columns['orderable'] == "true") {
                    $orderable[$key] = $columns['data'];
                }
                if ($columns['searchable'] == "true") {
                    $searchable[$key]['column'] = $columns['data'];
                    $searchable[$key]['query'] = $columns['search']['value'];
                }
            }
        };
        $this->db->select('count(*) as nrow');
        $total = $this->db->get($this->table)->first_row();
        $this->db->start_cache();
        $arrOrLike = array();
        foreach ($searchable as $whatToSearch) {
            if (strlen($whatToSearch['query']) > 0) {
                $qu = $whatToSearch['column'] . " LIKE '%" . $whatToSearch['query'] . "%'";
                $this->db->where($qu);
            } else {
                $arrOrLike[] = $whatToSearch['column'] . " LIKE '%" . $postData['search']['value'] . "%'";
            }
        }
        if (!empty($arrOrLike)) {
            $this->db->where('(' . implode(' OR ', $arrOrLike) . ')');
        }
        //--- ADDITIONAL WHERE 
        if (!empty($where)) {
            foreach ($where as $k => $v) {
                $s = $v['sql'];
                $f = $v['field'];
                $d = $v['data'];
                $this->db->$s($f, $d);
            }
        };
        $this->db->stop_cache();
        $select = count($exportfield) > 0 ? $exportfield : $select;
        $select = array_unique($select);
        $select = count($select) > 0 ? implode(',', $select) : '*';
        $this->db->select($select, false);
        $this->db->limit($limitexport);
        foreach ($postData['order'] as $orderBy) {
            $this->db->order_by($orderable[$orderBy['column']], $orderBy['dir']);
        }
        $get = $this->db->get($this->table);
        $this->db->flush_cache();
//        echo $this->db->last_query();exit;
        return $get;
    }    
    
    function importexcel( $fname ) {
        $this->load->library( 'excel' );
        try {
            $inputFileType = PHPExcel_IOFactory::identify( $fname );
            $objReader = PHPExcel_IOFactory::createReader( $inputFileType );
            $objReader->setReadDataOnly( true );
            $objPHPExcel = $objReader->load( $fname );
        } catch ( Exception $e ) {
            return $e->getMessage();
        }
        $sheet = $objPHPExcel->getSheet( 0 );
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        $headingsArray = $sheet->rangeToArray( 'A1:' . $highestColumn . '1' );
        $h = $headingsArray[0];
        for ( $row = 2; $row <= $highestRow; $row++ ) {
            $rowData = $sheet->rangeToArray( 'A' . $row . ':' . $highestColumn . $row );
            foreach ( $h as $key => $val ) {
                $r[$val] = $rowData[0][$key];
            }
            $dt[] = $r;
        }
        return $dt;
    }     

    function search_text_query_to_datatable($search, $field, $orderby) {
        $arrOrLike = '';
        $auth = $this->session->userdata('auth');
        foreach ($field as $key) {
            $arrOrLike.= $key . ' LIKE ' . "'%" . $this->wrapLIKE($search) . "%'" . ' OR ';
        }
        $resultfieldarr = SUBSTR($arrOrLike,0,strlen($arrOrLike)-3);
        if($orderby !== null){
            $sql = "SELECT * FROM $this->table WHERE company_id = " . $auth['company_id'] . " AND (". $resultfieldarr . ") " . $orderby;
        }else{
            $sql = "SELECT * FROM $this->table WHERE company_id = " . $auth['company_id'] . " AND (". $resultfieldarr . ")";
        }
        $r = $this->db->query($sql)->result();
        return $r;        
    }

    function wrapLIKE($string){
        return strtoupper("%$string%");
    }

    function generate_stock($company_id, $store_id, $tahun, $bulan, $valas_id, $nominal)
    {
        $this->db->trans_begin();
        $auth = $this->session->userdata('auth');        
        $tahun = $tahun;
        $bulan = $bulan;

        $tahun1 = $tahun;
        $bulan1 = $bulan - 1;
        if($bulan == 1){
            $tahun1 = $tahun - 1;
            $bulan1 = 12;
        }

        $tahun2 = $tahun;
        $bulan2 = $bulan + 1;
        if($bulan == 12){
            $tahun2 = $tahun + 1;
            $bulan2 = 1;
        }

        /******************************************************************************************************/        
        // insert table stock bulan berjalan
        $qinsert = $this->db->query("SELECT valas_id FROM stock
                                    WHERE company_id = $company_id
                                    AND store_id = $store_id
                                    AND stock_year = $tahun
                                    AND stock_month = $bulan
                                    AND valas_id = $valas_id
                                    AND nominal = $nominal")->result();
        // echo $this->db->last_query();exit;
        if(count($qinsert) < 1){
            $data = array(
                        'company_id' => $company_id,
                        'store_id' => $store_id,
                        'stock_year' => $tahun,
                        'stock_month' => $bulan,
                        'valas_id' => $valas_id,
                        'nominal' => $nominal,
                        'beginning_stock_sheet' => 0,
                        'status' => 1,
                        'created' => date('Y-m-d H:i:s', time()),
                        'createdby' => $auth['id']
                    );
            if(count($data) > 0){
                $this->db->insert('stock', $data);
            }
        }

        // update saldo awal table stock bulan berjalan        
        $qlast_stock = $this->db->query("SELECT last_stock_sheet FROM v_stock9
                                    WHERE company_id = $company_id
                                    AND store_id = $store_id
                                    AND stock_year = $tahun1
                                    AND stock_month = $bulan1
                                    AND valas_id = $valas_id
                                    AND nominal = $nominal")->result();
        // echo $this->db->last_query();exit;
        if(count($qlast_stock) > 0){
            $data = array(
                        'beginning_stock_sheet' => $qlast_stock[0]->last_stock_sheet,
                        'status' => 1,
                        'updated' => date('Y-m-d H:i:s', time()),
                        'updatedby' => $auth['id']
                    );
            if(count($data) > 0){
                $where = array(
                        'company_id' => $company_id,
                        'store_id' => $store_id,
                        'stock_year' => $tahun,
                        'stock_month' => $bulan,
                        'valas_id' => $valas_id,
                        'nominal' => $nominal
                );
                $this->db->update('stock', $data, $where);
            }
        }        

        /******************************************************************************************************/
        $qinsert = $this->db->query("SELECT valas_id FROM stock 
                                    WHERE company_id = $company_id
                                    AND store_id = $store_id                                    
                                    AND stock_year = $tahun2
                                    AND stock_month = $bulan2
                                    AND valas_id = $valas_id
                                    AND nominal = $nominal")->result();        

        // insert table stock bulan berikutnya
        if(count($qinsert) < 1){
            $data = array(              
                'company_id' => $company_id,
                'store_id' => $store_id,
                'stock_year' => $tahun2,
                'stock_month' => $bulan2,
                'valas_id' => $valas_id,
                'nominal' => $nominal,
                'beginning_stock_sheet' => 0,
                'status' => 1,
                'created' => date('Y-m-d H:i:s', time()),
                'createdby' => $auth['id']
            );
            if(count($data) > 0){
                $this->db->insert('stock', $data);
            }
        }

        // update saldo awal table stock bulan berikutnya
        $qlast_stock = $this->db->query("SELECT last_stock_sheet FROM v_stock9
                                    WHERE company_id = $company_id
                                    AND store_id = $store_id                                        
                                    AND stock_year = $tahun
                                    AND stock_month = $bulan
                                    AND valas_id = $valas_id
                                    AND nominal = $nominal")->result();
        if(count($qlast_stock) > 0){
            $data = array(                   
                'beginning_stock_sheet' => $qlast_stock[0]->last_stock_sheet,
                'status' => 1,
                'updated' => date('Y-m-d H:i:s', time()),
                'updatedby' => $auth['id']
            );                        
            if(count($data) > 0){
                $where = array(
                        'company_id' => $company_id,
                        'store_id' => $store_id,
                        'stock_year' => $tahun2,
                        'stock_month' => $bulan2,
                        'valas_id' => $valas_id,
                        'nominal' => $nominal
                );
                $this->db->update('stock', $data, $where);                
            }
        }

        /******************************************************************************************************/
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $err = $this->db->error();
            $error = array(
                'msg' => $err['code'] . '<br>' . $err['message'],
                'result' => 'generate stock error',
                'valas_id' => $valas_id
            );
            // echo "<pre>"; print_r($error); echo "</pre>";
        } else {
            $this->db->trans_commit();
            $error = array(
                'msg' => '1',
                'result' => 'generate stock success',
                'valas_id' => $valas_id
            );
            // echo "<pre>"; print_r($error); echo "</pre>";
        }
    }

}
