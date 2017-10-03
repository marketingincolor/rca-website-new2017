<?php
global $post;
$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
get_header(); ?>
	
	
	<!-- Featured Image -->
	<div id="featured-img-wrapper" class="row expanded">
		<div id="featured-img" style="background: linear-gradient(rgba(196,97,43, 0.7), rgba(196,97,43, 0.7)),
	            rgba(196,97,43,0.7) url('<?php echo $backgroundImg[0]; ?>'); background-size: cover;">
				<div class="featured-img-title"><h1><?php the_title(); ?></h1></div>
		</div>
	</div>
	<!-- / Featured Image -->


	<?php

	get_template_part( 'template-parts/section', 'breadcrumbs-social' ); ?>

	<!-- Buttons -->
	<?php echo get_template_part( 'template-parts/news', 'buttons' ); ?>
	<!-- /Buttons -->
<?php
		  	// Change News Query Based on whats clicked in rca-filter-news.js
  	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

	$news_query = new WP_Query( array(
    	'post_type' => 'press_releases',
    	'posts_per_page' => 5,
    	'paged' => $paged,
    	// 'date_query' => array(
    	// 	'year' => $dropdown_query
    	// ),
    	// 'offset' => $offset,
	));
	$temp_query = $wp_query;
	$wp_query   = NULL;
	$wp_query   = $news_query;

	if($news_query->have_posts()) { while($news_query->have_posts()) { $news_query->the_post(); ?>

	<a href="#!"><?php the_post_thumbnail(); ?></a>

	<div class="row">
		<div class="small-10 small-offset-1 columns">
			<div class="story-container">
				<h2><a href="<?php echo get_post_permalink(); ?>"><?php the_title(); ?></a></h2>
				<p class="story-date"><?php echo get_the_date(); ?></p>
				<?php echo wp_trim_words(get_the_content(), 40, '...<a href="'. get_permalink() . '">Read More</a>'); ?>
			</div>
		</div>
	</div>

	<?php } 
		//next_posts_link();
		//previous_posts_link();
		$pagination_block = '';
		$pagination_block .= '<div class="row">';
		$pagination_block .= '<div class="small-10 small-offset-1 columns text-center">';
		$pagination_block .= rca_tax_post_pagination();
		$pagination_block .= '</div>';
		$pagination_block .= '</div>';
		echo $pagination_block;
		$wp_query = NULL;
		$wp_query = $temp_query;
		}

	?>
			<!-- Dynamically Set Year in Dropdown -->
			<!-- <select id="newsFilterSelect" class="" onclick=""> -->
			<?php 
			//	$beginning_year = 2016;
			//	$current_year = date("Y");
			//	var_dump($current_year);
			//	echo '<option value="Year Published">Year Published</option>';
			//	for ($i = $beginning_year; $i <= $current_year; $i++ ){ ?>
					<!-- <center><option class="news-filter" value="<?php echo $i;?>" news_filter="<?php echo $i; ?>"><?php echo $i; ?></option></center> -->
			<?php	// }
			?>
			<!-- </select> -->
			<!-- /Dynamically Set Year in Dropdown -->

		</div>


		<div class="spinner" style="display:none;">
			<div class="double-bounce1"></div>
			<div class="double-bounce2"></div>
		</div>

	</div>



	<!-- <div id="all-posts" class="post-container"> -->
<!-- 		<script>
		$(document).ready(function() {
			defaultNewsFilter('<?php echo get_stylesheet_directory_uri(); ?>', 'all', ajaxFilterYear());
		});
		</script>
				
	</div> -->

	<!-- Buttons -->
<!-- 	<div class="row text-center">
		<div class="small-12 columns">
			<div class="pagination">
				<div class="previous" style="display: inline-block;" onclick="rcaPrevious('<?php #echo get_stylesheet_directory_uri() ?>', getCategory(), ajaxFilterYear())">< PREVIOUS</div>

				<div class="rca-dots" style="display: inline-block;">

				</div>

				<div class="next" style="display: inline-block;" onclick="rcaNext('<?php #echo get_stylesheet_directory_uri()?>', getCategory(), ajaxFilterYear())">
					NEXT ></div>
			</div>
		</div>
	</div> -->
	<!-- /Buttons -->

		<!-- Hidden Inputs -->
<!-- 		<input class="rca_query" type="hidden" value="all">
		<input class="rca_offset" type="hidden" value="0">
		<input class="rca_total_posts" type="hidden" value="0"> -->
		<!-- /Hidden Inputs -->


<!-- NEWS -->
<?php get_template_part('template-parts/section', 'news'); ?>
<!-- /NEWS -->
<?php
get_footer();
