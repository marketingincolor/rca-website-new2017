<?php
wp_reset_postdata();
$form_title = get_field('learn_more_form_container_blue_title');

?>
<div id="learn-more-form-container-blue">
		<div class="row" >
			<div class="small-10 small-offset-1 columns text-center">
				<h1>I'm interested in Learning More About <?php echo (!empty($form_title))? $form_title : 'RCA'; ?></h1>
				<div id="white-error-message"></div>
			</div>
		</div>
		<div class="row">
			<div class="small-10 small-offset-1">
				<form id="blue-form" name="blue-form" action="<?php echo site_url(); ?>/success" method="post">
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
					    	<input type="text" name="address" id="form-address" placeholder="Address*" required><i class="fa fa-map-marker" aria-hidden="true"></i>
						</div>
						<div class="large-4 columns">
					    	<input type="text" name="city" id="form-city" placeholder="City*" required><i class="fa fa-map-marker" aria-hidden="true"></i>
						</div>
						<div class="large-4 columns">
							<input type="text" name="state" id="form-state" placeholder="State*" required><i class="fa fa-map-marker" aria-hidden="true"></i>
						</div>
						<div class="large-4 columns">
					    	<input type="text" name="country" id="form-country" placeholder="Country*" required><i class="fa fa-map-marker" aria-hidden="true"></i>
						</div>
						<div class="large-4 columns">
					    	<input type="number" name="zip_code" id="form-zip" placeholder="Zip Code*" required><i class="fa fa-map-marker" aria-hidden="true"></i>
						</div>
						<div class="large-12 columns">
					    	<input type="text" name="company" id="form-company" placeholder="Company*" required><i class="fa fa-briefcase" aria-hidden="true"></i>
						</div>
						<div class="large-12 columns">
							<label for="" class="industry-label"><i class="fa fa-building-o industry-label" aria-hidden="true"></i> Industry*</label>
							<div class="checkbox-group required">
								<div class="medium-4 large-2 small-6 columns">
									<input id="a1" type='checkbox' name='industry[]' class="chkrad X fade" value='Technology' />
									<label class="check-label" for="a1"> Technology</label>
									<input id="a2" type='checkbox' name='industry[]' class="chkrad X fade" value='Manufacturing' />
									<label class="check-label" for="a2"> Manufacturing</label>
									<input id="a3" type='checkbox' name='industry[]' class="chkrad X fade" value='Food' />
									<label class="check-label" for="a3"> Food</label>
								</div>
								<div class="medium-4 large-2 small-6 columns">
									<input id="a4" type='checkbox' name='industry[]' class="chkrad X fade" value='Games' />
									<label class="check-label" for="a4"> Games</label>
									<input id="a5" type='checkbox' name='industry[]' class="chkrad X fade" value='Fun' />
									<label class="check-label" for="a5"> Fun</label>
									<input id="a6" type='checkbox' name='industry[]' class="chkrad X fade" value='Ranching' />
									<label class="check-label" for="a6"> Ranching</label>
								</div>
								<div class="medium-4 large-2 small-6 columns">
									<input id="a7" type='checkbox' name='industry[]' class="chkrad X fade" value='Agriculture' />
									<label class="check-label" for="a7"> Agriculture</label>
									<input id="a8" type='checkbox' name='industry[]' class="chkrad X fade" value='Retail' />
									<label class="check-label" for="a8"> Retail</label>
									<input id="a9" type='checkbox' name='industry[]' class="chkrad X fade" value='Marketing' />
									<label class="check-label" for="a9"> Marketing</label>
								</div>
								<div class="medium-4 large-2 small-6 columns">
									<input id="a10" type='checkbox' name='industry[]' class="chkrad X fade" value='Sales' />
									<label class="check-label" for="a10"> Sales</label>
									<input id="a11" type='checkbox' name='industry[]' class="chkrad X fade" value='Nate' />
									<label class="check-label" for="a11"> Nate</label>
									<input id="a12" type='checkbox' name='industry[]' class="chkrad X fade" value='Meteorology' />
									<label class="check-label" for="a12"> Meteorology</label>
								</div>
								<div class="medium-4 large-2 small-6 columns">
									<input id="a13" type='checkbox' name='industry[]' class="chkrad X fade" value='Security' />
									<label class="check-label" for="a13"> Security</label>
									<input id="a14" type='checkbox' name='industry[]' class="chkrad X fade" value='Law Enforcement' />
									<label class="check-label" for="a14"> Law Enforcement</label>
									<input id="a15" type='checkbox' name='industry[]' class="chkrad X fade" value='Singing' />
									<label class="check-label" for="a15"> Singing</label>
								</div>
								<div class="medium-4 large-2 small-6 columns">
									<input id="a16" type='checkbox' name='industry[]' class="chkrad X fade" value='Pharmaceuticals' />
									<label class="check-label" for="a16"> Pharmaceuticals</label>
									<input id="a17" type='checkbox' name='industry[]' class="chkrad X fade" value='Oil Driling' />
									<label class="check-label" for="a17"> Oil Driling</label>
									<input id="a18" type='checkbox' name='industry[]' class="chkrad X fade" value='Other' />
									<label class="check-label" for="a18"> Other</label>
								</div>
							</div>
						</div>
						<div class="large-12 columns">
							<label for=""><i class="fa fa-comments-o" aria-hidden="true"></i> Comments/Questions*</label>
							<textarea name="comments" id="form-comments" cols="30" rows="4" required></textarea>
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
							<input type="submit" value="Submit" id="form-submit">
						</div>
				</form>
			</div>
		</div>
	</div>

	<script>
	  // change colors on inputs to white when field is filled
	  // out properly 
		var $blueForm = $('#learn-more-form-container-blue');
		$blueForm.find('input,textarea').on('keyup change',function(){

			//change color of checkbox labels if one box is checked
			if($blueForm.find('div.checkbox-group.required :checkbox:checked').length > 0){
				$blueForm.find('.industry-label').css({'color':'rgba(255,255,255,1)'});
			}else{
				$blueForm.find('.industry-label').css({'color':'rgba(255,255,255,0.4)'});
			}
			//change color of checkboxes and their labels if checked
			$blueForm.find('.checkbox-group').find(':checkbox:checked').next('label').css({'color':'rgba(255,255,255,1'});
			$blueForm.find('.checkbox-group').find(':checkbox:not(:checked)').next('label').css({'color':'rgba(255,255,255,0.4'});

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
		$blueForm.find('#form-submit').on('click',function(e){
		  if($blueForm.find('#form-first-name').val() == ''){ 
		  	showError('Please enter your first name');
		  	$blueForm.find('#form-first-name').addClass("formInvalid");
		  	$blueForm.find('#form-first-name').focus();
		  	return false;
		  } else if($blueForm.find('#form-last-name').val() == ''){ 
		  	showError('Please enter your last name');
		  	$blueForm.find('#form-last-name').focus();
		  	return false;
		  } else if($blueForm.find('#form-phone').val() == ''){ 
		  	showError('Please enter your phone number');
		  	$blueForm.find('#form-phone').focus();
		  	return false;
		  } else if($blueForm.find('#form-email').val() == ''){ 
		  	showError('Please enter your email');
		  	$blueForm.find('#form-email').focus();
		  	return false;
		  } else if($blueForm.find('#form-address').val() == ''){ 
		  	showError('Please enter your street address');
		  	$blueForm.find('#form-address').focus();
		  	return false;
		  } else if($blueForm.find('#form-city').val() == ''){ 
		  	showError('Please enter your city');
		  	$blueForm.find('#form-city').focus();
		  	return false;
		  } else if($blueForm.find('#form-state').val() == ''){ 
		  	showError('Please enter your state');
		  	$blueForm.find('#form-state').focus();
		  	return false;
		  } else if($blueForm.find('#form-country').val() == ''){ 
		  	showError('Please enter your country');
		  	$blueForm.find('#form-country').focus();
		  	return false;
		  } else if($blueForm.find('#form-zip').val() == ''){ 
		  	showError('Please enter your zip code');
		  	$blueForm.find('#form-zip').focus();
		  	return false;
		  } else if($blueForm.find('#form-company').val() == ''){ 
		  	showError('Please enter your company name');
		  	$blueForm.find('#form-company').focus();
		  	return false;
		  } else if($blueForm.find('#form-comments').val() == ''){ 
		  	showError('Please enter a comment or question');
		  	$blueForm.find('#form-comments').focus();
		  	$blueForm.find('#form-comments').addClass("formInvalid");
		  	return false;
		  } else if ($blueForm.find('div.checkbox-group.required :checkbox:checked').length == 0){
			  	showError('Please check at least one industry');
			  	$blueForm.find('.industry-label').css({'color':'rgba(255,0,42,1)'})
			  	e.preventDefault();
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
  	var blueForm = jQuery('#learn-more-form-container-blue');
  	industryArray = resp.contact['Industry_SF'].split(',');
  	console.log(industryArray);

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
  		blueForm.find('.industry-label').css({'color':'rgba(255,255,255,1)'});
  	}else{
  		blueForm.find('.industry-label').css({'color':'rgba(255,255,255,0.4)'});
  	}
  	//change color of checkboxes and their labels if checked
  	blueForm.find('.checkbox-group').find(':checkbox:checked').next('label').css({'color':'rgba(255,255,255,1'});
  	blueForm.find('.checkbox-group').find(':checkbox:not(:checked)').next('label').css({'color':'rgba(255,255,255,0.4'});

  	// change color of labels when their input field is valid
  	blueFormLabel = blueForm.find('input,textarea');
  	blueFormLabel.each(function(){
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
