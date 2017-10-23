<?php
/**
 * Template for Case Studies
 * 
 */
	$background_text  = get_field('background_text');
	$background_title = get_field('background_title');
	$solution_title   = get_field('solution_title');
	$solution_text    = get_field('solution_text');
	$result_title     = get_field('result_title');
	$result_text      = get_field('result_text');
	$featured_quote   = get_field('featured_quote');
?>
<div id="">

	<!-- Title -->
	<div class="row">
		<div class="small-10 small-offset-1 columns text-left">
			<h1><?php the_title(); ?></h1>
		</div>
	</div>
	<!-- /Title -->

	<!-- Button -->
	<div class="row">
		<div class="small-10 small-offset-1 columns">
			<button style="margin: 1rem 0rem 0rem; width: auto;" class="text-left"><i class="fa fa-download" aria-hidden="true"></i> Download</button>
		</div>
	</div>
	<!-- /Button -->

	<!-- Content -->
	<div id="expertise-content" class="row case-study-content">
		<div class="small-10 small-offset-1 columns">
			<h3><?php echo $background_title; ?></h3>
			<p><?php echo $background_text; ?></p>
			<h3><?php echo $solution_title; ?></h3>
			<p><?php echo $solution_text; ?></p>
			<div class="case-study-quote">
				<p><?php echo $featured_quote; ?></p>
			</div>
			<h3><?php echo $result_title; ?></h3>
			<p><?php echo $result_text; ?></p>
		</div>
	</div>
	<!-- /Content -->

	<!-- Button -->
	<div class="row">
		<div class="text-center">
			<button style="margin: 1rem 0rem 0rem; width: auto;"><i class="fa fa-download" aria-hidden="true"></i> Download</button>
		</div>
	</div>
	<!-- /Button -->

</div>
