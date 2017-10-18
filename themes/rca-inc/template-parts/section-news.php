<?php
/* Template: News Include */
?>

		<!-- NEWS SMALL -->
		<div id="news-container" class="hide-for-medium">
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
								'posts_per_page' => 1

							);

							$news_query = new WP_Query($args);

							if ( $news_query->have_posts() ) { 
								while ( $news_query->have_posts() ) {
									$news_query->the_post();
									echo '<div class="small-12 medium-6 large-4 columns" data-equalizer-watch>';
									#the_title();
									echo wp_trim_words(get_the_title(), $num_words = 15, '');
									echo '...<br/><a href="'. get_permalink() .'">Read More</a>';
									echo '</div>';
								}
							}

						?>

				</div>
			</div>		
		</div>
		<!-- /NEWS SMALL -->

		<!-- NEWS MEDIUM-->
		<div id="news-container" class="show-for-medium hide-for-large">
			<div style="background: url('<?php echo get_stylesheet_directory_uri() . '/images/news-section.jpg';?>'); background-size: cover; height: auto; padding: 2.5rem 0rem;">
				
				<div class="row">
					<div class="small-12 columns text-center" style="color: white;">
						<h3>News</h3>
					</div>
				</div>

				<div id="news-snippets-wrapper" class="row text-center" data-equalizer>
						
						<?php
							wp_reset_postdata();
							$category_id = get_cat_ID('news');

							$args = array(
								'post_type' => 'post',
								'cat' => $category_id,
								// 'orderby' => 'date',
								// 'order' => 'ASC',
								'posts_per_page' => 2

							);

							$news_query = new WP_Query($args);

							if ( $news_query->have_posts() ) { 
								while ( $news_query->have_posts() ) {
									$news_query->the_post();
									echo '<div class="small-12 medium-6 large-4 columns" data-equalizer-watch>';
									#the_title();
									echo wp_trim_words(get_the_title(), $num_words = 15, '');
									echo '...<br/><a href="'. get_permalink() .'">Read More</a>';
									echo '</div>';
								}
							}
						?>
				</div>
			</div>		
		</div>
		<!-- /NEWS MEDIUM -->

		<!-- NEWS LARGE -->
		<div id="news-container" class="show-for-large">
			<div style="background: url('<?php echo get_stylesheet_directory_uri() . '/images/news-section.jpg';?>'); background-size: cover; height: auto; padding: 2.5rem 0rem;">
				
				<div class="row">
					<div class="small-12 columns text-center" style="color: white;">
						<h3>News</h3>
					</div>
				</div>
				
				<div id="news-snippets-wrapper" class="row text-center" data-equalizer>
						
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
									echo '<div class="small-12 medium-6 large-4 columns" data-equalizer-watch>';
									#the_title();
									echo wp_trim_words(get_the_title(), $num_words = 15, '');
									echo '...<br/><a href="'. get_permalink() .'">Read More</a>';
									echo '</div>';
								}
							}

						?>

				</div>
			</div>		
		</div>
		<!-- /NEWS LARGE -->