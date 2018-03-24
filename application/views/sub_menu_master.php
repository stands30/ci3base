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
            <title>Submenu Master   | <?php echo $this->Home_model->getBsnData('header_title'); ?>
</title>
           
            <?php $this->load->view('common/header_styles')?>
            <!-- BEGIN PAGE LEVEL PLUGINS -->
             <link href="<?php echo base_url() ?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
           <link href="<?php echo base_url() ?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
         
           <link href="<?php echo base_url() ?>assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
            <!-- END PAGE LEVEL PLUGINS -->
            <!-- BEGIN THEME GLOBAL STYLES -->
            <link href="<?php echo base_url() ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
            <link href="<?php echo base_url() ?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
            <!-- END THEME GLOBAL STYLES -->
       

             <link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url() ?>assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url() ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
           
           
         </head>
         <STYLE TYPE="text/css">
          label.error
          {
          color:red;
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
                                  <input type="hidden" id="sbm_id" name="sbm_id" value="">

                                 <div class="row">
                                   <div class="col-md-3">
                                     <div class="">
                                      <label class="control-label">Menu</label>
                                      <select class="form-control select2" name="sbm_mnu_id" id="sbm_mnu_id" onchange ="return loadmenu(this.value)" >
                                        <option value="">Please Select</option>
                                              
                                       <?php 
                                                    echo $this->Home_model->getCombo("select mnu_id as f1,mnu_name as f2 from menu_master where mnu_status='Y' order by f2");
                                                  ?>
                                         
                                          </select>

                                     </div>
                                   </div>
                                   <div class="col-md-3">
                                     <div class="">
                                      <label class="control-label">Parent Menu</label>
                                       <select class="form-control select2" name="sbm_parent_id" id="sbm_parent_id" >
                                        <option value="">Please Select</option>
                                              
                                          <?php 
                                          echo $this->Home_model->getCombonew("SELECT *
                                                      FROM (select mnu_id as f1,CONCAT_WS(' - ','Menu',mnu_name)  as f2,'menu' as f3 from menu_master 
                                                    where mnu_status='Y' 
                                                     union
                                                     select sbm_id as f1,CONCAT_WS(' - ','Submenu',sbm_name)  as f2,'submenu' as f3 from sub_menu_master
                                                     where sbm_status='Y'
                                                     order by f2) as u
                                                    ");
                                                  ?>
                                          </select>

                                     </div>
                                   </div>
                                   <div class="col-md-3">
                                     <div class="">
                                      <label class="control-label">Submenu</label>
                                       <input class="form-control" name="sbm_name"  placeholder="User" id="sbm_name" required="">
                                     </div>
                                   </div>

                                   <div class="col-md-3">
                                     <div class="">
                                      <label class="control-label">Order</label>
                                       <input class="form-control" type="text" placeholder="1" name="sbm_order" id="sbm_order">
                                     </div>
                                   </div>

                                   <div class="col-md-3">
                                     <div class="">
                                      <label class="control-label">Link</label>
                                       <input class="form-control" type="text" placeholder="user-list" name="sbm_pagelink" id="sbm_pagelink">
                                     </div>
                                   </div>

                                  
                                   

                                   <div class="col-md-3">
                                     <div class="">
                                      <label class="control-label">Group</label>
                                       <input class="form-control" type="text" placeholder="submenu" name="sbm_group" id="sbm_group" value="submenu" readonly="">
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
                                                                                                <th>Submenu</th>
                                                                                                <th>Parent</th>
                                                                                                <th>Order</th>
                                                                                                <th>Link</th>
                                                                                                 <th>Group</th>
                                                                                                  <th>Edit</th>
                                                                                                 </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <?php $i=1;
                                                                                            foreach ($sub_menu_master as $key) {
                                                                                              if ($key->menu_name == "") {
                                                                                                $key->menu_name = $key->submenu_name;
                                                                                              }else{
                                                                                                $key->menu_name = $key->menu_name;
                                                                                              }
                                                                                              
                                                                                              ?>
                                                                                                <tr>
                                                                                                      <td style="display: none;"></td>
                                                                                                  
                                                                                                    <td><?php echo $key->menu_name;?></td>
                                                                                                    <td><?php echo $key->sbm_name;?></td>

                                                                                                    <td><?php echo $key->menu_name?></td>
                                                                                                    <td><?php echo $key->sbm_order;?></td>
                                                                                                    <td><?php echo $key->sbm_pagelink;?></td>
                                                                                                    <td><?php echo $key->sbm_group;?></td>
                                                                                                    <td><a   class="edit" id="updatenewclick" onclick="edit(<?php echo $key->sbm_id;?>)">Edit</a></td>
                                                                                                    
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
          <script src="<?php echo base_url() ?>assets/js/form_validation/form-validation-script-sub-menu-master.js"></script>
          <div>
 <?php $this->load->view('common/footer_scripts')?> 
            <!-- BEGIN PAGE LEVEL PLUGINS -->

        
           <script src="<?php echo base_url() ?>assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
             <script src="<?php echo base_url() ?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

            <!-- END PAGE LEVEL PLUGINS -->
            <!-- BEGIN THEME GLOBAL SCRIPTS -->
            
            <!-- END THEME GLOBAL SCRIPTS -->
            <!-- BEGIN PAGE LEVEL SCRIPTS -->
            <script src="<?php echo base_url() ?>assets/pages/scripts/form-samples.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url() ?>assets/pages/scripts/components-select2.js" type="text/javascript"></script>
            <script src="<?php echo base_url() ?>assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
            <!-- END PAGE LEVEL SCRIPTS -->
          
            <!-- basic table js -->
             <script src="<?php echo base_url() ?>assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/pages/scripts/table-datatables-buttons.js" type="text/javascript"></script>
            <!-- for form validation -->
             
             
              
 <script type="text/javascript">
       function loadmenu(mnu_id) 
       {
          $.ajax({
    type:"POST",
      url: base_url +"Submenu_master/ajax_call_parent_menu", 
    data :{ mnu_id:mnu_id},
    success: function(myvar){
     
      $('#sbm_parent_id').html(myvar);
      
    }
    });
       }
     </script>


         </body>
         </html>