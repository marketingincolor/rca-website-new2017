<?php

global $post;

// Get the background image for taxonomy.
$title = 'Strategic Consulting';
$term_obj = get_term_by( 'name', $title, 'services' );
$term_id = $term_obj->term_taxonomy_id;
$backgroundImg = get_field('featured_image',  'services_' . $term_id);

get_header(); ?>
	
	<!-- Featured Image -->
	<div id="featured-img-wrapper" class="row expanded">
		<div id="featured-img" style="background: linear-gradient(rgba(196,97,43, 0.7), rgba(196,97,43, 0.7)),
	            rgba(196,97,43,0.7) url('<?php echo $backgroundImg['url']; ?>'); background-size: cover;">
				<div class="featured-img-title"><h1><?php echo $title; ?></h1></div>
		</div>
	</div>
	<!-- / Featured Image -->

	<?php get_template_part( 'template-parts/section', 'breadcrumbs-social'); ?>

	<!-- The Content -->
	<div class="row text-center">
		<div class="small-12 columns">
			<?php echo the_content(); ?>
		</div>
	</div>
	<!-- /The Content -->

	

	<!-- Related Content -->
	<div class="row">
		<div class="small-12 columns text-center">
			<h4>Related Content</h4>
		</div>
	</div>
	<!-- /Related Content -->
	
	<div id="contact-learn-more-wrapper">
		<?php get_template_part('template-parts/section', 'learn-more-form-container-blue'); ?>
	</div>

	<!-- NEWS -->
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