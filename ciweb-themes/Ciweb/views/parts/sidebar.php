<?php
$auth = $this->session->userdata('auth');
//$usr = $this->db->get_where("v_user", array('id' => $auth['id']))->row();
?>
<!-- START PAGE SIDEBAR -->
<div class="page-sidebar scroll page-sidebar-fixed">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="xn-logo">
            <a href=".">
                <span style="font-weight:bold; font-size:13px; font-family:'Arial Black';">
                    MAIN Application
                </span>
                <!-- <small>INDOCEV APP</small> -->
            </a>
            <a href="#" class="x-navigation-control"></a>
        </li>      

        <!-- <li class="xn-title"></li> -->
        <?php /*echo Modules::run('menu/_createMenu_sidebar', $auth['usergroup_id'])*/ ?>         
    </ul>
    <!-- END X-NAVIGATION -->
</div>
<!-- END PAGE SIDEBAR -->