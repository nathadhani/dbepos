<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">                                
                <div class="panel-title-box">
                    <h3>Summary Buy / Sell - by Date</h3>
                </div>
                <ul class="panel-controls">
                    <button id="btn-submit" class="btn btn-info btn btn-sm" style="width:120px;">Submit</button>
                    <button id="btn-pdf" class="btn btn-info btn btn-sm" style="margin-left:5px;">pdf</button>
                    <button id="btn-excel" class="btn btn-info btn btn-sm" style="margin-left:5px;">Xlsx</button>
                </ul>
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
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <label for="periode" style="display:block">Date</label>
                                <input type="text" name="period" id="period"  class="form-control dp" placeholder="Periode" data-date-format="DD MMMM YYYY" value="<?=date('d-m-Y');?>" style="width:100px;">
                            </div>
                        </div>                            
                    </div>                    
                </div>
                <br>
                <div class="row" style="height:270px;">
                    <table class="table table-bordered table-condensed table-striped table-hover table-responsive" width="100%" id="table-detail">
                        <thead>
                            <tr>
                                <th rowspan="2" style="vertical-align:middle;text-align:center;">#</th>
                                <th rowspan="2" style="vertical-align:middle;text-align:center;">Curr</th>
                                <th rowspan="2" style="vertical-align:middle;text-align:center;">Beginning Amount</th>
                                <th colspan="2" style="vertical-align:middle;text-align:center;">Buy</th>
                                <th colspan="2" style="vertical-align:middle;text-align:center;">Sell</th>
                                <th rowspan="2" style="vertical-align:middle;text-align:center;">End Amount</th>
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
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <h5>Total Buy Rp. <span id="totalbuy" style='text-align:left;color:blue;font-weight:600;'></span></h5>
                    </div>
                    <div class="col-md-3">
                        <h5>Total Sell Rp. <span id="totalsell" style='text-align:left;color:red;font-weight:600;'></span></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>