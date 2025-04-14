<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">                                
                <div class="panel-title-box">
                    <h3>
                        Stock - Calculate
                    </h3>
                </div>
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
                                <label for="periode" style="display:block">Period</label>
                                <div class="input-group">
                                    <input style="width:100px;" type="text" data-inputmask="'mask': '[99-9999]'" class="form-control dpM" placeholder="Periode" name="period" id="period" value="<?=date('m-Y')?>">
                                    <span class="input-group-addon">                             
                                        <button id="btn-submit" class="btn btn-info" style="width:120px;">Calculate</button>
                                    </span>
                                </div>

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