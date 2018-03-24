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
                                    <span class="caption-subject bold uppercase">Delegate List</span> <div class="btn-group">
                                   <a href="<?php echo site_url('delegate-add')?>">
                                 <button id="newlead" class="btn orange">
                                 Add New <i class="fa fa-plus"></i>
                                 </button>
                                 </a>
                              </div>
                                </div>
                                <div class="tools"> </div>
                            </div>
                            <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover" id="sample_1">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Badge Name</th>
                                            <th>Club</th>
                                            <th>Category</th>
                                            <th>Added On</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach($delegate as $key) { ?>
                                        <tr>
                                          <?php $dgt_id =$this->url_encrypt->encrypt_openssl($key->dgt_id); ?>
                                            <td><a href="<?php echo site_url('delegate-detail-'.$dgt_id)?>"><?php echo $key->prs_code; ?></a></td>
                                            <td><?php echo $key->dgt_bdg_name; ?></td>
                                            <td><?php echo $key->clb_name; ?></td>
                                            <td><?php echo $key->cat_name; ?></td>
                                            <td><?php echo DateTimeDisplay($key->dgt_crtd_dt); ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
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