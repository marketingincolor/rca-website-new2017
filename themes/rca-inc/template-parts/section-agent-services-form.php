<div id="learn-more-form-container-white">
		<div class="row" >
			<div class="small-10 small-offset-1 medium-8 medium-offset-2 columns text-center">
				<h1 style="margin-bottom:30px">RCA welcomes the opportunity to serve as your U.S. Agent</h1>
				<p>Complete this form to start the online Drug / Medical Device Listing and Establishment Registration process.</p>
				<div id="orange-error-message"></div>
			</div>
		</div>
		<div class="row">
			<div class="small-10 small-offset-1">
				<form id="blue-form" name="blue-form" action="<?php echo site_url(); ?>/us-agent-services-success" method="post">
			    <div class="large-4 columns">
			    	<input type="text" name="first_name" id="form-first-name" placeholder="First Name*" required><i class="fa fa-user" aria-hidden="true"></i>
			    </div>
			    <div class="large-4 columns">
			    	<input type="text" name="last_name" id="form-last-name" placeholder="Last Name*" required><i class="fa fa-user" aria-hidden="true"></i>
			    </div>
			    <div class="large-4 columns">
			    	<input type="number" name="phone_number" id="form-phone" placeholder="Phone Number*" required><i class="fa fa-phone" aria-hidden="true"></i>
			    </div>
			    <div class="large-4 columns">
			 			<input type="email" name="email_address" id="form-email" placeholder="Email Address*" required><i class="fa fa-envelope" aria-hidden="true"></i>
			    </div>
					<div class="large-4 columns">
				    	<input type="text" name="facility_name" id="form-facility-name" placeholder="Facility Name*" required><i class="fa fa-map-marker" aria-hidden="true"></i>
					</div>
					<div class="large-4 columns">
				    	<input type="text" name="facility_street" id="form-facility-street" placeholder="Facility Street*" required><i class="fa fa-map-marker" aria-hidden="true"></i>
					</div>
					<div class="large-4 columns">
						<input type="text" name="facility_country" id="form-facility-country" placeholder="Facility Country*" required><i class="fa fa-map-marker" aria-hidden="true"></i>
					</div>
					<div class="large-4 columns">
				    	<input type="number" name="facility_zip" id="form-facility-zip" placeholder="Facility Zip*" required><i class="fa fa-map-marker" aria-hidden="true"></i>
					</div>
					<div class="large-4 columns">
				    	<input type="text" name="num_products" id="form-num-products" placeholder="Number of Products*" required><i class="fa fa-map-marker" aria-hidden="true"></i>
					</div>
					<div class="large-12 columns">
				    	<input type="text" name="products_names" id="form-products-names" placeholder="Product(s) Name(s)*" required><i class="fa fa-briefcase" aria-hidden="true"></i>
					</div>
					<div class="large-12 columns text-right">
						<p>*=Required</p>
					</div>
					<div class="large-12 columns">
						<?php global $wp;
						$current_url = home_url(add_query_arg(array(),$wp->request)); ?>
					  <input type="hidden" name="referral_url" value="<?php echo $current_url; ?>">
						<input type="submit" value="Submit" id="form-submit">
					</div>
				</form>
			</div>
		</div>
	</div>

	<script>
	  // change colors on inputs to white when field is filled
	  // out properly 
		var $form = $('#learn-more-form-container-white');
		$form.find('input,textarea').on('keyup change',function(){

			//change color of checkbox labels if one box is checked
			if($('div.checkbox-group.required :checkbox:checked').length > 0){
				$('.industry-label').css({'color':'#363636'});
			}else{
				$('.industry-label').css({'color':'rgba(0,0,0,0.4)'});
			}
			//change color of checkboxes and their labels if checked
			$('.checkbox-group').find(':checkbox:checked').next('label').css({'color':'#363636'});
			$('.checkbox-group').find(':checkbox:not(:checked)').next('label').css({'color':'rgba(0,0,0,0.4'});

			// change color of labels when their input field is valid
			if($(this).is(":valid")){
				$(this).next('i').css({'color':'#363636'});
				$(this).prev('label:not(.check-label),label i').css({'color':'#363636'});
				$(this).prev('label').find('i').css({'color':'#363636'});
			}else{
				$(this).next('i').css({'color':'rgba(0,0,0,0.4)'});
				$(this).prev('label:not(.check-label)').css({'color':'rgba(0,0,0,0.4)'});
				$(this).prev('label').find('i').css({'color':'rgba(0,0,0,0.4)'});
			}
		});

		// error message that appears at top of form
		function showError(message){
			$('#orange-error-message').text(message);
		}

		//Don't send form if it has errors, otherwise send
		$('#form-submit').on('click',function(e){
		  if($('#form-first-name').val() == ''){ 
		  	showError('Please enter your first name');
		  	$('#form-first-name').addClass("formInvalid");
		  	$('#form-first-name').focus();
		  	return false;
		  } else if($('#form-last-name').val() == ''){ 
		  	showError('Please enter your last name');
		  	$('#form-last-name').focus();
		  	return false;
		  } else if($('#form-phone').val() == ''){ 
		  	showError('Please enter your phone number');
		  	$('#form-phone').focus();
		  	return false;
		  } else if($('#form-email').val() == ''){ 
		  	showError('Please enter your email');
		  	$('#form-email').focus();
		  	return false;
		  } else if($('#form-facility-name').val() == ''){ 
		  	showError('Please enter your facility address');
		  	$('#form-facility-name').focus();
		  	return false;
		  } else if($('#form-facility-street').val() == ''){ 
		  	showError('Please enter facility street');
		  	$('#form-facility-street').focus();
		  	return false;
		  } else if($('#form-facility-country').val() == ''){ 
		  	showError('Please enter facility country');
		  	$('#form-facility-country').focus();
		  	return false;
		  } else if($('#form-facility-zip').val() == ''){ 
		  	showError('Please enter facility zip code');
		  	$('#form-facility-zip').focus();
		  	return false;
		  } else if($('#form-num-products').val() == ''){ 
		  	showError('Please enter your number of products');
		  	$('#form-num-products').focus();
		  	return false;
		  } else if($('#form-company').val() == ''){ 
		  	showError('Please enter your company name');
		  	$('#form-company').focus();
		  	return false;
		  } else if($('#form-products-names').val() == ''){ 
		  	showError('Please enter your product names');
		  	$('#form-products-names').focus();
		  	$('#form-products-names').addClass("formInvalid");
		  	return false;
		  } else {
		    document.forms["blue-form"].submit();
		  }
	  });

	</script>
	<script type="text/javascript">
	    var __ss_noform = __ss_noform || [];
	    __ss_noform.push(['baseURI', 'https://app-3QMGUWHS20.marketingautomation.services/webforms/receivePostback/MzawMDGwMDYyAgA/']);
	    __ss_noform.push(['form','blue-form', '2c8b9505-3172-42ce-9d67-efa05d3bc26e']);
	</script>
	<script type="text/javascript" src="https://koi-3QMGUWHS20.marketingautomation.services/client/noform.js?ver=1.24" ></script>
	<!-- Start Dynamic Script Example -->
	<script type="text/javascript">
	var callThisOnReturn = function(resp) {
	  if (resp && resp.contact) {
	  	var blueForm = jQuery('#learn-more-form-container-white');
	  	industryArray = resp.contact['Industry_SF'].split(',');

	  	blueForm.find('#form-first-name').val(resp.contact['First Name']);
	  	blueForm.find('#form-last-name').val(resp.contact['Last Name']);
	  	blueForm.find('#form-email').val(resp.contact['Email']);
	  	blueForm.find('#form-phone').val(resp.contact['Phone Number']);
	  	blueForm.find('#form-address').val(resp.contact['Street']);
	  	blueForm.find('#form-city').val(resp.contact['City']);
	  	blueForm.find('#form-state').val(resp.contact['State']);
	  	blueForm.find('#form-country').val(resp.contact['Country']);
	  	blueForm.find('#form-zip').val(resp.contact['Zip'])
	  	blueForm.find('#form-company').val(resp.contact['Company Name']);
	  	// Go through each checkbox and see if it matches
	  	// a returned value from resp.contact
	  	blueForm.find('.checkbox-group').find(':checkbox').each(function(){
		  	if($(this).val() == industryArray[0] || $(this).val() == industryArray[1] || $(this).val() == industryArray[2] || $(this).val() == industryArray[3] || $(this).val() == industryArray[4]){
		  		$(this).prop("checked",true);
		  	}
	    });

	  	//change color of checkbox labels if one box is checked
	  	if(blueForm.find('div.checkbox-group.required :checkbox:checked').length > 0){
	  		blueForm.find('.industry-label').css({'color':'rgba(0,0,0,1)'});
	  	}else{
	  		blueForm.find('.industry-label').css({'color':'rgba(0,0,0,0.4)'});
	  	}
	  	//change color of checkboxes and their labels if checked
	  	blueForm.find('.checkbox-group').find(':checkbox:checked').next('label').css({'color':'rgba(0,0,0,1'});
	  	blueForm.find('.checkbox-group').find(':checkbox:not(:checked)').next('label').css({'color':'rgba(0,0,0,0.4'});

	  	// change color of labels when their input field is valid
	  	blueFormLabel = blueForm.find('input,textarea');
	  	blueFormLabel.each(function(){
	  		if($(this).is(":valid")){
	  			$(this).next('i').css({'color':'rgba(0,0,0,1)'});
	  			$(this).prev('label:not(.check-label),label i').css({'color':'rgba(0,0,0,1)'});
	  			$(this).prev('label').find('i').css({'color':'rgba(0,0,0,1)'});
	  		}else{
	  			$(this).next('i').css({'color':'rgba(0,0,0,0.4)'});
	  			$(this).prev('label:not(.check-label)').css({'color':'rgba(0,0,0,0.4)'});
	  			$(this).prev('label').find('i').css({'color':'rgba(0,0,0,0.4)'});
	  		}
	  	});
	  }
	};
	_ss.push(['_setResponseCallback', callThisOnReturn]); 
	</script>
	<!-- End Dynamic Script Example -->