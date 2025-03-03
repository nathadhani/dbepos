<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <i class="fa fa-calculator"></i><strong style="font-weight:bolder;font-size:16px;">&nbsp;Calculate Data Stock</strong>
                    </div>
                </div>
                <hr style ="border:2px solid green; border-radius: 1px;margin-top:2px;">
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
                                <a style="width:110px;display:block" id="btn-submit" title="Filter Data" href="#" class="btn btn-danger">Calculate</a>                                
                            </div>
                        </div>                            
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-md-12">
                      <br>Information :
                        <br><span><strong style="color:black;font-weight:bolder;">Calculate </strong> 
                            : 
                            Untuk melakukan proses penghitungan ulang saldo akhir stok jika terjadi transaksi gagal/error dan penghitungan harga rata - rata.
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>