<?php
  $id = get_the_ID();
  $post_type = get_post_type();
  switch ($post_type) {
    case 'case_studies':
      $type = 'case study';
      break;
    case 'white_papers':
      $type = 'white paper';
      break;
    case 'visual_resources':
      $type = 'visual resource';
      break;
    default:
      $type = 'webinar';
      break;
  }
?>

<!-- Webinar DataLayer Events -->
<?php if($type == 'webinar'): ?>
  <script>
    // dataLayer.push({
    //   'event': 'FormShown',
    //   'expertise_category': 'Takeover Form Displayed',
    //   'expertise_action' : 'Webinar',
    //   'post_type' : 'Webinar'
    // });

    var post_type = 'Webinar';
  </script>
<?php endif; ?>
<!-- End Webinar Datalayer Events -->

<!-- Case Study DataLayer Events -->
<?php if($type == 'case study'): ?>
  <script>
    // dataLayer.push({
    //   'event': 'FormShown',
    //   'expertise_category': 'Takeover Form Displayed',
    //   'expertise_action' : 'Case Study',
    //   'post_type' : 'Case Study'
    // });
    var post_type = 'Case Study';
  </script>
<?php endif; ?>
<!-- End Case Study Datalayer Events -->

<!-- Visual Resource DataLayer Events -->
<?php if($type == 'visual resource'): ?>
  <script>
    // dataLayer.push({
    //   'event': 'FormShown',
    //   'expertise_category': 'Takeover Form Displayed',
    //   'expertise_action' : 'Visual Resource',
    //   'post_type' : 'Visual Resource'
    // });
    var post_type = 'Visual Resource';
  </script>
<?php endif; ?>
<!-- End Visual Resources Datalayer Events -->

<!--  White Papers DataLayer Events -->
<?php if($type == 'white paper'): ?>
  <script>
    // dataLayer.push({
    //   'event': 'FormShown',
    //   'expertise_category': 'Takeover Form Displayed',
    //   'expertise_action' : 'White Paper',
    //   'post_type' : 'White Paper'
    // });
    var post_type = 'White Paper';

  </script>
<?php endif; ?>
<!-- End White Papers Datalayer Events -->


<div class="reveal" id="takeover-modal" data-reveal data-options="closeOnBackgroundClick:false;closeOnEsc:false;">
  <div class="takeover-header">
    <div class="row takeover-header-box">
      <div class="small-10 small-centered columns text-center takeover-logo">
        <img class="takeover-logo-img" src="<?php echo get_template_directory_uri(); ?>/images/rca-takeover-logo-svg.svg">
      </div>
    </div>
  </div>
  <div class="row">
  	<div class="small-10 small-centered columns">
      <h4 class="takeover-tag"><?php echo $type; ?></h4>
  		<h1><?php the_title(); ?></h1>
      <?php if(get_field('custom_excerpt')): ?>
  		<p><?php the_field('custom_excerpt'); ?></p>
      <?php endif; ?>
  		<p><strong>About RCA</strong><br>Regulatory Compliance Associates<sup>®</sup> Inc. (RCA) provides worldwide services to the pharmaceutical, biologic, sterile compounding, biotechnology, and medical device industries for resolution of compliance and regulatory challenges.</p>
      <p style="font-size:22px; font-weight:bold; margin-bottom:0;">Please complete the form to access the <?php echo $type; ?>.</p>
  	</div>
  </div>
  <?php get_template_part('template-parts/section', 'learn-more-form-container-modal'); ?>
  <div class="takeover-footer">
    <div class="row takeover-footer-content">
      <div class="small-10 small-centered columns text-center takeover-footer-meta">
        Copyright &copy; <?php echo date('Y'); ?> by Regulatory Compliance Associates&reg; Inc.<br class="hide-for-medium"> All Rights Reserved.<br />
        10411 Corporate Drive, Suite 102, Pleasant Prairie, WI 53158 <span class="hide-for-small-only">&bull;</span><br class="hide-for-medium"> 262-288-6300<br />
        ISO 9011 Certified
      </div>
    </div>
  </div>
</div>

<style>
	#takeover-modal{
		width: 100%;
		max-width: 100%;
		height: 100%;
		top:0 !important;
    background-color: /*rgba(255,255,255,0.9);*/ #f8f7f5;
    padding:0 !important;
	}
	#learn-more-form-container-white h1 {
		display: none;
	}
  #learn-more-form-container-white input[type="submit"] {
    max-width:180px;
  }
  .form-box{
    padding:4em 0em;
    background-color:#fff;
    box-shadow: 0px 3px 7.2px 0.8px rgba(0, 0, 0, 0.1);
  }
  .takeover-tag{
    background-color: gray;
    display: inline-block;
    padding: 5px 15px 3px 15px;
    color: white;
    margin-bottom:4%;
    font-size: 16px;
    font-weight:bold;
    text-transform: uppercase;
  }
  .takeover-header{
    background: url(<?php echo get_template_directory_uri(); ?>/images/rca-takeover-header-bg.jpg) no-repeat center center / cover;
    margin-bottom:5%;
  }
  .takeover-header-box{
    padding:4em 0em;
    min-height:;
  }
  .takeover-footer{
    background-color:#2b2b2b;
    margin-top:4em;
    color:#fff;
    padding:3.25em;
    font-size:.75em;
    line-height:1.4;
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
    console.log('Have Contact');
    console.log(post_type);


    // //IF WE DONT HAVE THE CONTACT
    if(post_type == 'Webinar') {
      dataLayer.push({
        'event': 'FormHidden',
        'expertise_category': 'Takeover Form Hidden',
        'expertise_action' : 'Webinar',
      });
    }

    if(post_type == 'Case Study') {
      dataLayer.push({
        'event': 'FormHidden',
        'expertise_category': 'Takeover Form Hidden',
        'expertise_action' : 'Case Study',
      });
    }

    if(post_type == 'Visual Resource') {
      dataLayer.push({
        'event': 'FormHidden',
        'expertise_category': 'Takeover Form Hidden',
        'expertise_action' : 'Visual Resource',
      });
    }

    if(post_type == 'White Paper') {
      dataLayer.push({
        'event': 'FormHidden',
        'expertise_category': 'Takeover Form Hidden',
        'expertise_action' : 'White Paper',
      });
    }

    takeover.find('input:not(:checkbox):not(:submit):not(:hidden)').each(function(){
      var value = jQuery(this).val();
      if (value == "") {
//        jQuery('#takeover-modal').foundation('open');
      }
      
  	});
  }else{
//    jQuery('#takeover-modal').foundation();
//  	jQuery('#takeover-modal').foundation('open');
    console.log('else');

    //IF WE DONT HAVE THE CONTACT
    if(post_type == 'Webinar') {
      dataLayer.push({
        'event': 'FormShown',
        'expertise_category': 'Takeover Form Displayed',
        'expertise_action' : 'Webinar',
      });
    }

    if(post_type == 'Case Study') {
      dataLayer.push({
        'event': 'FormShown',
        'expertise_category': 'Takeover Form Displayed',
        'expertise_action' : 'Case Study',
      });
    }

    if(post_type == 'Visual Resource') {
      dataLayer.push({
        'event': 'FormShown',
        'expertise_category': 'Takeover Form Displayed',
        'expertise_action' : 'Visual Resource',
      });
    }

    if(post_type == 'White Paper') {
      dataLayer.push({
        'event': 'FormShown',
        'expertise_category': 'Takeover Form Displayed',
        'expertise_action' : 'White Paper',
        'post_type' : 'White Paper'
      });
    }
  }
};
_ss.push(['_setResponseCallback', callThisOnReturn]); 
</script>
<!-- End Dynamic Script Example -->
