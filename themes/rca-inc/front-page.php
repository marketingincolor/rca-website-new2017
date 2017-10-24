<?php

/**
 * Purpose: For displaying the front page
 * Date: 10/24/2017
 * Author: AD.,NB.,ET., MARKETING IN COLOR
 */

get_header(); ?>

	<!-- TOP SLIDER -->
	<section class="top-slider">

		<?php echo do_shortcode('[rca-top-slider category="front-page-top" items=1 autoPlay="true" itemsDesktop="false" itemsDesktopSmall="false" itemsTablet="false" buttonTitle =""]'); ?>
		
	</section>
	<!-- /TOP SLIDER -->

	
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<!-- CONTENT -->
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'front-page' );

			endwhile;
			?>
			<!-- /CONTENT -->

		</main>
	</div>

<?php
get_footer();