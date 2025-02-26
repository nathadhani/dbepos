<?php
    $auth = $this->session->userdata('auth');
    $usergroup_id = $auth['usergroup_id'];
    $company_id = $auth['company_id']; 
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
        <li class="xn-icon-button">
            <a href="user/change_pass" title="Change Password" data-toggle="tooltip" data-placement="bottom"><span class="fa fa-unlock"></span></a>                        
        </li>

        <?php 
            if(!in_array($usergroup_id, array('1','2'))) {
        ?>
            <li class="xn-icon-button">
                <a href="stock/stockcalculate" title="Calculate Stock" data-toggle="tooltip" data-placement="bottom"><span class="fa fa-calculator"></span></a>
            </li>
            <li class="xn-icon-button">
                <a href="master_data/rate_daily" title="Rate by Date" data-toggle="tooltip" data-placement="bottom"><span class="fa fa-wrench"></span></a>
            </li>
            <li class="xn-icon-button">
                <a href="dashboard/dashboard" title="Chart" data-toggle="tooltip" data-placement="bottom"><span class="fa fa-area-chart"></span></a>
            </li>
            <li class="xn-icon-button">
                <a href="transaction/transaction_buysell_task" title="Buy / Sell - Task" data-toggle="tooltip" data-placement="bottom"><span class="fa fa-comment"></span></a>
                <?php 
                    if($company_id != null){
                        $count = $this->db->query("SELECT COUNT(status) AS jumlah FROM tr_header
                                                WHERE company_id = $company_id
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
            <li class="xn-icon-button">
                <a href="api/api_transaction_input" title="API Pending" data-toggle="tooltip" data-placement="bottom"><span class="fa fa-comment"></span></a>
                <?php
                    if($company_id != null){
                        $count = $this->db->query("SELECT COUNT(status) AS jumlah FROM v_tr_header
                                                WHERE  company_id = $company_id 
                                                AND api_method = '1'
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
        <?php }  ?>

        <li class="xn-icon-button pull-right">
            <a href="auth/logout" title='Sign Out'><span class="fa fa-sign-out" style="font-size:20px;font-weight;bold;"></span></a>
        </li>
    </ul>
    <!-- END X-NAVIGATION VERTICAL -->                      

    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <!-- <li>
            <a href=".">Main Menu</a>
        </li>
        <?php if (isset($tsmall)) echo '<li class="">' . $tsmall . '</li>';?>
        <?php if (isset($tparent)) echo '<li class="">' . $tparent . '</li>';?>
        <li class="">
            <?php if (isset($template['title'])) echo $template['title'];?>
        </li> -->
        <?php 
            if( $usergroup_id != 1) {
        ?>
            <span>
                welcome : <?php echo $auth['fullname'] . ' | ' . $auth['company_address'];?>
            </label>
            <span class="pull-right"> 
                Today : <?php print dayList(). ', ' . date('d F Y'); ?> 
            </span>
        <?php 
            }
        ?>    
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