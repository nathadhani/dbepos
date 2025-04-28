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
                                <label for="store_name" class="control-label col-lg-4">Store Name</label>
                                <div class="col-lg-8">
                                    <input type="text" id="store_name" name="store_name" placeholder="Store Name..." class="form-control" data-validation="required">
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group row">
                                <label for="store_address" class="control-label col-lg-4">Store Address</label>
                                <div class="col-lg-8">
                                <input type="text" id="store_address" name="store_address" placeholder="Store Address..." class="form-control" data-validation="required">
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group row">
                                <label for="store_email" class="control-label col-lg-4">Store Email</label>
                                <div class="col-lg-8">
                                <input type="text" id="store_email" name="store_email" placeholder="Store Email..." class="form-control">
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group row">
                                <label for="store_email" class="control-label col-lg-4">Store Permint Number</label>
                                <div class="col-lg-8">
                                <input type="text" id="store_permit_number" name="store_permit_number" placeholder="Store Permite Number..." class="form-control">
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group row">
                                <label for="store_email" class="control-label col-lg-4">Store ID PJK</label>
                                <div class="col-lg-8">
                                <input type="text" id="store_id_pjk" name="store_id_pjk" placeholder="Store ID Pjk..." class="form-control">
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group row">
                                <label class="control-label col-lg-4">Status</label>
                                <div>
                                    <div class="input-group col-lg-3">
                                        <span class="input-group-addon">
                                            <input type="checkbox" name="status" id="status" class="icheckbox_minimal-grey checked"" checked/>
                                        </span>
                                        <span class="form-control">Active</span>
                                    </div>
                                </div>
                            </div><!-- /.form-group -->                                                                                                          
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="menuorder" class="control-label col-lg-4">API Method</label>
                                <div class="col-lg-8">
                                <input type="number" id="api_method" name="api_method" placeholder="API Method..." class="form-control">
                                </div>
                            </div><!-- /.form-group -->   
                            <div class="form-group row">
                                <label for="menuorder" class="control-label col-lg-4">API Location</label>
                                <div class="col-lg-8">
                                <input type="text" id="api_angkasapura" name="api_angkasapura" placeholder="API Location Angkasa Pura..." class="form-control">
                                </div>
                            </div><!-- /.form-group -->                                                       
                            <div class="form-group row">
                                <label for="menuorder" class="control-label col-lg-4">API Username</label>
                                <div class="col-lg-8">
                                <input type="text" id="api_username" name="api_username" placeholder="API Username..." class="form-control">
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group row">
                                <label for="menuorder" class="control-label col-lg-4">API Password</label>
                                <div class="col-lg-8">
                                <input type="text" id="api_password" name="api_password" placeholder="API Password..." class="form-control">
                                </div>
                            </div><!-- /.form-group -->                     
                            <div class="form-group row">
                                <label for="menuorder" class="control-label col-lg-4">API Store Id</label>
                                <div class="col-lg-8">
                                <input type="text" id="api_store_id" name="api_store_id" placeholder="API Store Id..." class="form-control">
                                </div>
                            </div><!-- /.form-group -->                            
                            <div class="form-group row">
                                <label for="menuorder" class="control-label col-lg-4">API Store Name</label>
                                <div class="col-lg-8">
                                <input type="text" id="api_store_name" name="api_store_name" placeholder="API Store Name..." class="form-control">
                                </div>
                            </div><!-- /.form-group --> 
                            <div class="form-group row" id="ap_tr_id-container">
                                <label for="ap_tr_id" class="control-label col-lg-4">AP Transasction List</label>
                                <div class="col-lg-8">
                                    <select name="ap_tr_id[]"
                                            data-ajax="true" 
                                            data-placeholder="Pilih..."
                                            data-url="master_data/m_trxlist/gettrxlistbuysell/" 
                                            data-value="" 
                                            data-limit="100"
                                            multiple
                                            id="ap_tr_id" placeholder="Trx Name" class='form-control select2'>
                                    </select>
                                </div>
                            </div>                                                     
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button type="submit" class="btn btn-info" style="width:120px;">Submit</button>
                    <button type="reset" class="btn btn-info" style="width:120px;">Reset</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">                                
                <h3 class="panel-title"><i class="fa fa-table"></i> Data Table</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul>                                
            </div>
            <div class="panel-body">
                <div id="mainTable" class="box-body table-responsive">
                    <div style="padding: 0 20px 10px 20px" class="row">
                        <button class="btn btn-default toggle-selected" title="Toggle Selected" data-toggle="tooltip" data-placement="bottom"><i class="fa  fa-align-justify"></i></button> 
                        <button class="btn btn-default delete-selected pull-right" title="Delete Rows" data-toggle="tooltip" data-placement="bottom"><i class="fa  fa-trash"></i></button> 
                    </div>
                    <table class="table table-bordered table-condensed table-hover table-striped dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Store Address</th>
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
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>