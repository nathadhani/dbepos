<?php

class Cb_list extends Bks_Controller {

    function __construct() {
        $config = array('modules' => 'cb', 'jsfiles' => array('cb_list'));
        parent::__construct($config);        
        $this->auth = $this->session->userdata( 'auth' );      
        $this->userId = $this->auth['id'];
        $this->store_id = $this->auth['store_id'];
    }
    
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('List');
        $this->template->set('tsmall', 'Cash Bank');
        $this->template->set('icon', 'fa fa-edit');
        $data['auth'] = $this->auth;
        $this->template->build('cb/cb_list_v', $data);
    }
    
    function getdata() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        
        $store_id  = $postData['store_id'];    
        $tanggal1 = revDate($postData['periode1']);
        $tanggal2 = revDate($postData['periode2']);

        $this->Bksmdl->table = 'v_tr_cb_header';

        $where[0]['field'] = 'store_id';
        $where[0]['data']  = $store_id;
        $where[0]['sql']   = 'where';
       
        $where2 = "tr_date >= '". $tanggal1 ."' AND tr_date <= '". $tanggal2 ."'";

        $cpData = $this->Bksmdl->getDataTable($where, $where2);
        $this->Bksmdl->outputToJson($cpData);
    }

    function excel(){
        $this->libauth->check(__METHOD__);
        $store_id = $this->uri->segment(4);
        $tanggal1 = revDate($this->uri->segment(5));
        $tanggal2 = revDate($this->uri->segment(6));
       
        $query = "SELECT
                    (
                        SELECT
                            ( CASE WHEN ( tr_header.tr_id = 1 ) THEN 'Buy/Beli' WHEN ( tr_header.tr_id = 2 ) THEN 'Sell/Jual' ELSE '' END )
                    ) AS trx_name,
                    tr_header.tr_date,
                    tr_header.tr_number,
                    (
                        SELECT
                        ( CASE WHEN ( tr_header.status IN ( 2 )) THEN 'Canceled' WHEN ( tr_header.status IN ( 3 )) THEN 'Confirm' WHEN ( tr_header.status = 4 ) THEN 'Integrasi System ECSys (API)' ELSE 'Task' 
                        END
                        )
                    ) AS status_name,
                    CONCAT(m_currency.currency_code,' - ',m_currency.currency_name) AS currency_name,
                    tr_detail.nominal AS nominal,
                    tr_detail.sheet AS sheet,
                    (tr_detail.nominal * tr_detail.sheet) AS amount,
                    tr_detail.price AS exchange_rate,
                    ((tr_detail.nominal * tr_detail.sheet) * tr_detail.price)  AS subtotal,
                    m_store.store_name,
                    m_store.store_address,
                    tr_header.description,
                    tr_detail.created AS created,
                    tr_detail.updated AS updated,
                    usr1.fullname AS createdby_name,
                    usr2.fullname AS updated_name
                FROM tr_detail
                JOIN tr_header ON tr_detail.header_id = tr_header.id 				
                JOIN m_currency ON tr_detail.currency_id = m_currency.id
                JOIN m_store ON m_store.id = tr_header.store_id
                JOIN auth_users usr1 ON usr1.id = tr_header.createdby
                LEFT JOIN auth_users usr2 ON usr2.id = tr_header.updatedby"; 

        if( $ap_tr_id !== null && strlen($ap_tr_id) > 0){
            $query .= " WHERE tr_header.store_id = $store_id
                    AND tr_header.tr_id IN ($ap_tr_id)
                    AND tr_header.tr_date >= '$tanggal1'
                    AND tr_header.tr_date <= '$tanggal2'
                    AND tr_detail.status IN (2,3,4)                    
                    ORDER BY tr_header.tr_date ASC, tr_header.tr_id ASC, tr_header.tr_number ASC, tr_detail.currency_id ASC, tr_detail.nominal ASC, tr_detail.sheet ASC";
        } else {
            $query .= " WHERE tr_header.store_id = $store_id
                    AND tr_header.tr_date >= '$tanggal1'
                    AND tr_header.tr_date <= '$tanggal2'
                    AND tr_detail.status IN (2,3,4)
                    ORDER BY tr_header.tr_date ASC, tr_header.tr_id ASC, tr_header.tr_number ASC, tr_detail.currency_id ASC, tr_detail.nominal ASC, tr_detail.sheet ASC";
        }
        
        if (!$this->db->query($query))
        return false;

        $fields = $this->db->query($query)->list_fields();
        $totcol = $this->db->query($query)->num_rows();
        $maxrow = $totcol+1;

        // echo $this->db->last_query();exit;

        $this->load->library('excel');
        $this->excel->getProperties()->setTitle("export")->setDescription("none");
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle("temp");

        $bold = array('font' => array('bold' => true));
        $fontcolor = array('font' => array('color' => array('rgb' => 'ff0000')));
        $title = array('font' => array('color' => array('rgb' => 'ffffff'), 'bold' => true), 
                       'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => '337AB7')));

        // Field names in the first row
        $fields = $this->db->query($query)->list_fields();
        $col = 0;

        // title column
        $judul = array('Trx',                            
                        'Date',
                        'Number',
                        'Status',                        
                        'Currency',
                        'Nominal',
                        'Sheet',
                        'Amount',
                        'Exchange Rate',
                        'Equivalent',
                        'Store Name',
                        'Store Address',
                        'Description',
                        'Created',
                        'Updated',
                        'Created by Name',
                        'Updated by Name');


        foreach ($fields as $key => $field) {
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $judul[$key]);
            $this->excel->getActiveSheet()->getStyleByColumnAndRow($col, 1)->applyFromArray($title);
            $col++;
        }

        // Fetching the table data
        $row = 2;
        foreach ($this->db->query($query)->result_array() as $data) {
            $col = 0;
            foreach ($fields as $field) {
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data[$field]); // Retreive Data Value
                $this->excel->getActiveSheet()->getStyle('F'.$row.':'.'H'.$row)->getNumberFormat()->setFormatCode('#,##0'); // Number Format
                $this->excel->getActiveSheet()->getStyle('J'.$row.':'.'J'.$row)->getNumberFormat()->setFormatCode('#,##0'); // Number Format                
                if($field == 'exchange_rate'){
                    if( $this->Bksmdl->cekdecimalgreaterthenzero($data[$field]) > 0){
                        $this->excel->getActiveSheet()->getStyle('I'.$row.':'.'I'.$row)->getNumberFormat()->setFormatCode('#,##0.00'); // Number Format Decimal
                    } else {
                        $this->excel->getActiveSheet()->getStyle('I'.$row.':'.'I'.$row)->getNumberFormat()->setFormatCode('#,##0'); // Number Format Decimal                        
                    }
                }
                $col++;
            }
            $row++;
        }
        foreach (range('A', 'Q') as $columnID) {
            $this->excel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }
        $this->excel->setActiveSheetIndex(0);        

        // Sending headers to force the user to download the file
        $filename = 'Transaction Period ' . revDate($tanggal1) . ' sd ' .  revDate($tanggal2);
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");;
        header("Content-Disposition: attachment;filename=$filename.xlsx");
        header("Content-Transfer-Encoding: binary ");
        $objWriter = new PHPExcel_Writer_Excel2007($this->excel); 
        $objWriter->setOffice2003Compatibility(true);
        $objWriter->save('php://output');
    }    

    function insert_detail(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);                
        $postData = $this->input->post();
        $postDetail = $this->input->post();

        /** Insert Header */
        /** -------------------------------------------------------------------------------- */        
        if( isset($postData['header_id']) ){
            if(($postData['header_id'] == 'null' || $postData['header_id'] == '')) {            
                $postData['store_id'] = $this->store_id;        
                if(isset($postData['modal_new_tr_date'])){
                    $postData['tr_date'] = revDate($postData['modal_new_tr_date']);
                    /**----------------------------------------------------- */
                    $datetime = date('Y-m-d H:i:s');
                    $new_date = $postData['tr_date'];
                    $new_datetime = date('Y-m-d H:i:s', strtotime($new_date . ' ' . date('H:i:s', strtotime($datetime))));
                    $postData['created'] = $new_datetime;
                } else {
                    $postData['tr_date'] = Date('Y-m-d');
                }
                $postData['tr_number'] = $this->Bksmdl->generate_code_cb($this->store_id, $postData['cb_id'], $postData['cb_pos_id'], $postData['tr_date']);
                $postData['status'] = '3';

                unset($postData['header_id']);
                unset($postData['modal_new_tr_date']);
                unset($postData['modal_new_description']);
                unset($postData['modal_new_amount']);

                $this->db->trans_begin();
                $this->Bksmdl->table = 'tr_cb_header';
                $response = $this->Bksmdl->insert($postData);
                $id_header = $this->db->insert_id();
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $err = $this->db->error();
                    $json['msg'] = $err['code'] . '<br>' . $err['message'];
                    echo json_encode($json);
                } else {
                    $this->db->trans_commit();
                }
            } else {
                $id_header = (int) $postData['header_id'];
            }
        }
        /** End of Inser Header -------------------------------------------------------------------------------- */

        /** Insert Detail */
        /** -------------------------------------------------------------------------------- */
        if( isset($id_header) && $id_header > 0 && ( $id_header != 'null' || $id_header !== '') ){
            $postDetail['header_id'] = $id_header;
            $postDetail['description'] = $postDetail['modal_new_description'];
            $postDetail['amount'] = $postDetail['modal_new_amount'];
            if (strpos($postDetail['amount'], ',') !== false) {
                $postDetail['amount'] = str_replace(',','.',$postDetail['amount']);
            }        
            $postDetail['status'] = '3';

            unset($postDetail['cb_id']);
            unset($postDetail['cb_pos_id']);
            unset($postDetail['modal_new_tr_date']);
            unset($postDetail['modal_new_description']);
            unset($postDetail['modal_new_amount']);

            $this->db->trans_begin();
            $this->Bksmdl->table = 'tr_cb_detail';
            $response = $this->Bksmdl->insert($postDetail);
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $err = $this->db->error();
                $json['msg'] = $err['code'] . '<br>' . $err['message'];
                echo json_encode($json);
            } else {
                $this->db->trans_commit();
                $json['msg'] = '1';
                $json['id_header'] = $id_header;
                echo json_encode($json);
            }
        }
        /** End of Inser Detail -------------------------------------------------------------------------------- */
    }
    
    function delete_detail(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);        
        $postData = $this->input->post();
        $id = json_decode($postData['id']);        
        $this->db->trans_begin();
        $this->Bksmdl->table = 'tr_cb_detail';
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

    function show_detail(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $header_id = $postData['header_id'];
        $query = $this->db->query("SELECT * FROM v_tr_cb_detail WHERE header_id = " . $header_id ." ORDER BY cb_id, cb_pos_id, id ASC")->result();
        // echo $this->db->last_query();exit;
        echo json_encode($query, true);
    }

    function cancel_trx(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $header_id = json_decode($postData['id']);        
        if( isset($postData['description']) ){
            $postData['reason_cancel'] = ucwords(strtolower(trim($postData['description']))); 
        } else {
            $postData['reason_cancel'] = 'Canceled';
        }
        unset($postData['description']);
        $this->db->trans_begin();
        $this->db->where(array('id' => $header_id));
        $this->db->update('tr_cb_header', array('status' => 2, 'reason_cancel' => $postData['reason_cancel'], 'updated' => date('Y-m-d H:i:s', time()), 'updatedby' => $this->userId) );
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $err = $this->db->error();
            $json['msg'] = $err['code'] . '<br>' . $err['message'];
            echo json_encode($json);
        } else {
            $this->db->where(array('header_id' => $header_id));
            $this->db->update('tr_cb_detail', array('status' => 2, 'updated' => date('Y-m-d H:i:s', time()), 'updatedby' => $this->userId) );

            $this->db->trans_commit();
            $json['msg'] = '1';
            echo json_encode($json);
        }            
    }

    function generate_cb_buysell(){
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        
        $store_id  = $postData['store_id'];    
        $startDate = revDate($postData['period1']);
        $endDate = revDate($postData['period2']) + 1;

        $start = new DateTime($startDate);
        $end = new DateTime($endDate);
        for($date = $start; $date <= $end; $date->modify('+1 day')){
            $tr_date = $date->format('Y-m-d');
            echo $tr_date . '<br>';
            $data['store_id'] = $store_id;
            $data['tr_date'] = $tr_date;
            $data['buysell_id'] = null;        
            $this->Bksmdl->generate_payment_cb($data);
        }
    }

}
