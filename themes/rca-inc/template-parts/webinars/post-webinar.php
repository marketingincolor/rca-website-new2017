<?php
global $post;
$terms = get_the_terms( $post->ID, 'registration' );

/* Template Name: Webinar Expertise Page */
// Get Webinar Information
// $date  = new DateTime(get_field('when', false, false));
// $time  = get_field('time_range');
// $where = get_field('where');
$people = get_field('who_will_benefit');
$webinar_form_title = get_field('webinar_form_title');
$webinar_form_copy = get_field('webinar_form_copy');
$webinar_title = get_field('webinar_title');
$presenters = get_field('presenters');

$presenters = explode(',', $presenters);

// Header BG
$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); 

get_header(); ?>
	<?php get_template_part('template-parts/section', 'takeover-modal'); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/webinars/post', 'webinar-content' );
				#get_template_part('template-parts/section', 'takeover-modal');
				#echo '<a href="#" data-open="takeover-modal">Takeover</a>';
			endwhile;
			?>

		</main>

	</div>

	<!-- LEARN MORE -->
	<?php //get_template_part('template-parts/section', 'learn-more-form-container-blue'); ?>
	<?php get_template_part('template-parts/section', 'learn-more-cta'); ?>
	<!-- /LEARN MORE -->

<?php
//get_sidebar();
get_footer();