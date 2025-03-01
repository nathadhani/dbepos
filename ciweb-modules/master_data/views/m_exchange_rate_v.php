<script type="text/javascript">
    $("body").data("user_id", <?php echo $auth['id'];?>);
    $("body").data("usergroup_id", <?php echo $auth['usergroup_id'];?>);
    $("body").data("userlevel_id", <?php echo $auth['userlevel_id'];?>);
    $("body").data("company_id", <?php echo $auth['company_id'];?>);
</script>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">                                
                <div class="panel-title-box">
                    <h3>
                        Exchange Rate
                    </h3>
                </div>
                <ul class="panel-controls">
                    <li>
                        <label for="form_name" class="control-label col-lg-5">Date</label>
                        <div class="col-lg-3">
                            <input type="text" id="tanggal" name="tanggal" placeholder="Tanggal ..." class="form-control dp" data-date-format="DD MMMM YYYY" style="width:100px;" value="<?=date('d-m-Y');?>">
                        </div>
                    </li>
                    <li>
                        <div class="col-lg-3">
                            <a id="btnrefresh" title="Filter Data" href="#" class="btn btn-info">Submit</a>
                        </div>
                    </li>
                    <!-- <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li> -->
                </ul>    
            </div>            
            <div class="panel-body">
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
                                <th>Currency Code</th>
                                <th>Currency Name</th>
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
                                                <label for="form_name" class="control-label col-lg-4">Currency Code</label>
                                                <div class="col-lg-8">
                                                    <input type="text" id="valas_code" name="valas_code" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="form_name" class="control-label col-lg-4">Currency Name</label>
                                                <div class="col-lg-8">
                                                    <input type="text" id="valas_name" name="valas_name" class="form-control" readonly>
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
                                    <button type="submit" class="btn btn-info pull-right" style="width:100px;">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>