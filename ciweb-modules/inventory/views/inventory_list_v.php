<script type="text/javascript">
    var companyId = <?php echo $auth['company_id'];?>;
    var usergroupId = <?php echo $auth['usergroup_id'];?>;
    var userlevelId = <?php echo $auth['userlevel_id'];?>;
</script>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="company_id" class="control-label col-lg-4">Branch</label>
                            <div class="col-lg-8">
                                <select name="company_id"
                                        data-ajax="true" 
                                        data-placeholder="-- Pilih Cabang --"
                                        data-url="master_data/m_company/getRegion/"
                                        data-value="" 
                                        data-limit="100"                                                
                                        id="company_id" placeholder="Region"
                                        class='form-control select2'
                                        >
                                </select>                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="store_id" class="control-label col-lg-4">Store</label>
                            <div class="col-lg-8">
                                <select class='form-control select2' name="store_id" id="store_id" disabled="true">
                                    <option value=""> -- Pilih Store --</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">                        
                        <div class="form-group row">
                            <label for="tr_date1" class="control-label col-lg-4">Trx. Date-1</label>
                            <div class="col-lg-8">
                                <input style="width:100px;" type="text" id="tr_date1" name="tr_date1" placeholder="Tanggal..." class="form-control dp" data-date-format="DD MMMM YYYY" value="<?=date('d-m-Y');?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tr_date2" class="control-label col-lg-4">Trx. Date-2</label>
                            <div class="col-lg-8">
                                <input style="width:100px;" type="text" id="tr_date2" name="tr_date2" placeholder="Tanggal..." class="form-control dp" data-date-format="DD MMMM YYYY" value="<?=date('d-m-Y');?>">
                            </div>
                        </div>                        
                    </div>
                    <div class="col-md-2">
                        <div class="form-group row">
                            <label for="btn-submit" class="control-label col-lg-4"></label>
                            <div class="col-lg-8">
                                <a style="width:100px;" id="btn-submit" title="Filter Data" href="#" class="btn btn-info">Submit</a>
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
                                    <th style="vertical-align:middle;text-align:center;">Inv.No</th>
                                    <th style="vertical-align:middle;text-align:center;">Inv.Date</th>
                                    <th style="vertical-align:middle;text-align:center;">Description</th>
                                    <th style="vertical-align:middle;text-align:center;">Created by</th>
                                    <th style="vertical-align:middle;text-align:center;">Inv.Name</th>
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