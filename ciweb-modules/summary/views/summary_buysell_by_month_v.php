<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">                                
                <div class="panel-title-box">
                    <h3>Summary Buy / Sell - by Month</h3>
                </div>
                <ul class="panel-controls">
                    <button id="btn-submit" class="btn btn-default btn btn-sm" style="width:120px;">Submit</button>                    
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
                                <label for="periode" style="display:block">Month</label>
                                <input style="width:100px;" type="text" data-inputmask="'mask': '[99-9999]'" class="form-control dpM" placeholder="Periode" name="periode" id="periode" value="<?=date('m-Y')?>">
                            </div>                            
                        </div>                            
                    </div>
                </div>                

                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h5>Period  : <strong id="ftitle"></strong></h5>
                    </div>
                    <div class="col-md-4">
                        <h5><b style="color:blue;">Buy</b> Equivalent : <strong id="total_buy"></strong> ( <strong id="count_buy"></strong> )</h5>
                    </div>
                    <div class="col-md-4">
                        <h5><b style="color:red;">Sell</b> Equivalent : <strong id="total_sell"></strong> ( <strong id="count_sell"></strong> )</h5>
                    </div>
                </div>                
                
                <div class="row table-responsive" id="mainTable" >
                    <div class="col-md-12">
                        <table class="table table-bordered table-condensed table-hover table-striped dataTable">
                            <thead>
                                <tr>
                                    <th style="vertical-align:middle;text-align:center;">#</th>
                                    <th style="vertical-align:middle;text-align:center;">Currency</th>
                                    <th style="vertical-align:middle;text-align:center;">Buy Amount</th>
                                    <th style="vertical-align:middle;text-align:center;">Buy Equivalent</th>
                                    <th style="vertical-align:middle;text-align:center;">Sell Amount</th>
                                    <th style="vertical-align:middle;text-align:center;">Sell Equivalent</th>
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