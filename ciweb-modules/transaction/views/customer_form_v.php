<script type="text/javascript">
    $("body").data("id", <?php echo $this->uri->segment(4);?>);
    $("body").data("user_id", <?php echo $auth['id'];?>);
    $("body").data("usergroup_id", <?php echo $auth['usergroup_id'];?>);
    var text_celluler = <?php echo "'" . str_replace('%20',' ',$this->uri->segment(5)) ."'";?>;
</script>
<?php 
    $img_file = '';
    $image_url = '';
    if(isset($data_customer[0]->customer_code)) {
        $img_file = "assets/arsip/customer/" . $data_customer[0]->customer_code . ".jpg";
        $image_url = base_url($img_file);
    }
?>
<div class="page-content-wrap">    
    <form id="mainForm" method="post" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
        <div class="row">   
            <div class="col-md-12">
                <div class="panel panel-default">                
                    <div class="panel-heading ui-draggable-handle">
                        <div class="panel-title-box">
                            <h3>Customer Form / <strong id="ftitle"></strong></h3>
                        </div>
                        <ul class="panel-controls">
                            <button type="submit" class="btn btn-info" style="width:140px;margin-left:10px;">Submit</button>
                            <button type="reset" class="btn btn-info" style="width:140px;margin-left:10px;">Reset</button>
                            <button id="btn-buysell" class="btn btn-info" style="width:140px;margin-left:10px;">Buy / Sell - New</button>
                        </ul>
                    </div>                    
                    <div class="panel-body"> 
                        <div class="row">
                            <div class="col-md-4">
                                <table class="table" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top-style: hidden;">
                                    <tr>    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            CIF
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">    
                                            <input type="text" id="customer_code" name="customer_code" class="form-control" readonly>
                                        </td>                                        
                                    </tr>
                                    <tr>    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            Type <strong style="color:red;font-weight:bold;font-size:18px;">*</strong>
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
                                                    data-validation="required"
                                            >
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            Full Name <strong style="color:red;font-weight:bold;font-size:18px;">*</strong>
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">                                            
                                            <input type="text" id="customer_name" name="customer_name" class="form-control" placeholder="Nama Lengkap..." data-validation="required">
                                        </td>
                                    </tr>
                                    <tr class="perorangan">    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            Call Name
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">                                            
                                            <input type="text" id="customer_nick_name" name="customer_nick_name" class="form-control" placeholder="Nama Panggilan...">
                                        </td>
                                    </tr> 
                                    <tr>    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            Celluler <strong style="color:red;font-weight:bold;font-size:18px;">*</strong>
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
                                            NPWP
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">                                            
                                            <input type="text" id="npwp_number" name="npwp_number" class="form-control" placeholder="Nomor NPWP...">
                                        </td>
                                    </tr>
                                </table> 
                            </div>                            
                            <div class="col-md-4 batas-kiri perorangan">
                                <table class="table" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top-style: hidden;">
                                    <tr class="perorangan">
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            ID photo
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">
                                            <div class="col-md-2" style="margin-left:-12px;">
                                                <a class="file-input-wrapper btn btn-info">
                                                    <span class="fa fa-upload"></span>
                                                    <input type="file" id="upload_foto" name="upload_foto" class="form-control" accept="image/*">
                                                </a>               
                                            </div>
                                            <?php
                                                if (file_exists($img_file)) {
                                            ?>            
                                                <div class="col-md-10">
                                                    <div id="links" class="col-lg-12">
                                                        <a class="gallery-item" href="<?=$image_url?>" data-gallery>
                                                            <div class="image">
                                                                <img src="<?=$image_url?>" alt="" style="height:100%; width:100%;"/>
                                                            </div>
                                                        </a>
                                                    </div>                 
                                                </div>
                                            <?php 
                                                }
                                            ?>                                            
                                        </td>
                                    </tr>
                                    <tr class="perorangan">    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            ID Type <strong style="color:red;font-weight:bold;font-size:18px;">**</strong>
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
                                    <tr class="perorangan">    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            ID Number <strong style="color:red;font-weight:bold;font-size:18px;">**</strong>
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">                                                                                        
                                            <input type="text" id="customer_data_number" name="customer_data_number" class="form-control" placeholder="Nomor Identitas...">                                                
                                        </td>
                                    </tr>
                                    <tr class="perorangan">    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            Nationality <strong style="color:red;font-weight:bold;font-size:18px;">**</strong>
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
                                    <tr class="perorangan">    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            Job <strong style="color:red;font-weight:bold;font-size:18px;">*</strong>
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
                                    <tr class="perorangan">    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            Gender <strong style="color:red;font-weight:bold;font-size:18px;">**</strong>
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">    
                                            <select id="gender_id" name="gender_id" placeholder="Pilih Jenis Kelamin" class="form-control">
                                                <option value="" selected="">Jenis Kelamin...</option>
                                                <option value="1">Laki - Laki</option>
                                                <option value="2">Perempuan</option>
                                            </select>
                                        </td>                                        
                                    </tr>
                                    <tr class="perorangan">    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            Birth Place <strong style="color:red;font-weight:bold;font-size:18px;">**</strong>
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">                                            
                                            <input type="text" id="placeofbirth" name="placeofbirth" class="form-control" placeholder="Tempat Lahir...">
                                        </td>
                                    </tr>
                                    <tr class="perorangan">    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            Birth Date <strong style="color:red;font-weight:bold;font-size:18px;">**</strong>
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">                                            
                                            <input type="text" id="bornday" name="bornday" placeholder="Tanggal Lahir ..." class="form-control dp" data-date-format="DD MMMM YYYY" style="width:100px;" value="">
                                        </td>
                                    </tr>                                                                                                           
                                </table> 
                            </div>
                            <div class="col-md-4 batas-kiri">
                                <table class="table" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top-style: hidden;">                                    
                                    <tr class="non-perorangan">    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            License number
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">                                                                                        
                                            <input type="text" id="permit_number" name="permit_number" class="form-control" placeholder="Nomor Ijin Usaha...">                                                
                                        </td>
                                    </tr>
                                    <tr class="non-perorangan">    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            License validity date
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">                                            
                                            <div class="input-group" style="margin-left:-11px;">
                                                <span class="input-group-addon">
                                                    <input type="text" id="permit_date_start" name="permit_date_start" placeholder="Periode Awal..." class="form-control dp" data-date-format="DD MMMM YYYY" style="width:100px;" value="">
                                                    <div class="col-lg-2">
                                                        s/d
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <input type="text" id="permit_date_end" name="permit_date_end" placeholder="Periode Akhir..." class="form-control dp" data-date-format="DD MMMM YYYY" style="width:100px;" value="">
                                                    </div>    
                                                </span>                                                
                                            </div>                                            
                                        </td>
                                    </tr>
                                    <tr>    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            Address <strong style="color:red;font-weight:bold;font-size:18px;">*</strong>
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">    
                                            <textarea rows="2" cols="50" id="customer_address" name="customer_address" class="form-control" placeholder="Alamat..." data-validation="required"></textarea>
                                        </td>                                        
                                    </tr>
                                    <tr class="perorangan">    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            RT / RW
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">    
                                            <input type="text" id="rt_rw" name="rt_rw" class="form-control" placeholder="RT / RW...">
                                        </td>                                        
                                    </tr>
                                    <tr class="perorangan">    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            Village
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">    
                                            <input type="text" id="village" name="village" class="form-control" placeholder="Kelurahan / Desa...">
                                        </td>                                        
                                    </tr>
                                    <tr class="perorangan">    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            Subdistrict
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">    
                                            <input type="text" id="sub_district" name="sub_district" class="form-control" placeholder="Kecamatan...">
                                        </td>                                        
                                    </tr>
                                    <tr class="perorangan">    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            City
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">    
                                            <input type="text" id="city" name="city" class="form-control" placeholder="Kabupaten / Kota...">
                                        </td>                                        
                                    </tr>
                                    <tr class="perorangan">    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            Character
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">
                                            <textarea rows="1" cols="50" id="customerprofil" name="customerprofil" class="form-control" placeholder="Karakter Pelanggan..."></textarea>                                             
                                        </td>                                        
                                    </tr>                                                                        
                                    <tr>    
                                        <td width="28%" style="border-bottom-style: hidden;">
                                            Status
                                        </td>
                                        <td width="72%" style="border-bottom-style: hidden;">    
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <input type="checkbox" name="status" id="status" class="icheckbox_minimal-grey checked" checked/>
                                                </span>
                                                <span class="form-control">Active</span>
                                            </div>
                                        </td>                                        
                                    </tr>
                                </table>
                            </div>                 
                        </div>
                    </div>              
                    <!--.end panel-body -->                    
                </div>                
            </div>
        </div>        
    </form>    
</div>