<?php
get_header(); ?>
	
	<?php get_template_part( 'template-parts/section', 'breadcrumbs-social' ); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				// if ( comments_open() || get_comments_number() ) :
				// 	comments_template();
				// endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<!-- LEARN MORE -->
	<?php get_template_part('template-parts/section', 'learn-more-form-container-blue'); ?>
	<!-- /LEARN MORE -->

	<!-- NEWS -->
	<?php #echo do_shortcode('[rca-news-slider category="news" items=1 autoPlay=true itemsDesktop=1000,2]'); ?>
	<div id="news-container">
		<div style="background: url('<?php echo get_stylesheet_directory_uri() . '/images/news-section.jpg';?>'); background-size: cover; height: auto; padding: 2.5rem 0rem;">
			
			<div class="row">
				<div class="small-12 columns text-center" style="color: white;">
					<h3>News</h3>
				</div>
			</div>
			<div id="news-snippets-wrapper" class="row text-center">
					
					<?php
						wp_reset_postdata();
						$category_id = get_cat_ID('news');

						$args = array(
							'post_type' => 'post',
							'cat' => $category_id,
							// 'orderby' => 'date',
							// 'order' => 'ASC',
							'posts_per_page' => 3

						);

						$news_query = new WP_Query($args);

						if ( $news_query->have_posts() ) { 
							while ( $news_query->have_posts() ) {
								$news_query->the_post();
								echo '<div class="small-12 medium-6 large-4 columns" style="Color: white;">';
								#the_title();
								echo wp_trim_words(get_the_content(), $num_words = 15, '...<br/>Read More');
								echo '</div>';
							}
						}




					?>

			</div>
		</div>		
	
	</div>
	</div>
	<!-- /NEWS -->
	
<?php
//get_sidebar();
get_footer();