<?php
    $auth = $this->session->userdata('auth');
    //$usr = $this->db->get_where("v_auth_user", array('id' => $auth['id']))->row();
?>
<script>    
    var userId = <?php echo $auth['id'];?>;
    var usergroupId = <?php echo $auth['usergroup_id'];?>;
    var userlevelId = <?php echo $auth['userlevel_id'];?>;
    var storeId = <?php echo $auth['store_id'];?>;
</script>
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
                                <label for="username" class="control-label col-lg-4">User Name</label>
                                <div class="col-lg-8">
                                    <input type="text" autofocus="" id="username" name="username" placeholder="User Name..." data-validation="required" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="control-label col-lg-4">Password</label>
                                <div class="col-lg-8">
                                    <input type="password" id="password" name="password" placeholder="Password..." data-validation="required" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fullname" class="control-label col-lg-4">Full Name</label>
                                <div class="col-lg-8">
                                    <input type="text" id="fullname" name="fullname" placeholder="Nama Lengkap..." data-validation="required" class="form-control">
                                </div>
                            </div>                                                                                                                
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="email" class="control-label col-lg-4">Email</label>
                                <div class="col-lg-8">
                                    <input type="email" id="email" name="email" placeholder="Email..." class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="celluler" class="control-label col-lg-4">Celluler</label>
                                <div class="col-lg-8">
                                    <input type="text" id="celluler" name="celluler" placeholder="Celluler..." class="form-control">
                                </div>
                            </div>
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
                            </div>
                       </div>
                    </div>

                    <?php                                
                        if($auth['usergroup_id'] == '1'){
                    ?>
                        <hr>
                        <div class="row">                            
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="usergroup_id" class="control-label col-lg-4">Group Menu</label>
                                    <div class="col-lg-8">
                                        <select name="usergroup_id"
                                                data-ajax="true" 
                                                data-placeholder="-- Pilih Grup Menu --"
                                                data-url="user/getUsergroup/" 
                                                data-value="" 
                                                data-validation="required"
                                                data-limit="100"
                                                id="usergroup_id" placeholder="User Group"  class='form-control select2'>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="userlevel_id" class="control-label col-lg-4">User Level</label>
                                    <div class="col-lg-8">
                                        <select name="userlevel_id"
                                                data-ajax="true" 
                                                data-placeholder="-- Pilih Level User --"
                                                data-url="user/getUserlevel/" 
                                                data-value=""                                            
                                                data-limit="100"
                                                id="userlevel_id" placeholder="User Level"  class='form-control select2'>
                                        </select>
                                    </div>
                                </div>                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="store_id" class="control-label col-lg-4">Store</label>
                                    <div class="col-lg-8">
                                        <select name="store_id"
                                                data-ajax="true" 
                                                data-placeholder="-- Pilih --"
                                                data-url="master_data/m_store/getstore/" 
                                                data-value="" 
                                                data-limit="100"
                                                id="store_id" placeholder="Lokasi" class='form-control select2'>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row" id="store_id_multiple-container">
                                    <label for="store_id_multiple" class="control-label col-lg-4">Store Multiple</label>
                                    <div class="col-lg-8">
                                        <select name="store_id_multiple[]"
                                                data-ajax="true" 
                                                data-placeholder="-- Pilih Multiple --"
                                                data-url="master_data/m_store/getstore/" 
                                                data-value="" 
                                                data-limit="100"
                                                multiple
                                                id="store_id_multiple" placeholder="Store Multiple" class='form-control select2'>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
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
                <div class="box-body table-responsive" id="mainTable">
                    <?php
                        if($auth['usergroup_id'] == 1){
                    ?>
                        <div style="padding: 0 20px 10px 20px" class="row">
                            <button class="btn btn-default toggle-selected" title="Toggle Selected" data-toggle="tooltip" data-placement="bottom"><i class="fa  fa-align-justify"></i></button> 
                            <button class="btn btn-default delete-selected pull-right" title="Delete Rows" data-toggle="tooltip" data-placement="bottom"><i class="fa  fa-trash"></i></button> 
                        </div>
                    <?php 
                        } 
                    ?>
                    <table class="table table-bordered table-condensed table-hover table-striped dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>Full Name</th>
                                <th>Level</th>
                                <th>Store</th>
                                <th>Last Log</th>                                
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
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>