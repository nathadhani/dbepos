<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="<?php echo base_url(); ?>"/>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Web Application">
        <meta name="author" content="Web Application">
        <meta name="keyword" content="Web Application">
        <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->
        <title>Web Application :: 403</title>
        <!-- Main styles for this application -->
        <link href="assets/themes/css/theme-default.css" rel="stylesheet">
    </head>
    <body class="">
        <div class="container">
            <div class="row">
                <div class="col-md-5 center-block pull-xs-none vamiddle">
                    <div class="clearfix">
                        <h1 class="pull-left display-3 m-r-2">403</h1>
                        <h4 class="p-t-1">You Have No Privilege To Access This.</h4>
                        <p class="text-muted"><div class="btn-group btn-group-justified"><a class="btn btn-info" href="<?php echo base_url();?>">Back To Home</a><a class="btn btn-warning" href="#" onclick="window.history.back()">Return Previous page</a></div></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap and necessary plugins -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.min.js"></script>
        <script>
            function verticalAlignMiddle()
            {
                var bodyHeight = $(window).height();
                var formHeight = $('.vamiddle').height();
                var marginTop = (bodyHeight / 2) - (formHeight / 2);
                if (marginTop > 0)
                {
                    $('.vamiddle').css('margin-top', marginTop);
                }
            }
            $(document).ready(function ()
            {
                verticalAlignMiddle();
            });
            $(window).bind('resize', verticalAlignMiddle);
        </script>


    </body>
</html>