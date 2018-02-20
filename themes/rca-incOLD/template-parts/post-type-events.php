<?php
/**
 * Template for Events
 * 
 */
?>
<div id="all-expertise-content" class="event-post">

	<!-- Title -->
	<div class="row">
		<div class="small-10 small-offset-1 columns text-left">
			<h1><?php the_title(); ?></h1>
			<p class="post-date"><?php echo get_the_date(); ?></p>
		</div>
	</div>
	<!-- /Title -->

	<!-- Event Data -->
	<?php get_template_part( 'template-parts/content', 'event-data' ); ?>
	<!-- /Event Data -->

	<!-- Content -->
	<div id="expertise-content" class="row">
		<div class="small-10 small-offset-1 columns">
			<p><?php the_content(); ?></p>

			<?php if (get_field('bottom_button_link') && get_field('bottom_button_text')) { ?>

				<p style="margin-top:30px"><a href="<?php if(!get_field('external_link')){echo site_url();} ?><?php the_field('bottom_button_link'); ?>" <?php if(get_field('external_link')){echo 'target="_blank"';} ?>><button class="orange-btn width-auto"><?php the_field('bottom_button_text'); ?></button></a></p>

			<?php } ?>
			
		</div>
	</div>
	<!-- /Content -->

</div>
