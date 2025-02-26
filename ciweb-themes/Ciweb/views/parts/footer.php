</div>
<!-- END PAGE CONTAINER -->

<!-- MESSAGE BOX-->
<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
            <div class="mb-content">
                <p>Are you sure you want to log out?</p>                    
                <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
                    <button class="btn btn-default btn-lg mb-control-close">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MESSAGE BOX-->

<!-- BLUEIMP PREVIEW IMAGE-->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>
<!-- END BLUEIMP PREVIEW IMAGE-->

<!-- START SCRIPTS -->
<!-- START PLUGINS -->
<!-- <script type="text/javascript" src="assets/themes/js/plugins/jquery/jquery.min.js"></script> -->
<script type="text/javascript" src="assets/themes/js/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="assets/themes/js/plugins/bootstrap/bootstrap.min.js"></script>        
<script type="text/javascript" src="assets/themes/js/plugins/bootstrap/bootstrap-timepicker.min.js" ></script>
<!-- END PLUGINS -->

<!-- START THIS PAGE PLUGINS-->      
<script type='text/javascript' src='assets/themes/js/plugins/icheck/icheck.min.js'></script>        
<script type="text/javascript" src="assets/themes/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
<script type="text/javascript" src="assets/themes/js/plugins/scrolltotop/scrolltopcontrol.js"></script>

<script type="text/javascript" src="assets/themes/js/plugins/morris/raphael-min.js"></script>
<script type="text/javascript" src="assets/themes/js/plugins/morris/morris.min.js"></script>       
<script type="text/javascript" src="assets/themes/js/plugins/rickshaw/d3.v3.js"></script>
<script type="text/javascript" src="assets/themes/js/plugins/rickshaw/rickshaw.min.js"></script>
<script type="text/javascript" src="assets/themes/js/plugins/owl/owl.carousel.min.js"></script>                 
<script type='text/javascript' src='assets/themes/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
<script type='text/javascript' src='assets/themes/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>                
<script type="text/javascript" src="assets/themes/js/plugins/moment.min.js"></script>
<script type="text/javascript" src="assets/themes/js/plugins/fileinput/fileinput.min.js"></script>
<!-- END THIS PAGE PLUGINS-->        

<!-- highcharts -->
<!-- <script type="text/javascript" src="assets/themes/js/plugins/highcharts/highcharts.js'"></script>
<script type="text/javascript" src="assets/themes/js/plugins/highcharts/series-label.js'"></script>
<script type="text/javascript" src="assets/themes/js/plugins/highcharts/exporting.js'"></script>
<script type="text/javascript" src="assets/themes/js/plugins/highcharts/export-data.js'"></script>
<script type="text/javascript" src="assets/themes/js/plugins/highcharts/accessibility.js'"></script> -->

<!-- tableHeadFixer -->
<script type="text/javascript" src="assets/themes/js/plugins/tableheadfixer/tableHeadFixer.js"></script>

<script type="text/javascript" src="assets/themes/js/plugins.js"></script>        
<script type="text/javascript" src="assets/themes/js/actions.js"></script>

<!-- BLUEIMP PREVIEW IMAGE-->
<script type="text/javascript" src="assets/themes/js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>
<script>            
    if ( typeof(document.getElementById('links')) != 'undefined' && document.getElementById('links') != null ) {        
        document.getElementById('links').onclick = function (event) {
            event = event || window.event;
            var target = event.target || event.srcElement;
            var link = target.src ? target.parentNode : target;
            var options = {index: link, event: event,onclosed: function(){
                    setTimeout(function(){
                        $("body").css("overflow","");
                    },200);                        
                }};
            var links = this.getElementsByTagName('a');
            blueimp.Gallery(links, options);
        };
    }    
</script>
<!-- END BLUEIMP PREVIEW IMAGE-->

<!-- END TEMPLATE -->
<script src="assets/libs/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="assets/libs/datatables/js/dataTables.responsive.js" type="text/javascript"></script>
<script src="assets/libs/datatables/plugins/Api/average().js" type="text/javascript"></script>
<script src="assets/libs/datatables/plugins/Api/sum().js" type="text/javascript"></script>
<script src="assets/libs/jquery.mousewheel.js" type="text/javascript"></script>
<script src="assets/libs/alertify/js/alertify.min.js" type="text/javascript"></script>
<script src="assets/libs/select2/js/select2.min.js" type="text/javascript"></script>
<script src="assets/libs/form-validator/jquery.form-validator.min.js" type="text/javascript"></script>
<script src="assets/libs/form-validator/custom-validation.js" type="text/javascript"></script>
<script src="assets/libs/datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="assets/libs/input-mask/jquery.inputmask.js" type="text/javascript"></script>
<script src="assets/libs/input-mask/jquery.inputmask.numeric.extensions.js" type="text/javascript"></script>
<script src="assets/libs/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/themes/js/plugins/daterangepicker/daterangepicker.js"></script>
<script src="assets/themes/js/disabled.js" type="text/javascript"></script>
<script src="assets/libs/js.cookie.js" type="text/javascript"></script>
<script src="assets/js/webapp.js" type="text/javascript"></script>
<script src="assets/libs/crypto-js/3.1.9-1/crypto-js.js" type="text/javascript"></script>
<?php
if (isset($jsfiles) && is_array($jsfiles)) {
    foreach ($jsfiles as $file) {
        echo '<script src="assets/js/modules/' . $modules . '/' . $file . '.js" type="text/javascript"></script>';
    }
}
?>

<script type="text/javascript">
    //set timezone
    <?php date_default_timezone_set('Asia/Jakarta'); ?>
    //buat object date berdasarkan waktu di server
    var serverTime = new Date(<?php print date('Y, m, d, H, i, s, 0'); ?>);
    //buat object date berdasarkan waktu di client
    var clientTime = new Date();
    //hitung selisih
    var Diff = serverTime.getTime() - clientTime.getTime();
    //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
    function displayServerTime(){
        //buat object date berdasarkan waktu di client
        var clientTime = new Date();
        //buat object date dengan menghitung selisih waktu client dan server
        var time = new Date(clientTime.getTime() + Diff);
        //ambil nilai jam
        var sh = time.getHours().toString();
        //ambil nilai menit
        var sm = time.getMinutes().toString();
        //ambil nilai detik
        var ss = time.getSeconds().toString();
        //tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
        document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
    }
</script>
<!-- END SCRIPTS -->         
</body>
</html>