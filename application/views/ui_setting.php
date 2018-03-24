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
  <title>User Add | <?php echo $this->Home_model->getBsnData('header_title'); ?>
</title>
 
 <?php $this->load->view('common/header_styles')?>
  <!-- BEGIN PAGE LEVEL PLUGINS -->
  <link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url() ?>assets/global/plugins/dropify/css/dropify.min.css" rel="stylesheet" type="text/css" />
  <!-- END PAGE LEVEL PLUGINS -->
  <!-- BEGIN THEME GLOBAL STYLES -->
  <link href="<?php echo base_url() ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
  <link href="<?php echo base_url() ?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
  <!-- END THEME GLOBAL STYLES -->
 
  <!-- END THEME LAYOUT STYLES -->
  <!-- select2 css files -->
  <link href="<?php echo base_url() ?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url() ?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
  <!-- END THEME LAYOUT STYLES -->
  <link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
 
  <style type="text/css">
    
    #information1{
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
  
                          <div class="row">
                            <div class="col-md-12 ">
                              <!-- BEGIN SAMPLE FORM PORTLET-->
                              <div class="portlet light bordered">
                                <div class="portlet-title">
                                  <div class="caption font-orange">
                                    <i class="icon-user font-orange"></i>
                                    <span class="caption-subject bold uppercase">Add UI</span>
                                  </div>
                                </div>

                                <div class="portlet-body form">
                                  <div id="error" style="text-align: center;">
                                  </div>
                                  <form id="image_upload" method="post"  class="horizontal-form">


                                   <div class="form-body">
                                   


                          
                           
                              
                                    <?php
                                    $i =1;
                                     foreach ($ui_field as $key ) {

                                       if($key->uis_value=='')
                                              {
                                                $src=NO_IMAGE;
                                                }
                                                else{
                                                    $src=base_url().UI_IMAGE_PATH.$key->uis_value;

                                                }

                                     ?>
                     
                     <div class="row">
                         <div class="col-md-6">
                                  <div class="form-group">
                                  <label for="uis_type" class="control-label"> Type<span style="color:red">*</span></label>
                                      <input type="text" readonly="" class="form-control"  id="uis_type<?php echo $i;?>" name="uis_type<?php echo $i;?>" value="<?php echo $key->uis_type; ?>"  required=""  > 
                                   <span class="help-block"></span>
                                 </div>
                               </div>
                       <div class="form-group last col-md-6">
                         <input type="hidden" name="uis_id<?php echo $i;?>" id="uis_id<?php echo $i;?>" value="<?php echo $key->uis_id ?>">
                         <input type="hidden" name="uis_field<?php echo $i;?>" id="uis_field<?php echo $i;?>" value="<?php echo $key->uis_field ?>">
                        <?php if($key->uis_field == 1){
                        ?>
                       <label class="control-label">Add Pic <h style="color:red">(Max size 5MB)</h></label>
                       
                       <input type="hidden" name="uis_value<?php echo $i;?>" id="uis_value<?php echo $i;?>" value="<?php echo $key->uis_value ?>">
                        <div class="fileinput fileinput-new " data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                    <img  src="<?php echo $src?>" alt="" /> </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                <div>
                                                    <span class="btn default btn-file">
                                                        <span class="fileinput-new"> Change image </span>
                                                        <span class="fileinput-exists"> Change </span>
                                                        <input type="file"  name="BLO_img<?php echo $i;?>" id="BLO_img<?php echo $i;?>" > </span>
                                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                </div>
                                            </div>
                                             <?php }elseif ($key->uis_field == 2) {
                                            
                        ?>
                        <div class="form-group">
                        <label class="control-label">Add Text</label>
                       
                       <input type="text" class="form-control" name="uis_value<?php echo $i;?>" id="uis_value<?php echo $i;?>" value="<?php echo $key->uis_value ?>">
                        <span class="help-block"></span>
                      </div>
                         <?php }
                        ?>
                       
                         </div>
                     </div>
                       <?php $i++; } ?>
                       <input type="hidden" name="field_count" id="field_count" value="<?php echo count($ui_field)?>">
                    
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
 <div>
 <?php $this->load->view('common/footer_scripts')?> 
          <!-- BEGIN PAGE LEVEL PLUGINS -->
          <script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
          <script src="<?php echo base_url() ?>assets/global/plugins/dropify/js/dropify.min.js" type="text/javascript"></script>
          <!-- END PAGE LEVEL PLUGINS -->
          <!-- BEGIN THEME GLOBAL SCRIPTS -->
          
          <!-- END THEME GLOBAL SCRIPTS -->
          
          <script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url() ?>assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
     <script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
          <script src="<?php echo base_url() ?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
          
          <script src="<?php echo base_url() ?>assets/pages/scripts/components-select2.min.js" type="text/javascript"></script> 
                 <script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
          <script src="<?php echo base_url() ?>assets/pages/scripts/components-editors.min.js" type="text/javascript"></script>
          
          


<script type="text/javascript">
var base_url='<?php echo base_url();?>';


     $(function() 
         {


       $("#image_upload").validate
    ({
       submitHandler: function(form) 
       {
   

        var BASE_URL = "<?php echo base_url();?>";
          $('#form_submit').css('display','inline-block');
         // $('#processing_other').css('display','inline-block');

      
   
    
 var formData = new FormData();
  var file = $('input[type=file]');
                    var file_count =file.length;
                    var flag=true;

 for(i=0;i<file_count;i++)
             {
                   if(i == '0')
                {
                    var allowedFiles = ["jpeg", "jpg", "png","JPG","PNG","ico"];
                }
               
                    var file_name = file.eq(i).prop('name');
               if(file[i].files.length != '0') 
               {
                    var fileName = file[i].files[0].name;
                    var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                    var size = parseFloat(file[i].files[0].size / 1024).toFixed(2);
                if ($.inArray(fileNameExt, allowedFiles) == -1 || size>5000)
                 {
                    var data = " Invalid Size or type";
                    flag=false;
                    file.eq(i).css('border-color','red ');
                    file.eq(i).next().css('color','red ');
                    file.eq(i).next().html(data);
                    return false;
                 }
                 else
                 {
                    flag=true;
                    file.eq(i).css('border-color','red ');
                    file.eq(i).next().css('color','red ');
                    file.eq(i).next().html('');
                    formData.append(file_name, file[i].files[0]);
                  
                 }
              
                }
                else
                {
                   flag=true;
                }
             }
             if(flag)
             {
               var uis_id =new Array();
                   var uis_type =new Array();
                   var uis_value =new Array();
                   var uis_field = new Array();
                  

                for(i=1;i<=document.getElementById('field_count').value;i++)
                     {
                       uis_id.push($('#uis_id'+i).val());
                       uis_type.push($('#uis_type'+i).val());
                      
                       uis_value.push($('#uis_value'+i).val());
                       uis_field.push($('#uis_field'+i).val());
                      

                     }

                   formData.append('uis_id',uis_id); 
                   formData.append('uis_type',uis_type);
                
                   formData.append('uis_value',uis_value); 
                   formData.append('uis_field',uis_field);
                  
               
               
 $.ajax({
        type: "POST",
     
     url: BASE_URL+ "UI_setting/updateProfilePic",
      
         data : formData,
        dataType:"json",
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData:false,
        success: function(response){

        
            if(response.success==true){
              alert(response.message);
           location.reload();
         
  }
      else{

      $('#form_submit').css('display','inline-block');
         // $('#processing_other').css('display','none');

          alert(response.message);
        }
        }

     });

             }




       }
    });

  });
        $( '#number' ).keydown(function(event) {
        $(this).attr('maxlength','10');
    var key = window.event ? event.keyCode : event.which;
if (event.keyCode == 8 || event.keyCode == 46) {
    return true;
}
else if ( key < 48 || key > 57 ) {
    return false;
}
else return true;
});

</script>
    </body>

    </html>