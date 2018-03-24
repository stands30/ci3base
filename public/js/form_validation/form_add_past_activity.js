 $(function() {
       
  // alert('1');
    // Setup form validation on the #register-form element
    $("#team_activity_add_form").validate({
    

        // Specify the validation rules
        rules: {
         
          
           
        },
        
        // Specify the validation error messages
     
        
        submitHandler: function(form) {
             document.getElementById("submit-button").style.display="none";
            document.getElementById("processing").style.display="inline-block";

            var act_activity = document.getElementById('act_activity').value; 
             // alert(act_activity);
            var act_activity_id = document.getElementById('act_activity_id').value;
              // alert(act_activity_id);
            var act_type_gnp = document.getElementById('act_type_gnp').value; 
              // alert(act_type_gnp);
             var act_task = document.getElementById('act_task').value;
              // alert(act_task);
            var act_start_time = document.getElementById('act_start_time').value;
              // alert(act_start_time);
             var act_end_time = document.getElementById('act_end_time').value; 
             // alert(act_end_time);
             var act_total_duration = document.getElementById('act_total_duration').value;
              // alert(act_total_duration);
            var act_comment = document.getElementById('act_comment').value;
             // alert(act_comment);
              var act_review = document.getElementById('act_review').value;
             // alert(act_review);
            var act_cost = document.getElementById('act_cost').value;
               var act_tck_id = document.getElementById('act_tck_id').value;

            var act_user = document.getElementById('act_user_id').value; 
              // alert(act_user);
            var act_past_date = document.getElementById('act_past_date').value;
              // alert(act_past_date); 
            
              

              data = {
                act_activity:act_activity,
                 act_activity_id:act_activity_id,
                 act_type_gnp:act_type_gnp,
                 act_task:act_task,
                 act_start_time:act_start_time,
                 act_end_time:act_end_time,
                  act_total_duration:act_total_duration,
                   act_comment:act_comment,
                   act_review:act_review,
                   act_cost:act_cost,
                   act_tck_id:act_tck_id,
                   act_user:act_user,
                   act_past_date:act_past_date


                 
                 
                }


         

              $.ajax({
                    type: "POST",
                   url: "activity/insertActivity", 
                   data : data,
                    dataType:"json",
                    success: function(response){
          // alert('vjhfgg');
                        if(response.success==true){
            //                         document.getElementById("submit-button").style.display="inline-block";
            // document.getElementById("processing").style.display="none";
                                window.location.href=response.linkn;
                        }else{
                                 alert(response.message);
                                  document.getElementById("submit-button").style.display="inline-block";
            document.getElementById("processing").style.display="none";

                                          }
          
        }
    });

        
}
    });

  });