<?php
    $auth = $this->session->userdata('auth');
    $usergroup_id = $auth['usergroup_id'];
    $store_id = $auth['store_id']; 
    $api_method = $auth['api_method'];
    // phpinfo();exit;    
?>
<?php echo $template['partials']['header']; ?>
<?php /*echo $template['partials']['sidebar'];*/ ?>

<!-- PAGE CONTENT -->
<div class="page-content">
    <!-- START X-NAVIGATION VERTICAL -->
    <!-- <ul class="x-navigation x-navigation-horizontal x-navigation-panel"> -->
    <ul class="x-navigation x-navigation-horizontal">
        <li class="xn-logo">
            <a href="." title="Back to main">
                <span class="fa fa-home" style="font-size:14px;font-weight:bold;"></span>
                <span style="font-size:14px;font-weight:bold;margin-left:-6px;">
                    Home
                </span>                
            </a>
            <a href="#" class="x-navigation-control"></a>
        </li>

        <?php 
        
            if(!in_array($usergroup_id, array('6'))) {
                $count = $this->db->query("SELECT COUNT(id) AS jumlah FROM auth_menu_group
                                        WHERE usergroup_id = $usergroup_id
                                        AND status = '1' 
                                        LIMIT 1")->result();
                if(isset($count) && ((int) $count[0]->jumlah) > 0) {
        ?>
            <li class="xn-logo">
                <a href="#" title="Menu">
                    <span class="fa fa-minus-square-o" style="font-size:14px;font-weight:bold;"></span>
                    <span style="font-size:14px;font-weight:bold;margin-left:-6px;">              
                        Menu
                    </span>                
                </a>
                <ul>
                    <?php echo Modules::run('menu/_createmenu_top', $auth['usergroup_id']) ?>
                </ul>
            </li>
        <?php 
                } 
            }
        ?>

        <?php        
            if(in_array($usergroup_id, array('2','3','4','5'))) {
        ?>
            <li class="xn-icon-button">
                <a href="user/change_pass" title="Change Password" data-toggle="tooltip" data-placement="bottom"><span class="fa fa-unlock" style="font-size:16px;font-weight:bold;"></span></a>
            </li>
        <?php 
            } 
        ?>

        <!-- For Cashier -->
        <?php         
            if(in_array($usergroup_id, array('5'))) {
        ?>      
            <li class="xn-icon-button">
                <a href="cb/cb_balance" title="Cash / Bank - Balance" data-toggle="tooltip" data-placement="bottom"><span class="fa fa-calculator" style="font-size:16px;font-weight:bold;"></span></a>
            </li>
        <?php 
            } 
        ?>
        <!-- End For Cashier -->


        <!-- For Admin & Counter -->
        <?php 
        
            if(in_array($usergroup_id, array('3','4'))) {
        ?>        
                <li class="xn-icon-button">
                    <a href="stock/stock_calculate" title="Stock - Calculate" data-toggle="tooltip" data-placement="bottom"><span class="fa fa-calculator" style="font-size:16px;font-weight:bold;"></span></a>
                </li>

                <li class="xn-icon-button">
                    <a href="transaction/closing_buysell" title=" Buysell - Closing" data-toggle="tooltip" data-placement="bottom"><span class="fa fa-calendar-check-o" style="font-size:16px;font-weight:bold;"></span></a>
                </li>

                <li class="xn-icon-button">
                    <a href="transaction/transaction_buysell_list" title="Buy / Sell - List" data-toggle="tooltip" data-placement="bottom"><span class="fa fa-list-alt" style="font-size:16px;font-weight:bold;"></span></a>
                </li>                

                <li class="xn-icon-button">
                    <a href="dashboard/dashboard_buysell" title="Buy / Sell - Chart" data-toggle="tooltip" data-placement="bottom">
                        <span class="fa fa-area-chart" style="font-size:16px;font-weight:bold;"></span>
                    </a>
                </li>                
   
                <?php 
                    if($store_id != null){
                        $count = $this->db->query("SELECT COUNT(status) AS jumlah FROM tr_header
                                                WHERE store_id = $store_id
                                                AND status = '1' 
                                                LIMIT 1")->result();
                        if(isset($count) && ((int) $count[0]->jumlah) > 0) {
                ?>
                    <li class="xn-icon-button">
                        <a href="transaction/transaction_buysell_task" title="Buy / Sell - Task" data-toggle="tooltip" data-placement="bottom"><span class="fa fa-comment" style="font-size:16px;font-weight:bold;"></span></a>
                        <div class="informer informer-danger" style="font-size:12px;font-weight:bold;"><?php echo $count[0]->jumlah; ?></div>
                    </li>
                <?php 
                        } 
                    } 
                ?>

                <?php if($api_method === '1'){ ?>            
                    <?php
                        if($store_id != null){
                            $count = $this->db->query("SELECT COUNT(status) AS jumlah FROM v_tr_header
                                                    WHERE  store_id = $store_id
                                                    AND api_method = '1'
                                                    AND status IN (3,4)
                                                    LIMIT 1")->result();
                            if(isset($count) && ((int) $count[0]->jumlah) > 0) {
                    ?>
                        <li class="xn-icon-button">
                            <a href="api/api_ap_input" title="Integrasi ECSys ( Pending )" data-toggle="tooltip" data-placement="bottom">
                                <span class="fa fa-comment" style="font-size:16px;font-weight:bold;"></span>
                            </a>
                            <div class="informer informer-danger" style="font-size:12px;font-weight:bold;"><?php echo $count[0]->jumlah; ?></div>
                        </li>
                    <?php 
                            } 
                        } 
                    ?>
                <?php } ?>     
        <?php } ?>        
        <!-- End For Admin & Counter -->

        <li class="xn-icon-button pull-right">
            <a href="auth/logout" title='Sign Out' style="margin-right: 30px;"><span class="fa fa-sign-out" style="font-size:20px;font-weight:bold;"></span></a>
        </li>        
    </ul>
    <!-- END X-NAVIGATION VERTICAL -->                      

    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <span>
            <?php 
                if(in_array($usergroup_id, array('3','4','5'))) {
            ?>
                <span>
                    Logged in as : <?php echo $auth['fullname'] . ' | Store : ' . $auth['store_address'];?>
                </span>            
            <?php 
                }
                if(in_array($usergroup_id, array('2','6'))) {
            ?>    
                <span>
                    Logged in as : <?php echo $auth['fullname'];?>
                </span>            
            <?php 
                }
            ?>    
            <span class="pull-right"> 
                Today : <?php print dayList(). ', ' . date('d F Y'); ?> 
            </span>
        </span>
    </ul>
    <!-- END BREADCRUMB -->

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <?php echo $template['body']; ?>
    </div>
    <!-- END PAGE CONTENT WRAPPER -->
</div>            
<!-- END PAGE CONTENT -->

<?php echo $template['partials']['footer']; ?>