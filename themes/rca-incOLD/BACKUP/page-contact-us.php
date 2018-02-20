<?php

/**
 * Purpose: For displaying the contact page
 * Date: 10/24/2017
 * Author: AD.,NB.,ET., MARKETING IN COLOR
 */

global $post;
$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );

get_header(); ?>
	
	<!-- FEATURED IMAGE -->
	<div id="featured-img-wrapper" class="row expanded">
		<div id="featured-img" style="background: linear-gradient(rgba(196,97,43, 0.7), rgba(196,97,43, 0.7)),
	            rgba(196,97,43,0.7) url('<?php echo $backgroundImg[0]; ?>'); background-size: cover;">
			<div class="small-10 small-offset-1">
				<div class="featured-img-title"><h1><?php the_title(); ?></h1></div>
			</div>
		</div>
	</div>
	<!-- / FEATURED IMAGE -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main contact-page">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'contact-us' );

			endwhile; // End of the loop.
			?>

			<!-- SHARE BAR -->
			<div id="share-bar" class="row expanded show-for-medium">
				<div class="row text-center a2a_kit">
					<p>Share Our Information</p>
					<a class="a2a_button_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					<a class="a2a_button_twitter" title="RCA Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
					<a class="a2a_button_linkedin" title="RCA LinkedIn"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
					<a class="a2a_button_email" title="RCA eMail"><i class="fa fa-envelope" aria-hidden="true"></i></a>
					<a class="a2a_dd" title="Share"><i class="fa fa-share" aria-hidden="true"></i></a>
				</div>
			</div>
			<!-- /SHARE BAR -->

			<!-- SHARE BUTTON ON MOBILE -->
			<div id="share-section" class="row hide-for-medium">
				<div class="small-10 small-offset-1 columns">
					<button class="orange-btn">Share <i class="fa fa-share" aria-hidden="true"></i></button>
				</div>
			</div>
			<!-- /SHARE BUTTON ON MOBILE -->
	
		</main>
	</div>

	<!-- WHITE FORM -->
	<div id="contact-learn-more-wrapper">
		<?php get_template_part('template-parts/section', 'learn-more-form-container-white'); ?>
	</div>
	<!-- /WHITE FORM -->

<?php
get_footer();