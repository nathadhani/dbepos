<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
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
                                        >
                                </select>                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">                                
                            <div class="col-lg-12">
                                <label for="store_id" style="display:block">Store</label>
                                <select class='form-control select2' name="store_id" id="store_id" disabled="true">
                                    <option value=""> -- Pilih Store --</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="col-lg-8">
                                <label for="periode" style="display:block">Period</label>
                                <input style="width:100px;" type="text" data-inputmask="'mask': '[99-9999]'" class="form-control dpM" placeholder="Periode" name="periode" id="periode" value="<?=date('m-Y')?>">
                            </div>
                            <div class="col-lg-4">
                                <label for="btn-submit" style="display:block"></label><br>
                                <a style="width:100px;display:block" id="btn-submit" title="Filter Data" href="#" class="btn btn-info">Submit</a>                                
                            </div>
                        </div>                            
                    </div>
                    <div class="col-md-2"></div>
                    <a id="btn-excel" title="Download" href="#" class="btn btn-default pull-right"><i class="fa fa-download"></i></a>
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
                                    <th colspan="7" style="vertical-align:middle;text-align:center;background-color:#baffc9;color:black;">Sheet ( Currency )</th>
                                    <th rowspan="2" style="vertical-align:middle;text-align:center;">Balance Amount</th>
                                </tr>
                                <tr>
                                    <th style="vertical-align:middle;text-align:center;">Beginning</th>
                                    
                                    <th style="vertical-align:middle;text-align:center;">Inv.In</th>                                
                                    <th style="vertical-align:middle;text-align:center;">Inv.Out</th>       

                                    <th style="vertical-align:middle;text-align:center;">Trx.Buy</th>                                
                                    <th style="vertical-align:middle;text-align:center;">Trx.Sale</th>
                                    <th style="vertical-align:middle;text-align:center;">Trx.Task</th>
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