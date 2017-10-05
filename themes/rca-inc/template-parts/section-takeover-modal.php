<div class="reveal" id="takeover-modal" data-reveal data-options="closeOnBackgroundClick:false;closeOnEsc:false;">
  <div class="row">
  	<div class="small-10 small-centered columns text-center">
  		<h1>Outsourcing Product Development Creates Quantum Leap in Resulting Product While Expediting Timeframes</h1>
  		<p><small>Summary: Vestibulum pharetra velit a nisi vestibulum, a accumsan neque vehicula. Phasellus pretium leo et posuere ultrices. Aliquam eleifend ut massa ac lacinia. Nunc risus nisl, porttitor a elit et, cursus varius quam. Nunc porttitor euismod vehicula. Curabitur leo urna, ultrices a sem sit amet, blandit blandit mauris.</small></p>
  		<p><strong>We're happy to share our insights that illustrate our work and expertise.<br class="hide-for-small-only">Please complete the form to access the case study.</strong></p>
  	</div>
  </div>
  <?php get_template_part('template-parts/section', 'learn-more-form-container-modal'); ?>
</div>

<style>
	#takeover-modal{
		width: 100%;
		max-width: 100%;
		height: auto;
		top:0 !important;
		background-color: rgba(255,255,255,0.9);
	}
	#learn-more-form-container-white h1 {
		display: none;
	}
</style>

<!-- Sharpspring native form code -->
<script type="text/javascript">
    var __ss_noform = __ss_noform || [];
    __ss_noform.push(['baseURI', 'https://app-3QMGUWHS20.marketingautomation.services/webforms/receivePostback/MzawMDGwMDYyAgA/']);
    __ss_noform.push(['form','gated-content-form', '89bfbeaa-be55-44e6-b904-448e0da31acc']);
    __ss_noform.push(['submitType', 'manual']);
</script>
<script type="text/javascript" src="https://koi-3QMGUWHS20.marketingautomation.services/client/noform.js?ver=1.24" ></script>

<!-- Start Dynamic Script Example -->
<script type="text/javascript">
var callThisOnReturn = function(resp) {
  if (resp && resp.contact) {
  	var takeover = jQuery('#learn-more-form-container-white');
  	takeover.find('input:not(:checkbox):not(:submit):not(:hidden)').each(function(){
  		jQuery(this).val("");
  	});

  	takeover.find('#form-first-name').val(resp.contact['First Name']);
  	takeover.find('#form-last-name').val(resp.contact['Last Name']);
  	takeover.find('#form-email').val(resp.contact['Email']);
  	takeover.find('#form-phone').val(resp.contact['Phone Number']);
  	takeover.find('#form-address').val(resp.contact['Street']);
  	takeover.find('#form-city').val(resp.contact['City']);
  	takeover.find('#form-state').val(resp.contact['State']);
  	takeover.find('#form-country').val(resp.contact['Country']);
  	takeover.find('#form-zip').val(resp.contact['Zip']);
  	takeover.find('#form-company').val(resp.contact['Company Name']);

  	console.log(resp.contact);
  	takeover.find('input:not(:checkbox):not(:submit):not(:hidden)').each(function(){
  		var value = jQuery(this).val();
  		if (value == "") {
  			jQuery('#takeover-modal').foundation('open');
  		}
  	});
  }
};
_ss.push(['_setResponseCallback', callThisOnReturn]); 
</script>
<!-- End Dynamic Script Example -->
