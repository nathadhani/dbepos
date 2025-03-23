<script type="text/javascript">
    $("body").data("id", <?php echo $this->uri->segment(4);?>);
    $("body").data("user_id", <?php echo $auth['id'];?>);
    $("body").data("usergroup_id", <?php echo $auth['usergroup_id'];?>);
    var text_celluler = <?php echo "'" . str_replace('%20',' ',$this->uri->segment(5)) ."'";?>;
</script>
<?php 
    $img_file = '';
    $image_url = '';
    if(isset($customer[0]->customer_code)) {
        $img_file = "assets/img/customer_form/" . $customer[0]->customer_code . ".jpg";
        $image_url = base_url($img_file);    
    }
?>
<div class="page-content-wrap">            
    <div class="row">   
        <div class="col-md-12">
            <div class="panel panel-default">
                <form id="mainForm" class="form-horizontal" autocomplete="off">
                    <div class="panel-heading ui-draggable-handle">
                        <div class="panel-title-box">
                            <h3>Customer Form / <strong id="ftitle"></strong></h3>
                        </div>
                        <ul class="panel-controls">
                            <button id="btn-buy" class="btn btn-info btn" style="width:120px;font-weight:600;color:blue;font-size:14px;">Buy / Beli</button>
                            <button id="btn-sell" class="btn btn-info btn" style="width:120px;font-weight:600;color:red;font-size:14px;margin-left:5px;">Sell / Jual</button>
                        </ul>
                    </div>                    
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4 cfoto">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="col-lg-2">
                                                <a class="file-input-wrapper btn btn-info btn btn-sm"><span class="fa fa-upload"></span>
                                                    <form id="form_foto" method="post" enctype="multipart/form-data">
                                                        <input type="file" name="upload_foto" id="upload_foto" class="form-control" accept="image/*">
                                                    </form>
                                                </a>
                                            </div>
                                            <div id="links" class="col-lg-10"></div>
                                        </div>    
                                    </div>               
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="form_name" class="control-label col-lg-4">Customer Code</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <input type="text" id="customer_code" name="customer_code" class="form-control" style="width:150px;" readonly>
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
                                <div class="form-group">
                                    <label for="form_name" class="control-label col-lg-4">Full Name <strong style="color:red;font-weight:bold;font-size:18px;">**</strong></label>
                                    <div class="col-lg-8">
                                        <input type="text" id="customer_name" name="customer_name" class="form-control" placeholder="Nama Lengkap..." data-validation="required">
                                    </div>
                                </div>                                                                       
                                <div class="form-group">
                                    <label for="form_name" class="control-label col-lg-4">Call Name</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="customer_nick_name" name="customer_nick_name" class="form-control" placeholder="Nama Panggilan...">
                                    </div>
                                </div>                          
                            </div>    
                        </div>
                        <br>
                        <div class="row">                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="customer_type_id" class="control-label col-lg-4">Customer Type <strong style="color:red;font-weight:bold;font-size:18px;">**</strong></label>
                                    <div class="col-lg-8">
                                        <select id="customer_type_id" 
                                                name="customer_type_id"
                                                data-ajax="true" 
                                                data-placeholder="Tipe Pelanggan..."
                                                data-url="master_data/m_customer_type/getType/" 
                                                data-value="" 
                                                data-limit="100"                                                
                                                placeholder="Tipe Nasabah"  
                                                class='form-control select2'                                                
                                        >
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group perorangan">
                                    <label for="customer_data_id" class="control-label col-lg-4">Identity Type</label>
                                    <div class="col-lg-8">
                                        <select id="customer_data_id"
                                                name="customer_data_id"
                                                data-ajax="true" 
                                                data-placeholder="Tipe Identitas..."
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
                                    <label for="form_name" class="control-label col-lg-4">Identity Number</label>
                                    <div class="col-lg-8">
                                        <?php
                                            if (file_exists($img_file)) {
                                        ?>
                                            <div class="input-group">
                                                <input type="text" id="customer_data_number" name="customer_data_number" class="form-control" placeholder="Nomor Identitas...">
                                                <span class="input-group-addon">                                                
                                                    <a href="<?=$image_url;?>" target="_blank" title="Photo">
                                                        <i class="fa fa-picture-o"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        <?php 
                                            } else {
                                        ?>
                                            <input type="text" id="customer_data_number" name="customer_data_number" class="form-control" placeholder="Nomor Identitas...">
                                        <?php 
                                            }
                                        ?>                                  
                                    </div>                                    
                                </div>
                                <div class="form-group perorangan">
                                    <label for="form_name" class="control-label col-lg-4">NPWP Number</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="npwp_number" name="npwp_number" class="form-control" placeholder="No NPWP...">
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
                                                data-placeholder="Kebangsaan..."
                                                data-url="master_data/m_nationality/getNationality/"
                                                data-value="" 
                                                data-limit="100"
                                                id="nationality_id"
                                                placeholder="Kebangsaan"
                                                class='form-control select2'                                                
                                        >
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group perorangan">
                                    <label for="job_id" class="control-label col-lg-4">Job</label>
                                    <div class="col-lg-8">
                                        <select id="job_id"
                                                name="job_id"
                                                data-ajax="true" 
                                                data-placeholder="Pekerjaan..."
                                                data-url="master_data/m_customer_job/getJob/"
                                                data-value=""
                                                data-limit="100"                                                
                                                placeholder="Pekerjaan"  
                                                class='form-control select2'                                               
                                        >
                                        </select>
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
                                    <label for="form_name" class="control-label col-lg-4">Gender</label>
                                    <div class="col-lg-8">
                                        <select id="gender_id" name="gender_id" placeholder="Pilih Jenis Kelamin" class="form-control">
                                            <option value="" selected="">Jenis Kelamin...</option>
                                            <option value="1">Laki - Laki</option>
                                            <option value="2">Perempuan</option>
                                        </select>
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
                        <hr style="border: 1px solid green;">
                    </div>
                    <!--.end panel-body -->
                    
                    <div class="panel-body" style="margin-top:-35px;">
                        <div class="row">
                            <div class="col-lg-12">
                                <button type="reset" class="btn btn-info btn btn-sm pull-right" style="width:120px;margin-left:10px;">Reset</button>
                                <button type="submit" class="btn btn-info btn btn-sm pull-right" style="width:120px;">Submit</button>
                            </div>
                        </div>                            
                    </div>
                </form>
            </div>
        </div>
    </div>    
</div>