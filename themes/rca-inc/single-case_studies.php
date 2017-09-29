<?php
get_header(); ?>
	<?php get_template_part('template-parts/section', 'takeover-modal'); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/post-type', 'case-study' );
				#get_template_part('template-parts/section', 'takeover-modal');
				#echo '<a href="#" data-open="takeover-modal">Takeover</a>';
			endwhile;
			?>

		</main>
	</div>

	<!-- LEARN MORE -->
	<?php get_template_part('template-parts/section', 'learn-more-form-container-blue'); ?>
	<!-- /LEARN MORE -->

<?php
//get_sidebar();
get_footer();