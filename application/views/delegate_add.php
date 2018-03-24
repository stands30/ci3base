<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
  
    if($this->session->userdata('trgn_prs_id')==''){
       // echo base_url();
      $abc = base_url();
        echo '<script> ';
       // echo $abc;
          echo 'window.location="'.$abc.'"';

        echo '</script>';
    }   
 
?>



<!DOCTYPE html>

<html lang="en">
   
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Tarangan | <?php echo $this->Home_model->getBsnData('header_title'); ?></title>
        <?php $this->load->view('common/header_styles')?> 
        <!-- END THEME LAYOUT STYLES -->
        <!-- Datatable css-->
        <link rel="shortcut icon" href="<?php echo site_url()?>assets/pages/img/favicon.png">
        <link href="<?php echo site_url() ?>assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo site_url() ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo site_url() ?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" /> 
        <!-- Datatable css-->

<style type="text/css">
  .uppercase {
  text-transform: uppercase;
  }
</style>
    </head>
    <!-- END HEAD -->

 <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
   <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
              <?php $this->load->view('common/header')?>  
            <!-- BEGIN PAGE TITLE-->
            <!-- BEGIN CONTENT -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <span class="caption-subject bold uppercase">Add Delegate</span>
                                </div>
                                <div class="tools"> </div>
                            </div>
                            <div class="portlet-body" >
                              <div ng-app="delegateApp" ng-controller="delegateCntrl">
                               <form id="add_delegate"  >
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <input type="hidden" name="" ng-model="base_url" value="<?php echo base_url(); ?>">
                                    <label class="control-label">Club Name <span style="color:red">*</span></label>
                                    <Select class="form-control select2" id="dgt_clb_id" name="dgt_clb_id" required="" ng-model="dgt_clb_id"> 
                                      <?php echo $this->Home_model->getCombo('SELECT clb_id as f1,clb_name as f2 from club_master where clb_status="'.ACTIVE_STATUS.'" '); ?>
                                    </Select>
                                    <span class="error"></span>
                                  </div> 
                                </div> 
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="control-label">Badge Name <span style="color:red">*</span></label> 
                                    <input class="form-control uppercase" type="text"  id="dgt_bdg_name" name="dgt_bdg_name" required="" ng-model="dgt_bdg_name">
                                </div>                             
                              </div>
                             </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="control-label">Delegate Name <span style="color:red">*</span></label>
                                    <input class="form-control" type="text" id="prs_name" name="prs_name" required="" ng-model="prs_name">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="control-label">Mobile No.</label>
                                    <input class="form-control" type="text" id="prs_mob" name="prs_mob"  onkeypress="return isNumber(event)" ng-model="prs_mob">
                                  </div>
                                </div>                             
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="control-label">Email</label>
                                    <input class="form-control" type="email" id="prs_email" name="prs_email" ng-model="prs_email">
                                  </div>
                                </div>                                 
                                <div class="row">
                                  <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="control-label">Category <span style="color:red">*</span></label>
                                    <Select class="form-control select2" id="dgt_cat_id" name="dgt_cat_id" required="" ng-model="dgt_cat_id">
                                     <?php echo $this->Home_model->getCombo('SELECT gnp_value as f1,gnp_name as f2 from gen_prm where gnp_status="'.ACTIVE_STATUS.'" and gnp_group="'.DELEGATE_GEN_PRM.'"'); ?>
                                    </Select>
                                  </div>
                                </div> 
                                </div> 
                                <div class="col-md-6">
                                  <div class="form-group">
                                        <input type="hidden" id="dgt_prs_id" name="dgt_prs_id" value="0">
                                   <!-- <label class="control-label">Delegate</label>
                                    <Select class="form-control select2" id="dgt_prs_id" name="dgt_prs_id">
                                     <?php //echo $this->Home_model->getCombo('SELECT dgt_prs_id as f1,(SELECT prs_name from person where prs_id=dgt_prs_id and prs_status="'.ACTIVE_STATUS.'") as f2 from delegate where dgt_status="'.ACTIVE_STATUS.'" '); ?>
                                    </Select> -->
                                  </div>
                                </div>                                                           
                              </div>
                              <div class="row">
                                   <div class="col-md-6">
                                      <div class="form-group">
                                         <label class="control-label">Password <span style="color:red">*</span></label>
                                         <input type="password" class="form-control" id="prs_password" name="prs_password" required ng-model="prs_password"> 
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                      <div class="form-group">
                                         <label class="control-label">Confirm Password <span style="color:red">*</span></label>
                                         <input type="password" class="form-control" id="cnfm_password" name="cnfm_password" equalto="#prs_password" required> 
                                      </div>
                                   </div>
                                </div>                         
                                   <div class="form-actions noborder">
                                  <input type="submit" class="btn blue" id="submit" value="Submit" ng-click="dgtAdd()">
                                  <button type="button" class="btn btn-button bunker-color-bg white btn-hover" name="processing" id="processing" style="display:none"> <i class="fa fa-spinner fa-spin" style="font-size:18px"></i>Processing</button>
                                  <button type="button" class="btn default">Cancel</button>
                              </div>
                            </form> 
                              </div>
                            
                        </div>
                    </div>
                </div>
            <!-- END PAGE CONTENT -->
            <?php $this->load->view('common/footer')?> 
            <!-- END FOOTER -->
        </div>
        
       <?php $this->load->view('common/footer_scripts')?> 
      <!-- scripts to add datatable -->
      <script src="<?php echo site_url() ?>assets/global/scripts/datatable.js" type="text/javascript"></script>
      <script src="<?php echo site_url() ?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
      <script src="<?php echo site_url() ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
      <script src="<?php echo site_url() ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
       <!-- END PAGE LEVEL PLUGINS -->
       <!-- BEGIN PAGE LEVEL SCRIPTS -->
       <!-- script to call datatable with buttons -->
      <script src="<?php echo site_url() ?>assets/pages/scripts/table-datatables-buttons.js" type="text/javascript"></script>
      <!-- <script src="<?php echo site_url() ?>assets/js/form_validation/delegate_add.js" type="text/javascript"></script> -->
      <script src="<?php echo site_url() ?>assets/angular/dgt_add.js" type="text/javascript"></script>
    <script type="text/javascript">
          function isNumber(event) {
    var key = window.event ? event.keyCode : event.which;
    if (event.keyCode == 8 || event.keyCode == 46 || event.keyCode == 37 || event.keyCode == 39) {
    return true;
    } else if (key < 48 || key > 57) {
    return false;
    } else return true;
    };
    </script>
    </body>

</html>