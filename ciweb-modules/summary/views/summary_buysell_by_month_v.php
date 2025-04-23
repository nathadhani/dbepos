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
                    <h3>Summary Buy / Sell - by Month</h3>
                </div>
                <ul class="panel-controls">
                    <button id="btn-pdf" class="btn btn-info" style="width:140px; margin-left:10px;">Export PDF</button>
                    <button id="btn-excel" class="btn btn-info" style="width:140px; margin-left:10px;">Export Xlsx</button>                    
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
                                <label for="periode" style="display:block">Period</label>
                                <div class="input-group">
                                    <input type="text" name="period" id="period"  class="form-control dpM" data-inputmask="'mask': '[99-9999]'" placeholder="Periode" value="<?=date('m-Y')?>" style="width:100px;">
                                    <span class="input-group-addon">                             
                                        <span id="btn-submit" class="btn btn-info" style="width:120px;">Submit</span>
                                    </span>
                                </div>                                
                            </div>                            
                        </div>                            
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-3">
                        <h5>Total Buy Rp. <span id="totalbuy" style='text-align:left;font-weight:600;'></span></h5>
                    </div>
                    <div class="col-md-3">
                        <h5>Total Sell Rp. <span id="totalsell" style='text-align:left;font-weight:600;'></span></h5>
                    </div>
                </div>

                <div class="row" style="height:270px;">
                    <table class="table table-bordered table-condensed table-striped table-hover table-responsive" width="100%" id="table-detail">
                        <thead>
                            <tr>
                                <th rowspan="2" style="vertical-align:middle;text-align:center;">#</th>
                                <th rowspan="2" style="vertical-align:middle;text-align:center;">Curr</th>
                                <th rowspan="2" style="vertical-align:middle;text-align:center;">Beginning Amount</th>
                                <th colspan="2" style="vertical-align:middle;text-align:center;">Buy</th>
                                <th colspan="2" style="vertical-align:middle;text-align:center;">Sell</th>
                                <th rowspan="2" style="vertical-align:middle;text-align:center;">Ending Amount</th>
                                <th rowspan="2" style="vertical-align:middle;text-align:center;">Description</th>
                            </tr>
                            <tr>
                                <th style="vertical-align:middle;text-align:center;">Amount</th>
                                <th style="vertical-align:middle;text-align:center;">Equivalent</th>
                                <th style="vertical-align:middle;text-align:center;">Amount</th>
                                <th style="vertical-align:middle;text-align:center;">Equivalent</th>
                            </tr>
                        </thead>                            
                        <tbody></tbody>
                    </table>                   
                </div>                
            </div>
        </div>
    </div>
</div>