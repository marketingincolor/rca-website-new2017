<?php

/**
 * Purpose: For displaying the about page
 * Date: 10/24/2017
 * Author: AD.,NB.,ET., MARKETING IN COLOR
 */

global $post;
$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
$testimonial   = get_field('testimonial');

get_header(); ?>
	
	<!-- FEATURED IMAGE -->
	<div id="featured-img-wrapper" class="row expanded">
		<div id="featured-img" style="background: linear-gradient(rgba(196,97,43, 0.7), rgba(196,97,43, 0.7)),
	            rgba(196,97,43,0.7) url('<?php echo $backgroundImg[0]; ?>'); background-size: cover;">
				<div class="featured-img-title"><h1><?php the_title(); ?></h1></div>
		</div>
	</div>
	<!-- / FEATURED IMAGE -->

	<?php get_template_part( 'template-parts/section', 'breadcrumbs-social'); ?>

	<!-- THE CONTENT -->
	<div id="the-content" class="row">
		<div class="small-10 small-offset-1 columns">
			<?php echo the_content(); ?>
		</div>
	</div>
	<!-- /THE CONTENT -->

	<!-- TESTIMONAIAL -->
	<div class="row">
		<?php if($testimonial): ?>
		<div class="about-us-testimonial small-10 small-offset-1 columns">
			<p><?php echo $testimonial; ?></p>
		</div>
		<?php endif; ?>
	</div>
	<!-- /TESIMONIAL -->

	<div id="contact-learn-more-wrapper">
		<?php get_template_part('template-parts/section', 'learn-more-form-container-blue'); ?>
	</div>

	<!-- NEWS -->
	<?php get_template_part('template-parts/section', 'news'); ?>
	<!-- /NEWS -->

<?php
get_footer();