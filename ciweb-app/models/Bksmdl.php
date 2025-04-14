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

    public function cekclosingdate($store_id){
        if($store_id !== null && $store_id !== ''){
            $result = $this->db->query("SELECT * FROM m_transaction_date WHERE store_id = $store_id AND status = 1 LIMIT 1")->result();
            return $result;
        }
    }
    
    public function getprofilusaha($id){
        if($id !== null && $id !== ''){
            $result = $this->db->get_where('v_m_store2', array('id' => $id));
            if($result->num_rows() > 0){
                return $result->result();
            }
            else{
                exit("store not found");
            }
        } else {
            exit("store not found");
        }
    }

    public function getprofilcustomer($id){
        if($id !== null && $id !== ''){
            $result = $this->db->get_where('v_m_customer', array('id' => $id));
            if($result->num_rows() > 0){
                return $result->result();
            }
            else{
                exit("customer not found");
            }
        } else {
            exit("customer not found");
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
        $auth = $this->session->userdata('auth');
        if(!isset($data['created'])){
            $s = date('Y-m-d H:i:s', time());
            $data['created'] = $s;
        }
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
        $user_session = $this->session->userdata('auth');
        if(!isset($dataUpdate['updated'])){
            $s = date('Y-m-d H:i:s', time());
            $dataUpdate['updated'] = $s;       
        }
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
            $sql = "SELECT * FROM $this->table WHERE (". $resultfieldarr . ") " . $orderby;
        }else{
            $sql = "SELECT * FROM $this->table WHERE (". $resultfieldarr . ")";
        }
        $r = $this->db->query($sql)->result();
        return $r;        
    }

    function wrapLIKE($string){
        return strtoupper("%$string%");
    }

    function cekdecimalgreaterthenzero($angka){
        $posisi = strpos($angka, ".");
        if ($posisi !== false) {
            return intval(explode('.', $angka)[1]);
        } else {
            return 0;
        }
    }

    function generate_tr_stock($store_id, $tahun, $bulan, $currency_id, $nominal)
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
        // insert table tr_stock bulan berjalan
        $qinsert = $this->db->query("SELECT currency_id FROM tr_stock
                                    WHERE store_id = $store_id
                                    AND stock_year = $tahun
                                    AND stock_month = $bulan
                                    AND currency_id = $currency_id
                                    AND nominal = $nominal")->result();
        // echo $this->db->last_query();exit;
        if(count($qinsert) < 1){
            $data = array(                        
                        'store_id' => $store_id,
                        'stock_year' => $tahun,
                        'stock_month' => $bulan,
                        'currency_id' => $currency_id,
                        'nominal' => $nominal,
                        'beginning_stock_sheet' => 0,
                        'status' => 1,
                        'created' => date('Y-m-d H:i:s', time()),
                        'createdby' => $auth['id']
                    );
            if(count($data) > 0){
                $this->db->insert('tr_stock', $data);
            }
        }

        // update saldo awal table tr_stock bulan berjalan
        $qlast_stock = $this->db->query("SELECT last_stock_sheet FROM v_tr_stock_balance
                                    WHERE store_id = $store_id
                                    AND stock_year = $tahun1
                                    AND stock_month = $bulan1
                                    AND currency_id = $currency_id
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
                        'store_id' => $store_id,
                        'stock_year' => $tahun,
                        'stock_month' => $bulan,
                        'currency_id' => $currency_id,
                        'nominal' => $nominal
                );
                $this->db->update('tr_stock', $data, $where);
            }
        }        

        /******************************************************************************************************/
        $qinsert = $this->db->query("SELECT currency_id FROM tr_stock 
                                    WHERE store_id = $store_id                                    
                                    AND stock_year = $tahun2
                                    AND stock_month = $bulan2
                                    AND currency_id = $currency_id
                                    AND nominal = $nominal")->result();        

        // insert table tr_stock bulan berikutnya
        if(count($qinsert) < 1){
            $data = array(              
                'store_id' => $store_id,
                'stock_year' => $tahun2,
                'stock_month' => $bulan2,
                'currency_id' => $currency_id,
                'nominal' => $nominal,
                'beginning_stock_sheet' => 0,
                'status' => 1,
                'created' => date('Y-m-d H:i:s', time()),
                'createdby' => $auth['id']
            );
            if(count($data) > 0){
                $this->db->insert('tr_stock', $data);
            }
        }

        // update saldo awal table stock bulan berikutnya
        $qlast_stock = $this->db->query("SELECT last_stock_sheet FROM v_tr_stock_balance
                                    WHERE store_id = $store_id                                        
                                    AND stock_year = $tahun
                                    AND stock_month = $bulan
                                    AND currency_id = $currency_id
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
                        'store_id' => $store_id,
                        'stock_year' => $tahun2,
                        'stock_month' => $bulan2,
                        'currency_id' => $currency_id,
                        'nominal' => $nominal
                );
                $this->db->update('tr_stock', $data, $where);
            }
        }

        /******************************************************************************************************/
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $err = $this->db->error();
            $error = array(
                'msg' => $err['code'] . '<br>' . $err['message'],
                'result' => 'generate stock error',
                'currency_id' => $currency_id
            );
            // echo "<pre>"; print_r($error); echo "</pre>";
        } else {
            $this->db->trans_commit();
            $error = array(
                'msg' => '1',
                'result' => 'generate stock success',
                'currency_id' => $currency_id
            );
            // echo "<pre>"; print_r($error); echo "</pre>";
        }
    }

    function generate_code_cb($store_id, $cb_id, $cb_pos_id, $tr_date) {
        $Number = 1;
        $thn = SUBSTR($tr_date,0,4);
        $bln = SUBSTR($tr_date,5,2);
        $day = SUBSTR($tr_date,8,2);
        $storecode  =sprintf("%02d", $store_id);
        $cbcode = sprintf("%02d", $cb_id);
        $cbposcode = sprintf("%02d", $cb_pos_id);
        $sql = $this->db->query("SELECT max(right(tr_number,4)) as id
                                 FROM tr_cb_header 
                                 WHERE store_id = $store_id
                                 AND cb_id = $cb_id
                                 AND cb_pos_id = $cb_pos_id
                                 AND YEAR(tr_date) = $thn 
                                 AND MONTH(tr_date) = $bln
                                 AND DAY(tr_date) = $day
                                 ")->result();
        if (count($sql) > 0) {
            foreach ($sql as $data) {
                $Number = intval($data->id) + 1;
            }
        }
        return SUBSTR($thn,2,2) . $bln . $day . $storecode . $cbcode . $cbposcode . sprintf("%04d", $Number);
    }

    public function generate_payment_cb($data = array()){
        if(count($data) > 0) {
            $store_id = $data['store_id'];
            $tr_date = $data['tr_date'];
            $buysell_id = $data['buysell_id'];
            if($buysell_id != null){
                $get_payment = $this->db->select('*')
                            ->where(array('store_id' => $store_id, 'tr_date' => $tr_date, 'header_id' => $buysell_id))
                            ->where_in('tr_header_status', [3,4])
                            ->where('cb_id IS NOT NULL',NULL,FALSE)                        
                            ->get('v_tr_payment');
            } else {
                $get_payment = $this->db->select('*')
                            ->where(array('store_id' => $store_id, 'tr_date' => $tr_date))
                            ->where_in('tr_header_status', [3,4])
                            ->where('cb_id IS NOT NULL',NULL,FALSE)
                            ->get('v_tr_payment');
            }
            if(isset($get_payment) && count($get_payment) > 0){
                foreach($get_payment->result_array() as $r) {
                    // Insert Header
                    $buysell_id = $r['header_id'];
                    $buysell_payment_type = $r['payment_type'];
                    $cb_id = $r['cb_id'];
                    $cb_pos_id = $r['cb_pos_id'];
                    $description_detail = $r['tr_number'] . ' - ' . $r['customer_name'];
                    $buysell_amount = $r['amount'];

                    $qinsert = $this->db->query("SELECT id, buysell_id FROM tr_cb_header WHERE buysell_id = $buysell_id AND buysell_payment_type = $buysell_payment_type AND status <> 2 LIMIT 1")->result();

                    /** Insert Header */
                    /** -------------------------------------------------------------------------------- */
                    $postHeader['store_id'] = $store_id;
                    $postHeader['tr_date'] = $tr_date;
                    $datetime = date('Y-m-d H:i:s');
                    $new_date = $postHeader['tr_date'];
                    $new_datetime = date('Y-m-d H:i:s', strtotime($new_date . ' ' . date('H:i:s', strtotime($datetime))));
                    $postHeader['cb_id'] = $cb_id;
                    $postHeader['cb_pos_id'] = $cb_pos_id;
                    $postHeader['buysell_id'] = $buysell_id;
                    $postHeader['buysell_payment_type'] = $buysell_payment_type;
                    $postHeader['status'] = '3';
                    if(count($qinsert) > 0){
                        $id_header = $qinsert[0]->id;
                    }
                    if(count($qinsert) == 0){                     
                        $this->db->trans_begin();
                        $postHeader['tr_number'] = $this->generate_code_cb($store_id, $postHeader['cb_id'], $postHeader['cb_pos_id'], $postHeader['tr_date']);
                        $postHeader['created'] = $new_datetime;
                        $this->Bksmdl->table = 'tr_cb_header';
                        $response = $this->Bksmdl->insert($postHeader);
                        $id_header = $this->db->insert_id();
                        if ($this->db->trans_status() === FALSE) {
                            $this->db->trans_rollback();
                            $err = $this->db->error();
                            echo $err['code'] . '<br>' . $err['message'];                            
                        } else {
                            $this->db->trans_commit();
                        }
                    }
                    /** End of Inser Header -------------------------------------------------------------------------------- */

                    /** Insert Detail */
                    /** -------------------------------------------------------------------------------- */
                    if( isset($id_header) && $id_header > 0 && ( $id_header != 'null' || $id_header !== '') ){
                        $qinsert = $this->db->query("SELECT id, header_id FROM tr_cb_detail WHERE header_id = $id_header AND description = '$description_detail' AND amount = $buysell_amount LIMIT 1")->result();                        
                        if(count($qinsert) < 1){
                            $postDetail['header_id'] = $id_header;
                            $postDetail['description'] = $description_detail;
                            $postDetail['amount'] = $buysell_amount;
                            $postDetail['status'] = '3';
                            $this->db->trans_begin();
                            $this->Bksmdl->table = 'tr_cb_detail';
                            $response = $this->Bksmdl->insert($postDetail);
                            if ($this->db->trans_status() === FALSE) {
                                $this->db->trans_rollback();
                                $err = $this->db->error();
                                echo $err['code'] . '<br>' . $err['message'];                                
                            } else {
                                $this->db->trans_commit();
                            }
                        } else {
                            $id = $qinsert[0]->id;
                            $postDetail['header_id'] = $id_header;
                            $postDetail['description'] = $description_detail;
                            $postDetail['amount'] = $buysell_amount;
                            $postDetail['status'] = '3';
                            $this->db->trans_begin();
                            $this->Bksmdl->table = 'tr_cb_detail';
                            $response = $this->Bksmdl->update($postDetail, 'id=' . $id);
                            if ($this->db->trans_status() === FALSE) {
                                $this->db->trans_rollback();
                                $err = $this->db->error();
                                echo $err['code'] . '<br>' . $err['message'];                                
                            } else {
                                $this->db->trans_commit();

                                /** Update header */
                                $this->db->trans_begin();
                                $postHeader['updated'] = $new_datetime;
                                $this->Bksmdl->table = 'tr_cb_header';
                                $response = $this->Bksmdl->update($postHeader, 'id=' . $id_header);
                                if ($this->db->trans_status() === FALSE) {
                                    $this->db->trans_rollback();
                                    $err = $this->db->error();
                                    echo $err['code'] . '<br>' . $err['message'];                                    
                                } else {
                                    $this->db->trans_commit();
                                }                            }
                        }                        
                    }
                    /** End of Inser Detail -------------------------------------------------------------------------------- */
                }
            }
        } else {
            echo 'empty parameter';
        }
    }

}
