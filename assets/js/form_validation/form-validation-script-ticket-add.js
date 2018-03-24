 $(function() {

    // Setup form validation on the #register-form element
    $("#ticket_add_form").validate({  

      
        // Specify the validation error messages
        submitHandler: function(form) {

            document.getElementById("form_submit").style.display="none";
            document.getElementById("processing").style.display="inline-block";
           
           var tck_title = document.getElementById('tck_title').value;

           
         
        var tck_priority = document.getElementById('tck_priority').value;
           var tck_status = document.getElementById('tck_status').value;
            var tck_user = document.getElementById('tck_user').value;
              var tck_prj = document.getElementById('tck_prj').value;
           var tck_ref_no = document.getElementById('tta_tck_ref_no').value;
 var tck_desc = document.getElementById('summernote_1').value;
 var tck_type = document.getElementById('tck_type').value;
 var tck_flag = document.getElementById('tck_flag').value;

         
              data = {
               
                 tck_title:tck_title,
                 tck_desc:tck_desc,
                 tck_priority:tck_priority,
                   tck_user:tck_user,
                 tck_prj:tck_prj,
                 tck_status:tck_status,
                tck_ref_no:tck_ref_no,
                tck_type:tck_type,
                tck_flag:tck_flag

               
                 
                }



              $.ajax({
                    type: "POST",
                   url:base_url+ "Ticket/insertTicket",
                   data : data,
                    dataType:"json",
                    success: function(response){
                        if(response.success==true){
                                document.getElementById("form_submit").style.display="inline-block";
                                document.getElementById("processing").style.display="none";
                                alert(response.message);
                                window.location.href=response.linkn;
                        }else{

                                 alert(response.message);
                                 document.getElementById("form_submit").style.display="inline-block";
                                 document.getElementById("processing").style.display="none";

                                          }
          
        }
    });

        }
    });

  });