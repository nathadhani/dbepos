<div class="row">
    <div class="col-md-12">
        <form id="mainForm" class="form-horizontal" autocomplete="off">
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title"><i class="fa fa-edit"></i>&nbsp;<strong id="ftitle">Add</strong> Data</h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body">                                                                        
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group row">                                
                                <label for="tr_id" class="control-label col-lg-4">Source Name</label>
                                <div class="col-lg-8">
                                    <select id="cb_id"
                                            name="cb_id"
                                            data-ajax="true"
                                            data-placeholder="Pilih..."
                                            data-url="master_data/m_cb/getmcbpurpose/"
                                            data-value=""
                                            data-limit="100"                                          
                                            placeholder="Pilih..."
                                            class='form-control select2'
                                            require
                                    >
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="payment_type_name" class="control-label col-lg-4">Purpose Name</label>
                                <div class="col-lg-8">
                                    <input type="text" id="cb_pos_name" name="cb_pos_name" placeholder="Nama..." data-validation="required" class="form-control">
                                </div>
                            </div><!-- /.form-group -->                                                        
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="cb_pos_in_out" class="control-label col-lg-4">I/O</label>
                                <div class="col-lg-8">
                                    <select id="cb_pos_in_out" name="cb_pos_in_out" placeholder="Pilih In/Out" class="form-control">
                                        <option value="" selected="">Pilih...</option>
                                        <option value="I">In</option>
                                        <option value="O">Out</option>
                                    </select>
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group row">
                                <label for="cb_biaya" class="control-label col-lg-4">Cost</label>
                                <div class="col-lg-8">
                                    <select id="cb_biaya" name="cb_biaya" placeholder="Pilih Yes/No" class="form-control">
                                        <option value="" selected="">Pilih...</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group row">                                
                                <label for="buysell_tr_id" class="control-label col-lg-4">Buy/Sell</label>
                                <div class="col-lg-8">
                                    <select name="buysell_tr_id"
                                            data-ajax="true" 
                                            data-placeholder="-- Pilih --"
                                            data-url="master_data/m_trxlist/gettrxlistbuysell/" 
                                            data-value="" 
                                            data-limit="100"                                                
                                            id="buysell_tr_id" placeholder="Trx"
                                            class='form-control select2'
                                            width="100%"
                                            >
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-lg-4">Status</label>
                                <div>
                                    <div class="input-group col-lg-3">
                                        <span class="input-group-addon">
                                            <input type="checkbox" name="status" id="status" class="icheckbox_minimal-grey checked" checked/>
                                        </span>
                                        <span class="form-control">Active</span>
                                    </div>
                                </div>
                            </div><!-- /.form-group -->
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button type="submit" class="btn btn-info btn btn-sm" style="width:100px;">Submit</button>
                    <button type="reset" class="btn btn-info btn btn-sm" style="width:100px;">Reset</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">                                
                <h3 class="panel-title"><i class="fa fa-table"></i> Data Table - Cash Bank Purpose</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul>                                
            </div>
            <div class="panel-body">
                <div id="mainTable" class="box-body">
                    <div style="padding: 0 20px 10px 20px" class="row">
                        <button class="btn btn-default toggle-selected" title="Toggle Selected" data-toggle="tooltip" data-placement="bottom"><i class="fa  fa-align-justify"></i></button> 
                        <button class="btn btn-default delete-selected pull-right" title="Delete Rows" data-toggle="tooltip" data-placement="bottom"><i class="fa  fa-trash"></i></button> 
                    </div>
                    <table class="table table-bordered table-condensed table-hover table-striped dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Store</th>
                                <th>Source Name</th>
                                <th>Purpose Name</th>
                                <th>I/O</th>
                                <th>Cost</th>
                                <th>Buy/Sell</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <thead id="searchid">
                            <tr>
                                <td><button class="clrs btn btn-sm btn-info btn-line">Clear</button></td>
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