<?php

/**
 * Purpose: Displays a single white paper page.
 * Date: 10/24/2017
 * Author: AD.,NB.,ET., MARKETING IN COLOR
 */

get_header();
?>
	<?php get_template_part('template-parts/section', 'takeover-modal'); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/post-type', 'white-papers' );
			endwhile;
			?>

		</main>
	</div>

	<!-- RELATED CONTENT -->
	<?php get_template_part('template-parts/content', 'related-content'); ?>
	<!-- /RELATED CONTENT -->

	<!-- LEARN MORE -->
	<?php get_template_part('template-parts/section', 'learn-more-cta'); ?>
	<!-- /LEARN MORE -->

<?php
//get_sidebar();
get_footer();