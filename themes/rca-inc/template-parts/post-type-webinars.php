<?php
/**
 * Template for webinars
 * 
 */

global $post;

// Get Webinar Information
$date  = new DateTime(get_field('when', false, false));
$time  = get_field('time_range');
$where = get_field('where');
$people = get_field('who_will_benefit');
$webinar_form_title = get_field('webinar_form_title');
$webinar_form_copy = get_field('webinar_form_copy');
$webinar_title = get_field('webinar_title');
$presenters = get_field('presenters');
//$presenters = explode(',', $presenters);
// Header BG
$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); 

?>

<!-- Featured Image -->
<div id="featured-img-wrapper" class="row expanded">
	<div id="featured-img" style="background: linear-gradient(rgba(196,97,43, 0.7), rgba(196,97,43, 0.7)),
            rgba(196,97,43,0.7) url('<?php echo $backgroundImg[0]; ?>'); background-size: cover;">
			<div class="featured-img-title"><h1><?php the_title(); ?></h1></div>
	</div>
</div>
<!-- / Featured Image -->

<!-- REGISTER & SHARE -->
<div class="row">
	<div class="small-12 columns">
		<div class="row">
			<div id="register-block" class="small-6 columns text-center hide-for-medium">
				<p>Register <i class="fa fa-pencil" aria-hidden="true"></i></p>
			</div>
			<div id="share-block" class="small-6 columns text-center hide-for-medium">
				<p>Share <i class="fa fa-share" aria-hidden="true"></i></p>
			</div>
		</div>
	</div>

</div>

<!-- /REGISTER & SHARE -->
<aside id="webinar-container">
	<div style="background-color: #f8f7f5;">
		<div id="webinar-information-block" class="row" data-equalizer>

			<div class="small-10 small-offset-1 columns">

				<!-- WHEN -->
				<?php if($date != NULL || $time != NULL): ?>
				<div class="when-block text-center small-12 medium-4 columns text-center" data-equalizer-watch>
					<i class="fa fa-calendar fa-3x" aria-hidden="true"></i>
					<h2>When</h2>
					<p class="meta"><?php echo $date->format('l, F d, Y'); ?>
					<p class="meta"><?php echo $time; ?></p>
				</div>
				<?php endif; ?>
				<!-- /WHEN -->


				<!-- WHO -->
				<div class="who-block small-12 medium-4 columns text-center" data-equalizer-watch>
					<i class="fa fa-users fa-3x" aria-hidden="true"></i>
					<h2>Who Will Benefit</h2>
					<?php
					$count = 0;
					if ($people):
						foreach ($people as $person) {
								if($count%3):
									$addClass='medium-6';
								endif;
								echo '<div class="">';
								echo '<p class="meta">'.$person.'</p>';
								echo '</div>';
								$count++;
						}
					endif;
					?>
				</div>
				<!-- /WHO -->

				<!-- Where -->
				<?php if($where != NULL): ?>
				<div class="where-block small-12 medium-4 columns text-center" data-equalizer-watch>
					<i class="fa fa-map-marker fa-3x" aria-hidden="true"></i>
					<h2>Where</h2>
					<p class="meta"><?php echo $where; ?></p>
				</div>
				<?php endif; ?>
				<!-- /WHERE -->

			</div>
		</div>
	</div>
	<style>
		#webinar-form-block h2{
			font-size: 2rem;
			color: white;
			font-style: italic;
			font-family: 'lora';
		}
	</style>
	<!-- FORM FOR MEDIUM UP -->
	<div id="webinar-form-block" class="show-for-medium">
		<div class="row">
			<div id="form" class="small-10 small-offset-1 columns text-center">
				<!-- SharpSpring Form for NB Test  -->
				<script type="text/javascript">
				    var ss_form = {'account': 'MzawMDGwMDYyAgA', 'formID': 'SzYyM0q2NEvWNUs1S9Q1MbUw0E1KMjDRTTNPtUg2TklLM060BAA'};
				    ss_form.hidden = {'_usePlaceholders': true};
				    ss_form.width = '100%';
				    ss_form.domain = 'app-3QMGUWHS20.marketingautomation.services';
				    // ss_form.hidden = {'Company': 'Anon'}; // Modify this for sending hidden variables, or overriding values
				</script>
				<script type="text/javascript" src="https://koi-3QMGUWHS20.marketingautomation.services/client/form.js?ver=1.1.1"></script>
			</div>
		</div>
	</div>
	<!-- /FORM FOR MEDIUM UP -->
</aside>

<div class="row">
	<div class="small-10 small-offset-1 columns">
		<?php get_template_part( 'template-parts/section', 'breadcrumbs-social' ); ?>
	</div>
</div>

<div id="">

	<!-- Title -->
	<div id="webinar-title" class="row">
		<div class="small-10 small-offset-1 columns text-left">
			<h1><?php echo $webinar_title; ?></h1>
		</div>
	</div>
	<!-- /Title -->

	<!-- Content -->
	<div id="webinar-content" class="row">
		<div class="small-10 small-offset-1 columns" >
			<?php the_content(); ?>
		</div>
	</div>
	<!-- /Content -->
</div>

<!-- HIDDEN SHARE MENU -->
<div id="share-menu" style="display:none;">
	<div class="row close">
		<div class="small-offset-10 small-2 columns">
			<i class="fa fa-times fa-2x" aria-hidden="true"></i>
		</div>
	</div>
	<div class="row title">
		<div class="small-12 columns">
			<h1>Share This Page</h1>
		</div>
	</div>
	<div id="social-icons">
		<div class="row a2a_kit a2a_kit_size_32 a2a_default_style text-center">
			<div class="small-2 columns text-center">
				<a class="a2a_button_facebook"><i class="fa fa-facebook-square fa-3x a2a_button_facebook" aria-hidden="true"></i></a>
			</div>
			<div class="small-2 columns text-center">
				<a class="a2a_button_linkedin"><i class="fa fa-linkedin-square fa-3x" aria-hidden="true"></i></a>
			</div>
			<div class="small-2 columns text-center">
				<a class="a2a_button_googleplusone"><i class="fa fa-google-plus-square fa-3x" aria-hidden="true"></i></a>
			</div>
			<div class="small-2 columns text-center">
				<a class="a2a_button_twitter"><i class="fa fa-twitter-square fa-3x" aria-hidden="true"></i></a>
			</div>
			<div class="small-2 columns text-center">
				<a class="a2a_button_email"><i class="fa fa-envelope fa-3x" aria-hidden="true"></i></a>
			</div>
		</div>
	</div>
</div>

<!-- /HIDDEN SHARE MENU -->
	<!-- For Custom Share Buttons -->
	<script async src="https://static.addtoany.com/menu/page.js"></script>
	<!-- SHARE BUTTON CLICKS -->
	<script>
		$(document).ready(function() {
			var logo = $('#masthead > section.hide-for-large > div:nth-child(1)').height();
			var close = $('#share-menu .close');
			logo = Math.abs(logo);
			console.log( 'logoheight ' + logo);
			var shareButton = $('#share-block');
			var shareMenu = $('#share-menu');

			shareButton.on('click', function() {

				// Show the Menu
				shareMenu.show();
				shareMenu.toggleClass('share-menu-js');
				shareMenu.css('top', logo); 

				// Disable scrolling
				$('html, body').css( { 
					overflow:'hidden', 
					height: '100%'
				});
			});

			close.on('click', function() {

				//Enable scrolling
				$('html, body').css({
				    overflow: 'auto',
				    height: 'auto'
				});

				// Hide the Menu
				shareMenu.toggleClass('share-menu-js');
				shareMenu.hide();
			});


		})
	</script>

	<!-- Form Animations -->
	<script>
		var $form = $('#webinar-form-block');
		$form.find('input,textarea').on('keyup',function(){
			if($(this).is(":valid")){
				$(this).next('i').css({'color':'white'});
				$(this).prev('label,label i').css({'color':'white'});
				$(this).prev('label').find('i').css({'color':'white'});
			}else{
				$(this).next('i').css({'color':'rgba(255,255,255,0.4)'});
				$(this).prev('label').css({'color':'rgba(255,255,255,0.4)'});
				$(this).prev('label').find('i').css({'color':'rgba(255,255,255,0.4)'});
			}
		});
	</script>

	<!-- Scroll User to Register Form -->
	<script>
		var regButton = $('#register-block');
		regButton.on('click', function() {

			$('html, body').animate({
		        scrollTop: $('#webinar-form-block-mobile #form h1').offset().top
		    }, 2000);

		});
	</script>