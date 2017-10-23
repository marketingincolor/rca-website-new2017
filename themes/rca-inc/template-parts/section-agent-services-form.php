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
				    	<input type="text" name="facility_name" id="form-facility-name" placeholder="Facility Name*" required><i class="fa fa-building-o" aria-hidden="true"></i>
					</div>
					<div class="large-4 columns">
				    	<input type="text" name="facility_street" id="form-facility-street" placeholder="Facility Street*" required><i class="fa fa-map-marker" aria-hidden="true"></i>
					</div>
					<div class="large-4 columns">
						<?php get_template_part('template-parts/content', 'country-list') ?><i class="fa fa-map-marker" aria-hidden="true"></i>
					</div>
					<div class="large-4 columns">
				    <input type="text" name="facility_city" id="form-facility-city" placeholder="Facility City*" required><i class="fa fa-map-marker" aria-hidden="true"></i>
					</div>
					<div class="large-4 columns">
				    <input type="number" name="facility_zip" id="form-facility-zip" placeholder="Facility Postal Code*" required><i class="fa fa-map-marker" aria-hidden="true"></i>
					</div>
					<div class="large-4 columns">
				    <select name="num_products" id="form-num-products" required><option value="" selected="selected" disabled>Number of Products*</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select><i class="fa fa-briefcase" aria-hidden="true"></i>
					</div>
					<div class="clearfix"></div>
					<div id="product-fields">
						
					</div>
					<div class="large-12 columns textarea">
				    <label for=""><i class="fa fa-briefcase" aria-hidden="true"></i> Comments/Questions</label>
				    	<textarea name="products_names" id="form-products-names" cols="30" rows="4"></textarea>
					</div>
					<div class="large-12 columns text-right">
						<p>*=Required</p>
					</div>
					<div class="large-12 columns">
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
		$form.on('keyup change','input,textarea,select',function(){

			// change color of labels when their input field is valid
			if($(this).is(":valid")){
				$(this).next('i').css({'color':'#363636'});
				$(this).css({'color':'#363636'});
				$(this).prev('label:not(.check-label),label i').css({'color':'#363636'});
				$(this).prev('label').find('i').css({'color':'#363636'});
			}else{
				$(this).css({'color':'rgba(0,0,0,0.4)'});
				$(this).next('i').css({'color':'rgba(0,0,0,0.4)'});
				$(this).prev('label:not(.check-label)').css({'color':'rgba(0,0,0,0.4)'});
				$(this).prev('label').find('i').css({'color':'rgba(0,0,0,0.4)'});
			}
		});

		// Add product fields depending how many is selected from 
		// num products dropdown
		$('#form-num-products').on('change',function(){
			var num = this.value;
			$('#product-fields').html('');
			for(var i = 1; i <= num; i++){
				$('#product-fields').append(
					'<div class="large-4 columns end"><input type="text" name="product-num-'+ i +'" id="product-num-'+ i +'" placeholder="Product No. ' + i +' Name*" required><i class="fa fa-briefcase" aria-hidden="true"></i></div>'
				).fadeIn()
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
		    $('#blue-form').find('[type="submit"]').trigger('click');
		  }
	  });

	</script>
	<!-- SharpSpring Embed Code -->
	<script type="text/javascript">
	    var __ss_noform = __ss_noform || [];
	    __ss_noform.push(['baseURI', 'https://app-3QMGUWHS20.marketingautomation.services/webforms/receivePostback/MzawMDGwMDYyAgA/']);
	    __ss_noform.push(['form','blue-form', 'a1117a1d-e211-48a7-adb0-28896a2204bd']);
	</script>
	<script type="text/javascript" src="https://koi-3QMGUWHS20.marketingautomation.services/client/noform.js?ver=1.24" ></script>

	<!-- Start Dynamic Script Example -->
	<script type="text/javascript">
	var callThisOnReturn = function(resp) {
	  if (resp && resp.contact) {
	  	var blueForm = jQuery('#learn-more-form-container-white');
	  	console.log(resp.contact);
	  	blueForm.find('#form-first-name').val(resp.contact['First Name']);
	  	blueForm.find('#form-last-name').val(resp.contact['Last Name']);
	  	blueForm.find('#form-email').val(resp.contact['Email']);
	  	blueForm.find('#form-phone').val(resp.contact['Phone Number']);
	  	blueForm.find('#form-facility-name').val(resp.contact['Facility Name']);
	  	blueForm.find('#form-facility-street').val(resp.contact['Street']);
	  	blueForm.find('#form-facility-state').val(resp.contact['State']);
	  	blueForm.find('#form-facility-state').val(resp.contact['City']);
	  	if(resp.contact['Country']){blueForm.find('#form-facility-country').val(resp.contact['Country']);}
	  	blueForm.find('#form-facility-zip').val(resp.contact['Zip'])
	  	// blueForm.find('#form-num-products').val(resp.contact['Number of Products']);
	  	blueForm.find('#form-products-names').val(resp.contact['Product Names']);

	  	// change color of labels when their input field is valid
	  	blueFormLabel = blueForm.find('input,textarea,select');
	  	blueFormLabel.each(function(){
	  		if($(this).is(":valid")){
	  			$(this).next('i').css({'color':'#363636'});
	  			$(this).css({'color':'#363636'});
	  			$(this).prev('label:not(.check-label),label i').css({'color':'#363636'});
	  			$(this).prev('label').find('i').css({'color':'#363636'});
	  		}else{
	  			$(this).css({'color':'rgba(0,0,0,0.4)'});
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