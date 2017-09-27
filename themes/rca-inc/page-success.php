<?php 
	/* Template Name: Success */
	get_header();
	if ( have_posts() ) : while ( have_posts() ) : the_post();
?>

<section class="success" style="background-image: url(<?php the_post_thumbnail_url('full'); ?>)">
	<div class="row">
		<div class="small-10 medium-8 large-6 small-centered columns text-center">
			<i class="fa fa-check-circle-o" aria-hidden="true"></i>
			<h1><?php the_title(); ?></h1>
			<p><?php the_content(); ?></p>
			<a href="#!" class="white-btn">Follow us on LinkedIn</a>
		</div>
	</div>
</section>

<?php endwhile;endif;get_footer(); ?>
