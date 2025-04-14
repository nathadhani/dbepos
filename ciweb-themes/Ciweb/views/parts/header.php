<!DOCTYPE html>
<html lang="en">
    <head>     
        <base href="<?php echo base_url(); ?>"/>
        <!-- META SECTION -->
        <title>INDOCEV App</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="assets/img/logo.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link id="theme" href="assets/themes/css/theme-default.css" rel="stylesheet" type="text/css"/>
        <link href="assets/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/libs/alertify/css/alertify.core.css" rel="stylesheet" type="text/css"/>
        <link href="assets/libs/alertify/css/alertify.bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/libs/datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="assets/libs/datatables/css/dataTables.responsive.css">
        <?php
        if (isset($cssfiles) && is_array($cssfiles)) {
            foreach ($cssfiles as $file) {
                ?>
                <link href="<?php echo 'assets/css/modules/' . $modules . '/' . $file . '.css'; ?>" rel="stylesheet" type="text/css"  />
                <?php
            }
        }
        ?>
        <link href="assets/css/webapp.css" rel="stylesheet" type="text/css"/>
        <!-- EOF CSS INCLUDE -->
        <script type="text/javascript">var baseUrl = '<?php echo base_url(); ?>';</script>
        <script type="text/javascript" src="assets/themes/js/plugins/jquery/jquery.min.js"></script>
    </head>
    <body oncontextmenu="return true">
        <!-- START PAGE CONTAINER -->
        <!-- <div class="page-container page-navigation-top-fixed"> -->
        <div class="page-container page-navigation-top">
        <div class="ajax-loader">
            <img src="assets/img/loading1.gif" class="img-responsive"/>        
        </div>
        
 
        