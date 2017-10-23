<?php
global $post;
$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
$updated_bg = rca_get_featured_img($post->ID);
$remove_on_page = array('privacy-policy', 'terms-of-use', 'us-agent-services');
get_header(); ?>
	
	<!-- Featured Image -->
	<div id="featured-img-wrapper" class="row expanded">
		<div id="featured-img" style="background: linear-gradient(rgba(196,97,43, 0.7), rgba(196,97,43, 0.7)),
	            rgba(196,97,43,0.7) url('<?php echo $updated_bg; ?>'); background-size: cover;">
				<div class="featured-img-title"><h1><?php the_title(); ?></h1></div>
		</div>
	</div>
	<!-- / Featured Image -->
	<div class="page-wrapper">
		
		
		<!-- Get Breadcrumbs except on privacy policy -->
		<?php
			if(!is_page( 'privacy-policy' ) ):
				get_template_part( 'template-parts/section', 'breadcrumbs-social' );
			endif; 
		?>
		<!-- /Get Breadcrumbs except on privacy policy -->


		<div id="primary" class="content-area">
			<main id="main" class="site-main">

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

			</main><!-- #main -->
		</div><!-- #primary -->

	</div>

	<?php

		// If not these pages show related content on page.php
		if( !is_page( $remove_on_page ) ) {
			get_template_part('template-parts/content', 'related-content');
		}

		if(is_page(2162)) {
			get_template_part('template-parts/section', 'agent-services-form');
		} else{
			get_template_part('template-parts/section', 'learn-more-form-container-blue');
		}


get_footer();
