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
            <title><?php  echo $user_data->prs_name?>'s Profile| <?php echo $this->Home_model->getBsnData('header_title'); ?></title>
           
            <?php $this->load->view('common/header_styles')?>
            <!-- BEGIN PAGE LEVEL PLUGINS -->
             <link href="<?php echo base_url() ?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
          <link href="<?php echo base_url() ?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
          <link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
          <link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
          <link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
          <link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
          <link href="<?php echo base_url() ?>assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
            <!-- END PAGE LEVEL PLUGINS -->
            <!-- BEGIN THEME GLOBAL STYLES -->
            <link href="<?php echo base_url() ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
            <link href="<?php echo base_url() ?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
            <!-- END THEME GLOBAL STYLES -->
         

            <link href="<?php echo base_url() ?>assets/datatables/css/datatables.min.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url() ?>assets/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
            <!-- END THEME LAYOUT STYLES -->
            
            <style type="text/css">
           .control-label{
            font-weight: 300!important;
           }
           .form-control-static {
                padding-top: 0px;
                padding-bottom: 7px;
                margin-bottom: 0;
                min-height: 34px;
            }
            /*start to hide table borders*/
            .portlet.bordered {
     border-left:none!important; 
}
.portlet.light.bordered {
     border:none!important; 
}
.portlet.light.bordered>.portlet-title {
     border-bottom:none!important; 
}
   /*End to hide table borders*/

         </style>
         </head>
         <!-- END HEAD -->
         <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
            <!-- BEGIN HEADER -->
           <?php  $this->load->view('common/header');?>
    
                  
                     <div class="row">
                              <div class="portlet light bg-inverse" style="background-color: white">
                                 
                                     <div class="portlet-title">
                                  <div class="caption font-orange">
                                    
                                    <span class="caption-subject"> <strong><?php echo $user_data->prs_name;?></strong> Info&nbsp;<a title="Edit Detail" href="<?php echo site_url('user-detail-edit-'.$ref_encrypt)?>"><i class="fa fa-edit"></i></a>

                                                            </span>
                                  </div>
                                   <div class="actions">
                                        <span>Created by <strong> <?php echo $this->Home_model->createbyfordisplay($user_data->prs_crtd_by)?> </strong>on <strong><?php echo  $this->Home_model->datetimefordisplay($user_data->prs_crtd_dt)?></strong></span>
                                    </div>
                                </div>
                                                              <hr style="margin: 10px 0;">
                                                               

                                                              <div class="portlet-body" style="padding-bottom: 20px">
                                                                  <div class="row">
                                                                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12" style="border-right: 1px solid #e5e5e5">
                                                                        <div class="mt-widget-1" style="  border: 0px ">
                                                                                 <div class="mt-img" style="margin: 10px 0 10px;">
                                                                                  <?php
                                                                                  if($user_data->prs_img=='')
                                                                                        {
                                                                                          $src=NO_IMAGE;
                                                                                          }
                                                                                          else{
                                                                                              $src=base_url().PERSON_IMAGE_PATH.$user_data->prs_img;

                                                                                          }
                                                                                              ?> 
                                                                            <img style="width:80px;height:80px" src="<?php echo $src?>"> </div> 
                                                                                  <div class="mt-body">
                                                                                  <div class="person-info" style="">
                                                                                      <a href="" class="nav-link nav-toggle" title="Username" > <h3 class="mt-username"><?php echo $user_data->prs_username;?></h3></a>
                                                                                      <p class="mt-user-title" style="     margin: 0px; "> <a href="tel:<?php echo $user_data->prs_mob;?>" title="Mobile No" style=" margin-left: 4px;"><?php echo $user_data->prs_mob;?></a> 

                                                                                      </p>
                                                                                      
                                                                                   </div>   
                                                                                     
                                                                                  </div>
                                                                              </div>
                                                                    </div>

                                                                    <div  class="col-md-9 col-lg-9 col-sm-9 col-xs-12">
                                                                      <table class="table table-striped table-bordered table-hover ">
                                                                      <tr>
                                                                        <td>Email: </td>
                                                                        <td> <a href="mailto:<?php echo $user_data->prs_email;?>" style=" margin-left: 4px;"><?php echo $user_data->prs_email;?></a></td>
                                                                         <td>Department: </td>
                                                                        <td> <?php echo $user_data->prs_designation;?></td>
                                                                      </tr>
                                                                      <tr>
                                                                        <td>Designation: </td>
                                                                        <td>  <?php echo $user_data->usr_designation;?></td>
                                                                        <td>Location: </td>
                                                                        <td> <?php echo $user_data->prs_location_name;?></td>
                                                                        
                                                                      </tr>
                                                                       <tr>
                                                                        <td>Alt Email: </td>
                                                                        <td colspan="3"> <a style=" margin-left: 4px;"><?php echo $user_alt_emails;?></a></td>
                                                                       
                                                                      </tr>
                                                                       <tr>
                                                                       
                                                                        <td>Alt Mobile: </td>
                                                                        <td colspan="3">  <?php echo $User_alt_mobiles;?></td>
                                                                      </tr>
                                                                      <tr>
                                                                       
                                                                        <td>Address: </td>
                                                                        <td colspan="3">  <?php echo $user_data->prs_address;?></td>
                                                                      </tr>
                                                                      
                                                                    </table>
                                                                       


                                                                        


                                                                    </div>
                                                                  </div>


                                                                  
                                                                
                                                                
                                                                 
                                                              <!--/row-->
                                                               
                                                                 
                                                           </div> 


 


                                                       
                                                            



                                   
                                 </div> </div>
                              </div>
                    
                              <!-- END FORM-->
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- END CONTENT BODY -->
               </div>
               <!-- END CONTENT -->
              
            </div>
            <!-- END CONTAINER -->
            <!-- BEGIN FOOTER -->
              <?php  $this->load->view('common/footer')?>
            <!-- END FOOTER -->
  <div>
 <?php $this->load->view('common/footer_scripts')?> 
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url() ?>assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url() ?>assets/pages/scripts/table-datatables-rowreorder.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
   
         </body>
      </html>