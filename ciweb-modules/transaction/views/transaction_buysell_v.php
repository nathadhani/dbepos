<script type="text/javascript">  
    var Apimethod = <?php echo $auth['api_method'];?>;
    var customerId = <?php echo $this->uri->segment(4);?>;
    var id_header = <?php echo $this->uri->segment(5);?>;
</script>
<div class="page-content-wrap">    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">    
                <div class="panel-heading ui-draggable-handle">                                
                    <div class="panel-title-box">
                        <h3>
                            <span id="trx_name"></span>
                            <span id="ftitle" style="color:black;font-weight:600;font-size:13px;">New</span>
                        </h3>
                    </div>
                    <ul class="panel-controls">
                        <div class="dropdown">
                            <button class="dropbtn" style="width:100px;">Action</button>
                            <div class="dropdown-content">
                                <a href="#" id="btn-confirm">Confirm</a>
                                <a href="#" id="btn-cancel">Cancel</a>
                            </div>
                        </div>
                    </ul>    
                </div>                  
                <div class="panel-body">                                       
                    <div class="row">                            
                        <form class="form-horizontal" autocomplete="off">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <label for=tr_id style="display:block">Trx</label>
                                        <select name="tr_id"
                                                data-ajax="true" 
                                                data-placeholder="Pilih...."
                                                data-url="master_data/m_trxlist/gettrxlistbuysell/" 
                                                data-value="" 
                                                data-limit="2"
                                                id="tr_id" placeholder="Trx Name" class='form-control select2'>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <label for=tr_date style="display:block">Date</label>
                                        <input type="text" id="tr_date" name="tr_date" placeholder="Tanggal..." class="form-control dp" data-date-format="DD MMMM YYYY" value="<?=date('d-m-Y');?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">                                
                                    <div class="col-lg-12">
                                        <label for="customer_name" style="display:block">Name / Address</label>
                                        <div class="input-group">
                                            <a href="#" id="customer_name"></a>
                                            <span id="customer_address"></span>
                                            <a href="#" id="btn-customer-act-on" title="Attachment Customer" style="margin-left:5px;">
                                                <i class="fa fa-paperclip"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>                    
                    </div>

                    <div class="row form_detail_input">
                        <div class="col-md-12 table-responsive">                        
                            <table class="table table-bordered table-condensed" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th style='vertical-align:middle;text-align:left;'>Currency</th>
                                        <th style='vertical-align:middle;text-align:left;'>Nominal</th>
                                        <th style='vertical-align:middle;text-align:left;'>Sheet</th>
                                        <th style='vertical-align:middle;text-align:left;'>Amount</th>
                                        <th style='vertical-align:middle;text-align:left;'>Exchange Rate</th>
                                        <th style='vertical-align:middle;text-align:left;'>Equivalent</th>
                                        <th id="act-title" style='vertical-align:middle;text-align:center;' width="50px">Action</th>
                                    </tr>
                                </thead>
                                <form id="form_detail" class="form-horizontal" autocomplete="off">
                                    <tbody>       
                                        <tr>
                                            <td width="30%">                                                    
                                                <select id="currency_id"
                                                        name="currency_id"
                                                        data-ajax="true" 
                                                        data-placeholder="-- Pilih Mata Uang --"
                                                        data-url="master_data/m_currency/getcurrency/"
                                                        data-value=""
                                                        data-limit="100"                                                
                                                        placeholder="Mata Uang"  
                                                        class='form-control select2'
                                                        require                                            
                                                >
                                                </select>
                                            </td>                                                                                                
                                            <td width="10%">
                                                <input type="text" onkeypress="validasiAngka(event)" autofocuse="" id="nominal" name="nominal" class="form-control" style='text-align:right;'>
                                            </td>
                                            <td width="10%">
                                                <input type="text" onkeypress="validasiAngka(event)" autofocuse="" id="sheet" name="sheet" class="form-control" style='text-align:right;'>
                                            </td>
                                            <td width="10%" style='vertical-align:middle;text-align:center;'>
                                                <span id="total_amount"></span>
                                            </td> 
                                            <td width="15%">
                                                <input type="text" onkeypress="validasiAngka(event)" autofocuse="" id="price" name="price" class="form-control" style='text-align:right;'>
                                                <input type="hidden" id="price_asli" style='text-align:right;'>
                                                <input type="hidden" id="price_bot" style='text-align:right;'>
                                                <input type="hidden" id="price_top" style='text-align:right;'>
                                            </td>
                                            <td width="15%">
                                                <input type="text" autofocuse="" id="subtotal" name="subtotal" class="form-control" style='text-align:right;' value="0" readonly>
                                            </td>                                                                
                                            <td width="10%" style='text-align:center'>
                                                <button id="btn-add-row-detail" class="btn btn-info btn btn-sm" style="width:90px;background:red;color:white;font-weight:600;">Add</button>
                                            </td>                
                                        </tr>                                         
                                    </tbody>                                       
                                </form>    
                            </table>
                        </div>
                    </div>
                    
                    <div class="row form_detail_input" style="margin-top:-15px;">
                        <div class="col-md-12">
                            <label for="">Stock Available : Nominal ( </label> <span id="stock_nominal"></span> )
                            <label for="">Sheet</label> ( <span id="stock_sheet"></span> )
                            <label for="">Amount</label> ( <span id="stock_amount"></span> )
                        </div>
                    </div>
                    
                    <div class="row">                                                                                
                        <div class="col-md-12 table-responsive">                            
                            <div class="row">
                                <table class="table table-bordered table-condensed table-hover" cellspacing="0" width="100%" id="table-detail">
                                    <thead>
                                        <tr>
                                            <th style='vertical-align: middle;text-align:center;'>#</th>
                                            <th style='vertical-align: middle;text-align:left;'>Currency</th>
                                            <th style='vertical-align: middle;text-align:left;'>Nominal</th>
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
                            
                            <!-- <hr style="border: 1px solid green;margin-top:0px;"> -->

                            <div class="row" style="margin-top:-10px;">
                                <div class="col-md-12">                            
                                    <span id="created_by"></span>
                                    <span id="cancel_by"></span>                                
                                </div>
                            </div>                            
                        </div>
                    </div>                    
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
                <button id="btn-modal-cancel" class="btn btn-info btn btn-sm" style="width:120px;margin-left:5px;">Submit</button>
                <button id="btn-modal-cancel-close" class="btn btn-info btn btn-sm" style="width:120px;margin-left:5px;">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalCustomerActon" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">            
            <div class="modal-body" style="max-height:500px; overflow-y:auto;">
                <form id="form_modal_customer_act_on" class="form-horizontal" autocomplete="off">  
                    <div class="row" style="margin-left:-10px;">
                        <div class="col-md-3">
                            <div class="form-group">                                
                                <div class="col-lg-12">
                                    <label for="customer_act_on_id" style="display:block">Customer ( Act On )</label>
                                    <select name="customer_act_on_id"
                                            data-ajax="true" 
                                            data-placeholder="-- Pilih --"
                                            data-url="master_data/m_customer_act_on/getacton/" 
                                            data-value="" 
                                            data-limit="100"                                                
                                            id="customer_act_on_id" placeholder="Bertindak atas"
                                            class='form-control select2'
                                            width="100%"
                                            >
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">                                
                                <div class="col-lg-12">
                                    <label for="store_id" style="display:block">Customer ( Source )</label>
                                    <input type="text" autofocuse="" id="customer_source" name="customer_source" class="form-control" placeholder="Sumber Dana...">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">                                
                                <div class="col-lg-12">
                                    <label for="store_id" style="display:block">Customer ( Purpose )</label>
                                    <input type="text" autofocuse="" id="customer_purpose" name="customer_purpose" class="form-control" placeholder="Tujuan Transaksi...">
                                </div>
                            </div>
                        </div>                                    
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="btn-modal-customer-act-on-save" class="btn btn-info btn btn-sm" style="width:100px;">Save</button>
                <button id="btn-modal-customer-act-on-close" class="btn btn-info btn btn-sm" style="width:120px;margin-left:5px;">Close</button>
            </div>
        </div>
    </div>
</div>
