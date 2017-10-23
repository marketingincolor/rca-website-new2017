<?php 
/**
 * Template for White Paper Items
 * 
 */
$pdf              = get_field('white_paper_pdf');
$references_title = get_field('references_title');
$references_text  = get_field('references_text');
?>
<?php get_template_part('template-parts/section', 'breadcrumbs-social'); ?>
<div id="all-expertise-content">

	<!-- Title -->
	<div class="row">
		<div class="small-10 small-offset-1 columns text-left">
			<h1><?php the_title(); ?></h1>

			<?php if (get_field('subheading')) { ?>
				<h2 class="subheading"><?php the_field('subheading') ?></h2>
			<?php } ?>

		</div>
	</div>
	<!-- /Title -->

	<!-- Author Info -->
	<?php if (get_field('author_info')) { ?>

	<div class="row">
		<div class="small-10 small-offset-1 columns text-left">
			<aside style="color:#9d938b"><?php the_field('author_info'); ?></aside>
		</div>
	</div>

	<?php } ?>
	<!-- /Author Info -->

	<!-- Button -->
	<div class="row">
		<div class="small-10 small-offset-1 columns">
			<a href="<?php echo $pdf; ?>" title="Download White Paper" target="_blank"><button style="margin: 1rem 0rem 0rem; width: auto;" class="text-left"><i class="fa fa-download" aria-hidden="true"></i> Download</button></a>
		</div>
	</div>
	<!-- /Button -->

	<!-- Content -->
	<div id="expertise-content" class="row">
		<div class="small-10 small-offset-1 columns" >
			<?php the_content(); ?>
			
			<!-- REFERENCES SECTION -->
			<?php if($references_title && $references_text): ?>
			<div class="references-section">
				<p><strong><?php echo $references_title; ?></strong></p>
				<p><?php echo $references_text; ?></p>
			</div>
			<?php endif; ?>
			<!-- /REFERENCES SECTION -->

		</div>
	</div>
	<!-- /Content -->
	<!-- Button -->
	<div class="row">
		<div class="text-center">
			<a href="<?php echo $pdf; ?>" title="Download White Paper" target="_blank"><button style="margin: 0rem 0rem 4.5rem; width: auto;"><i class="fa fa-download" aria-hidden="true"></i> Download</button></a>
		</div>
	</div>
	<!-- /Button -->



</div>