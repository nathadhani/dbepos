<?php
    $auth = $this->session->userdata('auth');
    $usergroup_id = $auth['usergroup_id'];
    $store_id = $auth['store_id'];
?>
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
                        <h3>Data - Customer</h3>
                    </div>
                    <ul class="panel-controls">
                        <button id="btn_add" class="btn btn-info" style="width:140px;margin-left:10px;">Add New Data</button>                        
                    </ul>                   
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" autocomplete="off">
                        <div class="row">                      
                            <div class="col-md-12">                  
                                <p>Look for data first, before inputting new data. so there's no double data!</p>              
                                <div class="form-group">
                                    <div class="col-md-12">
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
                        <div class="row">
                            <div class="col-md-12 table-responsive">                                      
                                <table id="mainTable" style="width:100%" class="table table-bordered table-condensed table-hover table-striped dataTable">
                                    <thead>
                                        <tr>
                                            <th style="text-align:left; vertical-align: middle">Name</th>
                                            <th style="text-align:left; vertical-align: middle">Address</th>                                            
                                            <th style="text-align:left; vertical-align: middle">Celluler</th>                                            
                                            <th style="text-align:left; vertical-align: middle">Identity</th>
                                            <th style="text-align:left; vertical-align: middle">Identity Number</th>
                                            <th style="text-align:left; vertical-align: middle">Status</th>
                                        </tr>
                                    </thead>                 
                                    <tbody></tbody>
                                </table>
                            </div>
                            <span id="task-table">*) <i>click row to select data customer</i></span>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>