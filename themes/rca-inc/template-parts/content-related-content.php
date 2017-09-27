<?php
?>	
	<div id="related-content-block-outer" class="row show-for-large">
		<div class="row">
			<div class="small-12 columns text-center">
				<h4>Related Content</h4>
			</div>
		</div>
		<div class="row" data-equalizer>
			<div id="related-content-block" class="small-10 small-offset-1 columns">
				

			<?php
				//Get Random case study
				$r_case_study_args = array(
					'post_type'   => 'items',
					'posts_per_page' => 1,
					'orderby' => 'rand',
					'tax_query'   => array(
						array(
							'taxonomy' => 'expertise',
							'field'    => 'slug',
							'terms'    => rca_get_random_term(),
						),
					),
				);

				//Get Random webinar
				$r_webinar_args = array(
					'post_type'   => 'items',
					'posts_per_page' => 1,
					'orderby' => 'rand',
					'tax_query'   => array(
						array(
							'taxonomy' => 'expertise',
							'field'    => 'slug',
							'terms'    => rca_get_random_term(),
						),
					),
				);

				//Get Random white paper
				$r_whitepaper_args = array(
					'post_type'   => 'items',
					'posts_per_page' => 1,
					'orderby' => 'rand',
					'tax_query'   => array(
						array(
							'taxonomy' => 'expertise',
							'field'    => 'slug',
							'terms'    => rca_get_random_term(),
						),
					),
				);
				
				$r_case_study = new WP_Query($r_case_study_args);

				?>
				<div class="small-12 medium-4 columns random-item" data-equalizer-watch>
				<?php
					if ( $r_case_study->have_posts() ) : while ( $r_case_study->have_posts() ) : $r_case_study->the_post(); 
						//echo '<img src="' . get_stylesheet_directory_uri() . '/images/icons/orange-case-study-icon.jpg' . '" />';
						$terms = get_the_terms($post->ID, 'expertise');
						$term_id = $terms[0]->term_taxonomy_id;

						echo '<img src="' . get_related_img('expertise', $term_id ) . '">';
						$title  = the_title('','',false);
						 echo '<p>' . trim(substr($title, 0, 65)).'...' . '<a href="' . get_the_permalink() . '">Read More</a></p>';
						endwhile; 
					endif;
				?>
				</div>
				
				<div class="small-12 medium-4 columns random-item" data-equalizer-watch>
				<?php
					$r_webinar = new WP_Query($r_webinar_args);

					if ( $r_webinar->have_posts() ) : while ( $r_webinar->have_posts() ) : $r_webinar->the_post(); 
						$terms = get_the_terms($post->ID, 'expertise');
						$term_id = $terms[0]->term_taxonomy_id;

						echo '<img src="' . get_related_img('expertise', $term_id ) . '">';						

						$title  = the_title('','',false);
						echo '<p>' . trim(substr($title, 0, 65)).'...' . '<a href="' . get_the_permalink() . '">Read More</a></p>';
						endwhile; 
					endif;	
				?>
				</div>
				
				<div class="small-12 medium-4 columns random-item" data-equalizer-watch>
				<?php
					$r_whitepaper = new WP_Query($r_whitepaper_args);

					if ( $r_whitepaper->have_posts() ) : while ( $r_whitepaper->have_posts() ) : $r_whitepaper->the_post();
						$terms = get_the_terms($post->ID, 'expertise');
						$term_id = $terms[0]->term_taxonomy_id;

						echo '<img src="' . get_related_img('expertise', $term_id ) . '">';

						$title  = the_title('','',false);
						echo '<p>' . trim(substr($title, 0, 65)).'...' . '<a href="' . get_the_permalink() . '">Read More</a></p>';
						endwhile; 
					endif;
				?>	
				</div>

			</div>
		</div>
	</div>