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

<head>
  <meta charset="utf-8" />
  <title>User List | <?php echo $this->Home_model->getBsnData('header_title'); ?>
  </title>
  <?php $this->load->view('common/header_styles')?>
  <link href="<?php echo site_url() ?>assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo site_url() ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />


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
              <span class="caption-subject bold uppercase">User List</span> <div class="btn-group">
               <a href="<?php echo site_url('user-add')?>">
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


               <th > Name </th>
               <th > User Name </th>
               <th> Dept </th> 
               <th> Mobile No  </th>
               <th> Email </th>
               <th> Action </th>
             </tr>
           </thead>
           <tbody>
             <?php foreach ($user_list as $key ) {
              $ref_encrypt=$this->url_encrypt->encrypt_openssl($key->prs_slug);
              ?>
              <tr>
                <td title="Created on <?php echo $key->prs_crtd_dt ?>" ><a href="<?php echo site_url('user-details-'.$ref_encrypt )?>"><?php echo $key->prs_name ?></td> 
                  
                 <td><?php echo $key->prs_username ?></td>
                 <td><?php echo $key->prs_designation ?></td>
                 <td><?php echo $key->prs_mob ?></td>
                 <td><?php echo $key->prs_email ?></td>
                 <td><div class="btn-group">
                  <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                    <i class="fa fa-angle-down"></i>
                  </button>
                  <ul class="dropdown-menu pull-left" role="menu">
                    <li>
                      <a href="<?php echo site_url('user-details-'.$ref_encrypt )?>">
                        <i class="icon-docs"></i> View </a>
                      </li>
                      <li>
                        <a href="<?php echo site_url('user-detail-edit-'.$ref_encrypt )?>">
                          <i class="icon-tag"></i> Edit </a>
                        </li>
                        <li>
                          <a href="<?php echo site_url('user-details-'.$ref_encrypt )?>">
                            <i class="icon-trash"></i> Delete </a>
                          </li>
                        </ul>
                      </div></td>
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
      <!-- BEGIN PAGE LEVEL PLUGINS -->
      <script src="<?php echo site_url() ?>assets/global/scripts/datatable.js" type="text/javascript"></script>
      <script src="<?php echo site_url() ?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
      <script src="<?php echo site_url() ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
      <script src="<?php echo site_url() ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
      <!-- END PAGE LEVEL PLUGINS -->
      <!-- BEGIN PAGE LEVEL SCRIPTS -->
      <script src="<?php echo site_url() ?>assets/pages/scripts/table-datatables-buttons.js" type="text/javascript"></script>
      <!-- END PAGE LEVEL SCRIPTS -->

    </body>

    </html>