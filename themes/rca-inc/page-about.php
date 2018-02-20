<?php

global $post;
$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
$testimonial   = get_field('testimonial');

get_header(); ?>
	
	<!-- Featured Image -->
	<div id="featured-img-wrapper" class="row expanded">
		<div id="featured-img" style="background: linear-gradient(rgba(196,97,43, 0.7), rgba(196,97,43, 0.7)),
	            rgba(196,97,43,0.7) url('<?php echo $backgroundImg[0]; ?>'); background-size: cover;">
				<div class="featured-img-title"><h1><?php the_title(); ?></h1></div>
		</div>
	</div>
	<!-- / Featured Image -->

	<?php get_template_part( 'template-parts/section', 'breadcrumbs-social'); ?>

	<!-- The Content -->
	<div id="the-content" class="row">
		<div class="small-10 small-offset-1 columns">
			<?php echo the_content(); ?>
		</div>
	</div>
	<!-- /The Content -->

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
//get_sidebar();
get_footer();