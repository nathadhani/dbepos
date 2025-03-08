<script type="text/javascript">  
    var Apimethod = <?php echo $auth['api_method'];?>;
    var customerId = <?php echo $this->uri->segment(4);?>;
    var tr_uri_code = <?php echo "'" . $this->uri->segment(5) ."'";?>;
    var id_header = <?php echo $this->uri->segment(6);?>;
</script>
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
                            - <span id="ftitle" style="color:black;font-weight:600;font-size:16px;">Add</span>
                        </h3>
                    </div>
                    <ul class="panel-controls">                       
                        <button id="btn-confirm" class="btn btn-success btn btn-sm" style="width:120px;">Confirm</button>
                        <button id="btn-cancel" class="btn btn-danger btn-sm" style="width:120px;">Cancel</button>
                    </ul>    
                </div>                  
                <div class="panel-body">                                       
                    <form id="form_header" class="form-horizontal" autocomplete="off">
                        <div class="row" style="margin-left:-5px;">                            
                            <div class="col-md-2">
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <label for=tr_date style="display:block">Date</label>
                                        <input type="text" id="tr_date" name="tr_date" placeholder="Tanggal..." class="form-control dp" data-date-format="DD MMMM YYYY" value="<?=date('d-m-Y');?>" style="width:110px;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">                                
                                    <div class="col-lg-12">
                                        <label for="customer_name" style="display:block">Customer ( Name / Address )</label>
                                        <a href="#" id="customer_name"></a>                                        
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        <div class="row" style="margin-left:-5px;margin-top:15px;">
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
                                    <div class="col-lg-8">
                                        <label for="store_id" style="display:block">Customer ( Purpose )</label>
                                        <input type="text" autofocuse="" id="customer_purpose" name="customer_purpose" class="form-control" placeholder="Tujuan Transaksi...">
                                    </div>
                                    <div class="col-lg-4">                                        
                                        <button id="btn-simpan-header" class="btn btn-primary btn btn-sm" style="width:100px;">Create Task</button>
                                    </div>
                                </div>
                            </div>                            
                        </div>                        
                    </form>                    

                    <!-- <hr style="margin-left:10px; border-top: 1px dotted #333;"> -->
                    <hr style="border: 1px solid green;">

                    <div class="row">                                                                                
                        <div class="col-md-12 table-responsive">                            
                            <div class="row">
                                <table class="table table-bordered table-condensed table-hover" cellspacing="0" width="100%" id="table-detail">
                                    <thead>
                                        <tr style="background:#f1f5f9;">
                                            <td style='vertical-align: middle;text-align:center;'>#</td>
                                            <td style='vertical-align: middle;text-align:left;'>Currency</td>
                                            <td style='vertical-align: middle;text-align:left;'>Nominal</td>
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
                            
                            <hr style="border: 1px solid green;margin-top:0px;">

                            <div class="row" style="margin-top:-10px;">
                                <div class="col-md-12">                            
                                    <span id="created_by"></span>
                                    <span id="cancel_by"></span>                                
                                </div>
                            </div>                    
                            <br>

                            <div class="row form_detail_input">
                                <table class="table table-bordered" cellspacing="0" width="100%">
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
                                            <tr style="background:#ffffff;">
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
                                                    <button id="btn-add-row-detail" class="btn btn-primary btn btn-sm" style="width:90px;">Add</button>
                                                </td>                
                                            </tr>                                         
                                        </tbody>                                       
                                    </form>    
                                </table>
                            </div>
                            <div class="row form_detail_input" style="margin-top:-10px;">
                                <div class="col-md-12">
                                    <label for="">Stock Available : Nominal ( </label> <span id="stock_nominal"></span> )
                                    <label for="">Sheet</label> ( <span id="stock_sheet"></span> )
                                    <label for="">Amount</label> ( <span id="stock_amount"></span> )
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
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Reason</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form id="mainForm" class="form-horizontal" autocomplete="off">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">                        
                                        <div class="col-lg-12">
                                            <div class="form-group">                                
                                                <div class="col-lg-10">
                                                    <label for="modal-description" style="display:block">Reason Cancel</label>
                                                    <input type="text" autofocuse="" id="modal-description" name="modal-description" class="form-control" placeholder="Alasan Batal..." required>
                                                </div>
                                                <div class="col-lg-2">
                                                    <button id="btn-cancel-modal" class="btn btn-danger btn btn-sm" style="width:120px;">Submit</button>
                                                </div>
                                            </div>
                                        </div>
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