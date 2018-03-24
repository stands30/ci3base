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
        <title>
            <?php echo $user_data->prs_name ?> Profile |
                <?php echo $this->Home_model->getBsnData('header_title'); ?>
                    < </title>
                        
                      <?php $this->load->view('common/header_styles')?>
                        <!-- BEGIN PAGE LEVEL PLUGINS -->
                        <link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
                        <!-- END PAGE LEVEL PLUGINS -->
                        <!-- BEGIN THEME GLOBAL STYLES -->
                        <link href="<?php echo base_url() ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
                        <link href="<?php echo base_url() ?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
                        <!-- END THEME GLOBAL STYLES -->
                        <!-- BEGIN PAGE LEVEL STYLES -->
                        <link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
                        <link href="<?php echo base_url() ?>assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />

                        <link href="<?php echo base_url() ?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
                        <link href="<?php echo base_url() ?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />

                        <!-- END PAGE LEVEL STYLES -->
                      
                       
    </head>
    <!-- END HEAD -->
    <style type="text/css">
        .mt-repeater-cell{
            position: relative;
        }

        .mt-repeater-delete{
            position: absolute;
            top: 0;
            right: 0;
        }
    </style>
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <!-- BEGIN HEADER -->
        <?php  $this->load->view('common/header')?>
          
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- BEGIN PROFILE SIDEBAR -->
                                    <div class="profile-sidebar">
                                        <!-- PORTLET MAIN -->
                                        <div class="portlet light profile-sidebar-portlet " style="    margin-bottom: 15px;    padding: 5px 0 0!important;">
                                            <!-- SIDEBAR USERPIC -->
                                            <?php

                                                 if($user_data->prs_img=='')
                                              {
                                                $src=NO_IMAGE;
                                                }
                                                else{
                                                    $src=base_url().PERSON_IMAGE_PATH.$user_data->prs_img;

                                                }
                                                               ?>
                                                <div class="profile-userpic">
                                                    <img src="<?php echo $src?>" class="img-responsive" alt=""> </div>
                                                <!-- END SIDEBAR USERPIC -->
                                                <!-- SIDEBAR USER TITLE -->
                                                <div class="profile-usertitle">
                                                    <div class="profile-usertitle-name">
                                                        <?php echo $user_data->prs_name; ?>
                                                    </div>
                                                    <div class="profile-usertitle-job">
                                                        <?php echo $user_data->prs_designation ?>
                                                    </div>
                                                    <hr style="    margin:0px;">
                                                </div>

                                                <div class="profile-usermenu" style="    margin-top: 0px;padding-bottom: 0px;">
                                                    <ul class="nav">

                                                        <li id="MyElement1">
                                                            <a onclick="return profilechangeDiv1();">
                                                                <i class="icon-settings"></i> Personal Details </a>
                                                        </li>
                                                        <?php 

                                                if($this->session->userdata('trgn_prs_dpt_id')==ADMIN_DEPARTMENT)
                                                {
                                            ?>
                                                            <li id="MyElement2">
                                                                <a onclick="return profilechangeDiv2();">
                                                                    <i class="icon-settings"></i> Encryption </a>
                                                            </li>
                                                            <?php 
                                                }
                                            ?>

                                                    </ul>
                                                </div>
                                                <!-- END MENU -->
                                        </div>
                                        <!-- END PORTLET MAIN -->
                                        <!-- PORTLET MAIN -->
                                        <div class="portlet light ">

                                            <div>
                                                <h4 class="profile-desc-title">Username </h4>
                                                <span class="profile-desc-text"> <?php echo $user_data->prs_username ?> </span>
                                                <h4 class="profile-desc-title">Designation </h4>
                                                <span class="profile-desc-text"> <?php echo $user_data->usr_designation ?> </span>

                                                <hr style="margin: 5px">
                                                <hr style="margin: 5px">
                                                <h4 class="profile-desc-title">Mobile Number</h4>
                                                <span class="profile-desc-text"> <?php echo $user_data->prs_mob ?> </span>
                                                <hr style="margin: 5px">
                                                <h4 class="profile-desc-title">Email id</h4>
                                                <span class="profile-desc-text"> <?php echo $user_data->prs_email ?> </span>
                                                <hr style="margin: 5px">
                                                <h4 class="profile-desc-title">Address</h4>
                                                <span class="profile-desc-text"> <?php echo $user_data->prs_address ?> </span>

                                            </div>
                                        </div>
                                        <!-- END PORTLET MAIN -->
                                    </div>
                                    <!-- END BEGIN PROFILE SIDEBAR -->
                                    <!-- BEGIN PROFILE CONTENT -->
                                    <div class="profile-content" id="hideme">
                                        <div class="row">
                                            <div class="col-md-12 ">

                                                <div class="profile-content" id="viewme" style="display: block;">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="portlet light clearfix">
                                                                <div class="portlet-title tabbable-line">
                                                                    <div class="caption caption-md">
                                                                        <i class="icon-globe theme-font hide"></i>
                                                                        <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                                                                    </div>
                                                                    <ul class="nav nav-tabs">
                                                                        <li class="active">
                                                                            <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#tab_1_2" data-toggle="tab">Change Picture</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#tab_1_3" data-toggle="tab">Change Password</a>
                                                                        </li>

                                                                    </ul>
                                                                </div>
                                                                <div class="portlet-body">
                                                                    <div class="tab-content">
                                                                        <!-- PERSONAL INFO TAB -->
                                                                        <div class="tab-pane active" id="tab_1_1">
                                                                            <form role="form" action="#" id="edit_profile">
                                                                                <input type="hidden" name="prs_id" id="prs_id" value="<?php echo $user_data->prs_id; ?>">
                                                                                <div class="form-group col-md-6">
                                                                                    <label class="control-label">Name<span style="color:red">*</span></label>
                                                                                    <input type="text" placeholder="Enter name" class="form-control" value="<?php echo $user_data->prs_name ?>" required="" id="prs_name" /> </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label class="control-label">Username<span style="color:red">*</span></label>
                                                                                    <input type="text" placeholder="Enter Username (* min 6 character)"  onblur="return isAlphaNumeric(this.value),check_validation('prs_username',this.value,this.id)" pattern=".{6,}" minlength="6" value="<?php echo $user_data->prs_username?>" required="" class="form-control" id="prs_user_name" /> </div>

                                                                                <div class="form-group col-md-6">
                                                                                    <label class="control-label"> Mobile No<span style="color:red">*</span></label>
                                                                                    <input type="text" placeholder="Enter Mobile" onblur="return check_validation('prs_mob',this.value,this.id)" onkeypress='return validateMOBILE(event);' required="" value="<?php echo $user_data->prs_mob ?>" class="form-control" id="prs_mob" /> </div>
                                                                                 <div class="form-group col-md-6">
                                                                                    <label class="control-label"> Email id</label>
                                                                                    <input type="email" placeholder="Enter Email" onblur="return check_validation('prs_email',this.value,this.id)" value="<?php echo $user_data->prs_email ?>" id="prs_email" class="form-control" /> </div>

                                                                                <div class="form-group col-md-6">
                                                                                    <label class="control-label"> Department<span style="color:red">*</span></label>
                                                                                    <select class="form-control select2" id="prs_department" name="prs_department" required="">
                                                                                        <option value=''>Select Department</option>
                                                                                        <?php 

                                                                                             echo $this->Home_model->getCombo("select dpt_id as f1,dpt_name as f2 from department where dpt_status='".DPT_ACTIVE_STATUS."' order by f2",$user_data->prs_dpt_id);
                                                                                          ?>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label class="control-label">Designation</label>
                                                                                    <input type="text" placeholder="Enter Designation" value="<?php echo $user_data->usr_designation ?>" class="form-control" id="usr_designation" name="usr_designation" /> </div>
                                                                                <div class="form-group col-md-12">
                                                                                    <label class="control-label">Address</label>
                                                                                    <textarea class="form-control" id="prs_address" rows="3" placeholder="Enter Address"><?php echo $user_data->prs_address?></textarea>
                                                                                </div>
                                                                               
                                                                                <div class="form-group col-md-12">
                                                                                    <label for="prs_email" class="control-label"> Location</label>
                                                                                    <input type="text" class="form-control"  placeholder="Enter Location" id="prs_location" name="prs_location" value="<?php echo $user_data->prs_location_name ?>" >
                                                                                </div>
                                                                                
                                                                                <div class="row">
                                                                                <div class="col-md-12">

                                                                                <div class="mt-repeaters-new-30">
                                                                                   <div data-repeater-list="group-b">
                                                                                    <input class="input_count" type="hidden" name="theValue_mob" id="theValue_mob" value="<?php echo $alt_mobiles_cnt?>">
                                                                                     <div data-repeater-item class="col-md-6 mt-repeater-item mt-overflow">
                                                                                      <div class="form-group ">
                                                                                        <input class="form-control mt-repeater-input-inline" type="hidden" name="psm_id" id="psm_id" value="" >
                                                                                         <label class="control-label">Alternative Mobile </label>
                                                                                         <div class="mt-repeater-cell">
                                                                                          <input class="form-control mt-repeater-input-inline" type="text" name="psm_mobile" id="psm_mobile"  onkeypress='return validateMOBILE(event);'>
                                                                                          <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete mt-repeater-del-right mt-repeater-btn-inline" onclick="return decreaseMblCount()">
                                                                                             <i class="fa fa-close"></i>
                                                                                         </a>
                                                                                        </div>
                                                                                       </div>
                                                                                     </div>
                                                                                    </div>
                                                                                   <div class="col-md-1">
                                                                                      <div class="form-group">
                                                                                       <label class="control-label" style="display: block;">&nbsp;</label>
                                                                                          <a href="javascript:;" data-repeater-create class="btn btn-info mt-repeater-add" onclick="return increaseMblCount()">
                                                                                        <i class="fa fa-plus"></i> Add More Mobile</a>
                                                                                      </div>
                                                                                  </div>
                                                                                </div>
                                                                            </div>
                                                                             </div>





                                                   <div class="row">                                                     
                                                     <div class="col-md-12">
                                                     <div class="mt-repeaters-new-31"> 
                                                        <div data-repeater-list="group-c">
                                                          <input class="input_count" type="hidden" name="theValue_email" id="theValue_email" value="<?php echo $alt_emails_cnt?>">
                                                          <div data-repeater-item class="col-md-6 mt-repeater-item mt-overflow">
                                                           <div class="form-group ">
                                                            <input class="form-control mt-repeater-input-inline" type="hidden" name="pse_id" id="pse_id"  value="" >
                                                              <label class="control-label">Alternative Email </label>
                                                              <div class="mt-repeater-cell">
                                                               <input class="form-control mt-repeater-input-inline" type="email" name="pse_email" id="pse_email">
                                                               <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete mt-repeater-del-right mt-repeater-btn-inline" onclick="return decreaseEmlCount()">
                                                                  <i class="fa fa-close"></i>
                                                              </a>
                                                            </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-1">
                                                          <div class="form-group ">
                                                              <label class="control-label" style="display: block;">&nbsp;</label>
                                                                 <a href="javascript:;" data-repeater-create class="btn btn-info mt-repeater-add" onclick="return increaseEmlCount()">
                                                               <i class="fa fa-plus"></i> Add More Email</a>
                                                          </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                                   </div>


                                                                                <div class="col-md-12">
                                                                                    <div class="margin-4">
                                                                                        <input type="submit" id="submit_update_profile" class="btn green" value="Submit " />
                                                                                        <input type="button" id="cancel" class="btn default" value="Cancel " />
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <!-- END PERSONAL INFO TAB -->
                                                                        <!-- CHANGE AVATAR TAB -->
                                                                        <div class="tab-pane" id="tab_1_2">
                                                                            <form action="#" role="form" id="image_upload" method="post">

                                                                                <div class="form-group col-md-12">
                                                                                    <label for="prj_img" style="display: block" class="control-label">Image <span style="color:red">(Max size 5MB)</span></label>
                                                                                    <div class="fileinput fileinput-new " data-provides="fileinput">
                                                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                                            <img src="<?php echo $src?>" alt="" /> </div>
                                                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                                        <div>
                                                                                            <span class="btn default btn-file">
                                                                                        <span class="fileinput-new"> Change image </span>
                                                                                            <span class="fileinput-exists"> Change </span>
                                                                                            <input type="file" name="BLO_img" id="BLO_img" required=""> </span>
                                                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <input type="hidden" name="prs_img" id="prs_img" value="<?php echo $user_data->prs_img ?>">
                                                                                <div class="margin-top-4">
                                                                                    <input type="submit" id="submit" class="btn green" value="Submit " />
                                                                                    <input type="button" id="cancel" class="btn default" value="Cancel " />
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <!-- END CHANGE AVATAR TAB -->
                                                                        <!-- CHANGE PASSWORD TAB -->
                                                                        <div class="tab-pane" id="tab_1_3">
                                                                            <form action="#" id="change_password">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">Current Password</label>
                                                                                    <input type="password" required="" class="form-control" name="old_password" placeholder="Enter Old Password "  id="old_password" />
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="control-label">New Password</label>
                                                                                    <input type="password" required="" class="form-control" pattern=".{6,}" placeholder="Enter New Password (*min 6 character)"  minlength="6" name="new_password" id="new_password" /> </div>
                                                                                <div class="form-group">
                                                                                    <label class="control-label">Re-type New Password</label>
                                                                                    <input type="password" required="" class="form-control" name="chck_new_password" id="chck_new_password" /> </div>
                                                                                <div class="margin-top-10">
                                                                                    <button class="btn green" id="submit_change_pw" type="submit"> Change Password </button>
                                                                                    <a href="javascript:;" class="btn default"> Cancel </a>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <!-- END CHANGE PASSWORD TAB -->

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="profile-content" id="secureme" style="display: none;">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="portlet light clearfix">
                                                                <form name="encrypt" id="encrypt">
                                                                    <div class="form-group col-md-12">
                                                                        <label class="control-label"> Enter Data:</label>
                                                                        <input type="text" name="data" id="data" placeholder="Enter data" class="form-control" />

                                                                    </div>
                                                                    <label class="col-md-3 control-label">Select Type</label>
                                                                    <div class="col-md-9">
                                                                        <div class="mt-radio-list">
                                                                            <label class="mt-radio mt-radio-line">
                                                                                <input type="radio" id="radio" name="secure" value="encrypt">Encrypt
                                                                                <span></span>
                                                                            </label>
                                                                            <label class="mt-radio mt-radio-line">
                                                                                <input type="radio" id="radio" name="secure" value="decrypt">Decrypt
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-12">

                                                                        <input type="text" name="result" id="result" readonly="" class="form-control"> </div>

                                                                    <input type="submit" name="submit" id="submit_image" class="btn green" />
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- END PROFILE CONTENT -->
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

                        <script src="<?php echo base_url() ?>assets/global/plugins/moment.min.js" type="text/javascript"></script>
                        <script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
                        <script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

                        <script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>

                        <script src="<?php echo base_url() ?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

                        <!-- END PAGE LEVEL PLUGINS -->
                        <!-- BEGIN THEME GLOBAL SCRIPTS -->
                        
                        <!-- END THEME GLOBAL SCRIPTS -->
                        <!-- BEGIN PAGE LEVEL SCRIPTS -->
                        <script src="<?php echo base_url() ?>assets/pages/scripts/form-samples.min.js" type="text/javascript"></script>
                        <script src="<?php echo base_url() ?>assets/pages/scripts/components-select2.js" type="text/javascript"></script>
                        <script src="<?php echo base_url() ?>assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
                        <script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
                        <!-- END PAGE LEVEL SCRIPTS -->
                        <!-- BEGIN THEME LAYOUT SCRIPTS -->
                        <script src="<?php echo base_url() ?>assets/pages/scripts/table-datatables-responsive.min.js" type="text/javascript"></script>
                        <script src="<?php echo base_url() ?>assets/global/scripts/datatable.js" type="text/javascript"></script>
                        <script src="<?php echo base_url() ?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
                        <script src="<?php echo base_url() ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>

                        <script src="<?php echo base_url() ?>assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>

                        <!-- END THEME LAYOUT SCRIPTS -->
                        <!-- for form validation -->
                             <script src="<?php echo base_url() ?>assets/global/plugins/jquery-repeater/jquery.repeater.js" type="text/javascript"></script>
                              <script src="<?php echo base_url() ?>assets/pages/scripts/form-repeater.js" type="text/javascript"></script>

                       <script src="<?php echo base_url() ?>assets/js/form_validation/form_validation_changepassword.js"></script>
                       <script src="<?php echo base_url() ?>assets/js/form_validation/form_encrypt.js"></script>
                       <script src="<?php echo base_url() ?>assets/js/form_validation/form_edit_profile.js"></script>

                        <!-- for form validation -->

                        <script type="text/javascript">
                            google.maps.event.addDomListener(window, 'load', function() {
                                var options = {
                                    componentRestrictions: {
                                        country: "in"
                                    }
                                };

                                var input = document.getElementById('prs_location');
                                var autocomplete = new google.maps.places.Autocomplete(input, options);
                                google.maps.event.addListener(input, 'place_changed', function() {
                                    var place = places.getPlace();
                                    var address = place.formatted_address;
                                    var latitude = place.geometry.location.lat();
                                    var longitude = place.geometry.location.lng();
                                });
                            });

                            function clear_error_msg() {
                                document.getElementById("message1").innerHTML = '';
                            }
                        </script>
                          <script type="text/javascript">
               var some_data = '<?php echo $mobiledata?>';
     var myObj = JSON.parse(some_data);
    var $repeater = $(".mt-repeaters-new-30").repeater();
    $repeater.setList(myObj);

    var emails_data = '<?php echo $emailsdata?>';
    var myObjemail = JSON.parse(emails_data);
    var $repeater_email = $(".mt-repeaters-new-31").repeater();
    $repeater_email.setList(myObjemail);


</script>
                        <script type="text/javascript">
                            function isAlphaNumeric(str) {

                                var code, i, len;

                                for (i = 0, len = str.length; i < len; i++) {
                                    code = str.charCodeAt(i);
                                    if (!(code > 47 && code < 58)) { // lower alpha (a-z)

                                        $('.error').html('');
                                        // /console.log('inside if condition');
                                        return true;
                                    }
                                    $('.error').html('');
                                }
                                $('.error').html('');
                                $('#prs_user_name').addClass('error');
                                $('#prs_user_name').val('');
                                $('.aplhaNum_error').append('<label class="error">Username cannot contain only numbers</span>');

                                //console.log('else condition');
                                return false;
                            };

                            function validateMOBILE(event) {
                                var key = window.event ? event.keyCode : event.which;
                                if (event.keyCode == 8 || event.keyCode == 46 || event.keyCode == 37 || event.keyCode == 39) {
                                    return true;
                                } else if (key < 48 || key > 57) {
                                    return false;
                                } else return true;
                            };

                            function check_validation(type, value, id) {
                                if (value != "") {
                                    var prs_id = document.getElementById('prs_id').value;
                                    data = {
                                            type: type,
                                            value: value,
                                            prs_id: prs_id
                                        },
                                        $.ajax({
                                            type: "POST",
                                            url: base_url + "User/checkeditValidation",
                                            data: data,
                                            dataType: "json",
                                            success: function(response) {

                                                if (response.success == true) {

                                                    $('#' + id).html('');
                                                    $('#' + id).parent().find('.error').html('');
                                                    $('#' + id).parent().append('<span class="error">Data already exists</span>');
                                                } else {

                                                    $('#' + id).html('');
                                                    $('#' + id).parent().find('.error').html('');
                                                }
                                            }
                                        });
                                }

                            }

                            function profilechangeDiv1() {
                                document.getElementById('hideme').style.display = "block";
                                document.getElementById('viewme').style.display = "block"; // hide body div tag // show body1 div tag
                                document.getElementById('secureme').style.display = "none";

                                document.getElementById("MyElement").className = "";
                                document.getElementById("MyElement1").className = "active";
                                document.getElementById("MyElement2").className = "";
                            }

                            function profilechangeDiv2() {
                                //document.getElementById('hideme').style.display = "none";
                                document.getElementById('viewme').style.display = "none";
                                document.getElementById('secureme').style.display = "block";

                                // hide body div tag // show body1 div tag
                                document.getElementById("MyElement").className = "";
                                document.getElementById("MyElement1").className = "";
                                document.getElementById("MyElement2").className = "active";
                            }
                            var base_url = '<?php echo base_url();?>';

                            $(function() {

                                $("#image_upload").validate({
                                    submitHandler: function(form) {

                                        var BASE_URL = "<?php echo base_url();?>";
                                        $('#submit').css('display', 'none');
                                        // $('#processing_other').css('display','inline-block');

                                        var formData = new FormData();
                                        formData.append('prs_id', document.getElementById('prs_id').value);
                                        formData.append('file', $('input[type=file]')[0].files[0]);
                                        formData.append('prs_img', document.getElementById('prs_img').value);

                                        $.ajax({
                                            type: "POST",

                                            url: BASE_URL + "User/updateProfilePic",

                                            data: formData,
                                            dataType: "json",
                                            contentType: false, // The content type used when sending data to the server.
                                            cache: false, // To unable request pages to be cached
                                            processData: false,
                                            success: function(response) {

                                                if (response.success == true) {
                                                    alert(response.message);
                                                    location.reload();

                                                } else {

                                                    $('#submit').css('display', 'inline-block');
                                                    // $('#processing_other').css('display','none');

                                                    alert(response.message);
                                                }
                                            }

                                        });
                                    }
                                });

                            });
                            $('#number').keydown(function(event) {
                                $(this).attr('maxlength', '10');
                                var key = window.event ? event.keyCode : event.which;
                                if (event.keyCode == 8 || event.keyCode == 46) {
                                    return true;
                                } else if (key < 48 || key > 57) {
                                    return false;
                                } else return true;
                            });
                        </script>
    </body>

    </html>