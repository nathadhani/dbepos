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
                <span style="font-weight:bold; font-size:15px; font-family:'Arial Black';color:#37ef0d;">
                    INDOCEV App
                </span>
                <!-- <small>INDOCEV APP</small> -->
            </a>
            <a href="#" class="x-navigation-control"></a>
        </li>      

        <!-- <div class="profile">
            <a href="#" class="profile-image" title="Update Profil" data-toggle="modal" data-target=".modal-upload_profil">
                <img src="assets/img/avatar.png" alt="<?php echo $auth['fullname'];?>">
            </a>
            <div class="profile">
                <div class="profile-data">
                    <div class="profile-data-title"><?php echo $auth['fullname'];?></div>
                    <div class="profile-data-title"><?php echo ucwords(strtolower(trim($auth['usergroupname']))) . ' ( '. ucwords(strtolower(trim($auth['company_city']))) .' )';?></div>
                </div>
            </div>                                                                         
        </div> -->

        <!-- <li class="xn-profile">
            <a href="#" class="profile-mini">
                <img src="assets/img/avatar.png" alt="Users"/>
            </a>
            <div class="profile">
                <div class="profile-image">
                    <img src="assets/img/avatar.png" alt="Users"/>
                </div>
                <div class="profile-data">
                    <div class="profile-data-title">Welcome, <?php echo $auth['fullname']; ?></div>
                </div>
            </div>                                                                        
        </li> -->

        <!-- <li class="xn-title"></li> -->
        <?php echo Modules::run('menu/_createMenu_sidebar', $auth['usergroup_id']) ?>         
    </ul>
    <!-- END X-NAVIGATION -->
</div>
<!-- END PAGE SIDEBAR -->