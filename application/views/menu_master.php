<?php
    if($this->session->userdata('trgn_prs_id')==''){
       // echo base_url();
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
            <title>Menu Master   | <?php echo $this->Home_model->getBsnData('header_title'); ?>
</title>
           
           <?php $this->load->view('common/header_styles')?>
            <!-- BEGIN PAGE LEVEL PLUGINS -->
             <link href="<?php echo base_url() ?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
           <link href="<?php echo base_url() ?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
          
            <!-- BEGIN THEME GLOBAL STYLES -->
            <link href="<?php echo base_url() ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
            <link href="<?php echo base_url() ?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
            <!-- END THEME GLOBAL STYLES -->
         
            <link href="<?php echo base_url() ?>assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url() ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />

          
         </head>
         <STYLE TYPE="text/css">
          label.error
          {
          color:red;
          }
	   .td-style
  {
    width: 10%;text-align: center;
  }
         </STYLE>
         <!-- END HEAD -->
         <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
            <!-- BEGIN HEADER -->
           <?php  $this->load->view('common/header');?>
           
                  
                <div class="row">
                <div class="col-sm-12">
             
            


         
               

                                    <div class="row">
                                    
                                    <div class="portlet light bordered">


                                       <div class="row">

               <div class="col-sm-1"></div>
                  <div class="col-sm-12">
                    <div class="clearfix">
                              <div class="btn-group">
                             </div>
                              </div>
                          <div class="space15"></div>
                          <div class=" form" id="addnewform" style="display:block">
                                  <form class="cmxform form-horizontal tasi-form" id="add_model" method="post" action="">
                                  <input type="hidden" id="mnu_id" name="mnu_id" value="">

                                 <div class="row">
                                   <div class="col-md-3">
                                     <div class="">
                                      <label class="control-label">Menu</label>
                                       <input class="form-control" name="mnu_name"  placeholder="User" id="mnu_name" required="">
                                     </div>
                                   </div>

                                   <div class="col-md-3">
                                     <div class="">
                                      <label class="control-label">Order</label>
                                       <input class="form-control" type="text" placeholder="1" name="mnu_order" id="mnu_order">
                                     </div>
                                   </div>

                                   <div class="col-md-3">
                                     <div class="">
                                      <label class="control-label">Link</label>
                                       <input class="form-control" type="text" placeholder="user-list" name="mnu_link" id="mnu_link">
                                     </div>
                                   </div>

                                   <div class="col-md-3">
                                     <div class="">
                                      <label class="control-label">Icon</label>
                                       <input class="form-control" type="text" placeholder="fa fa-user" name="mnu_icon" id="mnu_icon">
                                     </div>
                                   </div>
                                   <div class="col-md-3">
                                      <label style="display: block;">&nbsp;</label>
                                    
                                      <button class="btn blue" type="submit" style="margin-left:3%">Save</button>
                                   </div>
                                 </div>
                                     
                                      
                                     
                                  </form>
                              </div>
                          </div>
                      </div>
                                                <div class="portlet-title">
                                                 <div class="tools"> </div>
                                                </div>



                                                 <div class="portlet-body">
                                                     <table class="table table-striped table-bordered table-hover  pagination_table" id="sample_1">
                                                                                        <thead>
                                                                                            <tr>
                                                                                              <th style="display: none;"></th>
                                                                                                <th>Menu</th>
                                                                                                <th>Order</th>
                                                                                                <th>Link</th>
                                                                                                 <th>icon</th>
                                                                                                 <th>Edit</th>
                                                                                                 </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <?php $i=1;
                                                                                            foreach ($menu_master as $key) {
                                                                                              //print_r($key);
                                                                                              
                                                                                              ?>
                                                                                                <tr>
                                                                                                      <td style="display: none;"></td>
                                                                                                  
                                                                                                    <td><?php echo $key->mnu_name;?></td>
                                                                                                    <td><?php echo $key->mnu_order;?></td>
                                                                                                    <td><?php echo $key->mnu_link;?></td>
                                                                                                    <td><?php echo $key->mnu_icon;?></td>
                                                                                                    <td><a class="edit"  id="updatenewclick" onclick="edit(<?php echo $key->mnu_id;?>)">Edit</a></td>
                                                                                                </tr>
                                                                                              <?php 

                                                                                          $i++;
                                                                                            }
                                                                                              ?> 
                                                                                            </tbody>
                                                      </table>
                                                </div>
                                                  </div>
                                                    </div>
                                           
                             




            
              </div>
             
                  <!-- END CONTENT BODY -->
               </div>
               <!-- END CONTENT -->
               <!-- BEGIN QUICK SIDEBAR -->
               <a href="javascript:;" class="page-quick-sidebar-toggler">
               <i class="icon-login"></i>
               </a>
             
            </div>
            <!-- END CONTAINER -->
            <!-- BEGIN FOOTER -->
              <?php  $this->load->view('common/footer');?>
            <!-- END FOOTER -->
            <!-- BEGIN CORE PLUGINS -->
          

 
             <script src="<?php echo base_url() ?>assets/js/form_validation/form-validation-script-menu-master.js"></script>
           <div>
 <?php $this->load->view('common/footer_scripts')?> 
            <!-- BEGIN PAGE LEVEL PLUGINS -->

             <script src="<?php echo base_url() ?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

            <!-- END PAGE LEVEL PLUGINS -->
            <!-- BEGIN THEME GLOBAL SCRIPTS -->
            
            <!-- END THEME GLOBAL SCRIPTS -->
            <!-- BEGIN PAGE LEVEL SCRIPTS -->
            <script src="<?php echo base_url() ?>assets/pages/scripts/form-samples.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url() ?>assets/pages/scripts/components-select2.js" type="text/javascript"></script>
        
            <!-- END PAGE LEVEL SCRIPTS -->
        
            <!-- basic table js -->
             <script src="<?php echo base_url() ?>assets/global/scripts/datatable.js" type="text/javascript"></script>
            <script src="<?php echo base_url() ?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url() ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
            <script src="<?php echo base_url() ?>assets/pages/scripts/table-datatables-buttons.js" type="text/javascript"></script>
            <!-- for form validation -->
           
              



         </body>
         </html>