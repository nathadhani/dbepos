<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="<?php echo base_url(); ?>"/>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="BKS Application">
        <meta name="author" content="BKS">
        <meta name="keyword" content="BKS Application">
        <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->
        <title>BKS :::... Update Password</title>
        <!-- Main styles for this application -->
        <link href="assets/themes/css/theme-default.css" rel="stylesheet">
        <link href="assets/css/login.css" rel="stylesheet">
        <link href="assets/libs/alertify/css/alertify.core.css" rel="stylesheet" type="text/css"/>
        <link href="assets/libs/alertify/css/alertify.bootstrap.css" rel="stylesheet" type="text/css"/>
    </head>
    <body class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4">
                    <div class="card-group vamiddle">
                        <div class="card  p-a-2 login-box-body">
                            <div class="card-block">
                                <form id="frmLogin">
                                    <div style="margin-bottom:20px;text-align: center"><img src="assets/themes/img/logo-grey@2x.png"></div>
                                    <p class="text-muted">ERP Application :: Update Password</p>
                                    <div class="input-group m-b-2">
                                        <span class="input-group-addon"><i class="icon-lock"></i></span>
                                        <input name="password"  type="password" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="input-group m-b-2">
                                        <span class="input-group-addon"><i class="icon-lock"></i></span>
                                        <input  type="password" class="form-control" placeholder="Retype Password">
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <button id="update" type="submit" class="btn btn-primary p-x-2">Update</button>
                                            <button type="reset" class="btn btn-default p-x-2">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap and necessary plugins -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/modules/auth/auth.js"></script>
        <script src="assets/libs/alertify/js/alertify.min.js" type="text/javascript"></script>
    </body>
</html>