<?php

/**
 * Purpose: Typical single-post.php. Gets template based on category.
 * Date: 10/24/2017
 * Author: AD.,NB.,ET., MARKETING IN COLOR
 */

get_header(); ?>
	
	<?php get_template_part( 'template-parts/section', 'breadcrumbs-social' ); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="page-wrapper">
				
				<?php
				while ( have_posts() ) : the_post();
					$cat = in_category( 'events' );

					if(in_category($cat)){
						get_template_part('template-parts/post-type', 'events');
					}
					else{
						get_template_part( 'template-parts/content', 'post' );
					}

				endwhile; // End of the loop.
				?>

			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

	<!-- LEARN MORE -->
	<?php get_template_part('template-parts/section', 'learn-more-form-container-blue'); ?>
	<!-- /LEARN MORE -->

	<!-- NEWS -->
	<?php echo get_template_part('template-parts/section', 'news'); ?>
	<!-- /NEWS -->
	
<?php
get_footer();