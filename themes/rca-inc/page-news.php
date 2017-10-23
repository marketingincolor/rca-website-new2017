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

	<div class="page-wrapper">
		
		<?php

		get_template_part( 'template-parts/section', 'breadcrumbs-social' ); ?>

		<!-- Buttons -->
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

			<!-- Loading Graphics -->
			<div class="spinner" style="display:none;">
				<div class="double-bounce1"></div>
				<div class="double-bounce2"></div>
			</div>
			<!-- /Loading Graphics -->

		</div>



		<div id="all-posts" class="post-container">
					
		</div>

		<!-- Buttons -->
		<div class="row text-center">
			<div class="small-10 small-offset-1 columns">
				<div class="load-more">
					<button class="" style="width: auto;">Load More</button>
				</div>
			</div>
		</div>
		<!-- /Buttons -->

	</div>
	<!-- Hidden Inputs -->
	<input class="rca_query" type="hidden" value="">
	<input class="rca_offset" type="hidden" value="0">
	<input class="year_switch" type="hidden" value="">
	<input class="total_posts" type="hidden" value="">
	<!-- /Hidden Inputs -->

	<script>
	$(document).ready(function() {
		//category = $('.rca_query').val();
		
		defaultNewsFilter('<?php echo get_stylesheet_directory_uri(); ?>', ajaxFilterYear());
		
	});
	</script>
	


<?php
//get_sidebar();
get_template_part('template-parts/section', 'news');
get_footer();