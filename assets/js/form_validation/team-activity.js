$(document).ready(function () {
  //called when key is pressed in textbox
  $("#booking_amt").keypress(function (evt) {
     //if the letter is not digit then display error and don't type anything
     evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;

    if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    else {
            // If the number field already has . then don't allow to enter . again.
            if (evt.target.value.search(/\./) > -1 && charCode == 46) {
                return false;
            }
    return true;
  }
   });
  $("#BRD_reg").keypress(function (evt) {
     //if the letter is not digit then display error and don't type anything
     evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;

    if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    else {
            // If the number field already has . then don't allow to enter . again.
            if (evt.target.value.search(/\./) > -1 && charCode == 46) {
                return false;
            }
    return true;
  }
   });
  $("#BRD_ins").keypress(function (evt) {
     //if the letter is not digit then display error and don't type anything
     evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;

    if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    else {
            // If the number field already has . then don't allow to enter . again.
            if (evt.target.value.search(/\./) > -1 && charCode == 46) {
                return false;
            }
    return true;
  }
   });
  $("#BRD_depo").keypress(function (evt) {
     //if the letter is not digit then display error and don't type anything
     evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;

    if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    else {
            // If the number field already has . then don't allow to enter . again.
            if (evt.target.value.search(/\./) > -1 && charCode == 46) {
                return false;
            }
    return true;
  }
   });
  $("#BRD_ctm").keypress(function (evt) {
     //if the letter is not digit then display error and don't type anything
     evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;

    if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    else {
            // If the number field already has . then don't allow to enter . again.
            if (evt.target.value.search(/\./) > -1 && charCode == 46) {
                return false;
            }
    return true;
  }
   });
   $("#accessories").keypress(function (evt) {
     //if the letter is not digit then display error and don't type anything
     evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;

    if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    else {
            // If the number field already has . then don't allow to enter . again.
            if (evt.target.value.search(/\./) > -1 && charCode == 46) {
                return false;
            }
    return true;
  }
   });
    $("#atharv_care").keypress(function (evt) {
     //if the letter is not digit then display error and don't type anything
     evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;

    if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    else {
            // If the number field already has . then don't allow to enter . again.
            if (evt.target.value.search(/\./) > -1 && charCode == 46) {
                return false;
            }
    return true;
  }
   });
});

function loadActivity(act_activity){
		if(act_activity==1)
	{
			
			document.getElementById("act_tck_id_div").style.display="none";

	}
	

	$.ajax({
		type:"POST",
    	 url:"home1/ajax_call_Activity", 
		data :{ act_activity:act_activity},
		success: function(myvar){
			//alert(myvar);
			document.getElementById('act_activity_id').value='';
			$('#act_activity_id').html(myvar);
			
			
		}
	});
}
function loadTicket(act_activity) 
{
	if(act_activity==2)
	{
			$.ajax({
		type:"POST",
    	 url:"home1/ajax_call_ticket", 
		data :{ act_activity:act_activity},
		success: function(myvar){
			//alert(myvar);
			document.getElementById('act_activity_id').value='';

			$('#act_tck_id').html(myvar);
			document.getElementById("act_tck_id_div").style.display="block";

			
			
		}
	});

	}
}



function  loadProject(act_activity_id) {

	if(act_activity_id == "")
	{
		
	}
}




function loadVarient(MOD_id){
	$.ajax({
		type:"POST",
    	url:"home1/ajax_call_varient", 
		data :{ MOD_id:MOD_id},
		success: function(myvar){
			//alert(myvar);
			$('#CUS_VRN_id').html(myvar);
			
			
			document.getElementById('CUS_MAN_id').value='';
			document.getElementById('CUS_LOC_id').value='';
			document.getElementById('BKG_car_color').value='';
			   //document.getElementById('text_cal').style.display ="none";
			   document.getElementById('button_data').style.display="block";
			   document.getElementById('calculate_data').style.display="none";


		}
	});
}

function loadmodellable (MOD_id) {
	if(MOD_id == ""){
		document.getElementById('CUS_VRN_id').value="";
		document.getElementById('CUS_MAN_id').value='';
		document.getElementById('CUS_LOC_id').value='';
		document.getElementById('BKG_car_color').value='';
		//document.getElementById('text_cal').style.display ="none";
			   document.getElementById('button_data').style.display="block";
			   document.getElementById('calculate_data').style.display="none";
			   
	}
}


function loadmanufacturing_year(VRN_id) {
	$.ajax({
		type:"POST",
    	url:"home1/ajax_call_manufacturing_year", 
		data :{ VRN_id:VRN_id},
		success: function(myvar){
			//alert(myvar);
			$('#CUS_MAN_id').html(myvar);
			
			document.getElementById('CUS_LOC_id').value='';
			document.getElementById('BKG_car_color').value='';

			   //document.getElementById('text_cal').style.display ="none";
			   document.getElementById('button_data').style.display="block";
			   document.getElementById('calculate_data').style.display="none";


		}
	});
}

function loadvarientlable(CUS_VRN_id) {
	if(CUS_VRN_id == ""){
		
		document.getElementById('CUS_MAN_id').value='';
		document.getElementById('CUS_LOC_id').value='';
		document.getElementById('BKG_car_color').value='';
		//document.getElementById('text_cal').style.display ="none";
			   document.getElementById('button_data').style.display="block";
			   document.getElementById('calculate_data').style.display="none";
			   
	}
}




function loadlocation(CUS_MAN_id) {
	$.ajax({
		type:"POST",
    	url:"home1/ajax_call_loaction", 
		data :{ CUS_MAN_id:CUS_MAN_id},
		success: function(myvar){
			//alert(myvar);
			$('#CUS_LOC_id').html(myvar);
			
		
			document.getElementById('BKG_car_color').value='';

			   //document.getElementById('text_cal').style.display ="none";
			   document.getElementById('button_data').style.display="block";
			   document.getElementById('calculate_data').style.display="none";


		}
	});
}

function loadlocationfinance(FIN_BNK_id,i){
  $.ajax({
    type:"POST",
      url:"home1/ajax_call_finance_location", 
    data :{ FIN_BNK_id:FIN_BNK_id},
    success: function(myvar){
      //alert(myvar);
      $('#FNS_lgn_bank_location'+i).html(myvar);
      
    }
  });
}


function loadmanufaturinglable(CUS_MAN_id) {
	if(CUS_MAN_id == ""){
		
		document.getElementById('CUS_LOC_id').value='';
		document.getElementById('BKG_car_color').value='';
		//document.getElementById('text_cal').style.display ="none";
			   document.getElementById('button_data').style.display="block";
			   document.getElementById('calculate_data').style.display="none";
			   
	}
}


function loadcolor(CUS_LOC_id) {
	$.ajax({
		type:"POST",
    	url:"home1/ajax_call_car_color", 
		data :{ CUS_LOC_id:CUS_LOC_id},
		success: function(myvar){
			//alert(myvar);
			$('#BKG_car_color').html(myvar);
		   //document.getElementById('text_cal').style.display ="none";
			   document.getElementById('button_data').style.display="block";
			   document.getElementById('calculate_data').style.display="none";


		}
	});
}

function loadlocationlable(CUS_LOC_id) {
	if(CUS_LOC_id == ""){
		
		
		document.getElementById('BKG_car_color').value='';
		//document.getElementById('text_cal').style.display ="none";
			   document.getElementById('button_data').style.display="block";
			   document.getElementById('calculate_data').style.display="none";
			   
	}
}




$('#chknative').click(function(){
		if(document.getElementById('chknative').checked==true){
			var CUS_BNK_id = $('#CUS_BNK_id').val();
			var CUS_branch = $('#CUS_branch').val();
			
			document.getElementById('CUS_home_bank').value=CUS_BNK_id;
			document.getElementById('CUS_home_branch').value=CUS_branch;
			
			
		}else{
			document.getElementById('CUS_home_bank').value='';
			document.getElementById('CUS_home_branch').value='';
			
		}
	});
$('#BDT_home_brnch_No').click(function(){
		document.getElementById('home_bank_div').style.display="block";
	});
$('#BDT_home_brnch_Yes').click(function(){
		document.getElementById('home_bank_div').style.display="none";
	});


$('#GUR_ITR_No').click(function(){
	document.getElementById('ITR_chargesnew').value = 0;
	calculate_additional();
		calculate();
		
		

		document.getElementById('CUS_GUR_ITR_div').style.display="none";
		document.getElementById('CUS_GUR_ITR_label').style.display="none";
		document.getElementById('CUS_GUR_ITR_id').value ='';

		 //document.getElementById('text_cal').style.display ="none";
			   document.getElementById('button_data').style.display="block";
			   document.getElementById('calculate_data').style.display="none";
			   //document.getElementById('button_add_cal').style.display ="block";
			   //document.getElementById('text_add_cal').style.display ="none";
	});
$('#GUR_ITR_Yes').click(function(){
	calculate_additional();
		calculate();
		document.getElementById('CUS_GUR_ITR_div').style.display="Block";
		document.getElementById('CUS_GUR_ITR_label').style.display="Block";
		document.getElementById('CUS_GUR_ITR_id').value ='';
		 //document.getElementById('text_cal').style.display ="none";
			   document.getElementById('button_data').style.display="block";
			   document.getElementById('calculate_data').style.display="none";
			   //document.getElementById('button_add_cal').style.display ="block";
			   //document.getElementById('text_add_cal').style.display ="none";
	});


$('#Pay_mode_Cash').click(function(){
		document.getElementById('common_pay').style.display="Block";
		document.getElementById('cheque_pay').style.display="none";
		document.getElementById('home_bank_div').style.display="Block";
	});

$('#Pay_mode_Cheque').click(function(){
		document.getElementById('common_pay').style.display="Block";
		document.getElementById('cheque_pay').style.display="Block";
		document.getElementById('home_bank_div').style.display="Block";
	});
$('#Pay_mode_Other').click(function(){
		document.getElementById('common_pay').style.display="Block";
		document.getElementById('cheque_pay').style.display="none";
		document.getElementById('home_bank_div').style.display="Block";
	});



function loadGhumasthaamnt (CUS_GMS_id) {
	$.ajax({
		type:"POST",
    	url:"home1/ajax_call_ghumastha_amnt", 
		data :{ CUS_GMS_id:CUS_GMS_id},
		success: function(myvar){
			/* var newmyvar  =	indiancurrency(myvar);
			   
			$('#GMS_charges_label').text(newmyvar);*/
			document.getElementById('GMS_charges').value = myvar;
			 //document.getElementById('button_cal').style.display ="Block";
			   //document.getElementById('text_cal').style.display ="none";
			   document.getElementById('button_data').style.display="block";
			   document.getElementById('calculate_data').style.display="none";
			   //document.getElementById('CUS_pay_amnt3').value = myvar;
			   calculate_additional();
			   calculate();

			   //document.getElementById('button_add_cal').style.display ="block";
			   //document.getElementById('text_add_cal').style.display ="none";
			  
		}
	});
}

function indiancurrency (x) {
	x=x.toString();
var afterPoint = '';
if(x.indexOf('.') > 0)
   afterPoint = x.substring(x.indexOf('.'),x.length);
x = Math.floor(x);
x=x.toString();
var lastThree = x.substring(x.length-3);
var otherNumbers = x.substring(0,x.length-3);
if(otherNumbers != '')
    lastThree = ',' + lastThree;
var res1 = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree + afterPoint;
var res ='Rs:'+res1;
	
return res ;
}

function loadItramnt (CUS_ITR_id) {
	$.ajax({
		type:"POST",
    	url:"home1/ajax_call_itr_amnt", 
		data :{ CUS_ITR_id:CUS_ITR_id},
		success: function(myvar){
			//alert(myvar);
			 /*var newmyvar  =	indiancurrency(myvar);
			 $('#ITR_charges_lable').text(newmyvar) ;*/
			document.getElementById('ITR_charges').value = myvar;
			 //document.getElementById('button_cal').style.display ="Block";
			   //document.getElementById('text_cal').style.display ="none";
			   document.getElementById('button_data').style.display="block";
			   document.getElementById('calculate_data').style.display="none";
			  // document.getElementById('CUS_pay_amnt2').value = myvar;
			  calculate_ITR();
			   calculate_additional();
			   calculate();
			   
		}
	});
}

	function calculate_ITR(argument) {
			ITR_charges=  	document.getElementById('ITR_charges').value ;
			     ITR_chargesnew = document.getElementById('ITR_chargesnew').value;
			    if(ITR_charges ==""){
			     	ITR_charges =0;
			     }else{
			     	ITR_charges=ITR_charges;
			     }
			     if(ITR_chargesnew ==""){
			     	ITR_chargesnew = 0;
			     }else{
			     	ITR_chargesnew=ITR_chargesnew;
			     }
			   onroad = parseFloat(ITR_charges) + parseFloat(ITR_chargesnew);
			 // document.getElementById('CUS_pay_amnt2').value = onroad;
			 
}

function loadItramntnew (CUS_ITR_id) {
	$.ajax({
		type:"POST",
    	//url:'/'+"home1/ajax_call_itr_amnt", 
    	url:"home1/ajax_call_itr_amnt",
		data :{ CUS_ITR_id:CUS_ITR_id},
		success: function(myvar){
			//alert(myvar);
			 /*var newmyvar  =	indiancurrency(myvar);
			 $('#ITR_charges_lablenew').text(newmyvar) ;*/
			document.getElementById('ITR_chargesnew').value = myvar;
			 //document.getElementById('button_cal').style.display ="Block";
			   //document.getElementById('text_cal').style.display ="none";
			   document.getElementById('button_data').style.display="block";
			   document.getElementById('calculate_data').style.display="none";
			    calculate_ITR();
			   calculate_additional();
			   calculate();
			   //document.getElementById('button_add_cal').style.display ="block";
			   //document.getElementById('text_add_cal').style.display ="none";
		}
	});
}

function calculate_additional(argument) {
	
			    GMS_charges=  	document.getElementById('GMS_charges').value  ;
			     ITR_charges=  	document.getElementById('ITR_charges').value ;
			     ITR_chargesnew = document.getElementById('ITR_chargesnew').value;
			      CUS_pay_amount = document.getElementById('CUS_pay_amount').value ;

			      if (document.getElementById('Self_gumasta').checked) {
					      	GMS_charges =0;
					      	//document.getElementById('GMS_charges').value = 0;
					      	 //document.getElementById('CUS_pay_amnt3').value =0;
			      }if(document.getElementById('Atharva_gumasta').checked){
							      	if(GMS_charges ==""){
							     	GMS_charges =0;
							     	//document.getElementById('GMS_charges').value = GMS_charges;
							      	 //document.getElementById('CUS_pay_amnt3').value =0;
							     }else{
							     	GMS_charges =GMS_charges;
							      	//document.getElementById('GMS_charges').value = GMS_charges;
							      	 //document.getElementById('CUS_pay_amnt3').value =GMS_charges;
							     }
				}else{
							      	if(GMS_charges ==""){
							     	GMS_charges =0;
							     }else{
							     	GMS_charges=GMS_charges;
							     }
			      }
			   
			    if(CUS_pay_amount ==""){
			     	CUS_pay_amount =0;
			     }else{
			     	CUS_pay_amount=CUS_pay_amount;
			     }

			    
			     if(ITR_charges ==""){
			     	ITR_charges =0;
			     }else{
			     	ITR_charges=ITR_charges;
			     }
			     if(ITR_chargesnew ==""){
			     	ITR_chargesnew = 0;
			     }else{
			     	ITR_chargesnew=ITR_chargesnew;
			     }
			     

			   onroad = parseFloat(GMS_charges) + parseFloat(ITR_charges) + parseFloat(ITR_chargesnew);

			   payamnt = parseFloat(onroad) + parseFloat(CUS_pay_amount) ;
			  /* document.getElementById('CUS_additional_label')
			  // alert(onroad);
			   var newonroad  =	indiancurrency(onroad);
			    $('#CUS_additional_label').text(newonroad) ;*/

			   document.getElementById('CUS_additional').value = onroad;
			 //  document.getElementById('CUS_pay_amnt1').value = payamnt;
			  // document.getElementById('button_add_cal').style.display ="none";
			  // document.getElementById('text_add_cal').style.display ="Block";
			   document.getElementById('button_data').style.display="block";
			    document.getElementById('calculate_data').style.display="none";
}


function calculate (argument) {
	//VRN_amt = document.getElementById('servicecharges_amnt').value;
	BRD_reg=  	document.getElementById('BRD_reg').value ;
		//alert(BRD_reg);	 
			  BRD_ins= 	document.getElementById('BRD_ins').value ;
			
			  BRD_depo=  	document.getElementById('BRD_depo').value ;
			   
			   BRD_ctm=  	document.getElementById('BRD_ctm').value  ;

			   accessories=  	document.getElementById('accessories').value ;
			   
			   atharv_care=  	document.getElementById('atharv_care').value  ;
			 /*   GMS_charges=  	document.getElementById('GMS_charges').value  ;
			     ITR_charges=  	document.getElementById('ITR_charges').value  ;*/
			     booking_amt= document.getElementById('booking_amt').value  ;

			      discount_amt= document.getElementById('discount_amt').value  ;

			      


			    
			     if(BRD_reg ==""){
			     	BRD_reg =0;
			     }else{
			     	BRD_reg=BRD_reg;
			     }
			     if(BRD_ins ==""){
			     	BRD_ins =0;
			     }else{
			     	BRD_ins=BRD_ins;
			     }
			     if(BRD_depo ==""){
			     	BRD_depo =0;
			     }else{
			     	BRD_depo=BRD_depo;
			     }
			     if(BRD_ctm ==""){
			     	BRD_ctm =0;
			     }else{
			     	BRD_ctm=BRD_ctm;
			     }

			     if(accessories ==""){
			     	accessories =0;
			     }else{
			     	accessories=accessories;
			     }

			     if(atharv_care ==""){
			     	atharv_care =0;
			     }else{
			     	atharv_care=atharv_care;
			     }
			    
			     if(booking_amt ==""){
			     	booking_amt =0;
			     }else{
			     	booking_amt=booking_amt;
			     }
			      if(discount_amt ==""){
			     	discount_amt =0;
			     }else{
			     	discount_amt=discount_amt;
			     }

			   onroad = parseFloat(BRD_reg) + parseFloat(BRD_ins)+ parseFloat(BRD_depo)+ parseFloat(BRD_ctm) + parseFloat(booking_amt)+ parseFloat(accessories)+ parseFloat(atharv_care);

			   finalamnt = parseFloat(onroad) - parseFloat(discount_amt);
			  /* document.getElementById('CUS_total_payment_label')
			  // alert(onroad);
			   var newonroad  =	indiancurrency(onroad);
			    $('#CUS_total_payment_label').text(newonroad) ;*/

			   /* var CUS_pay_amount = document.getElementById('CUS_pay_amount').value 

			     var booking_amnt  =	indiancurrency(CUS_pay_amount);
			    $('#CUS_pay_amount_label').text(booking_amnt) ;*/

			   /* CUS_pay_amount= 	document.getElementById('CUS_pay_amount').value ;
			    var newCUS_pay_amount  =	indiancurrency(CUS_pay_amount);
			    $('#CUS_pay_amount_new_label').text(newCUS_pay_amount) ;*/

			


			   document.getElementById('CUS_total_payment').value = onroad;
			   document.getElementById('CUS_final_payment').value = finalamnt;
			   //document.getElementById('button_cal').style.display ="none";
			   //document.getElementById('text_cal').style.display ="Block";
			   document.getElementById('button_data').style.display="block";
			    document.getElementById('calculate_data').style.display="none";
}


function checkfinanl(discount) {
var final = document.getElementById('CUS_total_payment').value;

if (final < discount) {
	document.getElementById('discount_amt').value="";
	document.getElementById('CUS_final_payment').value=final;
	alert('You can not enter more than '+final);
}
}

function onchangediv (argument) {
	
	//document.getElementById('text_cal').style.display ="none";
			   document.getElementById('button_data').style.display="block";
			   document.getElementById('calculate_data').style.display="none";
}

function  loadGhumastha(CUS_GMS_id) {
calculate_additional();
calculate();
	if(CUS_GMS_id == ""){
		calculate_additional();
		calculate();
		document.getElementById('GMS_charges').value = 0;
		
		//document.getElementById('text_cal').style.display ="none";
			   document.getElementById('button_data').style.display="block";
			   document.getElementById('calculate_data').style.display="none";
		
	}
}
function  loadItr(CUS_ITR_id) {
	calculate_additional();
	calculate();
	if(CUS_ITR_id == ""){
		calculate_additional();
		calculate();
		document.getElementById('ITR_charges').value = 0;
		
		//document.getElementById('text_cal').style.display ="none";
			   document.getElementById('button_data').style.display="block";
			   document.getElementById('calculate_data').style.display="none";
		
	}
}

function  loadItrnew(CUS_ITR_id) {
calculate_additional();
calculate();
	if(CUS_ITR_id == ""){
		calculate_additional();
		calculate();
		
		document.getElementById('ITR_chargesnew').value = 0;
		//document.getElementById('text_cal').style.display ="none";
			   document.getElementById('button_data').style.display="block";
			   document.getElementById('calculate_data').style.display="none";
		
	}
}

