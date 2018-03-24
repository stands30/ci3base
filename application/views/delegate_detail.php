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
        <title>Delegate Detail | <?php echo $this->Home_model->getBsnData('header_title'); ?></title>
        <?php $this->load->view('common/header_styles')?> 
        <!-- END THEME LAYOUT STYLES -->
        <!-- Datatable css-->
        <link rel="shortcut icon" href="<?php echo site_url()?>assets/pages/img/favicon.png">
        <link href="<?php echo site_url() ?>assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo site_url() ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo site_url() ?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" /> 
        <!-- Datatable css-->
    </head>
    <!-- END HEAD -->

 <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
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
                                    <span class="caption-subject bold uppercase"></span> Delegate Details  <div class="btn-group">
                                   <a href="<?php echo site_url('delegate-add')?>">
<!--                                  <button id="newlead" class="btn orange">
                                 Add New <i class="fa fa-plus"></i>
                                 </button> -->
                                 </a>
                              </div>
                                </div>
                                <div class="tools">
                                <h style="font-size: 13px;color: #999;">Created on : <?php echo DateTimeDisplay($delegate->dgt_crtd_dt); ?></h>
                                 </div>
                            </div>
                            <div class="portlet-body detail">
                                <table class="table table-bordered " id="">
                                    <tr>
                                      <td>Code</td>
                                      <td><?php echo $delegate->prs_code; ?></td>
                                      <td>Badge Name</td>
                                      <td><?php echo $delegate->dgt_bdg_name; ?></td>
                                      <td>Name</td>
                                      <td><?php echo $delegate->prs_name; ?></td>
                                    </tr>
                                    <tr>
                                      <td>Club</td>
                                      <td><?php echo $delegate->clb_name; ?></td>
                                      <td>Category</td>
                                      <td><?php echo $delegate->cat_name; ?></td>
                                      <td>Mobile</td>
                                      <td><?php echo $delegate->prs_mob; ?></td>
                                    </tr>
                                    <tr>
                                      <td>Email</td>
                                      <td><?php echo $delegate->prs_email; ?></td>
                                      <td>Password</td>
                                      <td><?php echo $this->url_encrypt->decrypt_openssl($delegate->prs_password); ?></td>
                                       <?php if( $delegate->dgt_dgt_name != '') { ?>
                                      <td>Delegate</td>
                                      <td><?php echo $delegate->dgt_dgt_name; ?></td>
                                      <?php } ?>
                                    </tr>
                                    <tr>
                                     <?php if( $delegate->dgt_qr_code != '') { ?>
                                      <td>Qr Code</td>
                                      <td><a href="<?php echo base_url().DELEGATE_QR_CODE_PATH.$delegate->dgt_qr_code; ?>" download=""><img src="<?php echo base_url().DELEGATE_QR_CODE_PATH.$delegate->dgt_qr_code; ?>" ></a></td>
                                      <?php } ?>
                                    </tr>
                                </table>
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
    </body>

</html>