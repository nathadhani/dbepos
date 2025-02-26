<script type="text/javascript">
    var userId = <?php echo $auth['id'];?>;
    var companyId = <?php echo $auth['company_id'];?>;
    var usergroupId = <?php echo $auth['usergroup_id'];?>;
    var userlevelId = <?php echo $auth['userlevel_id'];?>;
    var id_header = <?php echo $this->uri->segment(4);?>;
</script>

<div class="page-content-wrap">    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">                      
                <div class="panel-body">
                    <div class="row">         
                        <div class="col-md-12">
                            <h2>
                                Inventory
                                <small>
                                    / <strong id="ftitle"></strong>                           
                                </small>
                            </h2>
                        </div>
                    </div>

                    <hr style="margin-top:1px; margin-left:10px; border-top: 1px dotted #333;">
                    
                    <form id="form_header" class="form-horizontal" autocomplete="off">
                        <div class="row">          
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="col-lg-6">
                                        <label for=tr_number style="display:block">Inventory Number</label>
                                        <input type="text" id="tr_number" class="form-control" disabled>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for=tr_date style="display:block">Inventory Date</label>
                                        <input type="text" id="tr_date" name="tr_date" placeholder="Tanggal..." class="form-control dp" data-date-format="DD MMMM YYYY" value="<?=date('d-m-Y');?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">                               
                                <div class="form-group">                                
                                    <div class="col-lg-12">
                                        <label for="tr_id" style="display:block">Inventory Name</label>
                                        <select class="form-control select2" style="width:100%" id="tr_id" name="tr_id">
                                            <option value="" />-- Pilih --
                                            <option value="3" />Inv. IN
                                            <option value="4" />Inv. OUT
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
                                    <div class="col-lg-10">
                                        <label for="tr_description" style="display:block">Description</label>
                                        <textarea class="form-control" name="tr_description" id="tr_description"></textarea>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="btn-submit" style="display:block"></label><br>
                                        <button id="btn-simpan-header" class="btn btn-info btn-sm" style="width:60px;display:block;">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </form>                    

                    <hr style="margin-left:10px; border-top: 1px dotted #333;">
                    <div class="row">                                                                                
                        <div class="col-md-12">
                            <div class="row table-responsive form_detail_input">
                                <table class="table table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th style='vertical-align:middle;text-align:center;'>Currency</th>
                                            <th style='vertical-align:middle;text-align:center;'>Nominal</th>
                                            <th style='vertical-align:middle;text-align:center;'>Sheet</th>
                                            <th style='vertical-align:middle;text-align:center;'>Amount</th>
                                            <th style='vertical-align:middle;text-align:center;'>Price</th>
                                            <th style='vertical-align:middle;text-align:center;'>Equivalent</th>
                                            <th id="act-title" style='vertical-align:middle;text-align:center;' width="50px">Action</th>
                                        </tr>
                                    </thead>
                                    <form id="form_detail" class="form-horizontal" autocomplete="off">
                                        <tbody>       
                                            <tr style="background:#ffffff;">
                                                <td width="35%">                                                    
                                                    <select name="valas_id"
                                                            data-ajax="true" 
                                                            data-placeholder="-- Pilih Valas --"
                                                            data-url="master_data/m_valas/getValas/" 
                                                            data-value="" 
                                                            data-limit="100"
                                                            id="valas_id" placeholder="Valas"  class='form-control select2'>
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
                                                <td width="5%" style='text-align:center'>
                                                    <button id="btn-add-row-detail" class="btn btn-info btn-sm" style="width:60px;">Add</button>
                                                </td>                
                                            </tr>                                         
                                        </tbody>                                       
                                    </form>    
                                </table>
                            </div>
                            <div class="row table-responsive" style="height:182px;">
                                <table class="table table-bordered table-condensed table-hover" cellspacing="0" width="100%" id="table-detail">
                                    <thead>
                                        <tr style="background:#f1f5f9;">
                                            <td style='vertical-align: middle;text-align:center;'>#</td>
                                            <td style='vertical-align: middle;text-align:center;'>Currency</td>
                                            <td style='vertical-align: middle;text-align:center;'>Nominal</td>
                                            <td style='vertical-align: middle;text-align:center;'>Sheet</td>
                                            <td style='vertical-align: middle;text-align:center;'>Amount</td>
                                            <td style='vertical-align: middle;text-align:center;'>Price</td>
                                            <td style='vertical-align: middle;text-align:center;'>Equivalent</td>
                                        </tr>
                                    </thead>
                                    <tbody>                                                
                                    </tbody>
                                </table>
                            </div>        
                        </div>
                    </div>  
                    <br>                   
                    <div class="row">
                        <div class="col-md-8">
                            <a style="width:95px;" id="btn-confirm" class="btn btn-primary" title="Confirm">Confirm</a>
                            <a style="width:95px;" id="btn-cancel" class="btn btn-primary" title="Cancel">Cancel</a>
                            <a style="width:80px;" id="btn-pdf" class="btn btn-primary" title="Print">Print</a>                           
                        </div>
                        <div class="col-md-4">
                            <span id="created_by" class="pull-right"></span>
                            <span id="cancel_by" class="pull-right"></span>
                        </div>
                    </div>
                    <div class="row" id="pinfo">
                        <div class="col-md-12">
                            <br>
                            Information :
                            <span id="pinfo_confirm"><strong style="color:black;font-weight:bolder;"><br>Confirm </strong> : Untuk menyelesaikan inventory jika sudah sesuai</span>                   
                            <span id="pinfo_cancel"><strong style="color:black;font-weight:bolder;"><br>Cancel </strong> : Untuk membatalkan inventory jika tidak sesuai</span>
                        </div>
                    </div>
                </div>
                <!--.end panel-body -->
            </div>
        </div>
    </div>   
</div>