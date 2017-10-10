<?php get_header(); ?>
	<?php get_template_part('template-parts/section', 'takeover-modal'); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/post-type', 'events' );
				$gated = get_field('gated',  'expertise_' . $term_id);
				if ($gated) {
				  echo '<a href="#" data-open="takeover-modal">Takeover</a>';
				}
			endwhile;
			?>

		</main>
	</div>

	<!-- LEARN MORE -->
	<?php //get_template_part('template-parts/section', 'learn-more-form-container-blue'); ?>
	<?php get_template_part('template-parts/section', 'learn-more-cta'); ?>
	<!-- /LEARN MORE -->

<?php
get_footer();