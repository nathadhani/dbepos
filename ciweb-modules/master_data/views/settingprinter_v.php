<script type="text/javascript">
    var userId = <?php echo $auth['id'];?>;
    var companyId = <?php echo $auth['company_id'];?>;
</script>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">                                
                <h3 class="panel-title"><i class="fa fa-cog"></i>&nbsp;<strong id="ftitle">Add</strong> Printer Setting</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul>                
            </div>
            <form id="mainForm" class="form-horizontal" autocomplete="off">
                <div class="panel-body">
                    <div class="row">                        
                        <div class="col-lg-6">
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
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <label for="printer_ip" style="display:block">IP Printer Sharing</label>
                                    <input type="text" id="printer_ip" name="printer_ip" placeholder="Alamat Ip & Nama Sharing Printer..." data-validation="required" class="form-control">
                                </div>
                            </div>                                        
                        </div>
                        <div class="col-lg-6">                                                                                   
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
            </form>            
        </div>
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
                                <th>Branch</th>
                                <th>Store</th>
                                <th>Printer Sharing</th>
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
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

