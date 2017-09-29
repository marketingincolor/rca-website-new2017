<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RCA_Inc.
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div id="front-page-main-content" class="rca">

		<!-- TITLE -->
		<div class="row">
			<div class="small-10 small-offset-1 medium-8 medium-offset-2 columns text-center">
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->
			</div>
		</div>
		<!-- END TITLE -->

		<!-- CONTENT -->
		<div class="row">
			<div class="small-10 small-offset-1 columns  text-center">
				<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rca-inc' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->
		</div>
		<!-- END CONTENT -->
		
		<!-- SERVICES -->
		<div id="front-page-services" class="row text-center rca" data-equalizer>
				<?php 

				$img_array = array(
					get_field('medical_device_image'), 
					get_field('pharmaceutical_image'), 
					get_field('additional_services_image')
				);


				$title_array = array(
					get_field('medical_device_title'), 
					get_field('pharmaceutical_title'), 
					get_field('additional_services_title')
				);

				$content_array = array(
					get_field('medical_device_content'), 
					get_field('pharmaceutical_content'), 
					get_field('additional_services_content')
				);

				$button_array = array(
					get_field('medical_device_link'),
					get_field('pharmaceutical_link'),
					get_field('additional_services_link')
				);
				echo '<div class="small-10 small-offset-1 columns">';

				for($i=0;$i<3;$i++) {

					if( $i == 2 ){
						$additional_class = 'end';
					}

					else{
						$additional_class = '';
					}

					echo '<div id="individual-service" class="small-12 medium-4 ' . $additional_class . ' columns rca" data-equalizer-watch>';
					echo '<img src="' . $img_array[$i]['url'] . '" />';
					echo '<h2>' . $title_array[$i] . '</h2>';
					echo '<p>' . $content_array[$i] . '</p>';
					echo '<a href="'.home_url("/$button_array[$i]/").'"><button>Learn More</button></a>';
					echo '</div>';
				}
				echo '</div>';
				?>

		</div>
		<!-- /SERVICES -->

	</div>

	<!-- CTA -->
	<div id="sign-up-cta" class="rca"  style="background: url('<?php echo get_stylesheet_directory_uri() . '/images/blue-cta.jpg'; ?>'); background-size: cover; height: auto;">

		<!-- mobile cta -->
		<div class="row text-center hide-for-medium">
			<div class="small-10 small-offset-1 columns">
				<h3>Sign up for our Free Combination Products Webinar</h3><br />
				<button id="learn-more-btn">Sign Up Here</button>
			</div>
		</div>
		<!-- end mobile cta -->

		<!-- desktop cta -->
		<div class="row text-center medium-text-left show-for-medium" data-equalizer>
			<div class="medium-6 medium-offset-2 columns" data-equalizer-watch>
				<h3>Sign up for our Free Combination Products Webinar</h3><br />
			</div>
			<div class="medium-2 columns end relative" data-equalizer-watch>
				<button id="learn-more-btn">Sign Up Here</button>
			</div>
		</div>
		<!-- end desktop cta -->

	</div>
	<!-- END CTA -->
	
		<div id="all-case-studies" class="rca">
			<!-- CASE STUDIES FIRST LOOP-->
			<div id="" class="row rca" style="padding-bottom: 0em;">
				<div class="small-10 small-offset-1 medium-8 medium-offset-2 columns rca">
					<h1 class="text-center">Case Studies</h1>
					<?php

					   $args = array(
					      'post_type' => 'case_studies',
					      'posts_per_page' => 1,
					   );

						$case_studies = new WP_Query($args);
						if($case_studies ->have_posts()) : 

							while($case_studies ->have_posts()) : $case_studies->the_post();

								echo '<div class="individual-case-study rca">';
									echo '<h3 class="text-left"><a href="' . get_the_permalink() .'">' . get_the_title() . '</a></h3>';
									echo '<p class="text-left">' . wp_trim_words( get_the_content(), 40, '...</br><a href="'. get_post_permalink() .'" title="Read More" class="read-more">Read More</a>' ) . '</p>';
								echo '</div>';
							endwhile;

						endif;

						?>

						<?php wp_reset_postdata();
					?>
				</div>
			</div>
			<!-- /CASE STUDIES FIRST LOOP -->

			<!-- CASE STUDIES SECOND LOOP -->
			<div class="row rca" data-equalizer>
				<div class="small-10 small-offset-1 medium-8 medium-offset-2 columns rca">
					<div class="row">
					
							<?php

							   	$args = array(
									'post_type' => 'case_studies',
									'posts_per_page' => 2,
									'offset' => 1,
									  'tax_query' => array(
									)
							   	);

								$case_studies = new WP_Query($args);
								if($case_studies ->have_posts()) : 

									while($case_studies ->have_posts()) : $case_studies->the_post();
								?>

										<div class="small-12 medium-6 columns" data-equalizer-watch>
								<?php
										echo '<div class="individual-case-study rca">';
											echo '<h3 class="text-left"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h3>';
											echo '<p class="text-left">' . wp_trim_words( get_the_content(), 20, '...</br><a href="' . get_post_permalink() . '" title="Read More" class="read-more">Read More</a>' ) . '</p>';
										echo '</div>';
										echo '</div>';
									endwhile;

								endif;

								?>

								<?php wp_reset_postdata();
							?>
						</div>
					</div>
				</div>
				<!-- CASE STUDIES SECOND LOOP -->
				<div id="case-study-btn" class="row">
					<div class="small-10 small-offset-1 columns">
						<a href="<?php echo get_permalink( get_page_by_path( 'case-studies')); ?>"><button class="home-cs-orange-btn">View All Case Studies</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
		
	<!-- END CASE STUDIES -->

	<!-- LEARN MORE -->
	<?php get_template_part('template-parts/section', 'learn-more-form-container-blue'); ?>
	<!-- /LEARN MORE -->

	<!-- NEWS -->
	<?php get_template_part('template-parts/section', 'news'); ?>
	<!-- /NEWS -->

	</div>
	<!-- /NEWS -->

	<!-- EDIT -->
	<?php #get_template_part('template-parts/section', 'edit'); ?>
	<!-- /EDIT -->

</article><!-- #post-<?php the_ID(); ?> -->
