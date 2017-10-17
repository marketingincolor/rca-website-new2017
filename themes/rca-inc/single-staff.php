<?php
/* Template Name: Individual Staff Page */
$articles = get_field('published_articles_relationship', get_the_ID());
$options = get_option('rca_theme_options');

get_header(); ?>
	
	<?php get_template_part( 'template-parts/section', 'breadcrumbs-social' ); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		
			<div id="the-content" class="row">
				<div class="small-10 small-offset-1 columns">
					
					<?php
					while ( have_posts() ) : the_post();
					
					$articles = get_field('published_articles_relationship');
					//var_dump($articles);
					$staff_id = get_field('staff_id');
					$staff_data = get_userdata($staff_id);
					$staff_meta = get_user_meta($staff_id);
					$first_name = $staff_meta["first_name"];
					$last_name = $staff_meta["last_name"];
					$email = get_field('email');
					$position = get_field('position', $staff_data);



        			if( has_post_thumbnail()): ?>
        					<div id="individual-staff-wrapper" class="">
        					<img src="<?php echo the_post_thumbnail_url(); ?>" align="left"/>
        					<h1 style="display:inline-block;"><?php echo the_title(); ?></h1><br />
        					<h2 style="display:inline;"><?php echo $position; ?></h2><br />
        					<?php if($email): ?>
        						<div id="individual-email" class="text-left medium-text-center"><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto: <?php echo $email; ?>"> <?php echo $email; ?></a></div>
        					<?php endif; ?>
        						
	        				<?php the_content(); ?>
        					</div>
        			<?php else: ?>
        					<div id="individual-staff-wrapper" class="">
	        					<h1 style="display:inline-block;"><?php echo $full_name; ?></h1><br />
	        					<h2 style="display:inline-block;"><?php echo $position; ?></h2><br />
	        					<div id="individual-email" class="text-left medium-text-center"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $email; ?></div>
	        						
		        				<?php the_content(); ?>
        					</div>
        			<?php endif; ?>
						<?php
						// If comments are open or we have at least one comment, load up the comment template.

					endwhile; // End of the loop.
					?>

				</div>



			</div>

			<!-- PUBLISHED ARTICLES SECTION -->
			<?php 

				// IF WE HAVE LESS THAN 3 ARTICLES TO SHOW DON'T SHOW ANY.
			    $articles = get_field('published_articles_relationship', get_the_ID());
			    if( count($articles) >= 3 ) :


			?>

				<div id="pa-section" class="">
					<div class="row">
						<div class="small-10 small-offset-1 columns text-center">
							<h3><?php echo $options['bio_page_slider_title']; ?></h3>
							<?php echo do_shortcode('[rca-staff-articles category="" post_id="'.get_the_id() .'" navigation="true" navigationText="&#xf104;, &#xf105;" items=3 autoPlay="true" itemsDesktop="false" itemsDesktopSmall="false" itemsTablet="false"]'); ?>

						</div>
					</div>
				</div>
			<?php endif; ?>
			<!-- /PUBLISHED ARTICLES SECTION -->
			
		</main><!-- #main -->

		<!-- LEARN MORE -->
		<div class="row-expanded">
			<?php get_template_part('template-parts/section', 'learn-more-form-container-blue'); ?>
		</div>
		<!-- END LEARN MORE -->
		
	</div><!-- #primary -->

<?php
//get_template_part('template-parts/section', 'learn-more' );
get_template_part('template-parts/section', 'news');
get_footer();
