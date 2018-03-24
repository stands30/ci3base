<!DOCTYPE html>

<html lang="en">
    <!--<![endif]-->

    <head>
        <title> User Login | <?php echo $this->Home_model->getBsnData('header_title'); ?>
</title>
      <?php $this->load->view('common/header_styles')?> 
      <!-- BEGIN PAGE LEVEL STYLES -->
      <link href="<?php echo base_url()?>assets/pages/css/login.css" rel="stylesheet" type="text/css" />
      <!-- END PAGE LEVEL STYLES -->
    </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="">
               <img src="<?php echo $this->Home_model->getBsnData('logo'); ?>" alt="" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
           <div id="invalid_user_msg" style="text-align: center;display: none">
            <h style="color:#FF0000;"><?php echo INVALID_USER?></h>
            </div>
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" action="" method="post" id="login_form">
                <h3 class="form-title">Sign In</h3>
                          <input type="hidden" name="ref" id="ref" value="<?php echo $ref?>">
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter any username and password. </span>
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9 submit_on_enter">Username</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" required  name="prs_username" id="prs_username"  /> </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input class="form-control form-control-solid placeholder-no-fix submit_on_enter" type="password" autocomplete="off" placeholder="Password" required  name="prs_password" id="prs_password"  /> </div>
                <div class="form-actions">
                    <button  type="submit" class="btn green uppercase" id="form_submit">Login</button>
                    <label class="rememberme check mt-checkbox mt-checkbox-outline">
                        <input type="checkbox" name="rememberme" id="rememberme" value="1"  />Remember
                        <span></span>
                    </label>
                </div>
            </form>
        </div>
        <div class="copyright"> <?php echo $this->Home_model->getBsnData('footer_line'); ?>. </div>
        <?php $this->load->view('common/footer_scripts')?> 
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
         
        <script src="<?php echo base_url() ?>assets/js/form_validation/login.js" ></script>

        <script>
            $(document).ready(function()
            {
                $('#clickmewow').click(function()
                {
                    $('#radio1003').attr('checked', 'checked');
                });


            });
 $('.submit_on_enter').keydown(function(event) {
    // enter has keyCode = 13, change it if you want to use another button

    if (event.keyCode == 13) {

      $('.login-form').submit();
      //return false;
    }
        </script>
    </body>

</html>