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
            Bussiness Parameter |
                <?php echo $this->Home_model->getBsnData('header_title'); ?>
                    < </title>
                         <?php $this->load->view('common/header_styles')?>
                        <!-- BEGIN GLOBAL MANDATORY STYLES -->
                       
                        <!-- END GLOBAL MANDATORY STYLES -->
                        <!-- BEGIN PAGE LEVEL PLUGINS -->
                       
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
                                 
                                    <!-- END BEGIN PROFILE SIDEBAR -->
                                    <!-- BEGIN PROFILE CONTENT -->
                                    <div class="profile-content" id="hideme">
                                        <div class="row">
                                            <div class="col-md-12 ">

                                                <div class="profile-content" id="viewme" style="display: block;">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="portlet light clearfix">
                                                                
                                                                <div class="portlet-body">
                                                                    <div class="tab-content">
                                                                        <!-- PERSONAL INFO TAB -->
                                                                        <div class="tab-pane active" id="tab_1_1">
                                                                            <form role="form" action="#" id="bsn_prm_edit">
                                                                               
                                                                                
                                                                               <div class="row">
                                                                   <div class="col-md-12 no-padding">
                                                                     <div class="portlet light ">
                                                                                                                                    
                                                                         <div class="portlet-body">
                                                                             <div class="form-body">
                                                                                 <div class="form-group">
                                                                                     <div class="mt-repeaters-new-30">
                                                                                         <div data-repeater-list="group-a">

                                                                                           <input class="input_count" type="hidden" name="theValue_skill" id="theValue_skill" value="<?php echo $req_skill_cnt?>">

                                                                                             <div data-repeater-item class="mt-repeater-item">
                                                                                                 <!-- jQuery Repeater Container -->                            
                                                                                                   <div class="form-group col-md-6">

                                                                                                     <input class="form-control mt-repeater-input-inline" type="hidden" name="bpm_id" id="bpm_id" value="" >

                                                                                                       <label class="control-label">Name</label>
                                                                                                          <div class="input-group">
                                                                                                              <input type="text"  class="form-control valid"  id="bpm_name" name="bpm_name" aria-invalid="false" required="" >
                                                                                                              <span class="input-group-btn">
                                                                                                               
                                                                                                            </span>
                                                                                                          </div>
                                                                                                   </div> 
                                                                                                   <div class="form-group col-md-5">
                                                                                                       <label class="control-label">Value</label>
                                                                                                       <input type="text"  class="form-control valid"  id="bpm_value" name="bpm_value" aria-invalid="false" required="" >
                                                                                                   </div>  
                                                                                                   <div class="form-group col-md-1">
                                                                                                       <label class="control-label" style="display: block;">&nbsp;</label>
                                                                                                       <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete" onclick="return decreasesklCount()">
                                                                                                       <i class="fa fa-close"></i> </a>  
                                                                                                   </div>    
                                                                                                   
                                                                                             </div>
                                                                                         </div>
                                                                                         <div class="form-group  col-md-12">
                                                                                             <a href="javascript:;" data-repeater-create class="btn btn-success mt-repeater-add" onclick="return increasesklCount()"><i class="fa fa-plus"></i> Add</a>
                                                                                         </div>                                                                         
                                                                                     </div>
                                                                                 </div>
                                                                             </div>
                                                                         </div>
                                                                     </div>
                                                                   </div>
                                                                 </div>





                                                


                                                                                <div class="col-md-12">
                                                                                    <div class="margin-4">
                                                                                        <input type="submit" id="form_submit" class="btn green" value="Submit " />
                                                                                        <input type="button" id="cancel" class="btn default" value="Cancel " />
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <!-- END PERSONAL INFO TAB -->
                                                                       

                                                                    </div>
                                                                </div>
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
                        </div>
                         <script src="<?php echo base_url() ?>assets/js/form_validation/bsn_prm.js"></script>
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


    var some_data = '<?php echo $somedata?>';

    var myObj = JSON.parse(some_data);
    var $repeater = $(".mt-repeaters-new-30").repeater();
    $repeater.setList(myObj);
  
   function decreasesklCount()
   {
    var d = confirm('Are You Sure Want To Remove This Skillset');
                        if (d ==true) {

    var count=document.getElementById('theValue_skill').value;

    var newCount=parseFloat(count)-1;

    document.getElementById('theValue_skill').value=newCount;
  }

   }



   function increasesklCount()
   {

     var count=document.getElementById('theValue_skill').value;
     var newCount=parseFloat(count)+1;
     document.getElementById('theValue_skill').value=newCount;

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