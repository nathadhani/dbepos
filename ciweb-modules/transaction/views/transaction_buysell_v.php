<script type="text/javascript">  
    var Apimethod = <?php echo $auth['api_method'];?>;
    var customerId = <?php echo $this->uri->segment(4);?>;
    var id_header = <?php echo $this->uri->segment(5);?>;
</script>
<div class="page-content-wrap">    
    <div class="row">
        <form id="mainForm" class="form-horizontal" autocomplete="off">
            <div class="col-md-12">
                <div class="panel panel-default">                                 
                    <div class="panel-body">
                        <div class="row">                            
                            <div class="col-md-2">
                                <label for=tr_id style="display:block">
                                    <span id="ftitle">New</span> - <span id="trx_name"></span>                                            
                                </label>
                                <select name="tr_id"
                                        data-ajax="true" 
                                        data-placeholder="Pilih...."
                                        data-url="master_data/m_trxlist/gettrxlistbuysell/" 
                                        data-value="" 
                                        data-limit="2"
                                        id="tr_id" placeholder="Trx Name" class='form-control select2'>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for=tr_date style="display:block">Date</label>
                                <input type="text" id="tr_date" name="tr_date" placeholder="Tanggal..." class="form-control dp" data-date-format="DD MMMM YYYY" value="<?=date('d-m-Y');?>">
                            </div>
                            <div class="col-md-8">
                                <label for="customer_name" style="display:block">
                                    Customer Name / address / cct on
                                    <a href="#" id="btn-customer-act-on" title="Attachment Customer" style="margin-left:2px;">
                                        <i class="fa fa-paperclip"></i>
                                    </a>
                                </label>
                                <div class="input-group">
                                    <a href="#" id="customer_name"></a>
                                    <span id="customer_address"></span>                                            
                                </div>
                            </div>
                        </div>

                        <div class="row form_detail_input">
                            <div class="col-md-6">
                                <label for="">Stock Available : Nominal ( </label> <span id="stock_nominal"></span> )
                                <label for="">Sheet</label> ( <span id="stock_sheet"></span> )
                                <label for="">Amount</label> ( <span id="stock_amount"></span> )
                                <a href="#" id="btn-stock" title="Stock" style="margin-left:2px;">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <span id="terbilang_price" class="pull-right"></span>
                            </div>
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
                                                <button id="btn-add-row-detail" class="btn btn-info" style="width:90px;">Add</button>
                                            </td>                
                                        </tr>                                         
                                    </tbody>                                       
                                </table>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12 table-responsive">
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
                            <span>
                                <div class="col-md-7">
                                    Created / by : <span id="created_by"></span>
                                </div>                                                     
                                <div class="col-md-5">
                                    <span id="total_transaction_terbilang" class="pull-right"></span>
                                </div>
                            </span>
                        </div>                       

                        <div class="row">
                            <button id="btn-confirm" class="btn btn-success" style="width:120px;margin-left:5px;">Confirm</button>
                            <button id="btn-cancel" class="btn btn-danger" style="width:120px;margin-left:5px;">Cancel</button>
                        </div>                    
                    </div>
                    <!--.end panel-body -->
                </div>
            </div>
        </form>
    </div>   
</div>

<div class="modal fade" id="ModalCancel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <input type="text" autofocuse="" id="modal-cancel-description" name="modal-cancel-description" class="form-control" placeholder="Alasan Batal..." required>
            </div>
            <div class="modal-footer">
                <button id="btn-modal-cancel" class="btn btn-success" style="width:120px;margin-left:5px;">Submit</button>
                <button id="btn-modal-cancel-close" class="btn btn-danger" style="width:120px;margin-left:5px;">Close</button>
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
                <button id="btn-modal-customer-act-on-save" class="btn btn-success" style="width:120px;">Submit</button>
                <button id="btn-modal-customer-act-on-close" class="btn btn-danger" style="width:120px;margin-left:5px;">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalStock" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" style="max-height:500px; overflow-y:auto;">
                <div class="row table-responsive" id="mainTableStock">
                    <table class="table table-bordered table-condensed table-hover table-striped dataTable" width="100%">
                        <thead>
                            <tr style="vertical-align:middle;">
                                <th style="vertical-align:middle;text-align:center;">#</th>
                                <th style="vertical-align:middle;text-align:center;">Currency</th>
                                <th style="vertical-align:middle;text-align:center;">Nominal</th>
                                <th style="vertical-align:middle;text-align:center;">Sheet</th>
                                <th style="vertical-align:middle;text-align:center;">Amount</th>
                                <th style="vertical-align:middle;text-align:center;">Description</th>
                            </tr>
                        </thead>
                        <thead id="searchid">
                            <tr>
                                <td><button class="clrs btn btn-info btn-sm btn-line">Clear</button></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <!--.end row -->
            </div>
            <div class="modal-footer">                
                <button id="btn-modal-stock-close" class="btn btn-danger" style="width:120px;margin-left:5px;">Close</button>
            </div>
        </div>
    </div>
</div>