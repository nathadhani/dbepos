<?php

class Inventory extends Bks_Controller {
    
    function __construct() {
        $config = array('modules' => 'inventory', 'jsfiles' => array('inventory'));
        parent::__construct($config);
        $this->auth = $this->session->userdata( 'auth' );
        $this->userId = $this->auth['id'];
        $this->company_id = $this->auth['company_id'];
    }
    
    function index(){
        $this->libauth->check(__METHOD__);
        $this->template->title('New');
        $this->template->set('tsmall', 'Inventory');
        $this->template->set('icon', 'fa fa-edit');
        $data['auth'] = $this->auth;
        $this->template->build('inventory/inventory_v', $data);
    }      
        
    function generate_code($company_id, $store_id, $tr_id, $tanggal) {
        $Number = 1;
        $thn = SUBSTR($tanggal,0,4);
        $bln = SUBSTR($tanggal,5,2);
        $branchcode = sprintf("%02d", $company_id);
        $storecode  =sprintf("%02d", $store_id);
        $trcode = sprintf("%02d", $tr_id);
        $sql = $this->db->query("SELECT max(right(tr_number,4)) as id 
                                 FROM inventory_header 
                                 WHERE company_id = $company_id
                                 AND store_id = $store_id
                                 AND tr_id = $tr_id
                                 AND YEAR(tr_date) = $thn 
                                 AND MONTH(tr_date) = $bln 
                                 ")->result();
        if (count($sql) > 0) {
            foreach ($sql as $data) {
                $Number = intval($data->id) + 1;
            }
        }
        return SUBSTR($thn,2,2) . $bln . '-' . $branchcode . $storecode . '-' . $trcode . sprintf("%04d", $Number);
    }
   
    function insert_header(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);        
        $postData = $this->input->post();

        $tr_id = $postData['tr_id'];
        $postData['company_id'] = $this->company_id;
        $postData['tr_date'] = revDate($postData['tr_date']);
        $postData['tr_number'] = $this->generate_code($this->company_id, $postData['store_id'], $tr_id, $postData['tr_date']);
        $postData['createdby'] = $this->userId;
        $postData['status'] = '1';
        
        $this->db->trans_begin();
        $this->Bksmdl->table = 'inventory_header';
        $response = $this->Bksmdl->insert($postData);
        $id = $this->db->insert_id();
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $err = $this->db->error();
            $json['msg'] = $err['code'] . '<br>' . $err['message'];
            echo json_encode($json);
        } else {
            $this->db->trans_commit();
            $json['id'] = $id;
            $json['msg'] = '1';
            echo json_encode($json);
        }
    }
    
    function update_header(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);        
        $postData = $this->input->post();

        $id = $postData['id'];
        $postData['company_id'] = $this->company_id;
        $postData['tr_date'] = revDate($postData['tr_date']);
        $postData['updatedby'] = $this->userId;
        $postData['status'] = '1';   

        $this->db->trans_begin();
        $this->Bksmdl->table = 'inventory_header';
        $response = $this->Bksmdl->update($postData, 'id=' . $id);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $err = $this->db->error();
            $json['msg'] = $err['code'] . '<br>' . $err['message'];
            echo json_encode($json);
        } else {
            $this->db->where(array('header_id' => $id));
            $this->db->update('inventory_detail', array('status' => 3, 'updated' => date('Y-m-d H:i:s', time()), 'updatedby' => $this->userId) );

            $this->db->trans_commit();
            $json['msg'] = '1';
            echo json_encode($json);
        }
    }    
    
    function insert_detail(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);                
        $postData = $this->input->post();

        $header_id = $postData['header_id'];

        $postData['nominal'] = str_replace('.','', $postData['nominal']);
        $postData['sheet'] = str_replace('.','', $postData['sheet']);        
        $postData['price'] = str_replace('.','', $postData['price']);
        $postData['subtotal'] = str_replace('.','', $postData['subtotal']);
        $postData['createdby'] = $this->userId;
        $postData['updatedby'] = $this->userId;
        $postData['status'] = '1';          
        
        $this->db->trans_begin();
        $this->Bksmdl->table = 'inventory_detail';
        $response = $this->Bksmdl->insert($postData);        
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

    function stock($header_id){
        $select = $this->db->select('company_id,store_id,tr_date,valas_id,nominal')
                           ->where('header_id',$header_id)
                           ->where('status',3)
                           ->get('v_inventory_detail');
        if($select->num_rows()){
            foreach($select->result_array() as $row) {
                $company_id = $row['company_id'];
                $store_id = $row['store_id'];
                $tahun = (int) SUBSTR($row['tr_date'],0,4);
                $bulan = (int) SUBSTR($row['tr_date'],5,2);    
                $valas_id = $row['valas_id'];
                $nominal  = $row['nominal'];
                $this->Bksmdl->generate_stock($company_id, $store_id, $tahun, $bulan, $valas_id, $nominal);
            }
        }
    }
    
    function delete_detail(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);        
        $postData = $this->input->post();
        $id = $postData['id'];        
        $this->db->trans_begin();
        $this->Bksmdl->table = 'inventory_detail';        
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

    function confirm() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);                
        $postData = $this->input->post();

        $id = $postData['id'];

        $this->db->trans_begin();
        $this->db->where(array('id' => $id));
        $this->db->update('inventory_header', array('status' => 3, 'updated' => date('Y-m-d H:i:s', time()), 'updatedby' => $this->userId) );
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $err = $this->db->error();
            $json['msg'] = $err['code'] . '<br>' . $err['message'];
            echo json_encode($json);
        } else {
            $this->db->where(array('header_id' => $id));
            $this->db->update('inventory_detail', array('status' => 3, 'updated' => date('Y-m-d H:i:s', time()), 'updatedby' => $this->userId) );
            $this->stock($id);
            $this->db->trans_commit();
            $json['msg'] = '1';
            echo json_encode($json);
        }            
    }
             
    function cancel(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);                
        $postData = $this->input->post();

        $id = $postData['id'];

        $this->db->trans_begin();
        $this->db->where(array('id' => $id));
        $this->db->update('inventory_header', array('status' => 2, 'updated' => date('Y-m-d H:i:s', time()), 'updatedby' => $this->userId) );
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $err = $this->db->error();
            $json['msg'] = $err['code'] . '<br>' . $err['message'];
            echo json_encode($json);
        } else {
            $this->db->where(array('header_id' => $id));
            $this->db->update('inventory_detail', array('status' => 2, 'updated' => date('Y-m-d H:i:s', time()), 'updatedby' => $this->userId) );

            $this->db->trans_commit();
            $json['msg'] = '1';
            echo json_encode($json);
        }            
    }
    
    function tampil_header(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $tr_id = $postData['tr_id'];
        $id = json_decode($postData['id']);
        $query = $this->db->query("SELECT * FROM v_inventory_header WHERE id= " . $id)->result();
        echo json_encode($query, true);
    }
    
    function tampil_detail(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $tr_id = $postData['tr_id'];
        $header_id = $postData['header_id'];
        $query = $this->db->query("SELECT * FROM v_inventory_detail WHERE header_id= " . $header_id ." ORDER BY valas_id, price ASC")->result();
        echo json_encode($query, true);
    }

    function printpdf()
    {          
        $id = $this->uri->segment(4);
        $data_header = $this->db->select('*')->from('v_inventory_header')->where('id', $id)->get()->result();
        $company_id = $data_header[0]->company_id;
        $profilusaha = $this->db->query("SELECT * FROM m_company WHERE id = $company_id")->result();
        $tr_id = $data_header[0]->tr_id;
        $tr_number = $data_header[0]->tr_number;
        $tr_date = revDate($data_header[0]->tr_date);
        $tr_time =  date('H:i:s',strtotime($data_header[0]->created));
        $pageno = '1';
        $createdby_name = $data_header[0]->createdby_name;

        $pdf = new Pdf();
        
        // Call before the addPage() method
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);

        $pdf->AddPage('P', 'mm', 'PA5'); // paper size custom in tcpdf_static.php
        // $pdf->AddPage('P', 'mm', array('14','12'), true, 'UTF-8', false);

        // Add Title
        $pdf->SetFont('', 'B', 9);
        $pdf->Cell(01, 01, strtoupper($profilusaha[0]->company_name), 0, 1, 'L');

        $pdf->SetFont('', '', 9);
        $pdf->Cell(01, 01, $profilusaha[0]->company_address . ' ' . $profilusaha[0]->company_city, 0, 1, 'L');
        $pdf->Cell(01, 01, 'Telpon : ' . $profilusaha[0]->company_phone, 0, 1, 'L');

        if($tr_id == 3) { 
            $tr_title = '** Inventory IN **';
        }
        if($tr_id == 4) {
            $tr_title = '** Inventory OUT **';
        }
        $pdf->Ln(1);
        $pdf->SetFont('', 'B', 9);
        $pdf->Ln(1);
        $pdf->Cell(01, 01, $tr_title, 0, 1, 'L');

        $pdf->Ln(1);
        $pdf->SetFont('', '', 9);
        $pdf->Cell(01, 01, 'No.Reff : ' . $tr_number, 0, 1, 'L');
        $pdf->Cell(01, 01, 'Date    : ' . $tr_date . '                             Page : ' . $pdf->getAliasNumPage() . '     (' . $tr_time . ')' , 0, 1, 'L');
        
        $pdf->SetAutoPageBreak(true, 0);
 
        // Add Header Column
        $pdf->Ln(1);
        $pdf->SetFont('', '', 9);
        $pdf->Cell(01, 01, "------------------------------------------------------------------------------------", 0, 1, 'L');
        $pdf->Cell(07, 01, "#", 0, 0, 'C');
        $pdf->Cell(17, 01, "Curr", 0, 0, 'L');
        $pdf->Cell(20, 01, "Amount", 0, 0, 'L');
        $pdf->Cell(18, 01, "Price", 0, 0, 'L');
        $pdf->Cell(30, 01, "Equivalent Rp.", 0, 0, 'L');
        $pdf->Ln(3);
        $pdf->Cell(01, 01, "------------------------------------------------------------------------------------", 0, 1, 'L');

        // Add Content Body
        $pdf->SetFont('', '', 9);
        $data_content = $this->db->query("SELECT * FROM v_inventory_detail WHERE header_id = " . $id)->result();     
        if(count($data_content) > 0) {
            $no = 0;
            $total = 0;
            foreach($data_content as $r){
                $no++;
                
                $valas_code = $r->valas_code;
                $nominal    = ($r->nominal == 'null' || $r->nominal == '' ? '' : (float) $r->nominal);
                $sheet      = ($r->sheet == 'null' || $r->sheet == '' ? '' : (float) $r->sheet);                
                $amount     = ($nominal * $sheet);
                $price      = ($r->price == 'null' || $r->price == '' ? '' : (float) $r->price);
                $subtotal   = ($r->subtotal == 'null' || $r->subtotal == '' ? '' : (float) $r->subtotal);
                $total      = $total + ($amount * $price);
 
                $pdf->Cell(07,01,$no,0,0);
                $pdf->Cell(17,01,$valas_code,0,0);
                $pdf->Cell(20,01,number_format($amount, "0", ".", ","),0,0);
                $pdf->Cell(18,01,number_format($price, "0", ".", ","),0,0);   
                $pdf->Cell(30,01,number_format($subtotal, "0", ".", ","),0,0);
                $pdf->Ln(4);
            }
            $pdf->SetFont('', '', 9);            
            $pdf->Cell(01, 01, "------------------------------------------------------------------------------------", 0, 1, 'L');
            $pdf->Cell(127, 01, 'Total Rp. ' . number_format($total, "0", ".", ","), 0, 1, 'C');

            $pdf->SetFont('', '', 9);
            $pdf->Ln(1);
            $pdf->Cell(01, 01, 'Say : ' . ucwords(terbilang($total)), 0, 1, 'L');            

            $pdf->SetFont('', '', 9);
            $pdf->Ln(2);
            $pdf->Cell(01, 01, 'Created by : ' . ucwords($createdby_name), 0, 1, 'L');
        }        
        $pdf->Output('Inv No '.$tr_number.'.pdf','I');    
    }
    
}
