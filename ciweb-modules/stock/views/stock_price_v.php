<?php
    $auth = $this->session->userdata('auth');
    $usergroup_id = $auth['usergroup_id'];
    $store_id = $auth['store_id'];
    $api_method = $auth['api_method'];
?>
<script type="text/javascript">
    var userId = <?php echo $auth['id'];?>;
    var usergroupId = <?php echo $auth['usergroup_id'];?>;
    var storeId = <?php echo $auth['store_id'];?>;
    var Apimethod = <?php echo ($auth['api_method'] == null ? 0 : $auth['api_method']) ;?>;
    var ApiAP = "<?php echo $auth['api_angkasapura'];?>";
</script>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">                                
                <div class="panel-title-box">
                    <h3>Stock - In Exchange Rate Average</h3>
                </div>
                <ul class="panel-controls">
                    <button id="btn-stock-calculate" class="btn btn-info" style="width:140px; margin-left:10px;">Calculate</button>
                    <button id="btn-excel" class="btn btn-info" style="width:140px; margin-left:10px;">Export Xlsx</button>
                </ul>
            </div>
            <div class="panel-body">
                <div class="row">
                    <?php if(in_array($usergroup_id, ['2','6'])) { ?>
                        <div class="col-md-5">
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
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <label for="currency_id" style="display:block">Currency</label>
                                <select class='form-control select2' name="currency_id" id="currency_id" disabled="true">
                                    <option value="">-- Pilih Mata Uang --</option>
                                </select>
                            </div>
                        </div>                            
                    </div>
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
                <div class="row table-responsive" id="mainTable">
                    <div class="col-md-12">                                            
                        <table class="table table-bordered table-condensed table-hover table-striped dataTable" width="100%">
                            <thead>
                                <tr style="vertical-align:middle;">
                                    <th rowspan="2" style="vertical-align:middle;text-align:center;">#</th>
                                    <th rowspan="2" style="vertical-align:middle;text-align:center;">Date</th>
                                    <th colspan="4" style="vertical-align:middle;text-align:center;">Buy</th>
                                    <th colspan="4" style="vertical-align:middle;text-align:center;">Sell</th>
                                    <th colspan="3" style="vertical-align:middle;text-align:center;">Ending Balance</th>
                                    <th rowspan="2" style="vertical-align:middle;text-align:center;">Gross Profit</th>
                                </tr>
                                <tr>
                                    <th style="vertical-align:middle;text-align:center;">Number</th>
                                    <th style="vertical-align:middle;text-align:center;">Amount</th>                                
                                    <th style="vertical-align:middle;text-align:center;">Exchange Rate</th>
                                    <th style="vertical-align:middle;text-align:center;">Equivalent</th>

                                    <th style="vertical-align:middle;text-align:center;">Number</th>
                                    <th style="vertical-align:middle;text-align:center;">Amount</th>                                
                                    <th style="vertical-align:middle;text-align:center;">Exchange Rate</th>
                                    <th style="vertical-align:middle;text-align:center;">Equivalent</th>

                                    <th style="vertical-align:middle;text-align:center;">Amount</th>                                
                                    <th style="vertical-align:middle;text-align:center;">Exchange Rate Average</th>
                                    <th style="vertical-align:middle;text-align:center;">Equivalent</th>
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