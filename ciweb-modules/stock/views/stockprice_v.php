<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
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
                    <div class="col-md-6">
                        <div class="form-group">                                
                            <div class="col-lg-12">
                                <label for="store_id" style="display:block">Store</label>
                                <select class='form-control select2' name="store_id" id="store_id" disabled="true">
                                    <option value=""> -- Pilih Store --</option>
                                </select>
                            </div>
                        </div>
                    </div>                                        
                </div>  
                <br>
                <div class="row">                    
                    <div class="col-md-8">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <label for="valas_id" style="display:block">Currency</label>
                                <select class='form-control select2' name="valas_id" id="valas_id" disabled="true">
                                    <option value="">-- Pilih Mata Uang --</option>
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
                                    <th rowspan="2" style="vertical-align:middle;text-align:center;">Date</th>
                                    <th colspan="4" style="vertical-align:middle;text-align:center;background-color:blue;color:white;">Trx-In</th>
                                    <th colspan="4" style="vertical-align:middle;text-align:center;background-color:red;color:white;">Trx-Out</th>
                                    <th colspan="3" style="vertical-align:middle;text-align:center;background-color:yellow;color:black;">Balance Stock</th>
                                    <th rowspan="2" style="vertical-align:middle;text-align:center;">Gross Profit</th>
                                </tr>
                                <tr>
                                    <th style="vertical-align:middle;text-align:center;">Trx.No</th>
                                    <th style="vertical-align:middle;text-align:center;">Amount</th>                                
                                    <th style="vertical-align:middle;text-align:center;">Price</th>
                                    <th style="vertical-align:middle;text-align:center;">Equivalent</th>

                                    <th style="vertical-align:middle;text-align:center;">Trx.No</th>
                                    <th style="vertical-align:middle;text-align:center;">Amount</th>                                
                                    <th style="vertical-align:middle;text-align:center;">Price</th>
                                    <th style="vertical-align:middle;text-align:center;">Equivalent</th>

                                    <th style="vertical-align:middle;text-align:center;">Amount</th>                                
                                    <th style="vertical-align:middle;text-align:center;">Avg.Price</th>
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