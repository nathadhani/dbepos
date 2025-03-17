<script type="text/javascript">
    var userId = <?php echo $auth['id'];?>;
    var Apimethod = <?php echo ($auth['api_method'] == null ? 0 : $auth['api_method']) ;?>;
    var ApiAP = "<?php echo $auth['api_angkasapura'];?>";

    var customerId = <?php echo $this->uri->segment(4);?>;
    var tr_uri_code = <?php echo "'" . $this->uri->segment(5) ."'";?>;
    var id_tr_header = <?php echo $this->uri->segment(6);?>;
</script>
<style>
    table {
        border: none;
        border-spacing: 0;
        border-collapse: collapse;
    }
</style>
<div class="page-content-wrap">    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">                        
                    <div class="panel-title-box">
                        <h3>
                            <?php 
                                if($this->uri->segment(5) === '432d21') {
                                    echo '<span style="color:blue;font-weight:800;font-size:20px;">Buy / Beli</span>';
                                } else if($this->uri->segment(5) === '523d3455') {
                                    echo '<span style="color:red;font-weight:800;font-size:20px;">Sell / Jual</span>';
                                }
                            ?>
                        </h3>
                    </div>
                    <ul class="panel-controls">
                        <button id="btn-cancel" class="btn btn-danger btn btn-sm" style="width:130px;">Cancel</button>
                        <?php
                            $store_id = $auth['store_id'];
                            $get_AP = $this->db->query("SELECT api_angkasapura, api_method FROM m_store WHERE id = $store_id ")->result(); 
                            if($get_AP){                                                                          
                                if($get_AP[0]->api_method === '1') {              
                        ?>
                            <button id="btn-submit" class="btn btn-primary btn btn-sm" style="width:130px;">Submit to ECSys</button>
                        <?php
                                }
                            }
                        ?>
                    </ul>    
                </div>
                <form id="mainForm" class="form-horizontal" autocomplete="off">
                    <div class="panel-body">   
                        <div class="row">
                            <div class="col-md-6">     
                                Store :<span id="store_address"></span><br>
                                Number :<span id="tr_number"></span><br>
                                Date : <span id="tr_date"></span><br>
                                Status : <span id="ftitle"></span><br>
                                Description : <span id="description_header"></span>
                            </div>    
                            <div class="col-md-6">                                
                                Customer : <a href="#" id="customer_name"></a><br>
                                Act on : <span id="customer_act_on"></span><br>
                                Source : <span id="customer_source"></span><br>
                                Purpose : <span id="customer_purpose"></span><br>
                            </div>
                        </div>

                        <br>                        
                        <hr style="border: 1px solid green;margin-top:-10px;">

                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <table class="table table-bordered table-condensed table-hover" width="100%" id="table-detail">
                                    <thead>
                                        <tr style="background:#f1f5f9;">
                                            <td style='vertical-align: middle;text-align:center;'>#</td>
                                            <td style='vertical-align: middle;text-align:left;'>Currency</td>
                                            <td style='vertical-align: middle;text-align:left;'>Nomimal</td>
                                            <td style='vertical-align: middle;text-align:left;'>Sheet</td>
                                            <td style='vertical-align: middle;text-align:left;'>Amount</td>
                                            <td style='vertical-align: middle;text-align:left;'>Exchange Rate</td>
                                            <td style='vertical-align: middle;text-align:left;'>Equivalent</td>
                                        </tr>
                                    </thead>
                                    <tbody>                                                
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--.end row -->                        

                        <hr style="border: 1px solid green;margin-top:-15px;">

                        <div class="row" style="margin-top:-10px;">
                            <div class="col-md-6">                     
                                <span id="created_by"></span><br>
                                <span id="cancel_by" class="pull-right"></span>
                            </div>
                            <div class="col-md-6">
                                <button id="btn-pdf" class="btn btn-success btn btn-sm pull-right" style="width:120px;margin-left:5px;">Print</button>
                                <button id="btn-payment" class="btn btn-warning btn btn-sm pull-right" style="width:120px;margin-left:5px;">Payment</button>
                            </div>
                        </div>

                        <?php
                                $store_id = $auth['store_id'];
                                $get_AP = $this->db->query("SELECT api_angkasapura, api_method FROM m_store WHERE id = $store_id ")->result();
                                if($get_AP){                                                                        
                            ?>                                   
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php
                                                if($get_AP[0]->api_method === '1') {
                                                    $id = $this->uri->segment(6);
                                                    $resp_api = $this->db->query("SELECT * FROM tr_log_api WHERE header_id = $id")->result_array(); 
                                                    // echo $this->db->last_query();exit;
                                                    if($resp_api){
                                            ?>              
                                                        <br>
                                                        <table class="table table-bordered table-condensed table-hover" width="100%">
                                                            <thead>
                                                                <span style="color:black;font-weight:bolder;">Integrasi System ECSys (API) - logs</span>
                                                                <tr>
                                                                    <th style='vertical-align: middle;text-align:left;'>Method</th>
                                                                    <th style='vertical-align: middle;text-align:left;'>Status</th>
                                                                    <th style='vertical-align: middle;text-align:left;'>Success Insert</th>
                                                                    <th style='vertical-align: middle;text-align:left;'>Failed Insert</th>
                                                                    <th style='vertical-align: middle;text-align:left;'>Description</th>
                                                                    <th style='vertical-align: middle;text-align:left;'>Timestamp</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                            <?php 
                                                        foreach($resp_api AS $row){
                                            ?>
                                                            
                                                                <tr>
                                                                    <td style='vertical-align: middle;text-align:center;'><?php echo $row['method'];?></td>
                                                                    <td style='vertical-align: middle;text-align:center;'><?php echo ($row['ap_status'] == 1 ? 'true' : 'false');?></td>
                                                                    <td style='vertical-align: middle;text-align:center;'><?php echo $row['ap_success_insert'];?></td>
                                                                    <td style='vertical-align: middle;text-align:center;'><?php echo $row['ap_failed_insert'];?></td>
                                                                    <td style='vertical-align: middle;text-align:center;'><?php echo $row['ap_reason'];?></td>
                                                                    <td><?php echo date_format(date_create($row['created']),"d/m/Y H:i:s");?></td>
                                                                </tr>                                                
                                                        <?php } ?>            
                                                            </tbody>
                                                        </table>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                            <?php                                             
                                }
                            ?>                                                                  
                    </div>
                    <!--.end panel-body -->
                </form>
            </div>
        </div>
    </div>   
</div>

<div class="modal fade" id="ModalCancel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading ui-draggable-handle">                        
                                <div class="panel-title-box">
                                    <h3>
                                        Reason Cancel
                                    </h3>
                                </div>
                                <ul class="panel-controls">
                                    <button id="btn-modal-cancel" class="btn btn-primary btn btn-sm" style="width:120px;margin-left:5px;">Save</button>
                                    <button id="btn-modal-cancel-close" class="btn btn-default btn btn-sm" style="width:120px;margin-left:5px;">Close</button>
                                </ul>    
                            </div>
                            <form id="mainFormCancel" class="form-horizontal" autocomplete="off">
                                <div class="panel-body">   
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" autofocuse="" id="modal-cancel-description" name="modal-cancel-description" class="form-control" placeholder="Alasan Batal..." required>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalPayment" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Payment</h4>
            </div> -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading ui-draggable-handle">                        
                                <div class="panel-title-box">
                                    <h3>
                                        Payment
                                    </h3>
                                </div>
                                <ul class="panel-controls">
                                    <button id="btn-modal-payment" class="btn btn-primary btn btn-sm" style="width:120px;margin-left:5px;">Save</button>
                                    <button id="btn-modal-payment-close" class="btn btn-default btn btn-sm" style="width:120px;margin-left:5px;">Close</button>
                                </ul>    
                            </div>                            
                            <div class="panel-body">   
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th style='vertical-align:middle;text-align:left;'>Payment Type</th>
                                                    <th style='vertical-align:middle;text-align:left;'>Payment Value</th>
                                                    <th style='vertical-align:middle;text-align:left;'>Payment Description</th>
                                                    <th id="act-title" style='vertical-align:middle;text-align:center;' width="50px">Action</th>
                                                </tr>
                                            </thead>                                                
                                            <tbody>  
                                                <form id="mainFormModalPayment" class="form-horizontal" autocomplete="off">     
                                                    <tr style="background:#ffffff;">
                                                        <td width="30%">                                                    
                                                            <select class="form-control" style="width: 100%" id="modal_payment_type" name="modal_payment_type">
                                                                <option value="" />-- Pilih --
                                                                <option value="1" />Cash
                                                                <option value="2" />Transfer
                                                            </select>
                                                        </td>                                                                                                
                                                        <td width="15%">
                                                            <input type="text" id="modal_payment_amount" name="modal_payment_amount" class="form-control">
                                                        </td>
                                                        <td width="45%">
                                                            <input type="text" id="modal_payment_description" name="modal_payment_description" class="form-control">
                                                        </td>
                                                        <td width="10%" style='text-align:center'>
                                                            <button id="btn-modal-add-row-payment" class="btn btn-primary btn btn-sm" style="width:90px;">Add</button>
                                                        </td>                
                                                    </tr>
                                                </form>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table class="table table-bordered table-condensed table-hover" width="100%" id="table-modal-payment">
                                            <thead>
                                                <tr style="background:#f1f5f9;">
                                                    <td style='vertical-align: middle;text-align:center;'>#</td>
                                                    <th style='vertical-align:middle;text-align:left;'>Payment Type</th>
                                                    <th style='vertical-align:middle;text-align:left;'>Payment Value</th>
                                                    <th style='vertical-align:middle;text-align:left;'>Payment Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
