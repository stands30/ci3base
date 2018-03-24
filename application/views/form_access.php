<?php
   if($this->session->userdata('trgn_prs_id')==''){
      $abc = base_url();
        echo '<script> ';
          echo 'window.location="'.$abc.'"';
        echo '</script>';
    }   
?>

<!DOCTYPE html>

<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Form Access | <?php echo $this->Home_model->getBsnData('header_title'); ?>
</title>
      
        <?php $this->load->view('common/header_styles')?>
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url();?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
     

         <link href="<?php echo base_url() ?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />

   </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <!-- BEGIN HEADER -->
         <?php $this->load->view('common/header'); ?>
        
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
 <?php
                  
    if($this->session->userdata('trgn_prs_dpt_id')==ADMIN_DEPARTMENT){
                    ?>
                      <form class="horizontal-form" id="" method="post" action="">
                    <h3 class="page-title">  <label class="col-md-2 control-label" for="form_control_1">Employee</label>

                                                    <div class="input-group col-md-6">
                                                        <div class="input-group-control ">
                                                           <select class="form-control select2" name="USR_id" id="USR_id"><option value="">Please Select</option>
                                             
					                                       <?php 
                                                           global $active_user;
					                                           echo $this->Home_model->getCombo("select prs_id as f1, prs_name as f2  FROM `person`,user where usr_prs_id=prs_id and   usr_status='".ACTIVE_STATUS."' order by f2");
					                                                  ?>
					                                         
					                                       </select>
					                                                            <div class="form-control-focus"> </div>
					                                    </div>
					                                                        <span class="input-group-btn btn-right">
					                                                           
					                                                           <button class="btn green-haze dropdown-toggle" type="button" onclick=" return getReport()">GO</button>
					                                                        </span>
					                                                   
					                                                </div>



                                         
                    </h3>



                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                   
                    <div class="row" >
                        <div class="col-md-12" id="results">
                           
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" id="main_result">
                            
                        </div>
                        <!-- END SAMPLE FORM PORTLET-->
                    </div>
                    </form>
             <?php } else{
                              ?>
                       <h3> Sorry you are not authorized to access this page </h3>
                            <?php } ?>
                </div>
                
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            <a href="javascript:;" class="page-quick-sidebar-toggler">
                <i class="icon-login"></i>
            </a>
        
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
       <?php $this->load->view('common/footer'); ?>
       
        <script>
  var myheader="<?php echo site_url(); ?>";
</script>
       <div>
 <?php $this->load->view('common/footer_scripts')?> 
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
         <script src="<?php echo base_url() ?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
          
          <script src="<?php echo base_url() ?>assets/pages/scripts/components-select2.min.js" type="text/javascript"></script> 
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
       
        <script src="<?php echo base_url() ?>assets/js/form_validation/form_access.js"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>