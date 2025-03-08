<?php
    $auth = $this->session->userdata('auth');
    $usergroup_id = $auth['usergroup_id'];
    $store_id = $auth['store_id']; 
    $api_method = $auth['api_method'];
    // phpinfo();exit;    
?>
<?php echo $template['partials']['header']; ?>
<?php echo $template['partials']['sidebar']; ?>

<!-- PAGE CONTENT -->
<div class="page-content">
    <!-- START X-NAVIGATION VERTICAL -->
    <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
        <!-- TOGGLE NAVIGATION -->
        <li class="xn-icon-button">
            <a href="#" class="x-navigation-minimize" title="Minimize"><span class="fa fa-dedent"></span></a>
        </li>
        <!-- END TOGGLE NAVIGATION -->        

        <!-- For Admin & Counter -->
        <?php 
        
            if(in_array($usergroup_id, array('3','4'))) {
        ?>
                <li class="xn-icon-button">
                    <a href="dashboard/dashboard_buysell" title="Buy / Sell Chart" data-toggle="tooltip" data-placement="bottom"><span class="fa fa-area-chart"></span></a>
                </li>
                <li class="xn-icon-button">
                    <a href="transaction/transaction_buysell_task" title="Buy / Sell - Task" data-toggle="tooltip" data-placement="bottom"><span class="fa fa-comment"></span></a>
                    <?php 
                        if($store_id != null){
                            $count = $this->db->query("SELECT COUNT(status) AS jumlah FROM tr_header
                                                    WHERE store_id = $store_id
                                                    AND status = '1' 
                                                    LIMIT 1")->result();
                            if(isset($count)) {
                    ?>
                        <div class="informer informer-warning"><?php echo $count[0]->jumlah; ?></div>
                    <?php
                        } else {
                    ?>
                        <div class="informer informer-warning">0</div>
                    <?php 
                            } 
                        } 
                    ?>        
                </li>
                <?php                    
                    if($api_method === '1'){
                ?>            
                    <li class="xn-icon-button">
                        <a href="api/api_ap_input" title="Integrasi ECSys ( Pending )" data-toggle="tooltip" data-placement="bottom"><span class="fa fa-comment"></span></a>
                        <?php
                            if($store_id != null){
                                $count = $this->db->query("SELECT COUNT(status) AS jumlah FROM v_tr_header
                                                        WHERE  store_id = $store_id
                                                        AND api_method = '1'
                                                        AND status = '3'
                                                        LIMIT 1")->result();
                                if(isset($count)) {
                        ?>
                            <div class="informer informer-warning"><?php echo $count[0]->jumlah; ?></div>
                        <?php
                            } else {
                        ?>
                            <div class="informer informer-warning">0</div>
                        <?php 
                                } 
                            } 
                        ?>        
                    </li> 
        <?php 
                }
            }  
        ?>        
        <!-- End For Admin & Counter -->

        <li class="xn-icon-button pull-right">
            <a href="auth/logout" title='Sign Out'><span class="fa fa-sign-out" style="font-size:20px;font-weight;bold;"></span></a>
        </li>        
    </ul>
    <!-- END X-NAVIGATION VERTICAL -->                      

    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <!-- <li> -->
            <!-- <a href=".">Main Menu</a> -->
        <!-- </li> -->
        <!-- <?php if (isset($tsmall)) echo '<li class="">' . $tsmall . '</li>';?> -->
        <!-- <?php if (isset($tparent)) echo '<li class="">' . $tparent . '</li>';?> -->
        <!-- <li class=""> -->
            <!-- <?php if (isset($template['title'])) echo $template['title'];?> -->
        <!-- </li> -->

        <?php 
            if(!in_array($usergroup_id, array('1','2','6'))) {
        ?>
            <span>
                Logged in as : <?php echo $auth['fullname'] . ' | Store : ' . $auth['store_address'];?>
            </span>            
        <?php 
            }
        ?>    
        <span class="pull-right"> 
            Today : <?php print dayList(). ', ' . date('d F Y'); ?> 
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