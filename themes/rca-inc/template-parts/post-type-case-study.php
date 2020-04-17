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
	$references_title = get_field('references_title');
	$references_text  = get_field('references_text');
	//$ssLink           = get_field('sharpspring_redirect_url');
?>

<?php get_template_part('template-parts/section', 'breadcrumbs-social'); ?>

<div id="all-expertise-content">

	<!-- Title -->
	<div class="row">
		<div class="small-10 small-offset-1 columns text-left">
			<h1 class="case-study-title"><?php the_title(); ?></h1>
		</div>
	</div>
	<!-- /Title -->

	<!-- BUTTONS SMALL -->
	<?php get_template_part('template-parts/mobile', 'download-share'); ?>
	<!-- /BUTTONS SMALLS -->

	<!-- BUTTON MEDIUM+-->
	<?php if($pdf): ?>
	<div class="row show-for-medium">
		<div class="small-10 small-offset-1 columns">
			<a href="<?php echo $pdf ?>" title="Download" target="_blank"><button style="margin: 1rem 0rem 0rem; width: auto;" class="text-left"><i class="fa fa-download" aria-hidden="true"></i> Download</button></a>
		</div>
	</div>
	<?php endif; ?>
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
			<?php if($challenge_title): ?>
			<h3><?php echo $challenge_title ?></h3>
			<?php endif; ?>

			<?php if($challenge_text): ?>
			<p><?php echo $challenge_text ?></p>
			<?php endif; ?>
			
			<?php if($approach_title): ?>
			<h3><?php echo $approach_title ?></h3>
			<?php endif; ?>

			<?php if($approach_text): ?>
			<p><?php echo $approach_text ?></p>
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
			<?php the_content(); ?>
			<?php if($references_title && $references_text): ?>
			<div class="references-section">
				<p><strong><?php echo $references_title; ?></strong></p>
				<p><?php echo $references_text; ?></p>
			</div>
			<?php endif; ?>
		</div>
	</div>
	<!-- /Content MEDIUM -->

	<!-- Content small -->
	<div id="" class="row case-study-content hide-for-medium">

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

		<?php if($featured_quote): ?>
		<!-- Featured Quote Mobile -->
			<p><?php echo $featured_quote; ?></p>
		</div>
		<?php endif; ?>
		<!-- /Featured Quote Mobile -->

			<?php if($result_title): ?>
			<h3><?php echo $result_title; ?></h3>
			<?php endif; ?>
			<?php if($result_text): ?>
			<p><?php echo $result_text; ?></p>
			<?php endif; ?>
			<?php the_content(); ?>

		</div>
	</div>
	<!-- /Content MEDIUM -->



</div> <!-- /all case study content -->

<!-- BUTTONS SMALL -->
<?php get_template_part('template-parts/mobile', 'download-share'); ?>
<!-- /BUTTONS SMALLS -->

<!-- BUTTON MEDIUM+-->
<?php if($pdf): ?>
<div class="row show-for-medium">
	<div class="small-10 small-offset-1 columns">
		<a href="<?php echo $pdf ?>" title="Download" target="_blank"><button style="margin: 0rem auto 3rem auto; width: auto; display: block;" class=""><i class="fa fa-download" aria-hidden="true"></i> Download</button></a>
	</div>
</div>
<?php endif; ?>
<!-- /BUTTON MEDIUM UP -->

<!-- HIDDEN SHARE MENU -->
<?php get_template_part('template-parts/hidden', 'share-menu'); ?>
<!-- /HIDDEN SHARE MENU -->

<!-- RELATED CONTENT SMALL -->
<?php get_template_part('template-parts/mobile', 'related-content'); ?>
<!-- /RELATED CONTENT SMALL -->

<!-- RELATED CONTENT LARGE -->
<?php get_template_part('template-parts/content', 'related-content'); ?>
<!-- /RELATED CONTENT LARGE -->
