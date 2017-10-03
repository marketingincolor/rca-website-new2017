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
	$references_title = get_field('references_title');
	$references_text  = get_field('references_text');
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
	<?php get_template_part('template-parts/mobile', 'download-share'); ?>
	<!-- /BUTTONS SMALLS -->

	<!-- BUTTON MEDIUM+-->
	<?php get_template_part('template-parts/desktop', 'download'); ?>
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
			<?php if($references_title): ?>
			<h3><?php echo $references_title; ?></h3>
			<?php endif; ?>
			<?php if($references_text): ?>
			<p><?php echo $references_text; ?></p>
			<?php endif; ?>

		</div>
	</div>
	<!-- /Content MEDIUM -->

	<!-- Content small -->
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
	<?php get_template_part('template-parts/mobile', 'download-share'); ?>
	<!-- /BUTTONS SMALLS -->

	<!-- BUTTON MEDIUM+-->
	<?php get_template_part('template-parts/desktop', 'download'); ?>
	<!-- /BUTTON MEDIUM+ -->


<!-- HIDDEN SHARE MENU -->
<div id="share-menu" style="display:none;">
	<div class="row close">
		<div class="small-offset-10 small-2 columns">
			<i class="fa fa-times fa-2x" aria-hidden="true"></i>
		</div>
	</div>
	<div class="row title">
		<div class="small-12 columns">
			<h1>Share This Page</h1>
		</div>
	</div>
	<div id="social-icons">
		<div class="row a2a_kit a2a_kit_size_32 a2a_default_style">
			<div class="small-offset-2 small-8 columns">
				<div class="small-4 columns text-center">
					<a class="a2a_button_facebook"><i class="fa fa-facebook-square fa-3x a2a_button_facebook" aria-hidden="true"></i></a>
				</div>
				<div class="small-4 columns text-center">
					<a class="a2a_button_linkedin"><i class="fa fa-linkedin-square fa-3x" aria-hidden="true"></i></a>
				</div>
				<div class="small-4 columns text-center">
					<a class="a2a_button_googleplusone"><i class="fa fa-google-plus-square fa-3x" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="small-offset-2 small-8 columns">
				<div class="small-6 columns text-center">
					<a class="a2a"><i class="fa fa-twitter-square fa-3x" aria-hidden="true"></i></a>	
				</div>
				<div class="small-6 columns text-center">
					<i class="fa fa-envelope fa-3x" aria-hidden="true"></i>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- /HIDDEN SHARE MENU -->

</div>
<!-- RELATED CONTENT SMALL -->
<?php get_template_part('template-parts/mobile', 'related-content'); ?>
<!-- /RELATED CONTENT SMALL -->

<!-- RELATED CONTENT LARGE -->
<?php get_template_part('template-parts/content', 'related-content'); ?>
<!-- /RELATED CONTENT LARGE -->
