	<div id="OLD-learn-more-form-container-white" style="display:none;">
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
					<div class="large-12 columns">
						<label for="" class="industry-label"><i class="fa fa-building-o industry-label" aria-hidden="true"></i> Industry*</label>
						<div class="checkbox-group required">
							<div class="medium-4 large-2 small-6 columns">
								<input id="a1" type='checkbox' name='industry' class="chkrad X fade" value='Biotechnology' />
								<label class="check-label" for="a1"> Biotechnology</label>
							</div>
							<div class="medium-4 large-2 small-6 columns">
								<input id="a2" type='checkbox' name='industry' class="chkrad X fade" value='Medical Device' />
								<label class="check-label" for="a2"> Medical Device</label>
							</div>
							<div class="medium-4 large-2 small-6 columns">
								<input id="a3" type='checkbox' name='industry' class="chkrad X fade" value='Pharmaceutical' />
								<label class="check-label" for="a3"> Pharmaceutical</label>
							</div>
							<div class="medium-4 large-2 small-6 columns">
								<input id="a4" type='checkbox' name='industry' class="chkrad X fade" value='Law Firm' />
								<label class="check-label" for="a4"> Law Firm</label>
							</div>
							<div class="medium-4 large-2 small-6 columns end">
								<input id="a5" type='checkbox' name='industry' class="chkrad X fade" value='Other' />
								<label class="check-label" for="a5"> Other</label>
							</div>
						</div>
					</div>
					<div class="large-12 columns textarea">
				    <label for=""><i class="fa fa-briefcase" aria-hidden="true"></i> Comments/Questions</label>
				    	<textarea name="comments_questions" id="form-products-names" cols="30" rows="4"></textarea>
					</div>
					<div class="large-12 columns text-right">
						<p>*=Required</p>
					</div>
					<div class="large-12 columns">
						<input id="industry-hidden" type="hidden" name="industries">
						<input type="submit" value="Submit" id="form-submit">
					</div>
				</form>
			</div>
		</div>
	</div>

<style>
.us-agent-white-ninja-form label { color: rgba(0,0,0,0.4); }
.us-agent-white-ninja-form .nf-form-content input:not([type=button]), 
.us-agent-white-ninja-form [type=text] { background-color: transparent; border: none; box-shadow: none; border-bottom: 2px solid #e9e7e3; color:#2b2b2b; }
.us-agent-white-ninja-form .nf-form-content .list-select-wrap .nf-field-element>div { background:inherit; border:none; border-bottom: 2px solid #e9e7e3; }
.us-agent-white-ninja-form select { background-color: transparent; border: none; box-shadow: none; border-bottom: 2px solid #e9e7e3; color:#2b2b2b; }
.us-agent-white-ninja-form input::placeholder { text-transform:uppercase; color: rgba(0,0,0,0.4); }
.ninja-forms-req-symbol { color: rgba(0,0,0,0.4) !important; }
.us-agent-white-ninja-form .nf-multi-cell .nf-cell { padding: 0 10px; }
.nf-field-element ul li::before { content:none !important; width:auto !important; display:none !important; }
.us-agent-white-ninja-form .list-checkbox-wrap .nf-field-element li label, 
.us-agent-white-ninja-form .list-image-wrap .nf-field-element li label, 
.us-agent-white-ninja-form .list-radio-wrap .nf-field-element li label { display: block; float: left; width: auto; padding: 0 10px 0 0 !important; }
.us-agent-white-ninja-form .nf-response-msg { text-align: center; }
.us-agent-white-ninja-form .nf-form-content button, 
.us-agent-white-ninja-form .nf-form-content input[type=button],
.us-agent-white-ninja-form .nf-form-content input[type=submit] { background: #c4612b; padding: 0em 3em; }
</style>
    <div id="REMOVE-learn-more-form-container-white" class="us-agent-white-ninja-form" style="padding: 3.5rem 0rem;">
        <div class="row" >
			<div class="small-10 small-offset-1 medium-8 medium-offset-2 columns text-center">
				<h1 style="margin-bottom:30px">RCA welcomes the opportunity to serve as your U.S. Agent</h1>
				<p>Complete this form to start the online Drug / Medical Device Listing and Establishment Registration process.</p>
			</div>
        </div>
        <div class="row" >
            <div class="small-10 small-offset-1 columns">
            <?php echo do_shortcode('[ninja_form id=3]'); ?>
            </div>
        </div>
    </div>


	<script>
	  // change colors on inputs to white when field is filled
	  // out properly 
		var $form = $('#learn-more-form-container-white');
		$form.on('keyup change','input,textarea,select',function(){

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
		  } else if ($('div.checkbox-group.required :checkbox:checked').length == 0){
			  	showError('Please check at least one industry');
			  	$('.industry-label').css({'color':'rgba(255,0,42,1)'})
			  	e.preventDefault();
			  	return false;
		  } else {
		  	var arr=[];

        $('input:checked[name=industry').each(function(){
            arr.push($(this).val());
        });

        $('#industry-hidden').val(arr.join(','));

		    $('#blue-form').find('[type="submit"]').trigger('click');
	  		dataLayer.push({
	          'event': 'USAgentFormSubmitted',
	          'eventCategory': 'Form',
	          'eventAction': 'Submitted',
	        });
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