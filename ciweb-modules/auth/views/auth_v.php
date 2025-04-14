<!DOCTYPE html>
<html lang="en" class="body-full-height">
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
        <link href="assets/libs/alertify/css/alertify.core.css" rel="stylesheet" type="text/css"/>
        <link href="assets/libs/alertify/css/alertify.bootstrap.css" rel="stylesheet" type="text/css"/>

        <link href="assets/css/login.css" rel="stylesheet">
        <!-- EOF CSS INCLUDE -->    

    </head>
    <body oncontextmenu="return false">        
        <div class="login-container">
            <div class="layer">
                <div class="login-box animated">
                    <div class="login-body">                    
                        <!-- <div class="imgcontainer">
                            <img src="assets/img/avatar.png" alt="Avatar" class="avatar">                        
                        </div> -->
                        <div class="login-title" style="text-align:left">                        
                            <h2 style="color:green; font-weight:bold; font-size:22px; font-family:'Arial Black';">
                                INDOCEV
                                <!-- <small style="color:#000;">Application</small> -->
                            </h2> 
                            <p style="color: #33414e; font-size: 14px; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;margin-top: -15px;">
                                PT. Indonesia Central Valutamas <br>
                            </p>                        
                        </div>
                        <form class="form-horizontal" id="frmLogin" autocomplete="off">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" id="username" autofocus="" name="username" class="form-control" placeholder="Username"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="password" id="password" name="password"  class="form-control" placeholder="Password"/>
                                    <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">                            
                                    <button type="submit" class="btn btn-info btn-block">Login</button>
                                </div>
                            </div>
                            <div class="login-footer">
                                <div>
                                    <font style='color:#000;'> &copy; 2025 - All Rights Reserved</font>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="assets/libs/jquery/jquery.min.js" type="text/javascript"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/themes/js/disabled.js" type="text/javascript"></script>
        <script src="assets/libs/alertify/js/alertify.min.js" type="text/javascript"></script>
        <script src="assets/js/modules/auth/auth.js" type="text/javascript"></script>        
    </body>
</html>






