<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package RCA_Inc.
 */
$backgroundImg = get_stylesheet_directory_uri() . '/images/medical-device-header.jpg';
get_header(); ?>

	<!-- Featured Image -->
	<div id="featured-img-wrapper" class="row expanded">
		<div id="featured-img" style="background: linear-gradient(rgba(196,97,43, 0.7), rgba(196,97,43, 0.7)),
	            rgba(196,97,43,0.7) url('<?php echo $backgroundImg; ?>'); background-size: cover;">
				<div class="featured-img-title"><h1><?php printf( esc_html__( 'Search Results for: %s', 'rca-inc' ), '<span>' . get_search_query() . '</span>' ); ?></h1></div>
		</div>
	</div>
	<!-- / Featured Image -->

	<!-- Breadcrumbs -->
	<?php get_template_part( 'template-parts/section', 'breadcrumbs-social'); ?>
	<!-- /Breadcrumbs -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		$paged = get_query_var('paged') ? get_query_var('paged') : 1; 
		$args = array(
			'posts_per_page' => 8,
			'post__not_in'   => array(197,1217,14,201,513,6,8,209),
			// 'tax_query' => array(
			// 	array(
			// 		'taxonomy' => 'expertise',
			// 		'field'    => 'slug',
			// 		'terms'    => array('webinars', 'white-papers', 'case-studies', 'visual-resources', 'published-articles')
			// 	),
			// ),
			'paged' => $paged,
			's' => get_search_query()
		);

		$search = new WP_Query($args);

		if ( $search->have_posts() ) : ?>
			
			<div class="row">
				<div class="small-10 small-offset-1 columns text-center">
					<header class="page-header">
						<?php
							the_archive_description( '<div class="archive-description">', '</div>' );
						?>
					</header><!-- .page-header -->
				</div>
			</div>
			
			<div id="all-items-block" class="row">
				
			<?php
				/* Start the Loop */
				while ( $search->have_posts() ) : $search->the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					echo '<div class="small-10 small-offset-1 medium-offset-0 medium-3 columns end" >';
					get_template_part( 'template-parts/content', 'search' );
					echo '</div>';

				endwhile;
			?>
			<div class="row text-center">
				<div class="small-10 small-offset-1 columns pagination-col">
					<?php get_previous_posts_link(); ?>
					
					<?php #rca_tax_post_pagination(); ?>
					<?php the_posts_pagination( array( 'mid_size'  => 1, 'prev_text' => '<i class="fa fa-angle-left" aria-hidden="true"></i>', 'next_text' => '<i class="fa fa-angle-right" aria-hidden="true"></i>', 'total' => $search->max_num_pages ) ); ?>
				</div>
			</div>
			<?php
				endif; 
				wp_reset_query();
			?>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
