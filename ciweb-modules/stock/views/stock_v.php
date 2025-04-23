<?php
    $auth = $this->session->userdata('auth');
    $usergroup_id = $auth['usergroup_id'];
    $store_id = $auth['store_id']; 
    $api_method = $auth['api_method'];
?>
<script type="text/javascript">
    var userId = <?php echo $auth['id'];?>;
    var usergroupId = <?php echo $auth['usergroup_id'];?>;
    var Apimethod = <?php echo ($auth['api_method'] == null ? 0 : $auth['api_method']) ;?>;
    var ApiAP = "<?php echo $auth['api_angkasapura'];?>";
</script>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">                                
                <div class="panel-title-box">
                    <h3>Stock</h3>
                </div>
                <ul class="panel-controls">
                    <button id="btn-stock-calculate" class="btn btn-info" style="width:120px;">Calculate</button>
                </ul>
            </div>
            <div class="panel-body">
                <div class="row">
                    <?php if(in_array($usergroup_id, ['2','6'])) { ?>
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
                                            id="store_id" placeholder="Store"
                                            class='form-control select2'
                                            width="100%"
                                            >
                                    </select>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <label for="periode" style="display:block">Month</label>
                                <div class="input-group">
                                    <input style="width:100px;" type="text" data-inputmask="'mask': '[99-9999]'" class="form-control dpM" placeholder="Periode" name="period" id="period" value="<?=date('m-Y')?>">
                                    <span class="input-group-addon">                             
                                        <button id="btn-submit" class="btn btn-info" style="width:120px;margin-left:10px;">Submit</button>
                                    </span>
                                </div>
                            </div>
                        </div>                            
                    </div>
                </div>                

                <br>                
                <div class="row">
                    <div class="col-md-12">                      
                        <div class="panel panel-default tabs">                            
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Stock - In Total</a></li>
                                <li><a href="#tab-second" role="tab" data-toggle="tab">Stock - In Sheet</a></li>
                            </ul>
                            <div class="panel-body tab-content">
                                <div class="tab-pane active" id="tab-first">
                                    <div class="row table-responsive" id="mainTable1">
                                        <table class="table table-bordered table-condensed table-hover table-striped dataTable" width="100%">
                                            <thead>
                                                <tr style="vertical-align:middle;">
                                                    <th rowspan="2" style="vertical-align:middle;text-align:center;">#</th>
                                                    <th rowspan="2" style="vertical-align:middle;text-align:center;">Currency</th>
                                                    <th colspan="5" style="vertical-align:middle;text-align:center;background-color:#FFFF00;">In Total</th>
                                                </tr>
                                                <tr>
                                                    <th style="vertical-align:middle;text-align:center;">Beginning</th>
                                                    <th style="vertical-align:middle;text-align:center;">Buy</th>                          
                                                    <th style="vertical-align:middle;text-align:center;">Sell</th>
                                                    <th style="vertical-align:middle;text-align:center;">Task</th>
                                                    <th style="vertical-align:middle;text-align:center;">Ending</th>
                                                </tr>
                                            </thead>
                                            <thead id="searchid1">
                                                <tr>
                                                    <td><button class="clrs1 btn btn-info btn-sm btn-line">Clear</button></td>
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
                                <div class="tab-pane" id="tab-second">
                                    <div class="row table-responsive" id="mainTable2">
                                        <table class="table table-bordered table-condensed table-hover table-striped dataTable" width="100%">
                                            <thead>
                                                <tr style="vertical-align:middle;">
                                                    <th rowspan="2" style="vertical-align:middle;text-align:center;">#</th>
                                                    <th rowspan="2" style="vertical-align:middle;text-align:center;">Currency</th>
                                                    <th colspan="7" style="vertical-align:middle;text-align:center;background-color:#FFFF00;">In Sheet</th>                                                    
                                                </tr>
                                                <tr>
                                                    <th style="vertical-align:middle;text-align:center;">Nominal</th>
                                                    <th style="vertical-align:middle;text-align:center;">Beginning</th>
                                                    <th style="vertical-align:middle;text-align:center;">Buy</th>
                                                    <th style="vertical-align:middle;text-align:center;">Sell</th>
                                                    <th style="vertical-align:middle;text-align:center;">Task</th>
                                                    <th style="vertical-align:middle;text-align:center;">Ending</th>
                                                    <th style="vertical-align:middle;text-align:center;">Amount</th>
                                                </tr>
                                            </thead>
                                            <thead id="searchid2">
                                                <tr>
                                                    <td><button class="clrs2 btn btn-info btn-sm btn-line">Clear</button></td>
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
                </div>
            </div>
        </div>
    </div>
</div>