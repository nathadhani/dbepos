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
    
    function getdata1() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();        
        $store_id  = $postData['store_id'];    
        $endDate = revDate($postData['period']);

        $query = $this->db->query("SELECT m_cb.cb_name,
                                        COALESCE((
                                            SELECT cbs_saldo FROM  tr_cb_saldo x
                                            WHERE x.store_id = $store_id
                                            and x.cbs_date < '$endDate'
                                            and x.cb_id = tr_cb_saldo.cb_id
                                            ORDER BY x.cbs_date DESC, x.id DESC
                                            limit 1					
                                        ),0) AS beginning_saldo,
                                        
                                        COALESCE((                                        
                                            SELECT SUM(COALESCE(v_tr_cb_detail.amount_in,0)) FROM v_tr_cb_detail
                                            WHERE v_tr_cb_detail.store_id =  tr_cb_saldo.store_id
                                            AND v_tr_cb_detail.cb_id = tr_cb_saldo.cb_id
                                            AND v_tr_cb_detail.tr_date = '$endDate'
                                            AND v_tr_cb_detail.status IN (3,4)                                            
                                        ),0) AS cbs_in,

                                        (                                        
                                            SELECT SUM(COALESCE(v_tr_cb_detail.amount_out,0)) FROM v_tr_cb_detail
                                            WHERE v_tr_cb_detail.store_id =  tr_cb_saldo.store_id
                                            AND v_tr_cb_detail.cb_id = tr_cb_saldo.cb_id
                                            AND v_tr_cb_detail.tr_date = '$endDate'
                                            AND v_tr_cb_detail.status IN (3,4)                                       
                                        ) AS cbs_out,

                                        (
                                            COALESCE((
                                                SELECT COALESCE(cbs_saldo,0) FROM  tr_cb_saldo x
                                                WHERE x.store_id = $store_id
                                                and x.cbs_date < '$endDate'
                                                and x.cb_id = tr_cb_saldo.cb_id
                                                ORDER BY x.cbs_date DESC, x.id DESC
                                                limit 1
                                            ),0) + 
                                            COALESCE((                                        
                                                SELECT SUM(COALESCE(v_tr_cb_detail.amount_in,0)) FROM v_tr_cb_detail
                                                WHERE v_tr_cb_detail.store_id =  tr_cb_saldo.store_id
                                                AND v_tr_cb_detail.cb_id = tr_cb_saldo.cb_id
                                                AND v_tr_cb_detail.tr_date = '$endDate'   
                                                AND v_tr_cb_detail.status IN (3,4)                                         
                                            ),0) -
                                            COALESCE((                                        
                                                SELECT SUM(COALESCE(v_tr_cb_detail.amount_out,0)) FROM v_tr_cb_detail
                                                WHERE v_tr_cb_detail.store_id =  tr_cb_saldo.store_id
                                                AND v_tr_cb_detail.cb_id = tr_cb_saldo.cb_id
                                                AND v_tr_cb_detail.tr_date = '$endDate'    
                                                AND v_tr_cb_detail.status IN (3,4)                                        
                                            ),0)
                                        ) AS last_saldo
                                        
                                    FROM tr_cb_saldo
                                    JOIN m_cb ON tr_cb_saldo.cb_id = m_cb.id
                                    WHERE tr_cb_saldo.store_id = $store_id
                                    AND tr_cb_saldo.cbs_date = '$endDate'
                                    GROUP BY tr_cb_saldo.cb_id
                                    ORDER BY tr_cb_saldo.cb_id ASC")->result();

        // echo $this->db->last_query();exit;                            
        echo json_encode($query, true);
    }

    function getdata2() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();        
        $store_id  = $postData['store_id'];    
        $tahun = (int) SUBSTR(revDate($postData['period']),0,4);
        $bulan = (int) SUBSTR(revDate($postData['period']),5,2);
        $startDate = $tahun.'-'.sprintf("%02d", $bulan).'-01';
        $endDate = revDate($postData['period']);

        $query = $this->db->query("SELECT m_cb.cb_name,
                                        COALESCE((
                                            SELECT cbs_saldo FROM  tr_cb_saldo x
                                            WHERE x.store_id = $store_id
                                            and x.cbs_date < '$startDate'
                                            and x.cb_id = tr_cb_saldo.cb_id
                                            ORDER BY x.cbs_date DESC, x.id DESC
                                            limit 1					
                                        ),0) AS beginning_saldo,
                                        
                                        COALESCE((                                        
                                            SELECT SUM(COALESCE(v_tr_cb_detail.amount_in,0)) FROM v_tr_cb_detail
                                            WHERE v_tr_cb_detail.store_id =  tr_cb_saldo.store_id
                                            AND v_tr_cb_detail.cb_id = tr_cb_saldo.cb_id
                                            AND v_tr_cb_detail.tr_date >= '$startDate'
                                            AND v_tr_cb_detail.tr_date <= '$endDate'
                                            AND v_tr_cb_detail.status IN (3,4)                                            
                                        ),0) AS cbs_in,

                                        (                                        
                                            SELECT SUM(COALESCE(v_tr_cb_detail.amount_out,0)) FROM v_tr_cb_detail
                                            WHERE v_tr_cb_detail.store_id =  tr_cb_saldo.store_id
                                            AND v_tr_cb_detail.cb_id = tr_cb_saldo.cb_id
                                            AND v_tr_cb_detail.tr_date >= '$startDate'
                                            AND v_tr_cb_detail.tr_date <= '$endDate'
                                            AND v_tr_cb_detail.status IN (3,4)                                       
                                        ) AS cbs_out,

                                        (
                                            COALESCE((
                                                SELECT COALESCE(cbs_saldo,0) FROM  tr_cb_saldo x
                                                WHERE x.store_id = $store_id
                                                and x.cbs_date < '$startDate'
                                                and x.cb_id = tr_cb_saldo.cb_id
                                                ORDER BY x.cbs_date DESC, x.id DESC
                                                limit 1
                                            ),0) + 
                                            COALESCE((                                        
                                                SELECT SUM(COALESCE(v_tr_cb_detail.amount_in,0)) FROM v_tr_cb_detail
                                                WHERE v_tr_cb_detail.store_id =  tr_cb_saldo.store_id
                                                AND v_tr_cb_detail.cb_id = tr_cb_saldo.cb_id
                                                AND v_tr_cb_detail.tr_date >= '$startDate'
                                                AND v_tr_cb_detail.tr_date <= '$endDate'   
                                                AND v_tr_cb_detail.status IN (3,4)                                         
                                            ),0) -
                                            COALESCE((                                        
                                                SELECT SUM(COALESCE(v_tr_cb_detail.amount_out,0)) FROM v_tr_cb_detail
                                                WHERE v_tr_cb_detail.store_id =  tr_cb_saldo.store_id
                                                AND v_tr_cb_detail.cb_id = tr_cb_saldo.cb_id
                                                AND v_tr_cb_detail.tr_date >= '$startDate'
                                                AND v_tr_cb_detail.tr_date <= '$endDate'    
                                                AND v_tr_cb_detail.status IN (3,4)                                        
                                            ),0)
                                        ) AS last_saldo
                                        
                                    FROM tr_cb_saldo
                                    JOIN m_cb ON tr_cb_saldo.cb_id = m_cb.id
                                    WHERE tr_cb_saldo.store_id = $store_id
                                    AND tr_cb_saldo.cbs_date >= '$startDate'
                                    AND tr_cb_saldo.cbs_date <= '$endDate'
                                    GROUP BY tr_cb_saldo.cb_id
                                    ORDER BY tr_cb_saldo.cb_id ASC")->result();

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
        $startDate = $tahun.'-'.sprintf("%02d", $bulan).'-01';
        $endDate = date('Y-m-t', strtotime($startDate));

        if(isset($postData['period'])){
            $tahun = (int) SUBSTR(revDate($postData['period']),0,4);
            $bulan = (int) SUBSTR(revDate($postData['period']),5,2);
            $startDate = $tahun.'-'.sprintf("%02d", $bulan).'-01';
            $endDate = date('Y-m-t', strtotime($startDate));            
        }

        $mcb = $this->db->query("SELECT id AS cb_id FROM m_cb WHERE store_id = $store_id AND status = 1 ORDER BY id ASC");
        if(count($mcb) > 0){
            $start = new DateTime($startDate);
            $end = new DateTime($endDate);
            for($date = $start; $date <= $end; $date->modify('+1 day')){
                $tr_date = $date->format('Y-m-d');
                echo $tr_date . '<br>';
                $this->db->delete('tr_cb_saldo', array('store_id' => $store_id, 'cbs_date' => $tr_date));
                foreach($mcb->result_array() as $row) {                    
                    $cb_id = $row['cb_id'];
                    /*Insert*/
                    $data = array(
                        'store_id' => $store_id,
                        'cb_id' => $cb_id,
                        'cbs_date' =>  $tr_date,
                        'cbs_saldo' => 0,
                        'created' => date('Y-m-d H:i:s', time()),
                        'createdby' => $this->auth['id']
                    );
                    if(count($data) > 0){                                        
                        $response = $this->db->insert('tr_cb_saldo', $data);
                        $id = $this->db->insert_id();
                    }
                    /**Updated*/
                    $saldo = 0;
                    $last_saldo = $this->db->query("SELECT cbs_saldo
                                                        FROM tr_cb_saldo 
                                                        WHERE store_id = $store_id 
                                                        AND cb_id = $cb_id 
                                                        AND cbs_date < '$tr_date'
                                                        ORDER BY cbs_date DESC
                                                        LIMIT 1")->result();
                    if(count($last_saldo) > 0) {
                        if($last_saldo[0]->cbs_saldo > 0) {
                            $saldo = (int) $last_saldo[0]->cbs_saldo;
                            $data = array('cbs_saldo' => $saldo);
                            $where = array('id' => $id, 'cb_id' => $cb_id);
                            $this->db->update('tr_cb_saldo', $data, $where);
                        }
                    }
                    $transaction_cb = $this->db->select('SUM(COALESCE(amount_in,0)) AS amount_in, SUM(COALESCE(amount_out,0)) AS amount_out')
                                    ->where(array('store_id' => $store_id, 'tr_date' => $tr_date, 'cb_id' => $cb_id))
                                    ->where_in('status', ['3','4'])
                                    ->group_by('tr_date, cb_id')
                                    ->get('v_tr_cb_detail')->result();
                    if(count($transaction_cb) > 0){
                        $saldo = ( $saldo + (int) $transaction_cb[0]->amount_in ) - (int) $transaction_cb[0]->amount_out;
                        $data = array('cbs_saldo' => $saldo);
                        $where = array('id' => $id, 'cb_id' => $cb_id);
                        $this->db->update('tr_cb_saldo', $data, $where);
                    }
                }
            }
            $this->db->delete('tr_cb_saldo', array('store_id' => $store_id, 'cbs_saldo' => 0));
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
            $html_header .= '<br>' . 'Rekap Saldo Kas Bank  Periode : ' . revDate($this->tr_date) . '</br><br></br><br></br>';
        } else {
            $html_header .= '<br>' . 'Rekap Saldo Kas Bank  Periode : ' . revDate($this->tr_date) . '</br><br></br><br></br>';
        }
        
        // Add Content Body
        $data_header = $this->db->query("SELECT tr_cb_saldo.cb_id, m_cb.cb_code, m_cb.cb_name, 
                                        COALESCE((
                                            SELECT cbs_saldo FROM tr_cb_saldo X
                                            WHERE x.store_id = $this->store_id
                                            AND x.cbs_date < '$this->tr_date'
                                            AND x.cb_id = tr_cb_saldo.cb_id
                                            ORDER BY x.id DESC
                                            LIMIT 1
                                        ),0) AS cbs_saldo 
                                        FROM tr_cb_saldo
                                        JOIN m_cb ON tr_cb_saldo.cb_id = m_cb.id
                                        WHERE tr_cb_saldo.store_id = $this->store_id 
                                        AND tr_cb_saldo.cbs_date = '$this->tr_date' 
                                        GROUP BY tr_cb_saldo.cb_id, m_cb.cb_code, m_cb.cb_name
                                        ORDER BY tr_cb_saldo.cb_id ASC")->result();
        if(count($data_header) > 0) {
            $no = 0;
            $pageno = 0;

            $pdf->SetFont('', 'B', 9);
            $saldo = 0;
            $html_table = '<table cellspacing="0" cellpadding="0" width="100%">';
            $html_table .= '<tr>';
                $html_table .= '<td width="20%" class="first second">List</td>';
                $html_table .= '<td width="41%" class="first second">Keterangan</td>';
                $html_table .= '<td width="13%" class="first second">Masuk</td>';
                $html_table .= '<td width="13%" class="first second">Keluar</td>';
                $html_table .= '<td width="13%" class="first second">Saldo</td>';
            $html_table .= '</tr>';             
            foreach($data_header as $r){
                $no++;
                $html_table .= '<tr>';  
                    $html_table .= '<td colspan="4" class="first"> ' . $no  . '. '. $r->cb_code . ' - ' . $r->cb_name . '</td>';
                    $html_table .= '<td class="first">' .  ( (int) $r->cbs_saldo > 0 ? number_format($r->cbs_saldo, "0", ".", ",") : '-' ). '</td>';
                $html_table .= '</tr>';  
                
                $cb_id = $r->cb_id;
                $saldo = (int) $r->cbs_saldo;
                $data_detail = $this->db->query("SELECT cb_pos_name, SUM(COALESCE(amount_in,0)) AS amount_in, SUM(COALESCE(amount_out,0)) AS amount_out
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
                        $saldo = ($saldo + (int) $d->amount_in) - (int) $d->amount_out;
                        $total_in = $total_in + (int) $d->amount_in;
                        $total_out = $total_out + (int) $d->amount_out;
                        $pdf->SetFont('', '', 9);
                        $html_table .= '<tr>';  
                            $html_table .= '<td></td>';
                            $html_table .= '<td> - ' . $d->cb_pos_name . '</td>';
                            $html_table .= '<td>' .  ( (int) $d->amount_in > 0 ? number_format($d->amount_in, "0", ".", ",") : '-' ). '</td>';
                            $html_table .= '<td>' .  ( (int) $d->amount_out > 0 ? number_format($d->amount_out, "0", ".", ",") : '-' ). '</td>';
                            $html_table .= '<td>' .  ( (int) $saldo <> 0 ? number_format($saldo, "0", ".", ",") : '-' ). '</td>';
                        $html_table .= '</tr>'; 
                    }
                    $html_table .= '<tr>';  
                        $html_table .= '<td></td>';
                        $html_table .= '<td class="first" style="text-align:center;font-weight:bold;"> Total </td>';
                        $html_table .= '<td class="first">' .  ( (int) $total_in > 0 ? number_format($total_in, "0", ".", ",") : '-' ). '</td>';
                        $html_table .= '<td class="first">' .  ( (int) $total_out > 0 ? number_format($total_out, "0", ".", ",") : '-' ). '</td>';
                        $html_table .= '<td class="first">' .  ( (int) $saldo <> 0 ? number_format($saldo, "0", ".", ",") : '-' ). '</td>';
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
            $pdf->Cell(01, 01, 'Created by,                       Checked by,', 0, 1, 'L');
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
            $html_header .= '<br>' . 'Saldo Kas Bank Periode : ' . revDate($this->tr_date) . '</br><br></br><br></br>';
        } else {
            $html_header .= '<br>' . 'Saldo Kas Bank Periode : ' . revDate($this->tr_date) . '</br><br></br><br></br>';
        }
        
        // Add Content Body
        $data_header = $this->db->query("SELECT tr_cb_saldo.cb_id, m_cb.cb_code, m_cb.cb_name, 
                                        COALESCE((
                                            SELECT cbs_saldo FROM tr_cb_saldo X
                                            WHERE x.store_id = $this->store_id
                                            AND x.cbs_date < '$this->tr_date'
                                            AND x.cb_id = tr_cb_saldo.cb_id
                                            ORDER BY x.id DESC
                                            LIMIT 1
                                        ),0) AS cbs_saldo
                                        FROM tr_cb_saldo
                                        JOIN m_cb ON tr_cb_saldo.cb_id = m_cb.id
                                        WHERE tr_cb_saldo.store_id = $this->store_id 
                                        AND tr_cb_saldo.cbs_date = '$this->tr_date' 
                                        GROUP BY tr_cb_saldo.cb_id, m_cb.cb_code, m_cb.cb_name
                                        ORDER BY tr_cb_saldo.cb_id ASC")->result();
        if(count($data_header) > 0) {
            $no = 0;
            $pageno = 0;

            $pdf->SetFont('', 'B', 9);
            $saldo = 0;
            $html_table = '<table cellspacing="0" cellpadding="0" width="100%">';
            $html_table .= '<tr>';
                $html_table .= '<td width="20%" class="first second">List</td>';
                $html_table .= '<td width="41%" class="first second">Keterangan</td>';
                $html_table .= '<td width="13%" class="first second">Masuk</td>';
                $html_table .= '<td width="13%" class="first second">Keluar</td>';
                $html_table .= '<td width="13%" class="first second">Saldo</td>';
            $html_table .= '</tr>';             
            foreach($data_header as $r){
                $no++;
                $html_table .= '<tr>';  
                    $html_table .= '<td colspan="4" class="first"> ' . $no  . '. '. $r->cb_code . ' - ' . $r->cb_name . '</td>';
                    $html_table .= '<td class="first">' .  ( (int) $r->cbs_saldo > 0 ? number_format($r->cbs_saldo, "0", ".", ",") : '-' ). '</td>';
                $html_table .= '</tr>';  
                
                $cb_id = $r->cb_id;
                $saldo = (int) $r->cbs_saldo;
                $data_detail = $this->db->query("SELECT cb_pos_name, description, COALESCE(amount_in,0) AS amount_in, COALESCE(amount_out,0) AS amount_out
                                                FROM v_tr_cb_detail
                                                WHERE store_id = $this->store_id
                                                AND tr_date = '$this->tr_date'
                                                AND cb_id = $cb_id
                                                AND status IN (3,4)")->result();
                if(count($data_detail) > 0) {    
                    $total_in = 0;
                    $total_out = 0;                                            
                    foreach($data_detail as $d){
                        $saldo = ($saldo + (int) $d->amount_in) - (int) $d->amount_out;
                        $total_in = $total_in + (int) $d->amount_in;
                        $total_out = $total_out + (int) $d->amount_out;
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
                            $html_table .= '<td>' .  ( (int) $saldo <> 0 ? number_format($saldo, "0", ".", ",") : '-' ). '</td>';
                        $html_table .= '</tr>'; 
                    }
                    $html_table .= '<tr>';  
                        $html_table .= '<td></td>';
                        $html_table .= '<td class="first" style="text-align:center;font-weight:bold;"> Total </td>';
                        $html_table .= '<td class="first">' .  ( (int) $total_in > 0 ? number_format($total_in, "0", ".", ",") : '-' ). '</td>';
                        $html_table .= '<td class="first">' .  ( (int) $total_out > 0 ? number_format($total_out, "0", ".", ",") : '-' ). '</td>';
                        $html_table .= '<td class="first">' .  ( (int) $saldo <> 0 ? number_format($saldo, "0", ".", ",") : '-' ). '</td>';
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
            $pdf->Cell(01, 01, 'Created by,                       Checked by,', 0, 1, 'L');
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
