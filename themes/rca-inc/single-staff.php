<?php
/* Template Name: Individual Staff Page */

/**
 * Purpose: For displaying staff member pages.
 * Date: 10/24/2017
 * Author: AD.,NB.,ET., MARKETING IN COLOR
 */

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
					$staff_id = get_field('staff_id');
					$staff_data = get_userdata($staff_id);
					$staff_meta = get_user_meta($staff_id);
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
	        					<h1 style="display:inline-block;"><?php echo the_title(); ?></h1><br />
	        					<h2 style="display:inline-block;"><?php echo $position; ?></h2><br />
		    					<?php if($email): ?>
		    						<div id="individual-email" class="text-left medium-text-center"><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto: <?php echo $email; ?>"> <?php echo $email; ?></a></div>
		    					<?php endif; ?>
		        				<?php the_content(); ?>
        					</div>
        			<?php endif; endwhile; ?>
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
							<?php echo do_shortcode('[rca-staff-articles category="" post_id="'.get_the_id() .'" navigation="true" navigationText="&#xf104;, &#xf105;" items=3 autoPlay="true" itemsDesktop="false" itemsDesktopSmall="false" itemsTablet="768,2"]'); ?>

						</div>
					</div>
				</div>

			<?php endif; ?>
			<!-- /PUBLISHED ARTICLES SECTION -->
			
		</main>

		<!-- LEARN MORE -->
		<div class="row-expanded">
			<?php get_template_part('template-parts/section', 'learn-more-form-container-blue'); ?>
		</div>
		<!-- END LEARN MORE -->
		
	</div><!-- #primary -->

<?php
get_template_part('template-parts/section', 'news');
get_footer();
