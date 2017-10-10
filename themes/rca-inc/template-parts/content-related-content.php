<?php

$post_type = get_post_type();
//var_dump($post_type);

// BUILD QUERIES
if($post_type == 'case_studies'):
	$query1 = new WP_Query(get_random_case_study());
	$query2 = new WP_Query(get_random_case_study());
	$query3 = new WP_Query(get_random_case_study());
	$icon   = get_stylesheet_directory_uri() . '/images/icons/orange-case-study-icon.jpg';

elseif($post_type == 'webinars'):
	$query1 = new WP_Query(get_random_webinar());
	$query2 = new WP_Query(get_random_webinar());
	$query3 = new WP_Query(get_random_webinar());
	$icon   = get_stylesheet_directory_uri() . '/images/icons/orange-webinar-icon.jpg';

elseif($post_type == 'white_papers'):
	$query1 = new WP_Query(get_random_whitepaper());
	$query2 = new WP_Query(get_random_whitepaper());
	$query3 = new WP_Query(get_random_whitepaper());
	$icon   = get_stylesheet_directory_uri() . '/images/icons/orange-white-paper-icon.jpg';

elseif($post_type == 'visual_resources'):
	$query1 = new WP_Query(get_random_visualresource());
	$query2 = new WP_Query(get_random_visualresource());
	$query3 = new WP_Query(get_random_visualresource());
	$icon   = get_stylesheet_directory_uri() . '/images/icons/orange-visual-resources-icon.jpg';

elseif($post_type == 'published_articles'):
	$query1 = new WP_Query(get_random_publishedarticle());
	$query2 = new WP_Query(get_random_publishedarticle());
	$query3 = new WP_Query(get_random_publishedarticle());
	$icon   = get_stylesheet_directory_uri() . '/images/icons/orange-published-articles-icon.jpg';	

elseif($post_type == 'page'):
	$query1 = new WP_Query(get_random_case_study());
	$query2 = new WP_Query(get_random_webinar());
	$query3 = new WP_Query(get_random_visualresource());
	$icon   = get_stylesheet_directory_uri() . '/images/icons/orange-case-study-icon.jpg';

endif;

?>	
	<div id="related-content-block-outer" class="row show-for-large">
		<div class="row">
			<div class="small-12 columns text-center">
				<h4>Related Content</h4>
			</div>
		</div>
		<div class="row" data-equalizer>
			<div id="related-content-block" class="small-10 small-offset-1 columns">
				
				<div class="small-12 medium-4 columns random-item" data-equalizer-watch>
				<?php
					if ( $query1->have_posts() ) : while ( $query1->have_posts() ) : $query1->the_post(); 
						echo '<img src="' . $icon . '">';
						$title  = the_title('','',false);
						 echo '<p>' . trim(substr($title, 0, 65)).'...' . '<a href="' . get_the_permalink() . '">Read More</a></p>';
						endwhile; 
					endif;
				?>
				</div>
				
				<div class="small-12 medium-4 columns random-item" data-equalizer-watch>
				<?php
					if ( $query2->have_posts() ) : while ( $query2->have_posts() ) : $query2->the_post(); 
						echo '<img src="' . $icon . '">';						
						$title  = the_title('','',false);
						echo '<p>' . trim(substr($title, 0, 65)).'...' . '<a href="' . get_the_permalink() . '">Read More</a></p>';
						endwhile; 
					endif;	
				?>
				</div>
				
				<div class="small-12 medium-4 columns random-item" data-equalizer-watch>
				<?php

					if ( $query3->have_posts() ) : while ( $query3->have_posts() ) : $query3->the_post();
						echo '<img src="' . $icon . '">';
						$title  = the_title('','',false);
						echo '<p>' . trim(substr($title, 0, 65)).'...' . '<a href="' . get_the_permalink() . '">Read More</a></p>';
						endwhile; 
					endif;
				?>	
				</div>

			</div>
		</div>
	</div>