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
            <title>Department   | <?php echo $this->Home_model->getBsnData('header_title'); ?>
</title>
            
             <?php $this->load->view('common/header_styles')?>
            <!-- BEGIN PAGE LEVEL PLUGINS -->
             <link href="<?php echo base_url() ?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
           <link href="<?php echo base_url() ?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        
            <link href="<?php echo base_url() ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
            <link href="<?php echo base_url() ?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
            
            <link href="<?php echo base_url() ?>assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url() ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />

             
            <!-- END THEME LAYOUT STYLES -->
        
         </head>
         
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
                  <div class="col-sm-9">
                    <div class="clearfix">
                              <div class="btn-group">
                             </div>
                              </div>
                          <div class="space15"></div>
                          <div class=" form" id="addnewform" style="display:block">
                                  <form class="cmxform form-horizontal tasi-form" id="add_model" method="post" action="">
                                  <input type="hidden" id="dpt_id" name="dpt_id" value="">

                                  <div class="col-md-12">
                                    
                                      <div class="form-group " style="border-bottom: 0px solid #23527c;">
                                          <label for="MOD_name" class="control-label col-sm-4">Department <span style="color: red">*</span></label>
                                          <div class="col-sm-6">
                                          
                                          <input type="text" name="dpt_name" id="dpt_name" required="">
                                          </div>
                                          <div class="col-sm-2">
                                            <button class="btn btn-primary" type="submit" style="margin-left:3%">Save</button>
                                             <!--  <button class="btn btn-default" type="button">Cancel</button> -->
                                          </div>
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
                                                                                                <th>Department</th>
                                                                                                <th>Edit</th>
                                                                                                 </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <?php $i=1;
                                                                                            foreach ($department as $key) {
                                                                                              //print_r($key);
                                                                                              
                                                                                              ?>
                                                                                                <tr>
                                                                                                      <td style="display: none;"></td>
                                                                                                  
                                                                                                    <td><?php echo $key->dpt_name;?></td>
                                                                                                    <td><a  class="edit" id="updatenewclick" onclick="edit(<?php echo $key->dpt_id;?>)">Edit</a></td>
                                                                                                    
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
            <div>
 <?php $this->load->view('common/footer_scripts')?> 

         
        
            <!-- END THEME LAYOUT SCRIPTS -->
            <!-- basic table js -->
          <script src="<?php echo base_url() ?>assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/pages/scripts/table-datatables-buttons.js" type="text/javascript"></script>

            <!-- for form validation -->
             
           
              



         </body>
         </html>