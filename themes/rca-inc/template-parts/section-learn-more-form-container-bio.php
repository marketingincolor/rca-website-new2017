<?php
wp_reset_postdata();

?>
<div id="learn-more-form-container-orange">
		<div class="row" >
			<div class="small-10 small-offset-1 columns text-center">
				<h1>Our meeting slots are filling up, so sign up for your free consultation with our experts now.</h1>
				<div id="white-error-message"></div>
			</div>
		</div>
		<div class="row">
			<div class="small-12 medium-8 medium-offset-2 formbox">
				<form id="orange-form" name="orange-form" method="post">
					    <div class="large-4 columns">
					    	<input type="text" name="first_name" id="form-first-name" placeholder="First Name*" required><i class="fa fa-user" aria-hidden="true"></i>
					    </div>
					    <div class="large-4 columns">
					    	<input type="text" name="last_name" id="form-last-name" placeholder="Last Name*" required><i class="fa fa-user" aria-hidden="true"></i>
					    </div>
					    <div class="large-4 columns">
					 			<input type="email" name="email_address" id="form-email" placeholder="Email Address*" required><i class="fa fa-envelope" aria-hidden="true"></i>
					    </div>
						<div class="large-12 columns">
					    	<input type="text" name="company" id="form-company" placeholder="Company*" required><i class="fa fa-briefcase" aria-hidden="true"></i>
						</div>
						<div class="large-12 columns">
							<label for=""><i class="fa fa-comments-o" aria-hidden="true"></i> Comments/Questions</label>
							<textarea name="comments" id="form-comments" cols="30" rows="4"></textarea>
						</div>
						<div class="large-6 columns">
							<div class="checkbox-group">
							  <input id="agree" type="checkbox" name="agree" value="true" checked="checked">
							  <label class="check-label" for="agree"> I agree to receive emails from RCA</label>
							</div>
						</div>
						<div class="large-6 columns text-right">
							<p>*=Required</p>
						</div>
						<div class="large-12 columns">
							<?php global $wp;
							$current_url = home_url(add_query_arg(array(),$wp->request)); ?>
						  <input type="hidden" name="referral_url" value="<?php echo $current_url; ?>">
						  <input id="industry-hidden" type="hidden" name="industries">
							<input type="submit" value="Submit" id="form-submit">
						</div>
				</form>
			</div>
		</div>
	</div>

	<script>
	  // change colors on inputs to white when field is filled
	  // out properly
		var $thisForm = $('#learn-more-form-container-orange');
		$thisForm.find('input,textarea').on('keyup change',function(){

			//change color of checkbox labels if one box is checked
			if($thisForm.find('div.checkbox-group.required :checkbox:checked').length > 0){
				//$thisForm.find('.industry-label').css({'color':'rgba(255,255,255,1)'});
			}else{
				//$thisForm.find('.industry-label').css({'color':'rgba(255,255,255,0.4)'});
			}
			//change color of checkboxes and their labels if checked
			//$thisForm.find('.checkbox-group').find(':checkbox:checked').next('label').css({'color':'rgba(255,255,255,1'});
			//$thisForm.find('.checkbox-group').find(':checkbox:not(:checked)').next('label').css({'color':'rgba(255,255,255,0.4'});

			// change color of labels when their input field is valid
			if($(this).is(":valid")){
				$(this).next('i').css({'color':'white'});
				$(this).prev('label:not(.check-label),label i').css({'color':'white'});
				$(this).prev('label').find('i').css({'color':'white'});
			}else{
				$(this).next('i').css({'color':'rgba(255,255,255,0.4)'});
				$(this).prev('label:not(.check-label)').css({'color':'rgba(255,255,255,0.4)'});
				$(this).prev('label').find('i').css({'color':'rgba(255,255,255,0.4)'});
			}
		});

		// error message that appears at top of form
		function showError(message){
			$('#white-error-message').text(message);
		}

		//Don't send form if it has errors, otherwise send
		$thisForm.find('#form-submit').on('click',function(e){
		  if($thisForm.find('#form-first-name').val() == ''){
		  	showError('Please enter your first name');
		  	$thisForm.find('#form-first-name').addClass("formInvalid");
		  	$thisForm.find('#form-first-name').focus();
		  	return false;
		  } else if($thisForm.find('#form-last-name').val() == ''){
		  	showError('Please enter your last name');
		  	$thisForm.find('#form-last-name').focus();
		  	return false;
		  } else if($thisForm.find('#form-email').val() == ''){
		  	showError('Please enter your email');
		  	$thisForm.find('#form-email').focus();
		  	return false;
		  } else if($thisForm.find('#form-company').val() == ''){
		  	showError('Please enter your company name');
		  	$thisForm.find('#form-company').focus();
		  	return false;
		  } else {
            sendToGTM();

            function sendToGTM() {
    	        dataLayer.push({
    	          'event': 'InterestedFormSubmitted',
    	          'eventCategory': 'Form',
    	          'eventAction': 'Submitted',
    	        });
            }

          var arr=[];

          $('input:checked[name=industry').each(function(){
              arr.push($(this).val());
          });

          $('#industry-hidden').val(arr.join(','));

		    //document.forms["blue-form"].submit();
            //__ss_noform.push(['submit', function () {window.location = 'https://rcainc.com/success';}, '2c8b9505-3172-42ce-9d67-efa05d3bc26e']);
            __ss_noform.push(['submit', function () {window.location = 'https://rcainc.com/bio-international-convention-2019/success';}, '4c73a332-4e30-4af6-bab2-b57e5cb4a505']);
            return false;

		  }
	  });

	</script>
<!-- USE THIS NEW CODE BLOCK BELOW FOR FORM!!! -->
<script type="text/javascript">
    var __ss_noform = __ss_noform || [];
    __ss_noform.push(['baseURI', 'https://app-3QMGUWHS20.marketingautomation.services/webforms/receivePostback/MzawMDGwMDYyAgA/']);
    __ss_noform.push(['form','orange-form',, '4c73a332-4e30-4af6-bab2-b57e5cb4a505']);
    __ss_noform.push(['submitType', 'manual']);
</script>
<script type="text/javascript" src="https://koi-3QMGUWHS20.marketingautomation.services/client/noform.js?ver=1.24" ></script>


<!-- Start Dynamic Script Example -->
<script type="text/javascript">
var callThisOnReturn = function(resp) {
  if (resp && resp.contact) {
    console.log(resp.contact);
  	var thisForm = jQuery('#learn-more-form-container-orange');
  	industryArray = resp.contact['Industry_SF'].split(',');
  	console.log(industryArray);

  	thisForm.find('#form-first-name').val(resp.contact['First Name']);
  	thisForm.find('#form-last-name').val(resp.contact['Last Name']);
  	thisForm.find('#form-email').val(resp.contact['Email']);
  	//thisForm.find('#form-phone').val(resp.contact['Phone Number']);
  	//thisForm.find('#form-address').val(resp.contact['Street']);
  	//thisForm.find('#form-city').val(resp.contact['City']);
  	//thisForm.find('#form-state').val(resp.contact['State']);
  	//thisForm.find('#form-country').val(resp.contact['Country']);
  	//thisForm.find('#form-zip').val(resp.contact['Zip'])
  	thisForm.find('#form-company').val(resp.contact['Company Name']);
  	// Go through each checkbox and see if it matches
  	// a returned value from resp.contact
  	//thisForm.find('.checkbox-group').find(':checkbox').each(function(){
	//  	if($(this).val() == industryArray[0] || $(this).val() == industryArray[1] || $(this).val() == industryArray[2] || $(this).val() == industryArray[3] || $(this).val() == industryArray[4]){
	//  		$(this).prop("checked",true);
	//  	}
    //});

    	//change color of checkbox labels if one box is checked
    	if(thisForm.find('div.checkbox-group.required :checkbox:checked').length > 0){
    		//thisForm.find('.industry-label').css({'color':'rgba(255,255,255,1)'});
    	}else{
    		//thisForm.find('.industry-label').css({'color':'rgba(255,255,255,0.4)'});
    	}
    	//change color of checkboxes and their labels if checked
    	//thisForm.find('.checkbox-group').find(':checkbox:checked').next('label').css({'color':'rgba(255,255,255,1'});
    	//thisForm.find('.checkbox-group').find(':checkbox:not(:checked)').next('label').css({'color':'rgba(255,255,255,0.4'});

    	// change color of labels when their input field is valid
    	thisFormLabel = thisForm.find('input,textarea');
    	thisFormLabel.each(function(){
    		if($(this).is(":valid")){
    			$(this).next('i').css({'color':'white'});
    			$(this).prev('label:not(.check-label),label i').css({'color':'white'});
    			$(this).prev('label').find('i').css({'color':'white'});
    		}else{
    			$(this).next('i').css({'color':'rgba(255,255,255,0.4)'});
    			$(this).prev('label:not(.check-label)').css({'color':'rgba(255,255,255,0.4)'});
    			$(this).prev('label').find('i').css({'color':'rgba(255,255,255,0.4)'});
    		}
    	});
  }
};
_ss.push(['_setResponseCallback', callThisOnReturn]);
</script>
<!-- End Dynamic Script Example -->
