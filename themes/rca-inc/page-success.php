<?php 

/* Template Name: Success Page */

/**
 * Purpose: Success Page Template
 * Date: 10/24/2017
 * Author: AD.,NB.,ET., MARKETING IN COLOR
 */

$options = get_option('rca_theme_options');
get_header();
if ( have_posts() ) : while ( have_posts() ) : the_post();
?>

<section class="success" style="background: linear-gradient(
      rgba(26, 54, 93, 0.8), 
      rgba(26, 54, 93, 0.8)
    ),url(<?php the_post_thumbnail_url('full'); ?>) no-repeat; background-size: cover;">
	<div class="row">
		<div class="small-10 medium-8 large-6 small-centered columns text-center">
			<i class="fa fa-check-circle-o" aria-hidden="true"></i>
			<h1><?php the_title(); ?></h1>
			<p><?php the_content(); ?></p>
			<a href="<?php echo $options['rca_linkedin_textbox'] ?>" class="white-btn">Follow us on LinkedIn</a>
		</div>
	</div>
</section>

<?php endwhile;endif;get_footer(); ?>
