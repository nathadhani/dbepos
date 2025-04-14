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
                </div> 
                <br>
                <div class="row">   
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <label for="periode" style="display:block">Period</label>
                                <input style="width:100px;" type="text" id="tr_date" name="tr_date" placeholder="Tanggal..." class="form-control dp" data-date-format="DD MMMM YYYY" value="<?=date('d-m-Y');?>">
                            </div>
                        </div>                            
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <label for="btn-submit" style="display:block"></label>
                                <a style="width:100px;display:block" id="btn-submit" title="Filter Data" href="#" class="btn btn-info">Submit</a>                              
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>