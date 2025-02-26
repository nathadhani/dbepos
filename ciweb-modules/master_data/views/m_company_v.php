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
                                <label for="menu" class="control-label col-lg-4">Branch Name</label>
                                <div class="col-lg-8">
                                    <input type="text" id="company_name" name="company_name" placeholder="Company Name..." class="form-control" data-validation="required">                                    
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label for="menu" class="control-label col-lg-4">Address</label>
                                <div class="col-lg-8">
                                    <input type="text" id="company_address" name="company_address" placeholder="Alamat..." class="form-control" data-validation="required">                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="menu" class="control-label col-lg-4">Phone</label>
                                <div class="col-lg-8">
                                    <input type="text" id="company_phone" name="company_phone" placeholder="Telpon..." class="form-control" data-validation="required">                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="menu" class="control-label col-lg-4">City</label>
                                <div class="col-lg-8">
                                    <input type="text" id="company_city" name="company_city" placeholder="Kota..." class="form-control" data-validation="required">                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="menu" class="control-label col-lg-4">Postal Code</label>
                                <div class="col-lg-8">
                                    <input type="text" id="company_pos_code" name="company_pos_code" placeholder="Kode Pos..." class="form-control">                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">                            
                            <div class="form-group row">
                                <label for="menu" class="control-label col-lg-4">Email</label>
                                <div class="col-lg-8">
                                    <input type="text" id="company_email" name="company_email" placeholder="Email..." class="form-control">                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="user_limits" class="control-label col-lg-4">User Limits</label>
                                <div class="col-lg-8">
                                    <input type="number" id="user_limits" name="user_limits" placeholder="User Limits..." data-validation="required" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="menu" class="control-label col-lg-4">Business Type</label>
                                <div class="col-lg-8">
                                    <select class="form-control select2" style="width: 100%" id="company_type" name="company_type">
                                        <option value="" />-- Pilih Tipe Usaha --
                                        <option value="M01" />FnB (M01)
                                        <option value="M02" />Retail (M02)
                                        <option value="M03" />Service (M03)
                                        <option value="M04" />Duty Free (M04)
                                        <option value="M05" />Lounge (M05)
                                    </select>
                                </div>
                            </div>  
                            <div class="form-group row">
                                <label for="api_method" class="control-label col-lg-4">Api Method</label>
                                <div class="col-lg-8">
                                    <input type="number" id="api_method" name="api_method" placeholder="Api Methode 0 or 1..." data-validation="required" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="menu" class="control-label col-lg-4">Api Angkasa Pura</label>
                                <div class="col-lg-8">
                                    <select class="form-control select2" style="width: 100%" id="api_angkasapura" name="api_angkasapura">
                                        <option value="" />-- Pilih Angkasa Pura --
                                        <option value="AP1" />Angkasa Pura 1
                                        <option value="AP2" />Angkasa Pura 2
                                    </select>
                                </div>
                            </div>                            
                            <div class="form-group row">
                                <label class="control-label col-lg-4">Status</label>
                                <div>
                                    <div class="input-group col-lg-8">
                                        <span class="input-group-addon">
                                            <input type="checkbox" name="status" id="status" class="icheckbox_minimal-grey checked" checked/>
                                        </span>
                                        <span class="form-control">Active</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button type="submit" class="btn btn-info" style="width:100px;">Submit</button>
                    <button type="reset" class="btn btn-default" style="width:100px;">Reset</button>
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
                <div id="mainTable" class="box-body">
                    <div style="padding: 0 20px 10px 20px" class="row">
                        <button class="btn btn-default toggle-selected" title="Toggle Selected" data-toggle="tooltip" data-placement="bottom"><i class="fa  fa-align-justify"></i></button> 
                        <button class="btn btn-default delete-selected pull-right" title="Delete Rows" data-toggle="tooltip" data-placement="bottom"><i class="fa  fa-trash"></i></button> 
                    </div>
                    <table class="table table-bordered table-condensed table-hover table-striped dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Branch Name</th>
                                <th>Address</th>
                                <th>Phone</th>                            
                                <th>City</th>
                                <th>Postal Code</th>
                                <th>Email</th>
                                <th>User Limits</th>
                                <th>Bussines Type</th>
                                <th>Api Method</th>
                                <th>Api AP</th>
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