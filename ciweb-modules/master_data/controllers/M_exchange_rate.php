<?php

class M_exchange_rate extends Bks_Controller {

    function __construct() {        
        $config = array('modules' => 'master_data', 'jsfiles' => array('m_exchange_rate'));
        parent::__construct($config);
        $this->Bksmdl->table = 'm_exchange_rate';
        $this->auth = $this->session->userdata( 'auth' );
        $this->store_id = $this->auth['store_id'];    
    }
    
    function index() {
        $this->template->title('Exchange Rate');
        $this->template->set('tsmall', 'File');
        $this->template->build('master_data/m_exchange_rate_v');
    }   
    
    function insert() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        
        if(isset($postData['store_id'])){
            $this->store_id = $postData['store_id'];
        } else {
            $this->store_id = $this->auth['store_id'];
        }

        $tr_date = revDate($postData['tr_date']);
        $tr_datex = date('Y-m-d', strtotime("-1 day", strtotime($postData['tr_date'])));        

        $this->db->trans_begin();
        // $this->db->truncate($this->Bksmdl->table);
        $this->db->where('exchange_rate_date =', $tr_date);
        $this->db->delete($this->Bksmdl->table);

        $hsl = $this->db->query("SELECT id, currency_code, currency_name
                                 FROM m_currency
                                 WHERE status = 1
                                 AND NOT EXISTS
                                ( SELECT 1 FROM m_exchange_rate AS p 
                                  WHERE p.store_id = $this->store_id
                                  AND p.exchange_rate_date = '$tr_date'
                                  AND p.currency_id = m_currency.id
                                )
                                GROUP BY id
                                ORDER BY id ASC")->result();
        $rows = []; 
        if(count($hsl) > 0){       
            foreach ($hsl as $key => $val) {
                $data = [                    
                    'store_id' => $this->store_id,
                    'currency_id' => $val->id,
                    'exchange_rate_date' => $tr_date,
                    'status' => 1,
                    'created' => date('Y-m-d H:i:s', time()),
                    'createdby' => $this->auth['id']
                ];
                array_push($rows, $data);               
            }             
        }        
        if(count($rows) > 0){   
            $this->db->insert_batch($this->Bksmdl->table, $rows);
            // echo $this->db->last_query(); exit;            
            $hslx = $this->db->query("SELECT
                                            store_id,                                 
                                            currency_id, 
                                            IFNULL(exchange_rate_buy,0) AS exchange_rate_buy,
                                            IFNULL(difference_buy,0) AS difference_buy,                                            
                                            IFNULL(exchange_rate_sell,0) AS exchange_rate_sell,                                                                                        
                                            IFNULL(difference_sell,0) AS difference_sell,                                                                                                                                    
                                            price_buy_bot,
                                            price_buy_top,
                                            price_sell_bot,
                                            price_sell_top            
                                    FROM m_exchange_rate
                                    WHERE store_id = $this->store_id
                                    AND exchange_rate_date = '$tr_datex'                                    
                                    AND status = 1
                                    AND ( exchange_rate_buy > 0 OR  exchange_rate_sell > 0 ) 
                                    AND EXISTS
                                    ( 
                                        SELECT id FROM m_exchange_rate AS p 
                                        WHERE p.store_id = $this->store_id                                        
                                        AND p.exchange_rate_date = '$tr_date'
                                        AND p.currency_id = m_exchange_rate.currency_id 
                                    )
                                    GROUP BY id
                                    ORDER BY currency_id ASC")->result();
            // echo $this->db->last_query(); exit;            
            if(count($hslx) > 0){                                
                foreach ($hslx as $key => $val) {
                    $this->db->trans_begin();
                    $data_upd = [
                        'exchange_rate_buy' => ($val->exchange_rate_buy == null ? 0 : $val->exchange_rate_buy),
                        'difference_buy' => ($val->difference_buy == null ? 0 : $val->difference_buy),
                        'exchange_rate_sell' => ($val->exchange_rate_sell == null ? 0 : $val->exchange_rate_sell),
                        'difference_sell' => ($val->difference_sell == null ? 0 : $val->difference_sell),
                        'price_buy_bot' => ($val->price_buy_bot == null ? 0 : $val->price_buy_bot),
                        'price_buy_top' => ($val->price_buy_top == null ? 0 : $val->price_buy_top),
                        'price_sell_bot' => ($val->price_sell_bot == null ? 0 : $val->price_sell_bot),
                        'price_sell_top' => ($val->price_sell_top == null ? 0 : $val->price_sell_top)
                    ];
                    $where = array('store_id' => $this->store_id, 'exchange_rate_date' => $tr_date, 'currency_id' => $val->currency_id);
                    $this->db->where($where);
                    $this->db->update('m_exchange_rate',$data_upd);                    
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
            }                                                          
        } 
        if(count($rows) <= 0){ 
            $json['msg'] = 'Data Empty or Already Exists!';
            echo json_encode($json);            
        }            
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

        if(isset($postData['store_id'])){
            $this->store_id = $postData['store_id'];
        } else {
            $this->store_id = $this->auth['store_id'];
        }
        $tr_datex = date('Y-m-d', strtotime("-1 day", strtotime($postData['exchange_rate_date'])));

        $postData['status'] = cekStatus($postData);
        $id = $postData['id'];
        $currency_id = $postData['currency_id'];

        /*difference_buy*/
        $postData['difference_buy'] = 0;
        $cek = $this->db->query("SELECT exchange_rate_buy 
                                 FROM m_exchange_rate 
                                 WHERE store_id = $this->store_id 
                                 AND exchange_rate_date = '$tr_datex' 
                                 AND currency_id = $currency_id")->row();
        if(isset($cek)){
            if($cek->exchange_rate_buy > 0) {
                if($postData['exchange_rate_buy'] > 0) {
                    $postData['difference_buy'] = $postData['exchange_rate_buy'] - $cek->exchange_rate_buy;
                }
            }
        }         
               
        /*difference_sell*/
        $postData['difference_sell'] = 0;
        $cek = $this->db->query("SELECT exchange_rate_sell 
                                 FROM m_exchange_rate 
                                 WHERE store_id = $this->store_id
                                 AND exchange_rate_date = '$tr_datex' 
                                 AND currency_id = $currency_id")->row();
        if(isset($cek)){
            if($cek->exchange_rate_sell > 0) {
                if($postData['exchange_rate_sell'] > 0) {
                    $postData['difference_sell'] = $postData['exchange_rate_sell'] - $cek->exchange_rate_sell;
                }
            }
        }       
        
        unset($postData['id']);
        unset($postData['store_id']);
        unset($postData['currency_id']);
        unset($postData['exchange_rate_date']);
        unset($postData['currency_code']);
        unset($postData['currency_name']);

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
        $postData = $this->input->post();
        
        if(isset($postData['store_id'])){
            $this->store_id = $postData['store_id'];
        } else {
            $this->store_id = $this->auth['store_id'];
        }

        $tr_date = revDate($postData['tr_date']);
        $this->Bksmdl->table = 'v_m_exchange_rate';

        $where[0]['field'] = 'store_id';
        $where[0]['data']  = $this->store_id;
        $where[0]['sql']   = 'where';

        $where[1]['field'] = 'exchange_rate_date';
        $where[1]['data']  = $tr_date;
        $where[1]['sql']   = 'where';

        $cpData = $this->Bksmdl->getDataTable($where);
        $this->Bksmdl->outputToJson($cpData);
    }
    
    function exportpdf()
    {   
        checkIfNotAjax();
        // $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        
        if(isset($postData['store_id'])){
            $this->store_id = $postData['store_id'];
        } else {
            $this->store_id = $this->auth['store_id'];
        }

        $tr_date = revDate($postData['tr_date']);

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
                    table {
                        border-collapse: collapse;
                        border: 1px solid #333;                        
                    }
                    th{ 
                        padding: 8px;
                        text-align: center;                        
                        background-color:#bae1ff;
                    }
                    td {                       
                        padding: 8px;
                        text-align: left;                     
                    }
                    h3{
                        text-align: center;
                    }
                </style>';

        // Add Title        
        $html_header = '<h3> KERTAS KERJA PENETAPAN KURS'  . '</h3></br><br></br>';
        $html_header .= 'Kantor  : ' . strtoupper(trim($profil_usaha[0]->store_name)). '<br>';
        $html_header .= 'Alamat  :' . trim($profil_usaha[0]->store_address) . '<br>';
        $data_jam = $this->db->query("SELECT TIME(created) AS jam FROM m_exchange_rate WHERE m_exchange_rate.store_id = $this->store_id AND m_exchange_rate.exchange_rate_date = '$tr_date' LIMIT 1")->result();
        $html_header .= 'Tanggal : ' . revDate($tr_date) . ' Jam : ' . $data_jam[0]->jam . '<br><br></br>';

        
        // Add Content Body
        $data_rate = $this->db->query("SELECT 
                                        m_currency.currency_code,
                                        m_exchange_rate.exchange_rate_buy,
                                        m_exchange_rate.exchange_rate_sell,
                                        (m_exchange_rate.exchange_rate_sell - m_exchange_rate.exchange_rate_buy) AS margin_rate,
                                        source_rate
                                        FROM m_exchange_rate
                                        JOIN m_currency ON m_exchange_rate.currency_id = m_currency.id
                                        WHERE m_exchange_rate.store_id = $this->store_id
                                        AND m_exchange_rate.exchange_rate_date = '$tr_date'
                                        ORDER BY m_currency.id ASC")->result();
        if(count($data_rate) > 0) {
            $no = 0;
            $pageno = 0;

            $pdf->SetFont('', 'B', 9);
            $saldo = 0;
            $html_table = '<table border="1" width="100%">';
            $html_table .= '<tr>';
                $html_table .= '<th width="5%">#</th>';
                $html_table .= '<th width="10%">Mata Uang</th>';
                $html_table .= '<th width="15%">Kurs Beli</th>';
                $html_table .= '<th width="15%">Kurs Jual</th>';
                $html_table .= '<th width="15%">Margin</th>';
                $html_table .= '<th width="40%">Sumber Kurs</th>';
            $html_table .= '</tr>';             
            foreach($data_rate as $r){
                $no++;
                $html_table .= '<tr>';  
                    $html_table .= '<td> ' . $no . '</td>';
                    $html_table .= '<td> ' . $r->currency_code . '</td>';
                    $html_table .= '<td>' .  ( (int) $r->exchange_rate_buy > 0 ? number_format($r->exchange_rate_buy, "0", ".", ",") : '-' ). '</td>';
                    $html_table .= '<td>' .  ( (int) $r->exchange_rate_sell > 0 ? number_format($r->exchange_rate_sell, "0", ".", ",") : '-' ). '</td>';
                    $html_table .= '<td>' .  ( (int) $r->margin_rate > 0 ? number_format($r->margin_rate, "0", ".", ",") : '-' ). '</td>';
                    $html_table .= '<td> ' . $r->source_rate . '</td>';
                $html_table .= '</tr>';
                $pdf->Ln(4);
            }
            $html_table .= '</table>';

            $html = $style. $html_header . $html_table;
            $pdf->SetX(10); // Mengatur posisi top menjadi 10 mm dari kiri halaman
            $pdf->SetY(10); // Mengatur posisi top menjadi 10 mm dari atas halaman
            $pdf->writeHTML($html, true, false, true, false, '');

            $pdf->Ln(4);
            $pdf->Cell(01, 01, 'Otorisasi : ', 0, 1, 'L');

            $pdf->Ln(1);
            $pdf->Cell(01, 01, 'Disusun Oleh,                             Diverifikasi Oleh,                                   Disetujui Oleh', 0, 1, 'L');
        }

        ob_start();
        $pdf_output = $pdf->Output('Exchange Rate ' . revDate($tr_date).'.pdf','S');
        ob_end_clean();
        echo json_encode(['pdf' => base64_encode($pdf_output)]); // Display Pdf in new tab
        // $response =  array(
        //     'op' => 'ok',
        //     'file' => "data:application/pdf;base64,".base64_encode($pdf_output)
        // );
        // die(json_encode($response)); // download pdf
    }

}
