<script type="text/javascript">
    $("body").data("user_id", <?php echo $auth['id'];?>);
    $("body").data("usergroup_id", <?php echo $auth['usergroup_id'];?>);
    $("body").data("company_id", <?php echo $auth['company_id'];?>);
    $("body").data("company_address", <?php echo "'" . $auth['company_address'] ."'";?>);

    $("body").data("id", <?php echo $this->uri->segment(4);?>);
    var text_celluler = <?php echo "'" . str_replace('%20',' ',$this->uri->segment(5)) ."'";?>;
</script>

<div class="page-content-wrap">            
    <div class="row">   
        <div class="col-md-12">
            <div class="panel panel-default">
                <form id="mainForm" class="form-horizontal" autocomplete="off">
                    <div class="panel-heading ui-draggable-handle">
                        <h3 class="panel-title"><i class="fa fa-user"></i>&nbsp;Customer Profile / <strong id="ftitle"></strong></h3>
                        <ul class="panel-controls">
                            <button id="btn-buy" class="btn" style="width:110px;background-color:blue;color:white;"><i class="fa fa-shopping-cart"></i>Trx. Buy</button>
                            <button id="btn-sale" class="btn" style="width:110px;background-color:red;color:white;"><i class="fa fa-shopping-cart"></i>Trx. Sell</button>
                        </ul>
                    </div>
                    <div class="panel-body">                        
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">tanda <strong style="color:red;font-weight:bodl;font-size:18px;">**</strong> yang wajib diisi terlebih dahulu, jika sudah selesai transaksi. silahkan di update kembali data profil nasabah sesuai identitas.</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_name" class="control-label col-lg-4">Customer Code</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <input type="text" id="customer_code" name="customer_code" class="form-control" style="width:100px;" readonly>
                                            <div class="input-group">
                                                <label class="control-label col-lg-4" style="margin-top:-30px;">Status</label>
                                                <!-- <div> -->
                                                    <!-- <div class="input-group col-lg-4"> -->
                                                        <span class="input-group-addon">
                                                            <input type="checkbox" name="status" id="status" class="icheckbox_minimal-grey checked" checked/>
                                                        </span>
                                                        <span class="form-control">Active</span>
                                                    <!-- </div> -->
                                                <!-- </div> -->
                                            </div>
                                        </div>
                                    </div>                                        
                                </div>
                                <div class="form-group">
                                    <label for="customer_type_id" class="control-label col-lg-4">Customer Type <strong style="color:red;font-weight:bold;font-size:18px;">**</strong></label>
                                    <div class="col-lg-8">
                                        <select id="customer_type_id" 
                                                name="customer_type_id"
                                                data-ajax="true" 
                                                data-placeholder="Pilih..."
                                                data-url="master_data/m_customer_type/getType/" 
                                                data-value="" 
                                                data-limit="100"                                                
                                                placeholder="Tipe Nasabah"  
                                                class='form-control select2'                                                
                                        >
                                        </select>
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <label for="form_name" class="control-label col-lg-4">Full Name <strong style="color:red;font-weight:bold;font-size:18px;">**</strong></label>
                                    <div class="col-lg-8">
                                        <input type="text" id="customer_name" name="customer_name" class="form-control" placeholder="Nama Lengkap..." data-validation="required">
                                    </div>
                                </div>                                                                                        
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_name" class="control-label col-lg-4">Address <strong style="color:red;font-weight:bold;font-size:18px;">**</strong></label>
                                    <div class="col-lg-8">
                                        <textarea rows="2" cols="50" id="customer_address" name="customer_address" class="form-control" placeholder="Alamat..." data-validation="required"></textarea>
                                    </div>
                                </div>                                   
                                <div class="form-group">
                                    <label for="form_name" class="control-label col-lg-4">Celluler <strong style="color:red;font-weight:bold;font-size:18px;">**</strong></label>
                                    <div class="col-lg-8">
                                        <input type="text" id="customer_handphone" name="customer_handphone" class="form-control" placeholder="No Handphone..." data-validation="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="form_name" class="control-label col-lg-4">Phone</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="customer_phone" name="customer_phone" class="form-control" placeholder="No Telpon Rumah / Kantor...">
                                    </div>
                                </div>
                                <div class="form-group cnpwp">
                                    <label for="form_name" class="control-label col-lg-4">NPWP Number</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="npwp_number" name="npwp_number" class="form-control" placeholder="No NPWP...">
                                    </div>
                                </div>                                                  
                            </div>
                        </div>
                        <br>
                        <div class="footer">
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-info" style="width:90px;">Submit</button>
                                    <button type="reset" class="btn btn-default" style="width:90px;">Reset</button>                            
                                </div>
                            </div>                            
                        </div>
                        <hr style="border: 1px solid red;" class="perorangan">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group perorangan">
                                    <div class="col-lg-12">
                                        <label for="kode_densus_dttot" style="display:block">Daftar Terduga Terorisme dan Organisasi Terorisme / DTTOT Code</label>
                                        <div class="input-group">
                                            <input type="text" id="kode_densus_dttot" name="kode_densus_dttot" class="form-control" placeholder="Kode Densus DTTOT...">
                                            <span class="input-group-addon"><a href="master_data/dttot" target="_blank" title="Cari"><i class="fa fa-search"></i></a></span>       
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr style="border: 1px solid red;" class="perorangan">
                        <div class="row">                   
                            <div class="col-lg-6">                                                           
                                <div class="form-group perorangan">
                                    <label for="form_name" class="control-label col-lg-4">Call Name</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="customer_nick_name" name="customer_nick_name" class="form-control" placeholder="Nama Panggilan...">
                                    </div>
                                </div>                                                                                                                                                                                  
                                <div class="form-group perorangan">
                                    <label for="customer_data_id" class="control-label col-lg-4">Identity Type</label>
                                    <div class="col-lg-8">
                                        <select id="customer_data_id"
                                                name="customer_data_id"
                                                data-ajax="true" 
                                                data-placeholder="Pilih..."
                                                data-url="master_data/m_customer_data/getIdentitas/"
                                                data-value="" 
                                                data-limit="100"                                                 
                                                placeholder="Jenis Identitas"  
                                                class='form-control select2'                                                
                                        >
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group perorangan">
                                    <label for="form_name" class="control-label col-lg-4">Identity Type Number</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="customer_data_number" name="customer_data_number" class="form-control" placeholder="No Identitas...">
                                    </div>
                                </div>            
                                <div class="form-group perorangan">
                                    <label for="form_name" class="control-label col-lg-4">Gender</label>
                                    <div class="col-lg-8">
                                        <select id="gender_id" name="gender_id" placeholder="Pilih Jenis Kelamin" class="form-control">
                                            <option value="" selected="">-- Pilih --</option>
                                            <option value="1">Laki - Laki</option>
                                            <option value="2">Perempuan</option>
                                        </select>
                                    </div>
                                </div>                        
                                <div class="form-group perorangan">
                                    <label for="form_name" class="control-label col-lg-4">Birth Place</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="placeofbirth" name="placeofbirth" class="form-control" placeholder="Tempat Lahir...">
                                    </div>
                                </div>
                                <div class="form-group perorangan">
                                    <label for="form_name" class="control-label col-lg-4">Birth Date</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="bornday" name="bornday" placeholder="Tanggal Lahir ..." class="form-control dp" data-date-format="DD MMMM YYYY" style="width:100px;" value="<?=date('d-m-Y');?>">
                                    </div>
                                </div>
                                <div class="form-group perorangan">
                                    <label for="nationality_id" class="control-label col-lg-4">Nationality</label>
                                    <div class="col-lg-8">
                                        <select name="nationality_id"
                                                data-ajax="true" 
                                                data-placeholder="Pilih..."
                                                data-url="master_data/m_nationality/getNationality/"
                                                data-value="" 
                                                data-limit="100"
                                                id="country_id" 
                                                placeholder="Warga Negara"
                                                class='form-control select2'                                                
                                        >
                                        </select>
                                    </div>
                                </div>                                
                            </div>
                            <div class="col-lg-6">                                
                                <div class="form-group perorangan">
                                    <label for="work_id" class="control-label col-lg-4">Work</label>
                                    <div class="col-lg-8">
                                        <select id="work_id"
                                                name="work_id"
                                                data-ajax="true" 
                                                data-placeholder="Pilih..."
                                                data-url="master_data/m_customer_work/getWork/"
                                                data-value=""
                                                data-limit="100"                                                
                                                placeholder="Pekerjaan"  
                                                class='form-control select2'                                               
                                        >
                                        </select>
                                    </div>
                                </div>                                                                                                
                                <div class="form-group perorangan">
                                    <label for="form_name" class="control-label col-lg-4">RT / RW</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="rt_rw" name="rt_rw" class="form-control" placeholder="RT / RW...">
                                    </div>
                                </div>
                                <div class="form-group perorangan">
                                    <label for="form_name" class="control-label col-lg-4">Subdistrict / Village</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="village" name="village" class="form-control" placeholder="Kelurahan / Desa...">
                                    </div>
                                </div>
                                <div class="form-group perorangan">
                                    <label for="form_name" class="control-label col-lg-4">Subdistrict</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="sub_district" name="sub_district" class="form-control" placeholder="Kecamatan...">
                                    </div>
                                </div>
                                <div class="form-group perorangan">
                                    <label for="form_name" class="control-label col-lg-4">Regency / City</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="city" name="city" class="form-control" placeholder="Kabupaten / Kota...">
                                    </div>
                                </div>                                                                                                                                                                
                                <div class="form-group perorangan">
                                    <label for="form_name" class="control-label col-lg-4">Customer Nature / Character</label>
                                    <div class="col-lg-8">
                                        <textarea rows="2" cols="50" id="customerprofil" name="customerprofil" class="form-control" placeholder="Sifat Nasabah..."></textarea>
                                    </div>
                                </div>                                                                                                                                                                                     
                            </div>                            
                        </div>                                                                                                       
                    </div>
                    <!--.end panel-body -->
                                        
                    <div class="panel-body created_updated">
                        <div class="row">
                            <div class="col-lg-12">
                                <table style="width:100%" class="table table-bordered table-condensed table-hoverx table-striped">
                                    <thead>
                                        <tr>
                                            <th>Created by</th>
                                            <th>Created</th>
                                            <th>Updated by</th>
                                            <th>Updated</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td id="createdby_name"></td>
                                        <td id="created"></td>
                                        <td id="updatedby_name"></td>
                                        <td id="updated"></td>
                                    </tbody>                                    
                                </table>                                
                            </div>                                                         
                        </div>                                                
                    </div>
                    <!--.end panel-body -->                                       
                </form>
            </div>
        </div>
    </div>
    <!-- <div class="row cfoto">
        <div class="col-md-12">            
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title"><i class="fa fa-user"></i>&nbsp;Photo</h3>
                    <ul class="panel-controls">
                        <a class="file-input-wrapper btn btn-info fileinput"><span>Upload</span>           
                            <form id="form_foto" method="post" enctype="multipart/form-data">
                                <input type="file" name="upload_foto" id="upload_foto" class="form-control" accept="image/*">
                            </form>
                        </a>
                    </ul>
                </div>
                <div class="panel-body">                                                                        
                    <div class="row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6">
                            <div class="galleryx" id="links" style="text-align:center; margin:auto; display:block;">
                            </div>                            
                        </div>
                        <div class="col-md-3">
                        </div>
                    </div>
                </div>                    
            </div>            
        </div>        
    </div>           -->
</div>