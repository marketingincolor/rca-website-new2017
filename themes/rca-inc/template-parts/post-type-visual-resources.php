<?php
/**
 * Template for Visual Resource Items
 * 
 */
$pdf = get_field('visual_resource_pdf');
//$ssLink = get_field('sharpspring_redirect_url');
?>
<?php get_template_part('template-parts/section', 'breadcrumbs-social'); ?>

<div id="all-expertise-content">

	<!-- Title -->
	<div class="row">
		<div class="small-10 small-offset-1 columns text-left">
			<h1><?php the_title(); ?></h1>
		</div>
	</div>
	<!-- /Title -->

	<!-- Share/Download Bar -->
	<?php get_template_part('template-parts/mobile', 'download-share'); ?>
	<!-- /share/download -->

	<!-- Content -->
	<div id="expertise-content" class="row">
		<div class="small-10 small-offset-1 columns" >
			<div class="row">
				<div class="medium-3 columns">
					<a href="<?php echo $pdf; ?>" target="_blank"><img src="<?php the_field('resource_image'); ?>" alt="<?php the_title(); ?>"></a>
				</div>
				<div class="medium-9 columns">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
	<!-- /Content -->

	<!-- Button -->
	<div class="row show-for-medium">
		<div class="text-center">
			<a href="<?php echo $pdf; ?>" title="Download White Paper" target="_blank"><button style="margin: 1rem 0rem 3rem; width: auto;"><i class="fa fa-download" aria-hidden="true"></i> Download</button></a>
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