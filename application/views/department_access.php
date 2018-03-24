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
            <title>Department Access  | <?php echo $this->Home_model->getBsnData('header_title'); ?>
</title>
          
          <?php $this->load->view('common/header_styles')?>
            <!-- BEGIN PAGE LEVEL PLUGINS -->
             <link href="<?php echo base_url() ?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
           <link href="<?php echo base_url() ?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        
            <!-- END PAGE LEVEL PLUGINS -->
            <!-- BEGIN THEME GLOBAL STYLES -->
            <link href="<?php echo base_url() ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
            <link href="<?php echo base_url() ?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
            <!-- END THEME GLOBAL STYLES -->
          

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


                                      <header class="panel-heading">
                                      <i class="fa fa-cog" aria-hidden="true"></i> Department Access &nbsp;  
                                      </header>




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
                                  <input type="hidden" id="mtr_id" name="mtr_id" value="">

                                  <div class="col-md-12">
                                     <div class="col-md-6">
                                      <div class="form-group " style="border-bottom: 0px solid #23527c;">
                                          <label for="MOD_name" class="control-label col-sm-4">Department <span style="color: red">*</span></label>
                                          <div class="col-sm-8">
                                             <select class="form-control select2" name="mtr_dpt_id" id="mtr_dpt_id" onchange ="return loadmenu(this.value)" required><option value="">Please Select</option><!--  onchange ="return loadmenu(this.value)" -->
                                              
                                       <?php 
                                                    echo $this->Home_model->getCombo("select dpt_id as f1,dpt_name as f2 from department where dpt_status='Y' order by f2");
                                                  ?>
                                         
                                          </select>
                                          </div>
                                      </div>
                                     </div>

                                     <div class="col-md-6">
                                      <div class="form-group " style="border-bottom: 0px solid #23527c;">
                                          <label for="cname" class="control-label col-sm-4">Menu <span style="color: red">*</span></label>
                                          <div class="col-sm-8">
                                            <select class="form-control select2" name="mtr_mnu_id" id="mtr_mnu_id" required><option value="">Please Select</option>
                                              
                                              <?php 
                                                   //echo $this->Home_model->getCombo("select MNU_id as f1,mnu_name as f2 from menu_master where MNU_Status='Y' order by f2");
                                                  ?>
                                         
                                          </select>
                                          </div>
                                      </div>
                                     </div>
  
                                  </div>
                                      


                                     
                                      
                                      <div class="form-group">
                                          <div class="col-sm-offset-2 col-sm-10">
                                              <button class="btn btn-primary" type="submit" style="margin-left:3%">Save</button>
                                             <!--  <button class="btn btn-default" type="button">Cancel</button> -->
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
                                                                                                 <th>Menu</th>
                                                                                                 
                                                                                                
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
                                                                                          <td><table class="display table table-bordered table-striped table-size"> <?php 
                                                                                       $department_access =$this->Access_model->departmenubyid($key->dpt_id);

                                                                                       foreach ($department_access as $keymenu) { 
                                                                                      //  print_r($keymenu);
                                                                                        ?>
                                                                                       <tr><td><?php echo $keymenu->mnu_name;?></td></tr>
                                                                                         <?php } ?>
                                                                                        </table></td>
                                                                                                    
                                                                                                    
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
              
         <div>
 <?php $this->load->view('common/footer_scripts')?> 

           <script src="<?php echo base_url() ?>assets/js/form_validation/form-validation-script-department-access.js"></script>

             <script src="<?php echo base_url() ?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
          <script src="<?php echo base_url() ?>assets/pages/scripts/components-select2.js" type="text/javascript"></script>
            <!-- basic table js -->
       
            <script src="<?php echo base_url() ?>assets/global/scripts/datatable.js" type="text/javascript"></script>
            <script src="<?php echo base_url() ?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url() ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>  
          <script src="<?php echo base_url() ?>assets/pages/scripts/table-datatables-buttons.js" type="text/javascript"></script>
            <!-- for form validation -->
             
      
      
              <script type="text/javascript">
       function loadmenu(mtr_dpt_id) 
       {
          $.ajax({
    type:"POST",
      url: base_url +"Department_access/ajax_call_MTR", 
    data :{ mtr_dpt_id:mtr_dpt_id},
    success: function(myvar){
     
      $('#mtr_mnu_id').html(myvar);
      
    }
    });
       }
     </script>



         </body>
         </html>