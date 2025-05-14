<div class="page-content-wrap">   
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default"> 
                <div class="panel-heading ui-draggable-handle">                                
                    <div class="panel-title-box">
                        <h3>Export Data</h3>
                    </div>
                </div>                               
                <form id="form_export_data" class="form-horizontal" autocomplete="off">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">                                
                                    <div class="col-lg-12">
                                        <label for="export_id" style="display:block">Select Data</label>                                        
                                        <select id="export_id" name="export_id" placeholder="Pilih" class="form-control">
                                            <option value="" selected="">Pilih...</option>
                                            <option value="1">Data Customer</option>
                                            <option value="2">Data Sipesat</option>
                                            <option value="3">Data Summary Transaction By Currency</option>
                                            <option value="4">Data Summary Transaction By Job Customer</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 store_id">
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
                            <div class="col-md-1 period_year">
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <label for="period_year" style="display:block">Period</label>
                                        <input type="text" name="period_year" id="period_year"  class="form-control dpY" data-inputmask="'mask': '[9999]'" placeholder="Periode" value="<?=date('Y')?>">                                        
                                    </div>                                
                                </div>                            
                            </div>
                            <div class="col-md-3 triwulan_ke">
                                <div class="form-group">                                
                                    <div class="col-lg-12">
                                        <label for="triwulan_ke" style="display:block">Triwulan</label>                                        
                                        <select id="triwulan_ke" name="triwulan_ke" placeholder="Pilih" class="form-control">
                                            <option value="" selected="">Pilih...</option>
                                            <option value="1">Triwulan 1</option>
                                            <option value="2">Triwulan 2</option>
                                            <option value="3">Triwulan 3</option>
                                            <option value="4">Triwulan 4</option>
                                        </select>                                            
                                    </div>                               
                                </div>
                            </div>                            
                        </div>                        
                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-info" style="width:120px;">Submit</button>
                        <button type="reset" class="btn btn-info" style="width:120px;margin-left:5px;">Reset</button>
                    </div> 
                </form>    
            </div>            
        </div>               
    </div>
                     
</div>