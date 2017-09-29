<?php
/* Template Name: Individual Staff Page */


get_header(); ?>
	
	<?php get_template_part( 'template-parts/section', 'breadcrumbs-social' ); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		
			<div id="the-content" class="row">
				<div class="small-10 small-offset-1 columns">
					
					<?php
					while ( have_posts() ) : the_post();
					

					$staff_id = get_field('staff_id');
					$staff_data = get_userdata($staff_id);
					$staff_meta = get_user_meta($staff_id);
					$first_name = $staff_meta["first_name"];
					$last_name = $staff_meta["last_name"];
					$full_name = $first_name[0] . ' ' . $last_name[0];
					$email = $staff_data->user_email;
					$position = get_field('position', $staff_data);

					//$position = $staff_meta->position;
					// echo $full_name;
					// echo $email;
					// echo $position;


        			if( has_post_thumbnail()): ?>
        					<div id="individual-staff-wrapper" class="">
        					<img src="<?php echo the_post_thumbnail_url(); ?>" align="left"/>
        					<h1 style="display:inline-block;"><?php echo $full_name; ?></h1><br />
        					<h2 style="display:inline-block;"><?php echo $position; ?></h2><br />
        					<div id="individual-email" class="text-left medium-text-center"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $email; ?></div>
        						
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
