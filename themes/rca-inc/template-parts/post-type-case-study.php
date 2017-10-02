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
	$challenge_title  = get_field('challenge_title');
	$challenge_text   = get_field('challenge_text');
	$approach_title   = get_field('approach_title');
	$approach_text    = get_field('approach_text');
	$challnege_title  = get_field('challnege_title');
	$challnege_text   = get_field('challnege_text');
	$pdf              = get_field('case_study_file');
?>
<?php get_template_part('template-parts/section', 'breadcrumbs-social'); ?>

<div id="all-case-study-content">

	<!-- Title -->
	<div class="row">
		<div class="small-10 small-offset-1 columns text-left">
			<h1><?php the_title(); ?></h1>
		</div>
	</div>
	<!-- /Title -->

	<!-- BUTTONS SMALL -->
	<div class="row">
		<div class="small-12 columns">

			<div class="row">
				<?php if($pdf): ?>
				<a href="<?php echo $pdf; ?>" title="Download">
					<div id="dl-block" class="small-6 columns text-center hide-for-medium">
						<p>Download <i class="fa fa-download" aria-hidden="true"></i></p>
					</div>
				</a>
			<?php endif; ?>
				<div id="share-block-cs" class="small-6 columns text-center hide-for-medium">
					<p>Share <i class="fa fa-share" aria-hidden="true"></i></p>
				</div>
			</div>
		</div>

	</div>

	<!-- /BUTTONS SMALLS -->

	<!-- BUTTON MEDIUM+-->
	<div class="row show-for-medium">
		<div class="small-10 small-offset-1 columns">
			<a href="<?php echo $pdf ?>" title="Download"><button style="margin: 1rem 0rem 0rem; width: auto;" class="text-left"><i class="fa fa-download" aria-hidden="true"></i> Download</button></a>
		</div>
	</div>
	<!-- /BUTTON MEDIUM+ -->


	<!-- Content MEDIUM -->
	<div id="expertise-content" class="row case-study-content show-for-medium">
		<div class="small-10 small-offset-1 columns">
			<?php if($background_title): ?>
			<h3><?php echo $background_title; ?></h3>
			<?php endif; ?>
			<?php if($background_text): ?>
			<p><?php echo $background_text; ?></p>
			<?php endif; ?>

			<!-- IF CHALLENGE APPROACH TYPE -->
			<?php if($approach_title): ?>
			<h3><?php echo $approach_title ?></h3>
			<?php endif; ?>

			<?php if($approach_text): ?>
			<p><?php echo $approach_text ?></p>
			<?php endif; ?>

			<?php if($challenge_title): ?>
			<h3><?php echo $challenge_title ?></h3>
			<?php endif; ?>

			<?php if($challenge_text): ?>
			<p><?php echo $challenge_text ?></p>
			<?php endif; ?>

			<!-- /IF CHALLENGE APPREACH TYPE -->

			<?php if($solution_title): ?>
			<h3><?php echo $solution_title; ?></h3>
			<?php endif; ?>
			<?php if($solution_text): ?>
			<p><?php echo $solution_text; ?></p>
			<?php endif; ?>
			<?php if($featured_quote): ?>
			<div class="case-study-quote show-for-medium small-4 columns">
				<p><?php echo $featured_quote; ?></p>
			</div>
			<?php endif; ?>
			<?php if($result_title): ?>
			<h3><?php echo $result_title; ?></h3>
			<?php endif; ?>
			<?php if($result_text): ?>
			<p><?php echo $result_text; ?></p>
			<?php endif; ?>

		</div>
	</div>
	<!-- /Content MEDIUM -->

	<!-- Content MEDIUM -->
	<div id="expertise-content" class="row case-study-content hide-for-medium">

		<div class="small-10 small-offset-1 columns">
			<?php if($background_title): ?>
			<h3><?php echo $background_title; ?></h3>
			<?php endif; ?>
			<?php if($background_text): ?>
			<p><?php echo $background_text; ?></p>
			<?php endif; ?>
			<?php if($solution_title): ?>
			<h3><?php echo $solution_title; ?></h3>
			<?php endif; ?>
			<?php if($solution_text): ?>
			<p><?php echo $solution_text; ?></p>
			<?php endif; ?>
		</div>
	</div>

		<?php if($featured_quote): ?>
		<!-- Featured Quote Mobile -->
		<div class="row expanded case-study-quote-mobile hide-for-medium text-center">
			<p><?php echo $featured_quote; ?></p>
		</div>
		<?php endif; ?>
		<!-- /Featured Quote Mobile -->

	<div id="expertise-content" class="row case-study-content hide-for-medium">
		<div class="small-10 small-offset-1 colums">
			<?php if($result_title): ?>
			<h3><?php echo $result_title; ?></h3>
			<?php endif; ?>
			<?php if($result_text): ?>
			<p><?php echo $result_text; ?></p>
			<?php endif; ?>

		</div>
	</div>
	<!-- /Content MEDIUM -->

	<!-- BUTTONS SMALL -->
	<div class="row hide-for-medium">
		<div class="small-12 columns">
			<div class="row">
				<a href="<?php echo $pdf['url']; ?>" title="Download">
				<div id="dl-block" class="small-6 columns text-center hide-for-medium">
					<p>Download <i class="fa fa-download" aria-hidden="true"></i></p>
				</div></a>
				<div id="share-block-cs" class="small-6 columns text-center hide-for-medium">
					<p>Share <i class="fa fa-share" aria-hidden="true"></i></p>
				</div>
			</div>
		</div>

	</div>
	<!-- /BUTTONS SMALL -->

	<!-- BUTTON MEDIUM+-->
	<div class="row show-for-medium">
		<div class="text-center">
			<button style="margin: 1rem 0rem 5%; width: auto;"><i class="fa fa-download" aria-hidden="true"></i> Download</button>
		</div>
	</div>
	<!-- /BUTTON MEDIUM+-->



</div>
<!-- RELATED CONTENT SMALL -->
<div id="related-content-mobile" class="row expanded text-center">
	<div class="small-12 columns">
		<h3>Related Articles</h3>
		<?php echo do_shortcode('[rca-related-case-studies-mobile category="" items=1 autoPlay="false" itemsDesktop="false" itemsDesktopSmall="false" itemsTablet="false"]'); ?>
	</div>
</div>
<!-- /RELATED CONTENT SMALL -->

<!-- RELATED CONTENT LARGE -->
<?php get_template_part('template-parts/content', 'related-content'); ?>
<!-- /RELATED CONTENT LARGE -->
