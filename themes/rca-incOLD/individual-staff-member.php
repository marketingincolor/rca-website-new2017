<?php

/**
 *  STATUS: NOT IN USE
 *  DATE: 10/24/2017
 * 	REASON: WHEN THE THEME WAS ORIGINALLY BUILT IT USED WP USERS TO BUILD STAFF PAGES.
 * 	THIS HAS BEEN CHANGED TO USE THE STAFF CPT. THIS HAS BEEN LEFT IN THE THEME FOR ARCHIVE PURPOSES.
 */

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

        			if( has_post_thumbnail()): ?>
    					<div id="individual-staff-wrapper" class="">
    					<img src="<?php echo the_post_thumbnail_url(); ?>" align="left"/>
    					<h1 style="display:inline-block;"><?php echo $full_name; ?></h1><br />
    					<h2 style="display:inline;"><?php echo $position; ?></h2><br />
    					<div id="individual-email" class="text-left medium-text-center"><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto: <?php echo $email; ?>"> <?php echo $email; ?></a></div>
    						
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
					<?php endwhile; ?>

				</div>
			</div>
		</main>

		<!-- LEARN MORE -->
		<div class="row-expanded">
			<?php get_template_part('template-parts/section', 'learn-more-form-container-blue'); ?>
		</div>
		<!-- END LEARN MORE -->
		
	</div>
<?php
get_template_part('template-parts/section', 'news');
get_footer();
