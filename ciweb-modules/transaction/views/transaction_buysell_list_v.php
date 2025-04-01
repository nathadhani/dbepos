<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">                                
                <div class="panel-title-box">
                    <h3>Transaction - List</h3>
                </div>
                <ul class="panel-controls">
                    <button id="btn-excel" class="btn btn-info btn btn-sm" style="margin-left:5px;">Xlsx</button>
                </ul>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">                                
                            <div class="col-lg-12">
                                <label for="store_id" style="display:block">Store</label>
                                <?php if( $auth['usergroup_id'] == '2'){ ?>
                                    <select name="store_id[]"
                                            data-ajax="true" 
                                            data-placeholder="-- Pilih --"
                                            data-url="master_data/m_store/getstore/" 
                                            data-value="" 
                                            data-limit="9"
                                            multiple
                                            id="store_id" placeholder="Store" class='form-control select2'>
                                    </select>
                                <?php } else { ?>    
                                    <select name="store_id"
                                            data-ajax="true" 
                                            data-placeholder="-- Pilih --"
                                            data-url="master_data/m_store/getregion/" 
                                            data-value="" 
                                            data-limit="100"                                                
                                            id="store_id" placeholder="Store"
                                            class='form-control select2'
                                            width="100%"
                                            >
                                    </select>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <div class="col-lg-4">
                                <label for="tr_date1" style="display:block">Period</label>
                                <div class="input-group">
                                    <input type="text" id="tr_date1" name="tr_date1" placeholder="Tanggal ..." class="form-control dp" data-date-format="DD MMMM YYYY" style="width:120px;" value="<?=date('d-m-Y');?>">
                                    <span class="input-group-addon btn btn-info">                             
                                        <input type="text" id="tr_date2" name="tr_date2" placeholder="Tanggal ..." class="form-control dp" data-date-format="DD MMMM YYYY" style="width:120px;" value="<?=date('d-m-Y');?>">
                                        <span id="btn-submit" class="btn btn-info btn" style="width:120px;margin-left:10px;">Submit</span>
                                    </span>
                                </div>        
                            </div>
                        </div>                            
                    </div>
                </div>                            
                
                <br>
                <div class="row table-responsive" id="mainTable">
                    <div class="col-md-12">
                        <table class="table table-bordered table-condensed table-hover table-striped dataTable">
                            <thead>
                                <tr>
                                    <th style="vertical-align:middle;text-align:center;">#</th>                                    
                                    <th style="vertical-align:middle;text-align:center;">Trx</th>
                                    <th style="vertical-align:middle;text-align:center;">Date</th>
                                    <th style="vertical-align:middle;text-align:center;">Number</th>
                                    <th style="vertical-align:middle;text-align:center;">Value</th>
                                    <th style="vertical-align:middle;text-align:center;">Customer Name</th>
                                    <th style="vertical-align:middle;text-align:center;">Created by</th>
                                    <th style="vertical-align:middle;text-align:center;">Status</th>
                                    <th style="vertical-align:middle;text-align:center;">Action</th>
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