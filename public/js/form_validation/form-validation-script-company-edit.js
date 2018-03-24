 $(function() {

 
    // Setup form validation on the #register-form element
    $("#edit_company").validate({
    
        
       rules: {
         
           cmp_name: "required",
            cmp_gst_register:"required",

            
             
        },
       
        
        submitHandler: function(form) {
            var cmp_id = document.getElementById('cmp_id').value;
            var cmp_name = document.getElementById('cmp_name').value;
            var cmp_state=document.getElementById('cmp_state').value;
            var cmp_loc_id = document.getElementById('cmp_loc_id').value;
            var cmp_address=document.getElementById('cmp_address').value;
            var cmp_mobile = document.getElementById('cmp_mobile').value;
              var cmp_email = document.getElementById('cmp_email').value;
            var cmp_gst_register=document.getElementById('cmp_gst_register').value;
            var cmp_gst_no =document.getElementById('cmp_gst_no').value;
             var cmp_website =document.getElementById('cmp_website').value;

           
          
              data = {
                   cmp_id:cmp_id,
                   cmp_name:cmp_name,
                   cmp_state:cmp_state,
                   cmp_loc_id:cmp_loc_id,
                   cmp_address:cmp_address,
                   cmp_mobile:cmp_mobile,
                   cmp_email:cmp_email,
                   cmp_gst_register:cmp_gst_register,
                   cmp_website:cmp_website,
                   cmp_gst_no:cmp_gst_no,
                 
                }
                  
                   

            document.getElementById("form_submit").style.display="none";
            // document.getElementById("processing").style.display="inline-block";
            
              $.ajax({
                    type: "POST",
                   url: base_url+"Company/updatecompany",
                   data : data,
                    dataType:"json",
                    success: function(response){
                     // alert(response.success);
                        if(response.success==true){
                          alert(response.message);
                                document.getElementById("form_submit").style.display="inline-block";
                                // document.getElementById("processing").style.display="none";
                                window.location.href=response.linkn;
                        }else{
                                 alert(response.message);
                                 document.getElementById("form_submit").style.display="inline-block";
                                 // document.getElementById("processing").style.display="none";

                                          }
          
        }
    });

        }
    });

  });