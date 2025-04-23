<?php
    $auth = $this->session->userdata('auth');    
    if($auth['usergroup_id'] !== '1'){
?>
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default"> 
                <div class="panel-heading ui-draggable-handle">                                
                    <div class="panel-title-box">
                        <h3>Buy / Sell - Summary by Chart</h3>
                    </div>
                    <span class="pull-right" id="lastupdated"></span>
                </div>                               
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">                                
                                <div class="col-lg-12">
                                    <label for="store_id" style="display:block">Store</label>
                                    <select name="store_id"
                                            data-ajax="true" 
                                            data-placeholder="-- Pilih --"
                                            data-url="master_data/m_store/getregion/" 
                                            data-value="" 
                                            data-limit="100"                                                
                                            id="store_id" placeholder="Region"
                                            class='form-control select2'
                                            width="100%"
                                            >
                                    </select>                                
                                </div>
                            </div>
                        </div>                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-lg-8">
                                    <label for="periode" style="display:block">Period</label>
                                    <div class="input-group">
                                    <input type="text" name="period" id="period"  class="form-control dpY" data-inputmask="'mask': '[9999]'" placeholder="Periode" value="<?=date('Y')?>" style="width:100px;">
                                        <span class="input-group-addon">                             
                                            <span id="btn-submit" class="btn btn-info" style="width:120px;">Submit</span>
                                        </span>
                                    </div>
                                </div>                                
                            </div>                            
                        </div>                        
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