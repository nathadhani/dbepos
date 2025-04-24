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
                    <h3>Cash/Bank - List Transaction</h3>
                </div>
                <ul class="panel-controls">
                    <?php         
                        if(in_array($usergroup_id, ['3','5'])) {
                    ?>
                        <button id="btn-new" class="btn btn-info" style="width:140px; margin-left:10px;">New Transaction</button>
                        <button id="btn-generate-buysell" class="btn btn-info" style="width:160px; margin-left:10px;">Generate Buy / Sell</button>
                        <button id="btn-excel" class="btn btn-info" style="width:140px; margin-left:10px;">Export Xlsx</button>
                    <?php 
                        } else {
                    ?>
                        <button id="btn-excel" class="btn btn-info" style="width:140px; margin-left:10px;">Export Xlsx</button>
                    <?php } ?>                        
                </ul>
            </div>
            <div class="panel-body">
                <div class="row">
                    <?php if(in_array($usergroup_id, ['2','6'])) { ?>
                        <div class="col-md-7">
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
                    <div class="col-md-5">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <label for="tr_date1" style="display:block">Period</label>
                                <div class="input-group" style="margin-left:-15px;">
                                    <div class="col-lg-8">
                                        <input type="text" id="tr_date1" name="tr_date1" placeholder="Periode Awal..." class="form-control dp" data-date-format="DD MMMM YYYY" style="width:120px;" value="<?=date('d-m-Y');?>">
                                        <span class="input-group-addon">
                                            <div class="col-lg-2" style="margin-left:-15px;">
                                                s/d
                                            </div>
                                            <div class="col-lg-2">
                                                <input type="text" id="tr_date2" name="tr_date2" placeholder="Periode Akhir..." class="form-control dp" data-date-format="DD MMMM YYYY" style="width:120px;" value="<?=date('d-m-Y');?>">
                                            </div>                             
                                        </span>
                                    </div>
                                    <div class="col-lg-4" style="margin-left:-20px;">
                                        <button id="btn-submit" class="btn btn-info" style="width:120px;margin-left:10px;">Submit</button>
                                    </div>    
                                </div>        
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
                                    <th style="vertical-align:middle;text-align:center;">Transaction</th>
                                    <th style="vertical-align:middle;text-align:center;">Date</th>
                                    <th style="vertical-align:middle;text-align:center;">Number</th>
                                    <th style="vertical-align:middle;text-align:center;">Description</th>
                                    <th style="vertical-align:middle;text-align:center;">In</th>
                                    <th style="vertical-align:middle;text-align:center;">Out</th>
                                    <th style="vertical-align:middle;text-align:center;">Created by</th>
                                    <th style="vertical-align:middle;text-align:center;">Status</th>
                                    <th style="vertical-align:middle;text-align:center;">Action</th>
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
