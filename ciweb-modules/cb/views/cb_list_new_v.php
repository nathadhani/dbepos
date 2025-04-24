<script type="text/javascript">
    $("body").data("id", <?php echo $this->uri->segment(4);?>);
    $("body").data("user_id", <?php echo $auth['id'];?>);
    $("body").data("usergroup_id", <?php echo $auth['usergroup_id'];?>);    
</script>
<?php 
    $file = '';
    $file_url = '';
    $tr_number = '';
    if(isset($data_cb[0]->tr_number)) {
        $tr_number = $data_cb[0]->tr_number;
        $file = "assets/arsip/cash_bank/" . $tr_number . ".pdf";
        $file_url = base_url($file);        
    }
?>
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">                
                <div class="panel-heading ui-draggable-handle">
                    <div class="panel-title-box">
                        <h3>Cash/Bank - <strong id="ftitle"></strong></h3>
                    </div>
                    <ul class="panel-controls">
                        <button id="btn-cancel" class="btn btn-info" style="width:120px;margin-left:5px;">Cancel</button>
                    </ul>
                </div>                    
                <div class="panel-body"> 
                    <form id="mainForm" method="post" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
                        <div class="row input-edit">
                            <div class="col-md-6">
                                <span class="span_text_fixed_85px">Store</span> : <span id="store_address"></span><br>
                                <span class="span_text_fixed_85px">Number</span> : <span id="tr_number"></span><br>
                                <span class="span_text_fixed_85px">Description</span> : <span id="description_header"></span><br>
                                <span class="span_text_fixed_85px">Status</span> : <span id="fstatus"></span>
                            </div>
                            <div class="col-md-6">
                                <span class="span_text_fixed_85px">Created </span> : <span id="created"></span><br>    
                                <span class="span_text_fixed_85px">Created by </span> : <span id="created_by"></span><br>
                                <span class="span_text_fixed_85px">Updated</span> : <span id="updated"></span><br>
                                <span class="span_text_fixed_85px">Updated by</span> : <span id="updated_by"></span>
                                
                            </div>
                        </div>
                        <div class="row">                                       
                            <div class="col-md-1">
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <label for=tr_date style="display:block">Date</label>
                                        <input type="text" id="tr_date" name="tr_date" placeholder="Tanggal..." class="form-control dp" data-date-format="DD MMMM YYYY" value="<?=date('d-m-Y');?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <label for=cb_id style="display:block">Source</label>
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
                            <div class="col-md-7">
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <label for=cb_pos_id style="display:block">Purpose</label>
                                        <select class='form-control select2' name="cb_pos_id" id="cb_pos_id" disabled="true">
                                            <option value="">Pilih...</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row input-detail">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <label for=description style="display:block">Description</label>
                                        <input type="text" id="description" name="description" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <label for=amount style="display:block">Value</label>
                                        <div class="input-group">
                                            <input type="text" onkeypress="validasiAngka(event)" autofocuse="" id="amount" name="amount" class="form-control" style='text-align:right;'>
                                            <span class="input-group-addon">
                                                <button id="btn-add" class="btn btn-info" style="width:90px;">Add</button>
                                            </span>    
                                        </div>                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-md-4">
                                <span id="terbilang_amount"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <table class="table table-bordered table-condensed table-hover" width="100%" id="table-detail">
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
                                <span id="total_transaction_terbilang" class="pull-right" style="margin-top:-15x;"></span>
                            </div>
                        </div>

                        <div class="row input-file">
                            <div class="col-md-3">
                                <a class="file-input-wrapper btn btn-info btn-sm">
                                    <span class="fa fa-upload"></span>
                                    <input type="file" id="upload_file" name="upload_file" class="form-control" accept=".pdf">
                                    <label for="">upload PDF file attachments</label>
                                </a>
                            </div>                            
                            <?php
                                if (file_exists($file)) {
                            ?>
                                <div class="col-md-6">
                                    <i>File attachments </i> : <span><a href="<?=$file_url?>" target="_self" style="color:red;"><?=$tr_number;?>.pdf</a></span>
                                </div>
                            <?php 
                                }
                            ?>
                        </div>
                    </form>                       
                </div>              
                <!--.end panel-body -->                    
            </div>                
        </div>
    </div>             
</div>

<div class="modal fade" id="ModalCancel" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <input type="text" autofocuse="" id="modal-cancel-description" name="modal-cancel-description" class="form-control" placeholder="Alasan Batal..." required>                    
            </div>
            <div class="modal-footer">
                <button id="btn-modal-cancel" class="btn btn-success" style="width:120px;margin-left:5px;">Submit</button>
                <button id="btn-modal-cancel-close" class="btn btn-danger" style="width:120px;margin-left:5px;">Close</button>
            </div>
        </div>
    </div>
</div>