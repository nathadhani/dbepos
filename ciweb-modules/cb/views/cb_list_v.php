<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">                                
                <div class="panel-title-box">
                    <h3>Cash / Bank - List</h3>
                </div>
                <ul class="panel-controls">
                    <button id="btn-new" class="btn btn-info btn btn-sm" style="width:120px; margin-left:5px;">New</button>
                    <button id="btn-generate-buysell" class="btn btn-info btn btn-sm" style="width:150px; margin-left:5px;">Generate Buy / Sell</button>
                    <!-- <button id="btn-excel" class="btn btn-info btn btn-sm" style="margin-left:5px;">Xlsx</button> -->
                </ul>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-7">
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
                    <div class="col-md-5">
                        <div class="form-group">
                            <div class="col-lg-8">
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
                                    <th style="vertical-align:middle;text-align:center;">Description</th>
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

<div class="modal fade" id="ModalCancel" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading ui-draggable-handle">                        
                                <div class="panel-title-box">
                                    <h3>
                                        Reason Cancel
                                    </h3>
                                </div>
                                <ul class="panel-controls">
                                    <button id="btn-modal-cancel" class="btn btn-info btn btn-sm" style="width:120px;margin-left:5px;">Submit</button>
                                    <button id="btn-modal-cancel-close" class="btn btn-info btn btn-sm" style="width:120px;margin-left:5px;">Close</button>
                                </ul>    
                            </div>
                            <form id="mainFormCancel" class="form-horizontal" autocomplete="off">
                                <div class="panel-body">   
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" autofocuse="" id="modal-cancel-description" name="modal-cancel-description" class="form-control" placeholder="Alasan Batal..." required>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalNew" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" style="max-height:500px; overflow-y:auto;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading ui-draggable-handle">                        
                                <div class="panel-title-box">
                                    <h3>
                                        New Transaction
                                    </h3>
                                </div>
                                <ul class="panel-controls">
                                    <button id="btn-modal-new-cancel" class="btn btn-info btn btn-sm" style="width:120px;margin-left:5px;">Cancel</button>      
                                    <button id="btn-modal-new-close" class="btn btn-info btn btn-sm" style="width:120px;margin-left:5px;">Close</button>
                                </ul>    
                            </div>                            
                            <div class="panel-body"> 
                                <form id="mainFormModalNew" class="form-horizontal" autocomplete="off">    
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <div class="col-lg-12">
                                                    <label for=tr_date style="display:block">Date</label>
                                                    <input type="text" id="modal_new_tr_date" name="modal_new_tr_date" placeholder="Tanggal..." class="form-control dp" data-date-format="DD MMMM YYYY" value="<?=date('d-m-Y');?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-lg-12">
                                                    <label for=tr_date style="display:block">Source</label>
                                                    <!-- Jika Search Tidak berfungsi, remove modal tabindex='-1' -->
                                                    <select id="cb_id"
                                                            name="cb_id"
                                                            data-ajax="true"
                                                            data-placeholder="Pilih..."
                                                            data-url="master_data/m_cb/getmcb/"
                                                            data-value=""
                                                            data-limit="100"                                          
                                                            placeholder="Pilih..."
                                                            class='form-control select2'
                                                            require
                                                    >
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-lg-12">
                                                    <label for=cb_pos_id style="display:block">Purpose</label>
                                                    <!-- Jika Search Tidak berfungsi, remove modal tabindex='-1' -->
                                                    <select class='form-control select2' name="cb_pos_id" id="cb_pos_id" disabled="true">
                                                        <option value="">Pilih...</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                  
                                    <br>            
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th style='vertical-align:middle;text-align:left;'>Description</th>
                                                        <th style='vertical-align:middle;text-align:left;'>Value</th>
                                                        <th style='vertical-align:middle;text-align:center;' width="50px">Action</th>
                                                    </tr>
                                                </thead>                                                
                                                <tbody>
                                                    <tr style="background:#ffffff;">
                                                        <td width="85%">
                                                            <input type="text" id="modal_new_description" name="modal_new_description" class="form-control">
                                                        </td>
                                                        <td width="15%">
                                                            <input type="text" onkeypress="validasiAngka(event)" autofocuse="" id="modal_new_amount" name="modal_new_amount" class="form-control" style='text-align:right;'>
                                                        </td>
                                                        <td width="10%" style='text-align:center'>
                                                            <button id="btn-modal-add-new" class="btn btn-info btn btn-sm" style="width:90px;">Add</button>
                                                        </td>                
                                                    </tr>
                                                    <tr>
                                                        <td id="terbilang_modal_new_amount" colspan=4></td>
                                                    </tr>                                                
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>                                    
                                    <div class="row">
                                        <div class="col-md-12 table-responsive">
                                            <table class="table table-bordered table-condensed table-hover" width="100%" id="table-modal-new">
                                                <thead>
                                                    <tr style="background:#f1f5f9;">
                                                        <td style='vertical-align: middle;text-align:center;'>#</td>
                                                        <th style='vertical-align:middle;text-align:left;'>Source</th>
                                                        <th style='vertical-align:middle;text-align:left;'>Purpose</th>
                                                        <th style='vertical-align:middle;text-align:left;'>Description</th>                                                    
                                                        <th style='vertical-align:middle;text-align:left;'>Value</th>
                                                    </tr>
                                                </thead>
                                                <tbody>                                                
                                                </tbody>
                                            </table>                                        
                                        </div>
                                    </div>
                                </form>    
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
