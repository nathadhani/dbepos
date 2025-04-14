<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">                                
                <div class="panel-title-box">
                    <h3>
                        Buy / Sell - Closing Transaction
                    </h3>
                </div>
                <ul class="panel-controls">
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
                                <div class="input-group">
                                    <input type="text" id="tr_date" name="tr_date" placeholder="Tanggal ..." class="form-control dp" data-date-format="DD MMMM YYYY" style="width:120px;" value="<?=date('d-m-Y');?>">
                                    <span class="input-group-addon">                             
                                        <span id="btn-submit" class="btn btn-info" style="width:120px;">Submit</span>
                                    </span>
                                </div>
                            </div>                            
                        </div>                            
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                      <br>Information :
                        <br>
                        <span>
                            <strong style="color:black;font-weight:bolder;">
                                Closing Transaction
                            </strong> 
                            : Untuk mengunci transaksi beli & jual tanggal sebelumnya.
                        </span>
                    </div>
                </div>                                   
            </div>           
        </div>
    </div>
</div>