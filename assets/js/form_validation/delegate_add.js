 $(function() {
//alert('hello');
    // Setup form validation on the #register-form element
    $("#add_delegate").validate({  

        // Specify the validation rules
        ignore: 'input[type="hidden"]',
                      rules: {
                        prs_password: {
                            required: true,
                            minlength: 5
                        },
                        cnfm_password: {
                            required: true,
                            minlength: 5,
                            equalTo: "#prs_password"
                        }
                    },
                  messages: {
                         cnfm_password: {
                            message :"Please enter same password"
                        },
                      }, 
        
        // Specify the validation error messages
        submitHandler: function(form) {


            document.getElementById("submit").style.display="none";
            document.getElementById("processing").style.display="inline-block";


         
              var dgt_clb_id = document.getElementById('dgt_clb_id').value; 
              var dgt_bdg_name = document.getElementById('dgt_bdg_name').value;
              var prs_name = document.getElementById('prs_name').value; 
              var prs_mob = document.getElementById('prs_mob').value;
              var prs_email = document.getElementById('prs_email').value;
              var dgt_cat_id = document.getElementById('dgt_cat_id').value;
              var dgt_prs_id = document.getElementById('dgt_prs_id').value;
              var prs_password = document.getElementById('prs_password').value;

              data =
               {
                dgt_clb_id:dgt_clb_id,
                dgt_bdg_name:dgt_bdg_name,
                prs_name:prs_name,
                prs_mob:prs_mob,
                prs_email:prs_email,
                dgt_cat_id:dgt_cat_id,
                dgt_prs_id:dgt_prs_id,
                prs_password:prs_password
              }

              // console.log(data);
              $.ajax({
                    type: "POST",
                   url: base_url+"Delegate/delegate_insert", 
                   data : data,
                    dataType:"json",
                    success: function(response){
                        if(response.success==true){
                                document.getElementById("submit").style.display="inline-block";
                                document.getElementById("processing").style.display="none";
                               swal({title: response.message, text: "", type: "success"},
                                             function(){ 
                                                 window.location.href=response.linkn;
                                             }
                                          );
                        }else{
                                 swal(response.mob_msg);
                                 document.getElementById("submit").style.display="inline-block";
                                 document.getElementById("processing").style.display="none";

                                          }
          
        }
    });

        }
    });

  });