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
        <title>Dashboard | <?php echo $this->Home_model->getBsnData('header_title'); ?></title>
        <?php $this->load->view('common/header_styles')?> 
        <!-- END THEME LAYOUT STYLES -->
       
    </head>
    <!-- END HEAD -->

 <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
              <?php $this->load->view('common/header')?>  
            <!-- BEGIN PAGE TITLE-->
            <!-- BEGIN CONTENT -->
                <div class="row">
                    
                </div>
            <!-- END PAGE CONTENT -->
            <?php $this->load->view('common/footer')?> 
            <!-- END FOOTER -->
        </div>
        
       <?php $this->load->view('common/footer_scripts')?> 
       
    </body>

</html>