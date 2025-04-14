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
                                <label class="control-label col-lg-4" for="usergroup_id"><span class="label label-danger blink-me"><i class="fa fa-warning"></i>Select first</span> &nbsp;User Group</label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <select name="usergroup_id"
                                                data-ajax="true" 
                                                data-placeholder="Select User Group..."
                                                data-url="user/getUsergroup/" 
                                                data-value="" 
                                                data-limit="100"
                                                id="usergroup_id" placeholder="User Group"  class='form-control select2'>
                                        </select>
                                        <span class="input-group-addon"><a href="user/group" target="_blank" title="Add User Group"><i class="fa fa-plus-circle"></i></a></span>
                                    </div>
                                </div>
                            </div><!-- /.form-group -->                            
                            <div class="form-group row">
                                <label class="control-label col-lg-4" for="usergroup_id">Menu</label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <select name="menu_id"
                                                data-ajax="true" 
                                                data-placeholder="Select Menu..."
                                                data-url="menu/group-menu/getMenu/" 
                                                data-value="" 
                                                data-limit="100"
                                                id="menu_id" placeholder="Menu"  class='form-control select2'>
                                        </select>
                                        <span class="input-group-addon"><a href="menu" target="_blank" title="Add Menu"><i class="fa fa-plus-circle"></i></a></span>
                                    </div>
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group row">
                                <label class="control-label col-lg-4" for="usergroup_id">Parent</label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <select name="parent_id"
                                                data-ajax="true" 
                                                data-placeholder="Select Menu..."
                                                data-url="menu/group-menu/getMenu/" 
                                                data-value="" 
                                                data-limit="100"
                                                id="parent_id" placeholder="Parent"  class='form-control select2'>
                                        </select>
                                        <span class="input-group-addon"><a href="menu" target="_blank" title="Add Menu"><i class="fa fa-plus-circle"></i></a></span>
                                    </div>
                                </div>
                            </div><!-- /.form-group -->
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="menuorder" class="control-label col-lg-4">Order</label>
                                <div class="col-lg-8">
                                    <input type="number" id="menuorder" name="menuorder" placeholder="Order..." data-validation="required" class="form-control">
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group row">
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
                </div>
                <div class="panel-footer">
                    <button type="submit" class="btn btn-info" style="width:100px;">Simpan</button>
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
                                <th>Icon</th>
                                <th>Menu</th>
                                <th>Link</th>
                                <th>Parent</th>
                                <th>Order</th>
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
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>