<script type="text/javascript">
    var userId = <?php echo $auth['id'];?>;
    var companyId = <?php echo $auth['company_id'];?>;
    var usergroupId = <?php echo $auth['usergroup_id'];?>;
    var userlevelId = <?php echo $auth['userlevel_id'];?>;

    var Apimethod = <?php echo $auth['api_method'];?>;
    var ApiAP = "<?php echo $auth['api_angkasapura'];?>";    

    var customerId = <?php echo $this->uri->segment(4);?>;
    var tr_uri_code = <?php echo "'" . $this->uri->segment(5) ."'";?>;
    var id_log_a = <?php echo $this->uri->segment(6);?>;
</script>

<div class="page-content-wrap">    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">                      
                <div class="panel-body">
                    <div class="row" style="margin-left:-5px;">      
                        <div class="col-md-2">
                            <span>
                                Trx. Name : 
                                <?php 
                                    if($this->uri->segment(5) === '432d21') {
                                        echo 'Beli / Buy';
                                    } else if($this->uri->segment(5) === '523d3455') {
                                        echo 'Jual / Sell';
                                    }
                                ?>
                            </span><br>        
                            Trx. No <span id="tr_number"></span><br>
                            Trx. Date <span id="tr_datex"></span><br>
                            Trx. Status : <span id="ftitle"></span>      
                        </div>
                        <div class="col-md-10">                            
                            Cust. Name : <a href="#" id="customer_name"></a><br>
                            <span id="created_by"></span><br>
                            <span id="cancel_by"></span>
                        </div>
                    </div>
                    <br>
                    
                    <form id="form_header" class="form-horizontal" autocomplete="off">
                        <div class="row">         
                            <?php 
                                if(in_array($auth['company_id'],array(1,2))) {
                            ?> 
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <label for=tr_date style="display:block">Trx. Date</label>
                                            <input type="text" id="tr_date" name="tr_date" placeholder="Tanggal..." class="form-control dp" data-date-format="DD MMMM YYYY" value="<?=date('d-m-Y');?>">
                                        </div>
                                    </div>
                                </div>
                            <?php 
                                }
                            ?>
                            <div class="col-md-5">
                                <div class="form-group">                                
                                    <div class="col-lg-12">
                                        <label for="user_id" style="display:block">Counter</label>
                                        <select id="user_id"
                                                name="user_id"
                                                data-ajax="true" 
                                                data-placeholder="-- Pilih Konter --"
                                                data-url="user/user/getCreatedby/"
                                                data-value=""
                                                data-limit="100"                                                
                                                placeholder="Konter"  
                                                class='form-control select2'
                                                require
                                        >
                                        </select>                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">                                
                                    <div class="col-lg-12">
                                        <label for="cashier_id" style="display:block">Cashier</label>
                                        <select id="cashier_id"
                                                name="cashier_id"
                                                data-ajax="true" 
                                                data-placeholder="-- Pilih Kasir --"
                                                data-url="user/user/getCreatedby/"
                                                data-value=""
                                                data-limit="100"                                                
                                                placeholder="Kasir"  
                                                class='form-control select2'
                                                require
                                        >
                                        </select>                                        
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">                                
                                    <div class="col-lg-12">
                                        <label for="store_id" style="display:block">Store</label>
                                        <select id="store_id"
                                                name="store_id"
                                                data-ajax="true" 
                                                data-placeholder="-- PIlih Store --"
                                                data-url="master_data/m_store/getStoryTrx/"
                                                data-value=""
                                                data-limit="100"                                                
                                                placeholder="Store"  
                                                class='form-control select2'
                                                require
                                        >
                                        </select>
                                    </div>
                                </div>
                            </div>                            
                            <div class="col-md-6">
                                <div class="form-group">                                
                                    <div class="col-lg-8">
                                        <label for="payment_type_id" style="display:block">Payment Type</label>
                                        <select id="payment_type_id"
                                                name="payment_type_id"
                                                data-ajax="true" 
                                                data-placeholder="-- Pilih Tipe Pembayaran --"
                                                data-url="master_data/m_payment_type/getPaymentType/"
                                                data-value=""
                                                data-limit="100"                                                
                                                placeholder="Tipe Pembayaran"  
                                                class='form-control select2'
                                                require                                            
                                        >
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="btn-submit" style="display:block"></label><br>
                                        <button id="btn-simpan-header" class="btn btn-info btn-sm" style="width:60px;display:block;">Save</button>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </form>                    

                    <!-- <hr style="margin-left:10px; border-top: 1px dotted #333;"> -->
                    <br>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Stock Available : Nominal ( </label> <span id="stock_nominal"></span> )
                            <label for="">Sheet</label> ( <span id="stock_sheet"></span> )
                            <label for="">Amount</label> ( <span id="stock_amount"></span> )
                        </div>
                    </div>
                    <div class="row">                                                                                
                        <div class="col-md-12 table-responsive">
                            <div class="row form_detail_input">
                                <table class="table table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th style='vertical-align:middle;text-align:center;'>Currency</th>
                                            <th style='vertical-align:middle;text-align:center;'>Nominal</th>
                                            <th style='vertical-align:middle;text-align:center;'>Sheet</th>
                                            <th style='vertical-align:middle;text-align:center;'>Amount</th>
                                            <th style='vertical-align:middle;text-align:center;'>Exchange Rate</th>
                                            <th style='vertical-align:middle;text-align:center;'>Equivalent</th>
                                            <th id="act-title" style='vertical-align:middle;text-align:center;' width="50px">Action</th>
                                        </tr>
                                    </thead>
                                    <form id="form_detail" class="form-horizontal" autocomplete="off">
                                        <tbody>       
                                            <tr style="background:#ffffff;">
                                                <td width="35%">                                                    
                                                    <!-- <select class='form-control select2' name="valas_id" id="valas_id" disabled="true">
                                                        <option value="">-- Pilih Mata Uang --</option>
                                                    </select>  -->
                                                    <select id="valas_id"
                                                            name="valas_id"
                                                            data-ajax="true" 
                                                            data-placeholder="-- Pilih Mata Uang --"
                                                            data-url="master_data/m_valas/getValas/"
                                                            data-value=""
                                                            data-limit="100"                                                
                                                            placeholder="Mata Uang"  
                                                            class='form-control select2'
                                                            require                                            
                                                    >
                                                    </select>
                                                    <input type="hidden" id="valas_code" class="form-control">                                                                                                                                         
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
                                                <td width="5%" style='text-align:center'>
                                                    <button id="btn-add-row-detail" class="btn btn-info btn-sm" style="width:60px;">Add</button>
                                                </td>                
                                            </tr>                                         
                                        </tbody>                                       
                                    </form>    
                                </table>
                            </div>
                            <div class="row">
                                <table class="table table-bordered table-condensed table-hover" cellspacing="0" width="100%" id="table-detail">
                                    <thead>
                                        <tr style="background:#f1f5f9;">
                                            <td style='vertical-align: middle;text-align:center;'>#</td>
                                            <td style='vertical-align: middle;text-align:center;'>Currency</td>
                                            <td style='vertical-align: middle;text-align:center;'>Nominal</td>
                                            <td style='vertical-align: middle;text-align:center;'>Sheet</td>
                                            <td style='vertical-align: middle;text-align:center;'>Amount</td>
                                            <td style='vertical-align: middle;text-align:center;'>Exchange Rate</td>
                                            <td style='vertical-align: middle;text-align:center;'>Equivalent</td>
                                        </tr>
                                    </thead>
                                    <tbody>                                                
                                    </tbody>
                                </table>
                            </div>        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a style="width:95px;" id="btn-confirm" class="btn btn-primary" title="Confirm">Confirm</a>
                            <a style="width:95px;" id="btn-cancel" class="btn btn-primary" title="Cancel">Cancel</a>                            
                        </div>
                    </div>
                    <div class="row" id="pinfo">
                        <div class="col-md-12">
                            <br>
                            Information :          
                            <span id="pinfo_confirm"><strong style="color:black;font-weight:bolder;"><br>Confirm </strong> : Untuk menyelesaikan transaction jika sudah sesuai</span>                   
                            <span id="pinfo_cancel"><strong style="color:black;font-weight:bolder;"><br>Cancel </strong> : Untuk membatalkan transaction jika tidak sesuai</span>                   
                        </div>
                    </div>
                </div>
                <!--.end panel-body -->
            </div>
        </div>
    </div>   
</div>