<?php
get_header(); 
$type = 'white paper';
?>
	<?php get_template_part('template-parts/section', 'takeover-modal'); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/post-type', 'white-papers' );
				
				// $terms      = wp_get_post_terms($post->ID,'expertise');
				// $term_id = $terms[0]->term_id;
				// $gated = get_field('gated',  'expertise_' . $term_id);

				#get_template_part('template-parts/section', 'takeover-modal');
				#echo '<a href="#" data-open="takeover-modal">Takeover</a>';
				
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