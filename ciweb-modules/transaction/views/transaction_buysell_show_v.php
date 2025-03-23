<script type="text/javascript">
    var userId = <?php echo $auth['id'];?>;
    var usergroupId = <?php echo $auth['usergroup_id'];?>;
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
                <?php if( $auth['usergroup_id'] != '6'){ ?>
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
                            <button id="btn-payment" class="btn btn-info btn btn-sm" style="width:130px;">Payment</button>
                            <button id="btn-cancel" class="btn btn-info btn btn-sm" style="width:130px;">Cancel</button>
                            <?php
                                $store_id = $auth['store_id'];
                                $get_AP = $this->db->query("SELECT api_angkasapura, api_method FROM m_store WHERE id = $store_id ")->result(); 
                                if($get_AP){                                                                          
                                    if($get_AP[0]->api_method === '1') {              
                            ?>
                                <button id="btn-submit" class="btn btn-info btn btn-sm" style="width:130px;">Submit to ECSys</button>
                            <?php
                                    }
                                }
                            ?>
                        </ul>    
                    </div>
                <?php } ?>
                <div class="panel-body">   
                    <div class="row">
                        <div class="col-md-6">     
                            Store :<span id="store_address"></span><br>
                            Date : <span id="tr_date"></span><br>
                            Number :<span id="tr_number"></span><br>
                            Status : <span id="ftitle"></span><br>
                            Description : <span id="description_header"></span>
                        </div>    
                        <div class="col-md-6">                                
                                Customer Name : <a href="#" id="customer_name"></a><br>
                                Address : <a href="#" id="customer_address"></a><br>
                            <?php if( $auth['usergroup_id'] != '6'){ ?>
                                Act on : <span id="customer_act_on"></span><br>
                                Source : <span id="customer_source"></span><br>
                                Purpose : <span id="customer_purpose"></span>
                            <?php } ?>
                        </div>
                    </div>

                    <br>                        
                    <hr style="border: 1px solid green;margin-top:-10px;">

                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table class="table table-bordered table-condensed table-striped table-hover" width="100%" id="table-detail">
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
                            <span id="created_by"></span> | <span id="cancel_by"></span>
                        </div>
                        <div class="col-md-6">                                
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
                                    <button id="btn-modal-cancel" class="btn btn-info btn btn-sm" style="width:120px;margin-left:5px;">Submit</button>
                                    <button id="btn-modal-cancel-close" class="btn btn-info btn btn-sm" style="width:120px;margin-left:5px;">Close</button>
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

<div class="modal fade" id="ModalPayment" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" style="max-height:500px; overflow-y:auto;">
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
                                    <button id="btn-pdf" class="btn btn-info btn btn-sm" style="width:120px;margin-left:5px;">Print</button>
                                    <button id="btn-modal-payment-close" class="btn btn-info btn btn-sm" style="width:120px;margin-left:5px;">Close</button>
                                </ul>    
                            </div>                            
                            <div class="panel-body">   
                                <div class="row" style="margin-left:-10px;">
                                    <div class="col-md-4">
                                        <div class="form-group">                                
                                            <div class="col-lg-12">
                                                <label for="store_id" style="display:block">Transaction Value</label>
                                                <input type="text" autofocuse="" id="modal_total_value" class="form-control" placeholder="Nilai Transaksi..." disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">                                
                                            <div class="col-lg-12">
                                                <label for="store_id" style="display:block">Remaining Payment Value</label>
                                                <input type="text" autofocuse="" id="modal_remaining_payment_value" class="form-control" placeholder="Nilai Transaksi..." disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">                                
                                            <div class="col-lg-12">
                                                <label for="modal_cashierby" style="display:block">Cashier</label>
                                                <div class="input-group">
                                                    <select id="modal_cashierby" name="modal_cashierby" class="form-control">
                                                        <option value="">Pilih Kasir...</option>
                                                    </select>     
                                                    <span class="input-group-addon"><a href="#" id="btn_cashier_save" title="Save"><i class="fa fa-save"></i></a></span>
                                                </div>
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>     
                                <br>                           
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th style='vertical-align:middle;text-align:left;'>Payment Type</th>
                                                    <th style='vertical-align:middle;text-align:left;'>Payment Description</th>
                                                    <th style='vertical-align:middle;text-align:left;'>Payment Value</th>
                                                    <th id="act-title" style='vertical-align:middle;text-align:center;' width="50px">Action</th>
                                                </tr>
                                            </thead>                                                
                                            <tbody>  
                                                <form id="mainFormModalPayment" class="form-horizontal" autocomplete="off">     
                                                    <tr style="background:#ffffff;">
                                                        <td width="20%">
                                                            <!-- Jika Search Tidak berfungsi, remove modal tabindex='-1' -->
                                                            <select id="modal_payment_type"
                                                                    name="modal_payment_type"
                                                                    data-ajax="true"
                                                                    data-placeholder="Pilih..."
                                                                    data-url="master_data/m_payment_type/getpaymenttype/"
                                                                    data-value=""
                                                                    data-limit="100"                                          
                                                                    placeholder="Pilih..."
                                                                    class='form-control select2'
                                                                    require
                                                            >
                                                            </select>
                                                        </td>                                                                
                                                        <td width="55%">
                                                            <input type="text" id="modal_payment_description" name="modal_payment_description" class="form-control">
                                                        </td>
                                                        <td width="15%">
                                                            <input type="text" onkeypress="validasiAngka(event)" autofocuse="" id="modal_payment_amount" name="modal_payment_amount" class="form-control" style='text-align:right;'>
                                                        </td>
                                                        <td width="10%" style='text-align:center'>
                                                            <button id="btn-modal-add-row-payment" class="btn btn-info btn btn-sm" style="width:90px;">Add</button>
                                                        </td>                
                                                    </tr>
                                                    <tr>
                                                        <td id="terbilang_modal_payment_amount" colspan=4></td>
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
                                                    <th style='vertical-align:middle;text-align:left;'>Payment Description</th>
                                                    <th style='vertical-align:middle;text-align:left;'>Timestamp</th>
                                                    <th style='vertical-align:middle;text-align:left;'>Payment Value</th>
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
