<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">                                
                <div class="panel-title-box">
                    <h3>Cash / Bank - Balance</h3>
                </div>
                <ul class="panel-controls">
                    <div class="dropdown">
                        <button class="dropbtn" style="width:100px;">Action</button>
                        <div class="dropdown-content">
                            <a href="#" id="btn-calculate">Calculate</a>
                            <a href="#" id="btn-pdf-rekap">Balance Summary</a>
                            <a href="#" id="btn-pdf-detail">Balance Detail</a>                            
                        </div>
                    </div>
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
                                        id="store_id" placeholder="Store"
                                        class='form-control select2'
                                        width="100%"
                                        >
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-lg-4">
                                <label for="tr_date1" style="display:block">Period</label>
                                <div class="input-group">
                                    <input type="text" id="period" name="period" placeholder="Tanggal ..." class="form-control dp" data-date-format="DD MMMM YYYY" style="width:120px;" value="<?=date('d-m-Y');?>">
                                    <span class="input-group-addon">                             
                                        <span id="btn-submit" class="btn btn-info" style="width:120px;margin-left:10px;">Submit</span>
                                    </span>
                                </div>        
                            </div>
                        </div>                            
                    </div>
                </div>                            
                
                <br>
                <div class="row table-responsive">
                    <div class="col-md-12">
                        <table class="table table-bordered table-condensed table-hover" width="100%" id="mainTable">
                            <thead>
                                <tr>
                                    <th style="vertical-align:middle;text-align:center;">#</th>                                    
                                    <th style="vertical-align:middle;text-align:center;">List</th>
                                    <th style="vertical-align:middle;text-align:center;">Beginning</th>
                                    <th style="vertical-align:middle;text-align:center;">In</th>
                                    <th style="vertical-align:middle;text-align:center;">Out</th>
                                    <th style="vertical-align:middle;text-align:center;">Balance</th>
                                    <!-- <th style="vertical-align:middle;text-align:center;">Action</th> -->
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