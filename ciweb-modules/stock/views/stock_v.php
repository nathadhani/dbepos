<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">                                
                <div class="panel-title-box">
                    <h3>Stock - In Nominal</h3>
                </div>
                <ul class="panel-controls">
                    <button id="btn-submit" class="btn btn-primary btn btn-sm" style="width:120px;">Submit</button>
                    <a id="btn-excel" title="Download" href="#" class="btn btn-default btn btn-sm pull-right" style="margin-left:5px;"><i class="fa fa-download"></i></a>
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
                <div class="row table-responsive" id="mainTable">
                    <div class="col-md-12">                                            
                        <table class="table table-bordered table-condensed table-hover table-striped dataTable" width="100%">
                            <thead>
                                <tr style="vertical-align:middle;">
                                    <th rowspan="2" style="vertical-align:middle;text-align:center;">#</th>
                                    <th rowspan="2" style="vertical-align:middle;text-align:center;">Currency</th>
                                    <th rowspan="2" style="vertical-align:middle;text-align:center;">Nominal</th>
                                    <th colspan="5" style="vertical-align:middle;text-align:center;">In Sheet</th>
                                    <th rowspan="2" style="vertical-align:middle;text-align:center;">Balance Amount</th>
                                </tr>
                                <tr>
                                    <th style="vertical-align:middle;text-align:center;">Beginning</th>                                   
                                    <th style="vertical-align:middle;text-align:center;">Buy</th>                                
                                    <th style="vertical-align:middle;text-align:center;">Sell</th>
                                    <th style="vertical-align:middle;text-align:center;">Task</th>
                                    <th style="vertical-align:middle;text-align:center;">Balance</th>
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