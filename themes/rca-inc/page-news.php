<?php

/**
 * Purpose: Displays the blog posts
 * Date: 10/24/2017
 * Author: AD.,NB.,ET., MARKETING IN COLOR
 */

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

	<div class="page-wrapper">
		
		<!-- BREADCRUMBS -->
		<?php get_template_part( 'template-parts/section', 'breadcrumbs-social' ); ?>
		<!-- /BREADCRUMBS -->

		<!-- BUTTONS -->
		<div id="news-all-buttons" class="row">
			<div class="small-10 small-offset-1 large-2 large-offset-1 columns">
				<a href="#News"><button id="filter-news" class="news-filter"  title="News" news_filter="news">News</button></a>
			</div>
			<div class="small-10 small-offset-1 large-2 large-offset-0 columns">
				<a href="#Press-Releases"><button id="press" class="news-filter" title="Press Releases" news_filter="press-releases">Press Releases</button></a>
			</div>
			<div class="small-10 small-offset-1 large-2 large-offset-0 columns">
				<a href="#Events"><button id="events" class="news-filter" title="Events" news_filter="events">Events</button></a>
			</div>
			<div class="small-10 small-offset-1 large-2 large-offset-0 columns">
				<a href="#View-All"><button id="all" class="news-filter" title="" news_filter="all">View All</button></a>
			</div>

			<!-- DROPDOWN -->
			<div class="small-10 small-offset-1 large-2 large-offset-0 columns end" news_filter="Year Published">

				<!-- Dynamically Set Year in Dropdown -->
				<select id="newsFilterSelect" class="">
				<?php 
					$beginning_year = 2013;
					$current_year = date("Y");
					echo '<option value="">Year</option>';
					for ($current_year; $current_year >= $beginning_year; $current_year-- ){ ?>
						<center><option class="news-filter" value="<?php echo $current_year;?>" news_filter="<?php echo $current_year; ?>"><?php echo $current_year; ?></option></center>
				<?php	}
				?>
				</select>
				<!-- /Dynamically Set Year in Dropdown -->

			</div>
			<!-- DROPDOWN -->

			<!-- LOADING GRAPHICS -->
			<div class="spinner" style="display:none;">
				<div class="double-bounce1"></div>
				<div class="double-bounce2"></div>
			</div>
			<!-- /LOADING GRAPHICS -->

		</div>
		<!-- /BUTTONS -->

		<!-- POST CONTAINER. DONT DELETE. -->
		<div id="all-posts" class="post-container"></div>
		<!-- /POST CONTAINER. DONT DELETE. -->

		<!-- LOAD MORE BUTTON -->
		<div class="row text-center">
			<div class="small-10 small-offset-1 columns">
				<div class="load-more">
					<button class="" style="width: auto;">Load More</button>
				</div>
			</div>
		</div>
		<!-- /LOAD MORE BUTTON -->

	</div>

	<!-- MAGIC -->
	<input class="rca_query" type="hidden" value="">
	<input class="rca_offset" type="hidden" value="0">
	<input class="year_switch" type="hidden" value="">
	<input class="total_posts" type="hidden" value="">
	<!-- /MAGIC -->

	<!-- SETS DEFAULT TO VIEW ALL -->
	<script>
	$(document).ready(function() {
		defaultNewsFilter('<?php echo get_stylesheet_directory_uri(); ?>', ajaxFilterYear());
		
	});
	</script>
	<!-- /SETS DEFAULT TO VIEW ALL -->
	


<?php
get_template_part('template-parts/section', 'news');
get_footer();