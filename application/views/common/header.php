<div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="<?php echo site_url('dashboard')?>">
                            <img src="<?php echo $this->Home_model->getBsnData('header_logo'); ?>" style="height: 50px;" alt="logo" class="logo-default" /> </a>
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<?php 
                      
                        $profile_img= $this->session->userdata('trgn_prs_img')  == '' ? NO_IMAGE : base_url().PERSON_IMAGE_PATH.$this->session->userdata('trgn_prs_img');?>

                      
                           <img alt="" class="img-circle" src="<?php echo $profile_img?>" />
                                
                                    <span class="username username-hide-on-mobile"> <?php echo $this->session->userdata('trgn_prs_name')?> </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                             
                                <li>
                                    <a href="<?php echo site_url('logout') ?>">
                                        <i class="icon-key"></i> Log Out </a>
                                </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END HEADER INNER -->
            </div>
	    
            <!-- END HEADER -->
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN SIDEBAR -->
                <?php $this->load->view('common/sidebar')?> 
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE BAR/BREADCRUMB -->
                      
                <?php $this->load->view('common/breadcrumb')?> 
                        <!-- END PAGE BAR/BREADCRUMB -->
        