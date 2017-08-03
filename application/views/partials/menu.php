<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <!-- User -->
        <div class="user-box">
            <div class="user-img">
                <? echo getProfileImage($this->session->userdata('profile'), 'alt="user-img" title="'.$this->session->userdata('firstname').'" class="img-circle img-thumbnail img-responsive" width="100" height="100"') ?>

            </div>
            <h5><a href="#"><?  ?></a> </h5>
            <ul class="list-inline">
                <li>
                    <a href="#" title="Settings">
                        <i class="zmdi zmdi-settings"></i>
                    </a>
                </li>

                <li>
                    <a href="<?php echo BASEURL ?>welcome/logout" title="Logout" class="text-custom">
                        <i class="zmdi zmdi-power"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- End User -->

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul>
                <li class="text-muted menu-title">Navigation</li>

                <li>
                    <a href="<?php echo BASEURL; ?>dashboard" class="waves-effect <?php if($this->uri->segment(1)=="dashboard"){echo "active";}?>"><i class="zmdi zmdi-view-dashboard"></i> <span> Dashboard </span> </a>
                </li>

                <li>
                    <a href="<?php echo BASEURL; ?>user" class="waves-effect <?php if($this->uri->segment(1)=="user"){echo "active";}?>"><i class="zmdi zmdi-accounts"></i> <span> Users </span> </a>
                </li>

                <li>
                    <a href="<?php echo BASEURL; ?>service" class="waves-effect <?php if($this->uri->segment(1)=="service"){echo "active";}?>"><i class="zmdi zmdi-calendar"></i><span> Services </span></a>
                </li>

                <li>
                    <a href="#" class="waves-effect"><i class="zmdi zmdi-album"></i><span> About Us </span></a>
                </li>

                <li>
                    <a href="<? echo BASEURL; ?>enquiry" class="waves-effect <?php if($this->uri->segment(1)=="enquiry"){echo "active";}?>"><i class="zmdi zmdi-laptop-mac"></i><span> Enquiries </span></a>
                </li>

                <li>
                    <a href="#" class="waves-effect"><i class="zmdi zmdi-email"></i><span> Careers </span></a>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect <?php if($this->uri->segment(1)=="setup"){echo "active";}?>">
                        <i class="zmdi zmdi-settings"></i> <span> Setups </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li class="<?php if($this->uri->segment(2)=="contact_details"){echo "active";}?>">
                            <a href="<? echo BASEURL ?>setup/contact_details">Contact Details</a></li>
                        <li class="<?php if($this->uri->segment(2)=="home"){echo "active";}?>">
                            <a href="<? echo BASEURL ?>setup/home">Home</a></li>
                        <li class="<?php if($this->uri->segment(2)=="content"){echo "active";}?>">
                            <a href="<? echo BASEURL ?>setup/content">Content</a></li>
                        <li class="<?php if($this->uri->segment(2)=="departments"){echo "active";}?>">
                            <a href="<? echo BASEURL ?>setup/departments">Departments</a></li>
                    </ul>
                </li>

            </ul>
            <div class="clearfix"></div>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>

</div>
<!-- Left Sidebar End -->