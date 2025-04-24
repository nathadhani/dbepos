<?php
    $auth = $this->session->userdata('auth');
    $usergroup_id = $auth['usergroup_id'];
    $store_id = $auth['store_id']; 
    $api_method = $auth['api_method'];
?>
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
                <div class="panel-body">   
                    <div class="row">
                        <div class="col-md-5">
                            <span class="span_text_fixed_85px">Transaction</span> : <span id="trx_name"></span><br>
                            <span class="span_text_fixed_85px">Store</span> : <span id="store_address"></span><br>
                            <span class="span_text_fixed_85px">Date</span>  : <span id="tr_date"></span><br>
                            <span class="span_text_fixed_85px">Number</span> : <span id="tr_number"></span><br>
                            <span class="span_text_fixed_85px">Created / by</span> : <span id="created"></span> / <span id="created_by"></span><br>    
                            <span class="span_text_fixed_85px">Updated / by</span> : <span id="updated"></span> <span id="updated_by"></span>
                        </div>    
                        <div class="col-md-5">
                            <span class="span_text_fixed_85px">Name</span> : <a href="#" id="customer_name"></a><br>
                            <span class="span_text_fixed_85px">Address</span> : <span id="customer_address"></span><br>
                            <?php if( $auth['usergroup_id'] != '6'){ ?>
                                <span class="span_text_fixed_85px">Act On</span> : <span id="customer_act_on"></span><br>
                                <span class="span_text_fixed_85px">Source</span> : <span id="customer_source"></span><br>
                                <span class="span_text_fixed_85px">Purpose</span> : <span id="customer_purpose"></span><br>
                            <?php } ?>
                            <span class="span_text_fixed_85px">Status</span> : <span id="ftitle"></span> <span id="description_header"></span>
                        </div>                        
                    </div>
                    <!--.end row -->

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
                    
                    <div class="row">
                        <div class="col-md-6">
                            <span id="total_transaction_terbilang" style="margin-top:-15x;"></span>     
                        </div>
                        <?php if( $auth['usergroup_id'] != '6'){ ?>
                            <div class="col-md-6">
                                <ul class="panel-controls">
                                    <button id="btn-cancel" class="btn btn-info" style="width:120px;margin-left:10px;">Cancel</button>
                                    <button id="btn-payment" class="btn btn-info" style="width:120px;margin-left:10px;">Payment</button>
                                    <button id="btn-pdf" class="btn btn-info" style="width:120px;margin-left:10px;">Print</button>
                                    <?php if($api_method === '1') { ?>
                                        <button id="btn-submit" class="btn btn-info" style="width:140px;margin-left:10px;">Submit to ECSys</button>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php } ?>
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
                                                            <span style="color:black;font-weight:bolder;">Integrasi System ECSys - logs</span>
                                                            <tr>
                                                                <th style='vertical-align: middle;text-align:center;'>#</th>
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
                                                                $no = 1;
                                                                foreach($resp_api AS $row){                                                        
                                                            ?>
                                                                
                                                                    <tr>
                                                                        <td style='vertical-align: middle;text-align:center;'><?php echo $no;?></td>
                                                                        <td style='vertical-align: middle;text-align:center;'><?php echo $row['api_method'];?></td>
                                                                        <td style='vertical-align: middle;text-align:center;'><?php echo ($row['api_status'] == 1 ? 'true' : 'false');?></td>
                                                                        <td style='vertical-align: middle;text-align:center;'><?php echo $row['api_success_insert'];?></td>
                                                                        <td style='vertical-align: middle;text-align:center;'><?php echo $row['api_failed_insert'];?></td>
                                                                        <td style='vertical-align: middle;text-align:left;'><?php echo $row['api_reason'];?></td>
                                                                        <td><?php echo date_format(date_create($row['created']),"d/m/Y H:i:s");?></td>
                                                                    </tr>                                                
                                                            <?php 
                                                                $no++;
                                                                } 
                                                            ?>
                                                        </tbody>
                                                    </table>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </div>
                                </div>
                                <!--.end row -->
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
                <form autocomplete="off">
                    <input type="text" autofocuse="" id="modal-cancel-description" name="modal-cancel-description" class="form-control" placeholder="Alasan Batal..." required>
                </form>
            </div>
            <div class="modal-footer">
                <button id="btn-modal-cancel" class="btn btn-success" style="width:120px;margin-left:5px;">Submit</button>
                <button id="btn-modal-cancel-close" class="btn btn-danger" style="width:120px;margin-left:5px;">Close</button>
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
                <!--.end row -->

                <div class="row">
                    <form id="mainFormModalPayment" class="form-horizontal" autocomplete="off">
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <label for=modal_payment_type style="display:block">Payment Type</label>
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
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <label for=cb_id style="display:block">Payment Source</label>
                                    <!-- Jika Search Tidak berfungsi, remove modal tabindex='-1' -->
                                    <select class='form-control select2' name="cb_id" id="cb_id" disabled="true">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <label for=modal_payment_amount style="display:block">Payment Value</label>
                                    <div class="input-group">
                                        <input type="text" onkeypress="validasiAngka(event)" autofocuse="" id="modal_payment_amount" name="modal_payment_amount" class="form-control" style='text-align:right;'>
                                        <span class="input-group-addon">
                                            <button id="btn-modal-add-row-payment" class="btn btn-success" style="width:90px;">Add</button>
                                        </span>    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>                                       
                </div>
                <!--.end row -->

                <div class="row">
                    <div class="col-md-12">
                        <span id="terbilang_modal_payment_amount" class="pull-right"></span>
                    </div>
                </div>
                <!--.end row -->
                
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table class="table table-bordered table-condensed table-hover" width="100%" id="table-modal-payment">
                            <thead>
                                <tr style="background:#f1f5f9;">
                                    <td style='vertical-align: middle;text-align:center;'>#</td>
                                    <th style='vertical-align:middle;text-align:left;'>Payment Type</th>
                                    <th style='vertical-align:middle;text-align:left;'>Payment Source</th>
                                    <th style='vertical-align:middle;text-align:left;'>Description</th>
                                    <th style='vertical-align:middle;text-align:left;'>Payment Value</th>
                                </tr>
                            </thead>
                            <tbody>                                                
                            </tbody>
                        </table>
                        <p id="total_payment_terbilang"></p>                                        
                    </div>
                </div>
                <!--.end row -->
            </div>
            <div class="modal-footer">                
                <button id="btn-modal-payment-close" class="btn btn-danger" style="width:120px;margin-left:5px;">Close</button>
            </div>
        </div>
    </div>
</div>
