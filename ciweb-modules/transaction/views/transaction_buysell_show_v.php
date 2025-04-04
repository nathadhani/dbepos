<script type="text/javascript">
    var userId = <?php echo $auth['id'];?>;
    var usergroupId = <?php echo $auth['usergroup_id'];?>;
    var Apimethod = <?php echo ($auth['api_method'] == null ? 0 : $auth['api_method']) ;?>;
    var ApiAP = "<?php echo $auth['api_angkasapura'];?>";

    var customerId = <?php echo $this->uri->segment(4);?>;
    var id_tr_header = <?php echo $this->uri->segment(5);?>;
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
                            <h3 id="trx_name">
                            </h3>
                        </div>                        
                        <ul class="panel-controls">
                            <div class="dropdown">
                                <button class="dropbtn" style="width:100px;">Action</button>
                                <div class="dropdown-content">
                                    <a href="#" id="btn-payment">Payment</a>
                                    <a href="#" id="btn-cancel">Cancel</a>
                                    <a href="#" id="btn-pdf">Print</a>
                                    <?php
                                        $store_id = $auth['store_id'];
                                        $get_AP = $this->db->query("SELECT api_angkasapura, api_method FROM m_store WHERE id = $store_id ")->result(); 
                                        if($get_AP){                                                                          
                                            if($get_AP[0]->api_method === '1') {              
                                        ?>
                                        <a href="#" id="btn-submit">Submit to ECSys</a>
                                    <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                            <!-- <button id="btn-payment" class="btn btn-info btn btn-sm" style="width:130px;">Payment</button>
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
                            ?> -->
                        </ul>    
                    </div>
                <?php } ?>
                <div class="panel-body">   
                    <div class="row">
                        <div class="col-md-6">
                            <span>Store : </span><span id="store_address"></span><br>
                            <span>Date : </span><span id="tr_date"></span><br>
                            <span>Number : </span><span id="tr_number"></span><br>
                            <span>Status : </span><span id="ftitle"></span><br>
                            <span>Description : </span><span id="description_header"></span><br>
                            <span id="created_by"></span>
                        </div>    
                        <div class="col-md-6">
                            <span>Name : </span><a href="#" id="customer_name"></a><br>
                            <span>Address : </span><span id="customer_address"></span><br>
                            <?php if( $auth['usergroup_id'] != '6'){ ?>
                                <span>Act On  : </span><span id="customer_act_on"></span><br>
                                <span>Source  : </span><span id="customer_source"></span><br>
                                <span>Purpose : </span><span id="customer_purpose"></span><br>
                            <?php } ?>
                            <span id="cancel_by"></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table class="table table-bordered table-condensed table-striped table-hover" width="100%" id="table-detail">
                                <thead>
                                    <tr>
                                        <th style='vertical-align: middle;text-align:center;'>#</th>
                                        <th style='vertical-align: middle;text-align:left;'>Currency</th>
                                        <th style='vertical-align: middle;text-align:left;'>Nomimal</th>
                                        <th style='vertical-align: middle;text-align:left;'>Sheet</th>
                                        <th style='vertical-align: middle;text-align:left;'>Amount</th>
                                        <th style='vertical-align: middle;text-align:left;'>Exchange Rate</th>
                                        <th style='vertical-align: middle;text-align:left;'>Equivalent</th>
                                    </tr>
                                </thead>
                                <tbody>                                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--.end row -->

                    <?php
                            $store_id = $auth['store_id'];
                            $get_AP = $this->db->query("SELECT api_angkasapura, api_method FROM m_store WHERE id = $store_id ")->result();
                            if($get_AP){                                                                        
                        ?>                                   
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php
                                            if($get_AP[0]->api_method === '1') {
                                                $id = $this->uri->segment(5);
                                                $resp_api = $this->db->query("SELECT * FROM tr_log_api WHERE header_id = $id")->result_array(); 
                                                // echo $this->db->last_query();exit;
                                                if($resp_api){
                                        ?>          
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
                <input type="text" autofocuse="" id="modal-cancel-description" name="modal-cancel-description" class="form-control" placeholder="Alasan Batal..." required>
            </div>
            <div class="modal-footer">
                <button id="btn-modal-cancel" class="btn btn-info btn btn-sm" style="width:120px;margin-left:5px;background:#008000;color:white;font-weight:600;">Submit</button>
                <button id="btn-modal-cancel-close" class="btn btn-info btn btn-sm" style="width:120px;margin-left:5px;background:red;color:white;font-weight:600;">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalPayment" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" style="max-height:500px; overflow-y:auto;">
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

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style='vertical-align:middle;text-align:left;'>Type</th>
                                    <th style='vertical-align:middle;text-align:left;'>Source</th>
                                    <th style='vertical-align:middle;text-align:left;'>Purpose</th>
                                    <th style='vertical-align:middle;text-align:left;'>Value</th>
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
                                        <td width="30%">
                                            <!-- Jika Search Tidak berfungsi, remove modal tabindex='-1' -->
                                            <select id="cb_id"
                                                    name="cb_id"
                                                    data-ajax="true"
                                                    data-placeholder="Pilih..."
                                                    data-url="master_data/m_cb/getmcb/"
                                                    data-value=""
                                                    data-limit="100"                                          
                                                    placeholder="Pilih..."
                                                    class='form-control select2'
                                                    require
                                            >
                                            </select>
                                        </td>
                                        <td width="35%">
                                            <!-- Jika Search Tidak berfungsi, remove modal tabindex='-1' -->
                                            <select class='form-control select2' name="cb_pos_id" id="cb_pos_id" disabled="true">
                                                <option value="">Pilih...</option>
                                            </select>
                                        </td>
                                        <td width="15%">
                                            <input type="text" onkeypress="validasiAngka(event)" autofocuse="" id="modal_payment_amount" name="modal_payment_amount" class="form-control" style='text-align:right;'>
                                        </td>
                                        <td width="10%" style='text-align:center'>
                                            <button id="btn-modal-add-row-payment" class="btn btn-info btn btn-sm" style="width:90px;background:#008000;color:white;font-weight:600;">Add</button>
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
                                    <th style='vertical-align:middle;text-align:left;'>Type</th>
                                    <th style='vertical-align:middle;text-align:left;'>Source</th>
                                    <th style='vertical-align:middle;text-align:left;'>Purpose</th>
                                    <th style='vertical-align:middle;text-align:left;'>Value</th>
                                </tr>
                            </thead>
                            <tbody>                                                
                            </tbody>
                        </table>                                        
                    </div>
                </div>
            </div>
            <div class="modal-footer">                
                <button id="btn-modal-payment-close" class="btn btn-info btn btn-sm" style="width:120px;background:red;color:white;font-weight:600;">Close</button>
            </div>
        </div>
    </div>
</div>
