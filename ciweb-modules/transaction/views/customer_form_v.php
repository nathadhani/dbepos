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
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-lg-2">
                            <a class="file-input-wrapper btn btn-info btn btn-sm"><span class="fa fa-upload"></span>
                                <form id="form_foto" method="post" enctype="multipart/form-data">
                                    <input type="file" name="upload_foto" id="upload_foto" class="form-control" accept="image/*">
                                </form>
                            </a>
                        </div>
                    </div>
                </div>
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
                            <div class="col-md-6">
                                <table class="table" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top-style: hidden;">
                                    <tr>    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            Customer Code
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">    
                                            <div class="input-group">                                        
                                                <span class="input-group-addon">
                                                    <input type="checkbox" name="status" id="status" class="icheckbox_minimal-grey checked" checked/>
                                                </span>
                                                <input type="text" id="customer_code" name="customer_code" class="form-control" style="width:150px;" readonly>
                                            </div>
                                        </td>                                        
                                    </tr> 
                                    <tr>    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            Celluler <strong style="color:red;font-weight:bold;font-size:18px;">**</strong>
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">                                            
                                            <input type="text" id="customer_handphone" name="customer_handphone" class="form-control" placeholder="No Handphone..." data-validation="required">
                                        </td>
                                    </tr>
                                    <tr>    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            Phone
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">                                            
                                            <input type="text" id="customer_phone" name="customer_phone" class="form-control" placeholder="No Telpon Rumah / Kantor...">
                                        </td>
                                    </tr>
                                    <tr>    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            Full Name <strong style="color:red;font-weight:bold;font-size:18px;">**</strong>
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">                                            
                                            <input type="text" id="customer_name" name="customer_name" class="form-control" placeholder="Nama Lengkap...">
                                        </td>
                                    </tr>
                                    <tr>    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            Call Name
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">                                            
                                            <input type="text" id="customer_nick_name" name="customer_nick_name" class="form-control" placeholder="Nama Panggilan...">
                                        </td>
                                    </tr>
                                    <tr>    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            Customer Type <strong style="color:red;font-weight:bold;font-size:18px;">**</strong>
                                        </td>
                                        <td width="78%" style="border-bottom-style: hidden;">                                            
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
                                        </td>
                                    </tr>
                                    <tr>    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            Identity Type
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">                                            
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
                                        </td>
                                    </tr>
                                    <tr>    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            Identity Number
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">                                            
                                            <?php
                                                if (file_exists($img_file)) {
                                            ?>
                                                <div class="input-group">
                                                    <input type="text" id="customer_data_number" name="customer_data_number" class="form-control" placeholder="Nomor Identitas...">
                                                    <span class="input-group-addon"> 
                                                        <a href="<?=$image_url;?>" target="_blank" title="ID photo">
                                                            <span class="fa fa-picture-o"></span>
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
                                        </td>
                                    </tr>
                                    <tr>    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            NPWP Number
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">                                            
                                            <input type="text" id="npwp_number" name="npwp_number" class="form-control" placeholder="Nomor NPWP...">
                                        </td>
                                    </tr>
                                    <tr>    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            Birth Place
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">                                            
                                            <input type="text" id="placeofbirth" name="placeofbirth" class="form-control" placeholder="Tempat Lahir...">
                                        </td>
                                    </tr>
                                    <tr>    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            Birth Date
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">                                            
                                            <input type="text" id="bornday" name="bornday" placeholder="Tanggal Lahir ..." class="form-control dp" data-date-format="DD MMMM YYYY" style="width:100px;" value="<?=date('d-m-Y');?>">
                                        </td>
                                    </tr>
                                    <tr>    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            Nationality
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">                                            
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
                                        </td>
                                    </tr>
                                    <tr>    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            Job
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">                                            
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
                                        </td>
                                    </tr>                                                                                                         
                                </table> 
                            </div> 
                            <div class="col-md-6">
                                <table class="table" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top-style: hidden;">
                                    <tr>
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            ID photo
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">
                                            <div id="links" class="col-lg-10"></div>                                            
                                        </td>
                                    </tr>
                                    <tr>    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            Address <strong style="color:red;font-weight:bold;font-size:18px;">**</strong>
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">    
                                            <textarea rows="2" cols="50" id="customer_address" name="customer_address" class="form-control" placeholder="Alamat..." data-validation="required"></textarea>
                                        </td>                                        
                                    </tr>
                                    <tr>    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            RT / RW
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">    
                                            <input type="text" id="rt_rw" name="rt_rw" class="form-control" placeholder="RT / RW...">
                                        </td>                                        
                                    </tr>
                                    <tr>    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            Subdistrict / Village
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">    
                                            <input type="text" id="village" name="village" class="form-control" placeholder="Kelurahan / Desa...">
                                        </td>                                        
                                    </tr>
                                    <tr>    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            Subdistrict
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">    
                                            <input type="text" id="sub_district" name="sub_district" class="form-control" placeholder="Kecamatan...">
                                        </td>                                        
                                    </tr>
                                    <tr>    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            Regency / City
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">    
                                            <input type="text" id="city" name="city" class="form-control" placeholder="Kabupaten / Kota...">
                                        </td>                                        
                                    </tr>
                                    <tr>    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            Gender
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">    
                                            <select id="gender_id" name="gender_id" placeholder="Pilih Jenis Kelamin" class="form-control">
                                                <option value="" selected="">Jenis Kelamin...</option>
                                                <option value="1">Laki - Laki</option>
                                                <option value="2">Perempuan</option>
                                            </select>
                                        </td>                                        
                                    </tr>
                                    <tr>    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            Customer Nature / Character
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">
                                            <textarea rows="2" cols="50" id="customerprofil" name="customerprofil" class="form-control" placeholder="Sifat Nasabah..."></textarea>                                             
                                        </td>                                        
                                    </tr>                                                                                                                                                                                  
                                </table> 
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