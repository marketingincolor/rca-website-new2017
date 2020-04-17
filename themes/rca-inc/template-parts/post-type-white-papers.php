<?php 
/**
 * Template for White Paper Items
 * 
 */
$pdf              = get_field('white_paper_pdf');
$references_title = get_field('references_title');
$references_text  = get_field('references_text');
//$ssLink = get_field('sharpspring_redirect_url');

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

	<!-- Share/Download Bar -->
	<?php get_template_part('template-parts/mobile', 'download-share'); ?>
	<!-- /share/download -->

	<!-- Button -->
	<div class="row">
		<div class="small-10 small-offset-1 columns show-for-medium">
			<a href="<?php echo $pdf; ?>" title="Download White Paper" target="_blank"><button style="margin: 0rem 0rem 1.5rem; width: auto;" class="text-left"><i class="fa fa-download" aria-hidden="true"></i> Download</button></a>
		</div>
	</div>
	<!-- /Button -->

	<!-- Content -->
	<div id="expertise-content-wp" class="row">
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
		<div class="text-center show-for-medium">
			<a href="<?php echo $pdf; ?>" title="Download White Paper" target="_blank"><button style="margin: 2.5rem 0rem; width: auto;"><i class="fa fa-download" aria-hidden="true"></i> Download</button></a>
		</div>
	</div>
	<!-- /Button -->

	<!-- Share/Download Bar -->
	<?php get_template_part('template-parts/mobile', 'download-share'); ?>
	<!-- /share/download -->

	<!-- HIDDEN SHARE MENU -->
	<?php get_template_part('template-parts/hidden', 'share-menu'); ?>
	<!-- /HIDDEN SHARE MENU -->

	<!-- RELATED CONTENT SMALL -->
	<?php get_template_part('template-parts/mobile', 'related-content'); ?>
	<!-- /RELATED CONTENT SMALL -->


</div>