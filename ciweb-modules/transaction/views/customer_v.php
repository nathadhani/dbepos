<style>
    #mainTable_filter{display:none;}    
    .field-icon {
        float: right;
        margin-left: -25px;
        margin-top: 10px;
        margin-right: 5px;
        size:100px;
        position: relative;
        z-index: 2;
    }    
</style>
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default"> 
                <div class="panel-heading ui-draggable-handle">                                
                    <div class="panel-title-box">
                        <h3>Buy / Sell - New</h3>
                    </div>
                    <ul class="panel-controls">
                        <button id="btn_add" name="btn_add" class="btn btn-info btn btn-sm" style="width:120px;">Add New Data</button>
                        <button id="btn-excel" class="btn btn-info btn btn-sm" style="margin-left:5px;">Xlsx</button>
                    </ul>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" autocomplete="off">
                        <div class="row">                      
                            <div class="col-md-12">                  
                                <p>Look for data first, before inputting new data. so there's no double data!</p>              
                                <div class="form-group">
                                    <div class="col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <span id="btn_search" name="btn_search" for="text_search" class="fa fa-search"></span>                                                
                                            </div>
                                            <input type="text" id="text_search" name="text_search" class="form-control" placeholder="Ketik kata yang mau di cari" data-validation="required"/>
                                            <span class="fa fa-fw fa-close field-icon toggle-close"></span>
                                            <!-- <div class="input-group-btn">
                                                <button class="btn btn-primary btn btn-sm" id="btn_search" name="btn_search" style="width:120px;margin-left:10px;">Submit</button>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>                                              
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12 table-responsive">                                      
                                <span id="task-table">*) click row to edit data</span>
                                <table id="mainTable" style="width:100%" class="table table-bordered table-condensed table-hover table-striped dataTable">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center; vertical-align: middle">Customer Name</th>
                                            <th style="text-align:center; vertical-align: middle">Address</th>
                                            <th style="text-align:center; vertical-align: middle">Celluler</th>
                                            <th style="text-align:center; vertical-align: middle">Identity Type</th>
                                            <th style="text-align:center; vertical-align: middle">Identity Type Number</th>
                                            <th style="text-align:center; vertical-align: middle">Status</th>
                                        </tr>
                                    </thead>                 
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>