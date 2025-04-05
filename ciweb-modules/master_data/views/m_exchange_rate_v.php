<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">                                
                <div class="panel-title-box">
                    <h3>
                        Buy / Sell - Exchange Rate
                    </h3>
                </div>
                <ul class="panel-controls">
                    <button id="btn-generate" class="btn btn-info" style="width:120px;">Generate Data</button>
                </ul>    
            </div>            
            <div class="panel-body">
                <div class="row">                                        
                    <div class="col-md-8">
                        <div class="form-group">                                
                            <div class="col-lg-12">
                                <label for="store_id" style="display:block">Store</label>
                                <select name="store_id"
                                        data-ajax="true" 
                                        data-placeholder="-- Pilih --"
                                        data-url="master_data/m_store/getregion/" 
                                        data-value="" 
                                        data-limit="100"                                                
                                        id="store_id" placeholder="Region"
                                        class='form-control select2'
                                        width="100%"
                                        >
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <label for="periode" style="display:block">Date</label>
                                <div class="input-group">
                                    <input type="text" id="tanggal" name="tanggal" placeholder="Tanggal ..." class="form-control dp" data-date-format="DD MMMM YYYY" style="width:120px;" value="<?=date('d-m-Y');?>">
                                    <span class="input-group-addon">                             
                                        <span id="btn-show" class="btn btn-info" style="width:120px;">Submit</span>
                                    </span>
                                </div>
                            </div>                            
                        </div>                            
                    </div>
                </div>                    
                <!-- <hr style="border: 1px solid green;"> -->
            </div>
            
            <div class="panel-body" style="margin-top:-20px;">
                <div class="box-body table-responsive" id="mainTable">
                    <div style="padding: 0 20px 10px 20px" class="row">
                        <button class="btn btn-default toggle-selected" title="Toggle Selected" data-toggle="tooltip" data-placement="bottom"><i class="fa  fa-align-justify"></i></button>
                        <!-- <button class="btn btn-default print-pdf" title="Cetak" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-print"></i></button>                              -->
                        <div class="div-btn pull-right">
                            <button class="btn btn-default delete-selected" title="Delete Rows" data-toggle="tooltip" data-placement="bottom"><i class="fa  fa-trash"></i></button> 
                        </div>
                    </div>
                    <table class="table table-bordered table-condensed table-hover table-striped dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Curr</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Buy</th>
                                <th>Def Buy</th>
                                <th>Sell</th>
                                <th>Def Sell</th>
                                <th>Buy Bottom</th>
                                <th>Buy Top</th>
                                <th>Sell Bottom</th>
                                <th>Sell Top</th>
                                <th>Status</th>
                                <th>Action</th>
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
                                <td></td>
                                <td></td>
                                <td></td>
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
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form id="mainForm" class="form-horizontal" autocomplete="off">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">                        
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="form_name" class="control-label col-lg-4">Curr</label>
                                                <div class="col-lg-8">
                                                    <input type="text" id="currency_code" name="currency_code" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="form_name" class="control-label col-lg-4">Description</label>
                                                <div class="col-lg-8">
                                                    <input type="text" id="currency_name" name="currency_name" class="form-control" readonly>
                                                </div>
                                            </div>                                                                                       
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="form_name" class="control-label col-lg-4">Date</label>
                                                <div class="col-lg-8">
                                                    <input type="text" id="exchange_rate_date" name="exchange_rate_date" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-lg-4">Status</label>
                                                <div class="col-lg-8">
                                                    <div class="input-group col-lg-2">
                                                        <span class="input-group-addon">
                                                            <input type="checkbox" name="status" id="status" class="icheckbox_minimal-grey checked" checked/>
                                                        </span>
                                                        <span class="form-control">Active</span>
                                                    </div>
                                                </div>
                                            </div><!-- /.form-group -->
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="form_name" class="control-label col-lg-6">Buy</label>
                                                <div class="col-lg-6">
                                                    <input type="text" id="exchange_rate_buy" name="exchange_rate_buy" class="form-control">
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label for="form_name" class="control-label col-lg-6">Bottom ( < Buy )</label>
                                                <div class="col-lg-6">
                                                    <input type="text" id="price_buy_bot" name="price_buy_bot" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="form_name" class="control-label col-lg-6">Top ( > Buy )</label>
                                                <div class="col-lg-6">
                                                    <input type="text" id="price_buy_top" name="price_buy_top" class="form-control">
                                                </div>
                                            </div>                                            
                                        </div> 
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="form_name" class="control-label col-lg-6">Sale</label>
                                                <div class="col-lg-6">
                                                    <input type="text" id="exchange_rate_sell" name="exchange_rate_sell" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="form_name" class="control-label col-lg-6">Bottom ( < Sale )</label>
                                                <div class="col-lg-6">
                                                    <input type="text" id="price_sell_bot" name="price_sell_bot" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="form_name" class="control-label col-lg-6">Top ( > Sale )</label>
                                                <div class="col-lg-6">
                                                    <input type="text" id="price_sell_top" name="price_sell_top" class="form-control">
                                                </div>
                                            </div>
                                        </div>                                                        
                                    </div>    
                                </div>
                                <div class="panel-footer">
                                    <!-- <button type="reset" class="btn btn-default pull-right" style="width:100px;">Batal</button> -->
                                    <button type="submit" class="btn btn-default btn btn-sm pull-right" style="width:120px;">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>