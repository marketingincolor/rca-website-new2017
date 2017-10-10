<?php
get_header(); ?>
	
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/post-type', 'published-articles' );
			endwhile;
			?>

		</main>
	</div>
	
	<!-- RELATED CONTENT -->
	<?php get_template_part('template-parts/content', 'related-content'); ?>
	<!-- /RELATED CONTENT -->

	<!-- LEARN MORE -->
	<?php //get_template_part('template-parts/section', 'learn-more-form-container-blue'); ?>
	<?php get_template_part('template-parts/section', 'learn-more-cta'); ?>
	<!-- /LEARN MORE -->

<?php
//get_sidebar();
get_footer();