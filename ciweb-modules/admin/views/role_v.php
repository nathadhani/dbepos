<div class="row">
    <div class="col-md-12">
        <form id="mainForm" class="form-horizontal">
            <div class="panel panel-default">
                <!-- <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title"><i class="fa fa-edit"></i>&nbsp;<strong id="ftitle">Add</strong> Role</h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    </ul>
                </div> -->
                <div class="panel-body">                                                                        
                    <div class="row col-lg-6">
                        <div class="form-group">
                            <!-- <label class="control-label col-lg-4" for="usergroup_id"><span class="label label-danger blink-me"><i class="fa fa-warning"></i>Select first</span> &nbsp;User Group</label> -->
                            <label class="control-label col-lg-4" for="usergroup_id">User Group</label>
                            <div class="col-lg-8">
                                <div class="input-group">
                                    <!-- <span class="input-group-addon mandatory"><i class="fa fa-users"></i></span> -->
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
                    </div>
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
                        <div class="div-btn pull-right">
                            <a id="btnAddRole" title="Add Role" href="#" class="btn btn-info btn-line"><i class="fa fa-plus"></i>&nbsp;Add Roles</a>
                            <button class="btn btn-danger delete-selected" title="Delete Rows" data-toggle="tooltip" data-placement="bottom"><i class="fa  fa-trash"></i></button> 
                        </div>
                    </div>
                    <table class="table table-bordered table-condensed table-hover table-striped dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Controller</th>
                                <th>Method</th>
                                <th>Info</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <thead id="searchid">
                            <tr>
                                <td><button class="clrs btn btn-info btn-sm btn-line">Clear</button></td>
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

<div class="modal fade" id="vpModal" tabindex="-1" role="dialog" aria-labelledby="vpModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="vpModalLabel"><i class="fa  fa-list"></i>&nbsp;List Method</h4>
            </div>
            <div class="modal-body">
                <div id="listroleTable" class="panel-body">
                    <div style="padding: 0 20px 10px 20px" class="row">
                        <button class="btn btn-default toggle-selected" data-toggle="tooltip" data-placement="bottom" title="Toggle Selected"><i class="fa  fa-align-justify"></i></button> 
                        <div class="div-btn pull-right">
                            <a id="btnInsertRole" title="Add Role" href="#" class="btn btn-success btn-line"><i class="fa fa-plus"></i>&nbsp;Insert Roles</a>
                        </div>
                    </div>
                    <table class="table table-bordered table-condensed table-hover table-striped dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Controller</th>
                                <th>Method</th>
                                <th>Info</th>
                            </tr>
                        </thead>
                        <thead id="searchid2">
                            <tr>
                                <td><button class="clrs2 btn btn-info btn-sm btn-line">Clear</button></td>
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
