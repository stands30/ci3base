<?php
if($this->session->userdata('trgn_prs_id')==''){
  $abc = base_url();
  echo '<script> ';
  echo 'window.location="'.$abc.'"';
  echo '</script>';
}   
?>

    <!DOCTYPE html>
    <!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
    <!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
    <!--[if !IE]><!-->
    <html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>User Add |
            <?php echo $this->Home_model->getBsnData('header_title'); ?>
        </title>
     
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
       <?php $this->load->view('common/header_styles')?>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/global/plugins/dropify/css/dropify.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url() ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url() ?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        
        <!-- END THEME LAYOUT STYLES -->
        <!-- select2 css files -->
        <link href="<?php echo base_url() ?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
       
        <style type="text/css">
            #information1 {
                position: absolute;
                bottom: 14px;
                left: 99px;
                display: none;
            }
            
            .imageThumb {
                /*max-height: 75px;*/
                border: 2px solid;
                padding: 1px;
                cursor: pointer;
                width: 110px;
                height: 75px;
            }
            
            .pip {
                display: inline-block;
                margin: 10px 10px 0 0;
            }
        </style>
    </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
            <?php $this->load->view('common/header')?>
                <!-- END HEADER -->
                            <div class="row">
                                    <div class="col-md-12 ">
                                        <!-- BEGIN SAMPLE FORM PORTLET-->
                                        <div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption font-orange">
                                                    <i class="icon-user font-orange"></i>
                                                    <span class="caption-subject bold uppercase">Add User</span>
                                                </div>
                                                <div class="actions">
                                                    <span>Created by <strong> <?php echo $this->session->userdata('trgn_prs_name')?> </strong>on <strong><?php echo  $this->Home_model->datetimefordisplay(date('d-m-Y H:i:s'))?></strong></span>
                                                </div>
                                            </div>

                                            <div class="portlet-body form">
                                                <div id="error" style="text-align: center;">
                                                </div>
                                                <form id="add_user" method="post" class="horizontal-form">

                                                    <div class="form-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="prs_name" class="control-label"> Name<span style="color:red">*</span></label>
                                                                    <input type="text" class="form-control" id="prs_name" placeholder="Enter Name"  name="prs_name" required="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="prs_user_name" class="control-label">User Name<span style="color:red">*</span></label>
                                                                    <input type="text" class="form-control" placeholder="Enter Username (* min 6 character)"  onblur="return isAlphaNumeric(this.value),check_validation('prs_username',this.value,this.id)" pattern=".{6,}" minlength="6" id="prs_user_name" name="prs_user_name" required="">
                                                                    <span class="help-block"></span>
                                                                </div>
                                                            </div>
                                                            <!--/span-->

                                                            <!--/span-->
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="prs_mob" class="control-label">Mobile<span style="color:red">*</span></label>
                                                                    <input type="text" class="form-control" placeholder="Enter Mobile"  onblur="return check_validation('prs_mob',this.value,this.id)" onkeypress='return validateMOBILE(event);' required="" id="prs_mob" name="prs_mob">
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="prs_email" class="control-label"> Email</label>
                                                                    <input type="email" class="form-control" placeholder="Enter Email" onblur="return check_validation('prs_email',this.value,this.id)" id="prs_email" name="prs_email">
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">Department<span style="color:red">*</span></label>
                                                                    <select class="form-control select2" id="prs_department" name="prs_department" required="">
                                                                        <option value=''>Select Department</option>
                                                                        <?php 
                                                                             echo $this->Home_model->getCombo("select dpt_id as f1,dpt_name as f2 from department where dpt_status='".DPT_ACTIVE_STATUS."' order by f2");
                                                                          ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="prs_email" class="control-label"> Designation</label>
                                                                    <input type="text" class="form-control" id="usr_designation" name="usr_designation" placeholder="Enter Designation">
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="prs_password" class="control-label">Password<span style="color:red">*</span></label>
                                                                    <input type="password" class="form-control" pattern=".{6,}"  placeholder="Enter Password (*min 6 character)" minlength="6" id="prs_password" required="" name="prs_password">
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="prs_cnfrm_password" class="control-label">Confirm Password<span style="color:red">*</span></label>
                                                                    <input type="password" class="form-control" pattern=".{6,}" minlength="6" id="prs_cnfrm_password" required="" name="prs_cnfrm_password">
                                                                    <span class="help-block"></span>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="prs_address" class="control-label">Address</label>
                                                                    <textarea id="prs_address" class="form-control" placeholder="Enter Address" name="prs_address"></textarea>
                                                                    <span class="help-block"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="prs_email" class="control-label"> Location</label>
                                                                    <input type="text" class="form-control" id="prs_location"  placeholder="Enter Location" name="prs_location">
                                                                </div>
                                                            </div>
                                                            
                                                        </div>

                                                   
                                                         <div class="row">
                                                                   <div class="col-md-12 no-padding">
                                                                     <div class="portlet light ">
                                                                         <div class="portlet-title">
                                                                           <div class="caption">Mobile Numbers</div>
                                                                         </div>                                                                
                                                                         <div class="portlet-body">
                                                                             <div class="form-body">
                                                                                 <div class="form-group">
                                                                                     <div class="mt-repeater">
                                                                                         <div data-repeater-list="group-a">
                                                                                           <input class="input_count" type="hidden" name="theValue_mobile" id="theValue_mobile">
                                                                                             <div data-repeater-item class="mt-repeater-item">
                                                                                                 <!-- jQuery Repeater Container -->                            
                                                                                                  
                                                                                                   <div class="form-group col-md-5">
                                                                                                       <label class="control-label">Mobile</label>
                                                                                                       <input type="text"  class="form-control valid"  id="prs_mobile_extra" name="prs_mobile_extra" aria-invalid="false" onkeypress='return validateMOBILE(event);'>
                                                                                                   </div>  
                                                                                                     <div class="form-group col-md-1">
                                                                                                       <label class="control-label" style="display: block;">&nbsp;</label>
                                                                                                       <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete">
                                                                                                       <i class="fa fa-close"></i> </a>  
                                                                                                   </div>  
                                                                                                   
                                                                                             </div>
                                                                                         </div>
                                                                                         <div class="form-group  col-md-12">
                                                                                             <a href="javascript:;" data-repeater-create class="btn btn-success mt-repeater-add"><i class="fa fa-plus"></i> Add</a>
                                                                                         </div>                                                                         
                                                                                     </div>
                                                                                 </div>
                                                                             </div>
                                                                         </div>
                                                                     </div>
                                                                   </div>
                                                          </div>

                                                           <div class="row">
                                                                   <div class="col-md-12 no-padding">
                                                                     <div class="portlet light ">
                                                                         <div class="portlet-title">
                                                                           <div class="caption">Emails</div>
                                                                         </div>                                                                
                                                                         <div class="portlet-body">
                                                                             <div class="form-body">
                                                                                 <div class="form-group">
                                                                                     <div class="mt-repeater">
                                                                                         <div data-repeater-list="group-b">
                                                                                           <input class="input_count" type="hidden" name="theValue_email" id="theValue_email">
                                                                                             <div data-repeater-item class="mt-repeater-item">
                                                                                                 <!-- jQuery Repeater Container -->                            
                                                                                                  
                                                                                                   <div class="form-group col-md-5">
                                                                                                       <label class="control-label">Email</label>
                                                                                                       <input type="email"  class="form-control valid"  id="prs_email_extra" name="prs_email_extra" aria-invalid="false" >
                                                                                                   </div>  
                                                                                                     <div class="form-group col-md-1">
                                                                                                       <label class="control-label" style="display: block;">&nbsp;</label>
                                                                                                       <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete">
                                                                                                       <i class="fa fa-close"></i> </a>  
                                                                                                   </div>  
                                                                                                   
                                                                                             </div>
                                                                                         </div>
                                                                                         <div class="form-group  col-md-12">
                                                                                             <a href="javascript:;" data-repeater-create class="btn btn-success mt-repeater-add"><i class="fa fa-plus"></i> Add</a>
                                                                                         </div>                                                                         
                                                                                     </div>
                                                                                 </div>
                                                                             </div>
                                                                         </div>
                                                                     </div>
                                                                   </div>
                                                          </div>
                                                        <div class="form-actions ">

                                                            <button type="submit" class="btn blue" name="form_submit" id="form_submit">Save</button>
                                                            <button type="button" class="btn default" name="cancel_button" id="cancel_button" onclick="history.go(-1)">Cancel</button>

                                                        </div>

                                                </form>
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
                        <?php $this->load->view('common/footer')?>
                            <!-- END FOOTER -->
                </div>

                 <?php $this->load->view('common/footer_scripts')?> 
                <!-- END CORE PLUGINS -->
                <!-- BEGIN PAGE LEVEL PLUGINS -->
               
                <script src="<?php echo base_url() ?>assets/global/plugins/dropify/js/dropify.min.js" type="text/javascript"></script>
                <!-- END PAGE LEVEL PLUGINS -->
                <!-- BEGIN THEME GLOBAL SCRIPTS -->
                
                <!-- END THEME GLOBAL SCRIPTS -->
                <!-- BEGIN THEME LAYOUT SCRIPTS -->
                
                <!-- END THEME LAYOUT SCRIPTS -->
                 <script src="<?php echo base_url() ?>assets/global/plugins/jquery-repeater/jquery.repeater.js" type="text/javascript"></script>
                  <script src="<?php echo base_url() ?>assets/pages/scripts/form-repeater.js" type="text/javascript"></script>
                <script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
                <script src="<?php echo base_url() ?>assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
                <script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
                <script src="<?php echo base_url() ?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
                
                <script src="<?php echo base_url() ?>assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
                <script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
                <script src="<?php echo base_url() ?>assets/pages/scripts/components-editors.min.js" type="text/javascript"></script>
                <script src="<?php echo base_url() ?>assets/js/form_validation/add-user.js"></script>
              

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
                            data = {
                                    type: type,
                                    value: value
                                },
                                $.ajax({
                                    type: "POST",
                                    url: base_url + "User/checkValidation",
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
                </script>
    </body>

    </html>