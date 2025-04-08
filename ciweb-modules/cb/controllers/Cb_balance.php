<?php

class Cb_balance extends Bks_Controller {

    function __construct() {
        $config = array('modules' => 'cb', 'jsfiles' => array('cb_balance'));
        parent::__construct($config);        
        $this->auth = $this->session->userdata( 'auth' );      
        $this->userId = $this->auth['id'];
        $this->store_id = $this->auth['store_id'];        
    }
    
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('Balance');
        $this->template->set('tsmall', 'Cash Bank');
        $this->template->set('icon', 'fa fa-edit');
        $data['auth'] = $this->auth;
        $this->template->build('cb/cb_balance_v', $data);
    }
    
    function getdata() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();        
        $store_id  = $postData['store_id'];    
        $tanggal1 = revDate($postData['period']);

        $query = $this->db->query("SELECT v_tr_cb_saldo.cb_name,
                                        (
                                            SELECT cbs_saldo FROM  v_tr_cb_saldo x
                                            WHERE x.store_id = $store_id
                                            and x.cbs_date < '$tanggal1'
                                            and x.cb_id = v_tr_cb_saldo.cb_id
                                            ORDER BY x.cbs_date DESC, x.id DESC
                                            limit 1					
                                        ) AS beginning_saldo,
                                        
                                        SUM(v_tr_cb_saldo.cbs_in) AS cbs_in,
                                        SUM(v_tr_cb_saldo.cbs_out) AS cbs_out,

                                        (
                                            SELECT cbs_saldo FROM  v_tr_cb_saldo x
                                            WHERE x.store_id = $store_id
                                            and x.cbs_date = '$tanggal1'
                                            and x.cb_id = v_tr_cb_saldo.cb_id
                                            ORDER BY x.cbs_date DESC, x.id DESC
                                            limit 1					
                                        ) AS last_saldo
                                        
                                    FROM v_tr_cb_saldo
                                    WHERE v_tr_cb_saldo.store_id = $store_id
                                    AND v_tr_cb_saldo.cbs_date = '$tanggal1'
                                    GROUP BY v_tr_cb_saldo.cb_id
                                    ORDER BY v_tr_cb_saldo.cb_id ASC")->result();

        // echo $this->db->last_query();exit;                            
        echo json_encode($query, true);
    }

    function generate_cb_balance(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();        
        $store_id = $postData['store_id'];

        $tahun = (int) date('Y');
        $bulan = (int) date('m');
        if(isset($postData['period'])){
            $tahun = (int) SUBSTR(revDate($postData['period']),0,4);
            $bulan = (int) SUBSTR(revDate($postData['period']),5,2);
        }
        $tgl1 = $tahun.'-'.sprintf("%02d", $bulan).'-01';
        
        if($bulan == 1){
            $tahun1 = $tahun - 1;
            $bulan1 = 12;
        }else{
            $tahun1 = $tahun;
            $bulan1 = $bulan - 1;
        }
        
        if($bulan == 12){
            $tahun2 = $tahun + 1;
            $bulan2 = 1;
        } else {
            $tahun2 = $tahun;
            $bulan2 = $bulan + 1;
        }        

        $mcb = $this->db->query("SELECT x.id AS cb_id FROM m_cb x ORDER BY id ASC");
        if(count($mcb) > 0){
            /** Delete Reccord */
            /***************************************************************************************************************** */
            $where = array(
                        'store_id' => $store_id,
                        'cbs_year' => $tahun,
                        'cbs_month' => $bulan
                    );
            
            $this->db->trans_begin();
            $this->db->delete('tr_cb_saldo', $where);            
            // echo $this->db->last_query();exit;
            foreach($mcb->result_array() as $row) {
                $id = 0;
                $cb_id = $row['cb_id'];                

                /** Get Beginning */
                /***************************************************************************************************************** */
                $select_max_date = $this->db->query("SELECT MAX(cbs_date) AS max_date
                                                     FROM tr_cb_saldo 
                                                     WHERE store_id = $store_id 
                                                     AND cb_id = $cb_id 
                                                     AND YEAR(cbs_date) = $tahun1 
                                                     AND MONTH(cbs_date) = $bulan1")->result();                
                $cbs_in = 0;
                $last_cbs_in = 0;
                $last_saldo = 0;
                if(count($select_max_date) > 0) {
                    $max_date = $select_max_date[0]->max_date;
                    if($max_date !== null) {
                        $select_max_id = $this->db->query("SELECT MAX(id) AS max_id
                                                     FROM tr_cb_saldo 
                                                     WHERE store_id = $store_id 
                                                     AND cb_id = $cb_id 
                                                     AND cbs_date = '$max_date'")->result();                    
                        if(count($select_max_id) > 0) {
                            $max_id = $select_max_id[0]->max_id;
                            if($max_id !== null) {
                                $select_last_saldo = $this->db->query("SELECT cbs_saldo
                                                        FROM tr_cb_saldo 
                                                        WHERE store_id = $store_id 
                                                        AND cb_id = $cb_id 
                                                        AND cbs_date = '$max_date'
                                                        AND id = $max_id")->result();
                                if(count($select_last_saldo) > 0) {
                                    if($select_last_saldo[0]->cbs_saldo > 0) {
                                        $id++;
                                        $data = array(        
                                            'store_id' => $store_id,
                                            'cb_id' => $cb_id,
                                            'cbs_date' => $tgl1,
                                            'cbs_year' => $tahun,
                                            'cbs_month' => $bulan,
                                            'cbs_in' => 0,
                                            'cbs_out' => 0,
                                            'cbs_saldo' => 0,
                                            'created' => date('Y-m-d H:i:s', time()),
                                            'createdby' => $this->auth['id']
                                        );
                                        if(count($data) > 0){                                        
                                            $response = $this->db->insert('tr_cbs_saldo', $data);
                                            /***************************************************************************************************************** */
                                            /*Update last saldo*/
                                            $last_saldo = $select_last_saldo[0]->cbs_saldo;                                            
                                            $data = array('cbs_saldo' => $last_saldo);
                                            if(count($data) > 0){
                                                $where = array('id' => $id, 'cb_id' => $cb_id);
                                                $this->db->update('tr_cb_saldo', $data, $where);                
                                            }
                                        }
                                    }
                                }
                            }                            
                        }
                    }
                }

                /** Get Transaction */
                /***************************************************************************************************************** */
                $tanggal_awal = date($tgl1,time());
                $tanggal_akhir = date('Y-m-t',mktime(0, 0, 0, $bulan + 1, 0, $tahun));
                $maxday = date('d', strtotime($tanggal_akhir));
                for ($tgl = 1; $tgl <= $maxday; $tgl++) {
                    $tr_date = $tahun.'-'.sprintf("%02d", $bulan).'-'. sprintf("%02d", $tgl);
                    /***************************************************************************************************************** */
                    $trxcb = $this->db->select('tr_date, cb_id, 
                                                  SUM(amount_in) AS amount_in,
                                                  SUM(amount_out) AS amount_out
                                                ')
                                    ->where(array('store_id' => $store_id, 'tr_date' => $tr_date, 'cb_id' => $cb_id))
                                    ->where_in('status', ['3','4'])
                                    ->group_by('tr_date, cb_id')
                                    ->get('v_tr_cb_detail');
                    if($trxcb->num_rows()){
                        foreach($trxcb->result_array() as $row) {                                                        
                            $data = array(                                
                                'store_id' => $store_id,   
                                'cb_id' => $cb_id,   
                                'cbs_date' => $row['tr_date'],
                                'cbs_year' => $tahun,
                                'cbs_month' => $bulan,
                                'cbs_in' => $row['amount_in'],                              
                                'cbs_out' => $row['amount_out'],
                                'cbs_saldo' => 0,
                                'created' => date('Y-m-d H:i:s', time()),
                                'createdby' => $this->auth['id']
                            );
                            if(count($data) > 0){
                                $response = $this->db->insert('tr_cb_saldo', $data);
                                $id = $this->db->insert_id();
                                /***************************************************************************************************************** */
                                /*Update last saldo*/
                                $last_saldo = $last_saldo + $row['amount_in'] - $row['amount_out'];
                                $data = array('cbs_saldo' => $last_saldo);
                                if(count($data) > 0){
                                    $where = array('id' => $id, 'cb_id' => $cb_id);
                                    $this->db->update('tr_cb_saldo', $data, $where);
                                }
                            }
                        }     
                    } else {
                        $data = array(                                
                            'store_id' => $store_id,   
                            'cb_id' => $cb_id,   
                            'cbs_date' => $tr_date,
                            'cbs_year' => $tahun,
                            'cbs_month' => $bulan,
                            'cbs_in' => 0,                              
                            'cbs_out' => 0,
                            'cbs_saldo' => 0,
                            'created' => date('Y-m-d H:i:s', time()),
                            'createdby' => $this->auth['id']
                        );
                        if(count($data) > 0){
                            $response = $this->db->insert('tr_cb_saldo', $data);
                            $id = $this->db->insert_id();
                            /***************************************************************************************************************** */
                            /*Update last saldo*/
                            $last_saldo = $last_saldo;
                            $data = array('cbs_saldo' => $last_saldo);
                            if(count($data) > 0){
                                $where = array('id' => $id, 'cb_id' => $cb_id);
                                $this->db->update('tr_cb_saldo', $data, $where);
                            }
                        }
                    }                                        
                }
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $err = $this->db->error();
                    $json['msg'] = $err['code'] . '<br>' . $err['message'];
                    echo json_encode($json);
                } else {
                    $this->db->trans_commit();
                    $json['msg'] = '1';
                    $json['result'] = 'calculate done';
                    echo json_encode($json);
                }
            }
        }             

    }

    function exportpdf_rekap()
    {   
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $this->store_id = ( is_array($postData['store_id']) ? implode(',', $postData['store_id']) : $postData['store_id']);
        $this->tr_date = revDate($postData['period']);        

        $profil_usaha = $this->Bksmdl->getprofilusaha($this->store_id);

        // Call Pdf libraries
        $pdf = new Pdf();
        
        // Call before the addPage() method
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);

        // set font
        $pdf->SetFont('times', '', 12);
        $pdf->AddPage('P', 'A4');
        
        $style = '
                <style>                    
                    .first {border-top:1px solid #333;}
                    .second {border-bottom:1px solid #333;}
                </style>';

        // Add Title        
        $html_header = strtoupper(trim($profil_usaha[0]->store_name));
        if(!is_array($postData['store_id'])){
            $html_header .= '<br>' . trim($profil_usaha[0]->store_address) . '</br>';
            $html_header .= '<br>' . 'Saldo Kas Bank  Periode : ' . revDate($this->tr_date) . '</br><br></br><br></br>';
        } else {
            $html_header .= '<br>' . 'Konsolidasi Saldo Kas Bank  Periode : ' . revDate($this->tr_date) . '</br><br></br><br></br>';
        }
        
        // Add Content Body
        $data_header = $this->db->query("SELECT cb_id, cb_code, cb_name, 
                                        (
                                            SELECT cbs_saldo FROM v_tr_cb_saldo X
                                            WHERE x.cb_id = v_tr_cb_saldo.cb_id
                                            AND x.cbs_date < '$this->tr_date'
                                            ORDER BY x.id DESC
                                            LIMIT 1
                                        ) AS cbs_saldo 
                                        FROM v_tr_cb_saldo 
                                        WHERE store_id = $this->store_id 
                                        AND cbs_date = '$this->tr_date' 
                                        GROUP BY cb_id, cb_code,cb_name
                                        ORDER BY cb_id ASC")->result();
        if(count($data_header) > 0) {
            $no = 0;
            $pageno = 0;

            $pdf->SetFont('', 'B', 9);
            $saldo = 0;
            $html_table = '<table cellspacing="0" cellpadding="0" width="100%">';
            $html_table .= '<tr>';
                $html_table .= '<td width="20%" class="first second">List</td>';
                $html_table .= '<td width="50%" class="first second">Keterangan</td>';
                $html_table .= '<td width="10%" class="first second">Masuk</td>';
                $html_table .= '<td width="10%" class="first second">Keluar</td>';
                $html_table .= '<td width="10%" class="first second">Saldo</td>';
            $html_table .= '</tr>';             
            foreach($data_header as $r){
                $no++;
                $html_table .= '<tr>';  
                    $html_table .= '<td colspan="4" class="first"> ' . $no  . '. '. $r->cb_code . ' - ' . $r->cb_name . '</td>';
                    $html_table .= '<td class="first">' .  ( (int) $r->cbs_saldo > 0 ? number_format($r->cbs_saldo, "0", ".", ",") : '-' ). '</td>';
                $html_table .= '</tr>';  
                
                $cb_id = $r->cb_id;
                $saldo = $r->cbs_saldo;
                $data_detail = $this->db->query("SELECT cb_pos_name, SUM(amount_in) AS amount_in, SUM(amount_out) AS amount_out
                                                FROM v_tr_cb_detail
                                                WHERE store_id = $this->store_id
                                                AND tr_date = '$this->tr_date'
                                                AND cb_id = $cb_id
                                                AND status IN (3,4)
                                                GROUP BY cb_pos_name")->result();
                if(count($data_detail) > 0) {    
                    $total_in = 0;
                    $total_out = 0;                                            
                    foreach($data_detail as $d){
                        $saldo = $saldo + $d->amount_in - $d->amount_out;
                        $total_in = $total_in + $d->amount_in;
                        $total_out = $total_out + $d->amount_out;
                        $pdf->SetFont('', '', 9);
                        $html_table .= '<tr>';  
                            $html_table .= '<td></td>';
                            $html_table .= '<td> - ' . $d->cb_pos_name . '</td>';
                            $html_table .= '<td>' .  ( (int) $d->amount_in > 0 ? number_format($d->amount_in, "0", ".", ",") : '-' ). '</td>';
                            $html_table .= '<td>' .  ( (int) $d->amount_out > 0 ? number_format($d->amount_out, "0", ".", ",") : '-' ). '</td>';
                            $html_table .= '<td>' .  ( (int) $saldo > 0 ? number_format($saldo, "0", ".", ",") : '-' ). '</td>';
                        $html_table .= '</tr>'; 
                    }
                    $html_table .= '<tr>';  
                        $html_table .= '<td></td>';
                        $html_table .= '<td class="first" style="text-align:center;font-weight:bold;"> Total </td>';
                        $html_table .= '<td class="first">' .  ( (int) $total_in > 0 ? number_format($total_in, "0", ".", ",") : '-' ). '</td>';
                        $html_table .= '<td class="first">' .  ( (int) $total_out > 0 ? number_format($total_out, "0", ".", ",") : '-' ). '</td>';
                        $html_table .= '<td class="first">' .  ( (int) $saldo > 0 ? number_format($saldo, "0", ".", ",") : '-' ). '</td>';
                    $html_table .= '</tr>'; 
                }

                $pdf->Ln(4);
            }
            $html_table .= '</table>';

            $html = $style. $html_header . $html_table;
            $pdf->SetX(10); // Mengatur posisi top menjadi 10 mm dari kiri halaman
            $pdf->SetY(10); // Mengatur posisi top menjadi 10 mm dari atas halaman
            $pdf->writeHTML($html, true, false, true, false, '');

            $pdf->Ln(4);
            $pdf->Cell(01, 01, 'Createdby,                       Spv,', 0, 1, 'L');
        }

        ob_start();
        $pdf_output = $pdf->Output('Saldo Kas Bank  Periode ' . revDate($this->tr_date).'.pdf','S');
        ob_end_clean();
        echo json_encode(['pdf' => base64_encode($pdf_output)]); // Display Pdf in new tab
        // $response =  array(
        //     'op' => 'ok',
        //     'file' => "data:application/pdf;base64,".base64_encode($pdf_output)
        // );
        // die(json_encode($response)); // download pdf
    }

    function exportpdf_detail()
    {   
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $this->store_id = ( is_array($postData['store_id']) ? implode(',', $postData['store_id']) : $postData['store_id']);
        $this->tr_date = revDate($postData['period']);        

        $profil_usaha = $this->Bksmdl->getprofilusaha($this->store_id);

        // Call Pdf libraries
        $pdf = new Pdf();
        
        // Call before the addPage() method
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);

        // set font
        $pdf->SetFont('times', '', 12);
        $pdf->AddPage('P', 'A4');
        
        $style = '
                <style>                    
                    .first {border-top:1px solid #333;}
                    .second {border-bottom:1px solid #333;}
                </style>';

        // Add Title        
        $html_header = strtoupper(trim($profil_usaha[0]->store_name));
        if(!is_array($postData['store_id'])){
            $html_header .= '<br>' . trim($profil_usaha[0]->store_address) . '</br>';
            $html_header .= '<br>' . 'Saldo Kas Bank  Periode : ' . revDate($this->tr_date) . '</br><br></br><br></br>';
        } else {
            $html_header .= '<br>' . 'Konsolidasi Saldo Kas Bank  Periode : ' . revDate($this->tr_date) . '</br><br></br><br></br>';
        }
        
        // Add Content Body
        $data_header = $this->db->query("SELECT cb_id, cb_code, cb_name, 
                                        (
                                            SELECT cbs_saldo FROM v_tr_cb_saldo X
                                            WHERE x.cb_id = v_tr_cb_saldo.cb_id
                                            AND x.cbs_date < '$this->tr_date'
                                            ORDER BY x.id DESC
                                            LIMIT 1
                                        ) AS cbs_saldo 
                                        FROM v_tr_cb_saldo 
                                        WHERE store_id = $this->store_id 
                                        AND cbs_date = '$this->tr_date' 
                                        GROUP BY cb_id, cb_code,cb_name
                                        ORDER BY cb_id ASC")->result();
        if(count($data_header) > 0) {
            $no = 0;
            $pageno = 0;

            $pdf->SetFont('', 'B', 9);
            $saldo = 0;
            $html_table = '<table cellspacing="0" cellpadding="0" width="100%">';
            $html_table .= '<tr>';
                $html_table .= '<td width="20%" class="first second">List</td>';
                $html_table .= '<td width="50%" class="first second">Keterangan</td>';
                $html_table .= '<td width="10%" class="first second">Masuk</td>';
                $html_table .= '<td width="10%" class="first second">Keluar</td>';
                $html_table .= '<td width="10%" class="first second">Saldo</td>';
            $html_table .= '</tr>';             
            foreach($data_header as $r){
                $no++;
                $html_table .= '<tr>';  
                    $html_table .= '<td colspan="4" class="first"> ' . $no  . '. '. $r->cb_code . ' - ' . $r->cb_name . '</td>';
                    $html_table .= '<td class="first">' .  ( (int) $r->cbs_saldo > 0 ? number_format($r->cbs_saldo, "0", ".", ",") : '-' ). '</td>';
                $html_table .= '</tr>';  
                
                $cb_id = $r->cb_id;
                $saldo = $r->cbs_saldo;
                $data_detail = $this->db->query("SELECT cb_pos_name, description, amount_in, amount_out 
                                                FROM v_tr_cb_detail
                                                WHERE store_id = $this->store_id
                                                AND tr_date = '$this->tr_date'
                                                AND cb_id = $cb_id
                                                AND status IN (3,4)")->result();
                if(count($data_detail) > 0) {    
                    $total_in = 0;
                    $total_out = 0;                                            
                    foreach($data_detail as $d){
                        $saldo = $saldo + $d->amount_in - $d->amount_out;
                        $total_in = $total_in + $d->amount_in;
                        $total_out = $total_out + $d->amount_out;
                        $pdf->SetFont('', '', 9);
                        $html_table .= '<tr>';  
                            $html_table .= '<td></td>';
                            if($d->description != '' && $d->description != null){
                                $html_table .= '<td> - ' . $d->cb_pos_name . ' - ' . $d->description . '</td>';
                            } else {
                                $html_table .= '<td> - ' . $d->cb_pos_name . '</td>';
                            }                            
                            $html_table .= '<td>' .  ( (int) $d->amount_in > 0 ? number_format($d->amount_in, "0", ".", ",") : '-' ). '</td>';
                            $html_table .= '<td>' .  ( (int) $d->amount_out > 0 ? number_format($d->amount_out, "0", ".", ",") : '-' ). '</td>';
                            $html_table .= '<td>' .  ( (int) $saldo > 0 ? number_format($saldo, "0", ".", ",") : '-' ). '</td>';
                        $html_table .= '</tr>'; 
                    }
                    $html_table .= '<tr>';  
                        $html_table .= '<td></td>';
                        $html_table .= '<td class="first" style="text-align:center;font-weight:bold;"> Total </td>';
                        $html_table .= '<td class="first">' .  ( (int) $total_in > 0 ? number_format($total_in, "0", ".", ",") : '-' ). '</td>';
                        $html_table .= '<td class="first">' .  ( (int) $total_out > 0 ? number_format($total_out, "0", ".", ",") : '-' ). '</td>';
                        $html_table .= '<td class="first">' .  ( (int) $saldo > 0 ? number_format($saldo, "0", ".", ",") : '-' ). '</td>';
                    $html_table .= '</tr>'; 
                }

                $pdf->Ln(4);
            }
            $html_table .= '</table>';

            $html = $style. $html_header . $html_table;
            $pdf->SetX(10); // Mengatur posisi top menjadi 10 mm dari kiri halaman
            $pdf->SetY(10); // Mengatur posisi top menjadi 10 mm dari atas halaman
            $pdf->writeHTML($html, true, false, true, false, '');

            $pdf->Ln(4);
            $pdf->Cell(01, 01, 'Createdby,                       Spv,', 0, 1, 'L');
        }

        ob_start();
        $pdf_output = $pdf->Output('Saldo Kas Bank  Periode ' . revDate($this->tr_date).'.pdf','S');
        ob_end_clean();
        echo json_encode(['pdf' => base64_encode($pdf_output)]); // Display Pdf in new tab
        // $response =  array(
        //     'op' => 'ok',
        //     'file' => "data:application/pdf;base64,".base64_encode($pdf_output)
        // );
        // die(json_encode($response)); // download pdf
    }


}
