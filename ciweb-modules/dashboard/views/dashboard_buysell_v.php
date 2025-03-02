<?php
    $auth = $this->session->userdata('auth');    
    if($auth['usergroup_id'] !== '1'){
?>
<script type="text/javascript">
    var companyIduser = <?php echo $auth['company_id'];?>;
</script>

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default"> 
                <div class="panel-heading ui-draggable-handle">                                
                    <div class="panel-title-box">
                        <h3>Buy / Sell - Dashboard</h3>
                    </div>
                    <span class="pull-right" id="lastupdated"></span>
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
                                <div class="col-lg-8">
                                    <label for="periode" style="display:block">Period</label>
                                    <input style="width:100px;" type="text" data-inputmask="'mask': '[9999]'" class="form-control dpY" placeholder="Periode" name="periode" id="periode" value="<?=date('Y')?>">
                                </div>
                                <div class="col-lg-4">
                                    <label for="btn-submit" style="display:block"></label><br>
                                    <a style="width:100px;display:block" id="btn-submit" title="Lihat Data" href="#" class="btn btn-primary">Submit</a>
                                </div>
                            </div>                            
                        </div>
                        <div class="col-md-2"></div>
                    </div>                    
                </div>
            </div>            
        </div>               
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default"> 
                <div class="panel-heading ui-draggable-handle">                                
                    <div class="panel-title-box">
                        <h3>by Month</h3>
                        <span id="title-table1"></span><span> | In Rupiah</span>                   
                    </div>
                    <ul class="panel-controls" style="margin-top: 2px;">
                        <!-- <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li> -->
                        <li><a href="#" class="panel-refresh" onclick="getdatatable1();"><span class="fa fa-refresh"></span></a></li>
                        <!-- <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li> -->
                    </ul>                                
                </div>                               
                <div class="panel-body">
                    <div class="row table-responsive" style="height:270px;">
                        <table class="table table-bordered table-condensed table-hover table-striped" width="100%" id="table1">
                            <thead>
                                <tr style="vertical-align:middle;">
                                    <th rowspan="2" style="vertical-align:middle;text-align:center;">Month</th>
                                    <th colspan="2" style="vertical-align:middle;text-align:center;">Rupiah</th>
                                </tr>    
                                </tr>
                                    <th style="vertical-align:middle;text-align:center;">Buy</th>
                                    <th style="vertical-align:middle;text-align:center;">Sell</th>
                                <tr>
                            </thead>                            
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>by Month</h3>
                        <span id="title-chart1"></span><span> | In Rupiah</span>
                    </div>
                    <ul class="panel-controls" style="margin-top: 2px;">
                        <!-- <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li> -->
                        <li><a href="#" class="panel-refresh" onclick="getchart1();"><span class="fa fa-refresh"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body padding-0">
                    <div class="chart-holder" id="chart1" style="height:300px;"></div>
                </div>
            </div>
        </div>                
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default"> 
                <div class="panel-heading ui-draggable-handle">                                
                    <div class="panel-title-box">
                        <h3>by Currency</h3>
                        <span id="title-table2"></span><span> | In Rupiah</span>                   
                    </div>
                    <ul class="panel-controls" style="margin-top: 2px;">
                        <!-- <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li> -->
                        <li><a href="#" class="panel-refresh" onclick="getdatatable2();"><span class="fa fa-refresh"></span></a></li>
                    </ul>                                
                </div>                               
                <div class="panel-body">
                    <div class="row table-responsive" style="height:270px;">
                        <table class="table table-bordered table-condensed table-hover table-striped" width="100%" id="table2">
                            <thead>
                                <tr style="vertical-align:middle;">
                                    <th rowspan="2" style="vertical-align:middle;text-align:center;">Currency</th>
                                    <th colspan="2" style="vertical-align:middle;text-align:center;">Rupiah</th>
                                </tr>    
                                </tr>
                                    <th style="vertical-align:middle;text-align:center;">Buy</th>
                                    <th style="vertical-align:middle;text-align:center;">Sell</th>
                                <tr>
                            </thead>                            
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>by Currency - TOP 5</h3>
                        <span id="title-chart2"></span><span> | In Rupiah</span>
                    </div>                                    
                    <ul class="panel-controls" style="margin-top:2px;">
                        <!-- <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li> -->
                        <li><a href="#" class="panel-refresh" onclick="getchart2();"><span class="fa fa-refresh"></span></a></li>
                    </ul>                                    
                </div>                                
                <div class="panel-body padding-0">
                    <div class="chart-holder" id="chart2" style="height:300px;"></div>
                </div>                                    
            </div>
        </div>
    </div>                   
</div>
<?php
    }
?>