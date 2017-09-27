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
	<div id="news-all-buttons" class="row">
		<div class="small-10 small-offset-1 large-2 large-offset-1 columns">
			<a href="#News"><button id="filter-news" class="news-filter" onclick="filterPosts('<?php echo get_stylesheet_directory_uri(); ?>')" title="News" news_filter="news">News</button></a>
		</div>
		<div class="small-10 small-offset-1 large-2 large-offset-0 columns">
			<a href="#Press-Releases"><button id="press" class="news-filter" onclick="filterPosts('<?php echo get_stylesheet_directory_uri(); ?>')" title="Press Releases" news_filter="press-releases">Press Releases</button></a>
		</div>
		<div class="small-10 small-offset-1 large-2 large-offset-0 columns">
			<a href="#Events"><button id="events" class="news-filter" onclick="filterPosts('<?php echo get_stylesheet_directory_uri(); ?>')" title="Events" news_filter="events">Events</button></a>
		</div>
		<div class="small-10 small-offset-1 large-2 large-offset-0 columns">
			<a href="#View-All"><button id="all" class="news-filter" onclick="filterPosts('<?php echo get_stylesheet_directory_uri(); ?>')" title="" news_filter="all">View All</button></a>
		</div>
		<div class="small-10 small-offset-1 large-2 large-offset-0 columns end" onclick="filterPosts('<?php echo get_stylesheet_directory_uri(); ?>')" news_filter="Year Published">

			<!-- Dynamically Set Year in Dropdown -->
			<select id="newsFilterSelect" class="" onclick="filterNewsPostsNoSpinner('<?php echo get_stylesheet_directory_uri(); ?>', getCategory(), ajaxFilterYear())">
			<?php 
				$beginning_year = 2016;
				$current_year = date("Y");
				var_dump($current_year);
				echo '<option value="Year Published">Year Published</option>';
				for ($i = $beginning_year; $i <= $current_year; $i++ ){ ?>
					<center><option class="news-filter" value="<?php echo $i;?>" news_filter="<?php echo $i; ?>"><?php echo $i; ?></option></center>
			<?php	}
			?>
			</select>
			<!-- /Dynamically Set Year in Dropdown -->

		</div>


		<div class="spinner" style="display:none;">
			<div class="double-bounce1"></div>
			<div class="double-bounce2"></div>
		</div>

	</div>



	<div id="all-posts" class="post-container">
		<script>
		$(document).ready(function() {
			defaultNewsFilter('<?php echo get_stylesheet_directory_uri(); ?>', 'all', ajaxFilterYear());
		});
		</script>
				
	</div>

	<!-- Buttons -->
	<div class="row text-center">
		<div class="small-12 columns">
			<div class="pagination">
				<div class="previous" style="display: inline-block;" onclick="rcaPrevious('<?php echo get_stylesheet_directory_uri() ?>', getCategory(), ajaxFilterYear())">< PREVIOUS</div>

				<div class="rca-dots" style="display: inline-block;">

				</div>

				<div class="next" style="display: inline-block;" onclick="rcaNext('<?php echo get_stylesheet_directory_uri()?>', getCategory(), ajaxFilterYear())">
					NEXT ></div>
			</div>
		</div>
	</div>
	<!-- /Buttons -->

		<!-- Hidden Inputs -->
		<input class="rca_query" type="hidden" value="all">
		<input class="rca_offset" type="hidden" value="0">
		<input class="rca_total_posts" type="hidden" value="0">
		<!-- /Hidden Inputs -->


<?php
//get_sidebar();
get_footer();
