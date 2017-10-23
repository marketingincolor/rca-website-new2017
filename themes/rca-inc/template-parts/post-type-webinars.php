<?php
/**
 * Template for webinars
 * 
 */

global $post;

// Get Webinar Information
$date               = new DateTime(get_field('when', false, false));
$time               = get_field('time_range');
$where              = get_field('where');
$people             = get_field('who_will_benefit');
$webinar_form_title = get_field('webinar_form_title');
$webinar_form_copy  = get_field('webinar_form_copy');
$webinar_title      = get_field('webinar_title');
$presenters         = get_field('presenters');
//$presenters = explode(',', $presenters);
// Header BG
$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); 

?>

<!-- Featured Image -->
<div id="featured-img-wrapper" class="row expanded">
	<div id="featured-img" style="background: linear-gradient(rgba(196,97,43, 0.7), rgba(196,97,43, 0.7)),
            rgba(196,97,43,0.7) url('<?php echo $backgroundImg[0]; ?>'); background-size: cover;">
			<div class="featured-img-title"><h1>Free Webinar</h1></div>
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

				
				<!-- TOPIC -->
				<?php if(!empty(get_the_title())): ?>
				<div class="when-block text-center small-12 medium-4 columns text-center" data-equalizer-watch>
					<i class="fa fa-desktop fa-3x" aria-hidden="true"></i>
					<h2>Topic</h2>
					<p class="meta"><?php the_title(); ?></p>
				</div>
				<?php endif; ?>
				<!-- /TOPIC -->


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
				<?php #if($where != NULL): ?>
<!-- 				<div class="where-block small-12 medium-4 columns text-center" data-equalizer-watch>
					<i class="fa fa-map-marker fa-3x" aria-hidden="true"></i>
					<h2>Where</h2>
					<p class="meta"><?php #echo $where; ?></p>
				</div> -->
				<?php #endif; ?>
				<!-- /WHERE -->

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

			</div>
		</div>
	</div>


	<!-- FORM FOR MEDIUM UP -->
	<?php if(get_field('pre_webinar_ss_form')): ?>
	<div id="webinar-form-block" class="">
		<div class="row">
			<div id="form" class="small-12 medium-10 medium-offset-1 columns text-center">


				<!-- SHARPSPRING FORM GOES HERE -->
				<?php 
				if(get_field('webinar_form_title')):
					echo '<h1>'.get_field('webinar_form_title').'</h1>';
				endif;
				if(get_field('webinar_form_copy')):
					echo '<p style="width: 80%; display:block; margin: 0 auto;">'.get_field('webinar_form_copy').'</p>';
				endif;
				?>
				<?php the_field('pre_webinar_ss_form'); ?>
				<!-- /SHARPSRING FORM GOES HERE -->

			</div>
		</div>
	</div>
	<?php endif; ?>
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

	<!-- SHARE MENU -->
	<?php get_template_part('template-parts/hidden', 'share-menu'); ?>
	<!-- /SHARE MENU -->

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