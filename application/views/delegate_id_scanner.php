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
        <title>ID Scanner | <?php echo $this->Home_model->getBsnData('header_title'); ?></title>
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
                                    <span class="caption-subject bold uppercase">Qr Code Scanner</span> <div class="btn-group">
                                   <a href="<?php echo site_url('delegate-add')?>">
                                 </a>
                              </div>
                                </div>
                                <div class="tools"> </div>
                            </div>
                            <div class="portlet-body">
                             <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                      <input type="text"  class="form-control" onblur="return GetData(this.value)"  autofocus="" placeholder="Enter Barcode" name="barcode_txt" id="barcode_txt">
                                     <span style="color:#c40000;size: 12px" id="barcodeError"></span>
                                  </div>
                                </div>
                              </div>
                              <div>
                                <div class="row">
                                   <div class="portlet-body detail">
                               
                                  <div id="dgt_data">
                                     
                                  </div>
                            </div>
                                </div>
                              </div>
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
      <script type="text/javascript">
        function GetData(dgt_code)
    {

              $.ajax({
                url:base_url+"delegate/getDetailsByQrCode",
                method: "POST",
                dataType:"json",
                data:{
                  dgt_code:dgt_code
                },
                success:function (data) {
                  console.log(data.message);
                  $('#dgt_data').html(data.message);
                }

              });

     
  
    
    }
      </script>
    </body>

</html>