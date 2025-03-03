<script type="text/javascript">
    var companyId = <?php echo $auth['company_id'];?>;
    var usergroupId = <?php echo $auth['usergroup_id'];?>;
    var userlevelId = <?php echo $auth['userlevel_id'];?>;
</script>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">                                
                <div class="panel-title-box">
                    <h3>Buy / Sell - List</h3>
                </div>
                <ul class="panel-controls">
                    <button id="btn-submit" class="btn btn-default btn btn-sm" style="width:120px;">Submit</button>
                    <a id="btn-excel" title="Download" href="#" class="btn btn-default btn btn-sm pull-right" style="margin-left:5px;"><i class="fa fa-download"></i></a>
                </ul>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">                                
                            <div class="col-lg-12">
                                <label for="company_id" style="display:block">Branch</label>
                                <select name="company_id"
                                        data-ajax="true" 
                                        data-placeholder="-- Pilih Cabang --"
                                        data-url="master_data/m_company/getRegion/" 
                                        data-value="" 
                                        data-limit="100"                                                
                                        id="company_id" placeholder="Region"
                                        class='form-control select2'
                                        width="100%"
                                        >
                                </select>                                
                            </div>
                        </div>
                    </div>             
                    <div class="col-md-4">
                        <div class="form-group">                                
                            <div class="col-lg-12">
                                <label for="store_id" style="display:block">Store</label>
                                <select class='form-control select2' name="store_id" id="store_id" disabled="true" width="100%">
                                    <option value=""> -- Pilih Store --</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <label for="tr_date1" style="display:block">Date 1</label>
                                <input type="text" id="tr_date1" name="tr_date1" placeholder="Tanggal ..." class="form-control dp" data-date-format="DD MMMM YYYY" style="width:120px;" value="<?=date('d-m-Y');?>">
                            </div>
                        </div>                            
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <label for="tr_date2" style="display:block">Date 2</label>
                                <input type="text" id="tr_date2" name="tr_date2" placeholder="Tanggal ..." class="form-control dp" data-date-format="DD MMMM YYYY" style="width:120px;" value="<?=date('d-m-Y');?>">
                            </div>
                        </div>                            
                    </div>
                </div>                            
                
                <br>
                <div class="row table-responsive" id="mainTable">
                    <div class="col-md-12">
                        <table class="table table-bordered table-condensed table-hover table-striped dataTable">
                            <thead>
                                <tr>
                                    <th style="vertical-align:middle;text-align:center;">#</th>
                                    <th style="vertical-align:middle;text-align:center;">Trx</th>
                                    <th style="vertical-align:middle;text-align:center;">Number</th>
                                    <th style="vertical-align:middle;text-align:center;">Date</th>
                                    <th style="vertical-align:middle;text-align:center;">Value</th>
                                    <th style="vertical-align:middle;text-align:center;">Customer Name</th>
                                    <th style="vertical-align:middle;text-align:center;">Created by</th>
                                    <th style="vertical-align:middle;text-align:center;">Status</th>
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
</div>