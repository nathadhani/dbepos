<div class="row">
    <div class="col-md-12">
        <form method="post" id="mainForm" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title"><i class="fa fa-upload"></i>&nbsp;<strong id="ftitle">Import</strong> File Excel DTTOT</h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body">                                                                        
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="menu" class="control-label col-lg-4">Select File Excel</label>
                                <div class="col-lg-8">
                                    <input type="file" name="file" id="file" required accept=".xls, .xlsx" data-validation="required" class="form-control"/>
                                </div>
                            </div><!-- /.form-group -->                            
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button type="submit" id="import" name="import" class="btn btn-info" style="width:100px;">Submit</button>
                    <button type="reset" class="btn btn-default" style="width:100px;">Reset</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">                                
                <h3 class="panel-title">List of Suspected Terrorists and Terrorist Organizations</h3>
                <ul class="panel-controls">                    
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul>
            </div>
            <div class="panel-body">
                <div class="box-body table-responsive" id="mainTable">
                    <div style="padding: 0 20px 10px 20px" class="row">
                        <button class="btn btn-default toggle-selected" title="Toggle Selected" data-toggle="tooltip" data-placement="bottom"><i class="fa  fa-align-justify"></i></button>
                        <div class="div-btn pull-right">
                            <button class="btn btn-default delete-selected" title="Delete Rows" data-toggle="tooltip" data-placement="bottom"><i class="fa  fa-trash"></i></button> 
                        </div>
                    </div>
                    <table class="table table-bordered table-condensed table-hover table-striped dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Desciption</th>
                                <th>Expected</th>
                                <th>Code</th>
                                <th>Place of birth</th>
                                <th>Date of birth</th>
                                <th>Citizen</th>
                                <th>Address</th>
                                <th>Last Import</th>
                                <th>Status</th>
                                <th>Act</th>
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

<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Detail - Daftar Terduga Teroris dan Organisasi Teroris</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form id="mainForm" class="form-horizontal" autocomplete="off">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">                        
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="form_name" class="control-label col-lg-4">Kode</label>
                                                <div class="col-lg-8" id="kode">                                                    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="form_name" class="control-label col-lg-4">Nama</label>
                                                <div class="col-lg-8" id="nama">                                                    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="form_name" class="control-label col-lg-4">Deskripsi</label>
                                                <div class="col-lg-8" id="deskripsi">                                                    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="form_name" class="control-label col-lg-4">Terduga</label>
                                                <div class="col-lg-8" id="terduga">                                                    
                                                </div>
                                            </div>                                                                                      
                                        </div>
                                        <div class="col-lg-6">          
                                            <div class="form-group">
                                                <label for="form_name" class="control-label col-lg-4">Tempat Lahir</label>
                                                <div class="col-lg-8" id="tpt_lahir">                                                    
                                                </div>
                                            </div>  
                                            <div class="form-group">
                                                <label for="form_name" class="control-label col-lg-4">Tanggal Lahir</label>
                                                <div class="col-lg-8" id="tgl_lahir">                                                    
                                                </div>
                                            </div>       
                                            <div class="form-group">
                                                <label for="form_name" class="control-label col-lg-4">Warga Negara</label>
                                                <div class="col-lg-8" id="warga_negara">                                                    
                                                </div>
                                            </div>                          
                                            <div class="form-group">
                                                <label for="form_name" class="control-label col-lg-4">Alamat</label>
                                                <div class="col-lg-8" id="alamat">                                                    
                                                </div>
                                            </div>                          
                                            <div class="form-group">
                                                <label class="control-label col-lg-4">Status</label>
                                                <div class="col-lg-8">
                                                    <div class="input-group col-lg-2">
                                                        <span class="input-group-addon">
                                                            <input type="checkbox" name="status" id="status" class="icheckbox_minimal-grey checked" checked/>
                                                        </span>
                                                        <span class="form-control">Active</span>
                                                    </div>
                                                </div>
                                            </div><!-- /.form-group -->
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="panel-footer">
                                    <button type="reset" class="btn btn-default pull-right" style="width:100px;">Batal</button>
                                    <button type="submit" class="btn btn-info pull-right" style="width:100px;">Simpan</button>
                                </div> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>