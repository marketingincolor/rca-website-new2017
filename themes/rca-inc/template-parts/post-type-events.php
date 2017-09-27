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
			<p class="post-date"><?php the_date('M d,y'); ?></p>
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
		</div>
	</div>
	<!-- /Content -->

</div>
