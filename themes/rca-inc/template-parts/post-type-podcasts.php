<?php
/**
 * Template for Podcasts
 * 
 */
$audio_link = get_field('podcast_link');
$audio_desc = get_field('podcast_description');
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
	<?php //get_template_part('template-parts/mobile', 'download-share'); ?>
	<!-- /share/download -->

	<!-- Content -->
	<div class="row">
		<div class="small-10 small-offset-1 columns">
			<?php //echo $audio_link; ?>
			<script src="<?php echo $audio_link; ?>" type="text/javascript" charset="utf-8"></script>
		</div>
	</div>

	<div id="expertise-content" class="row">
		<div class="small-10 small-offset-1 columns" >
			<?php the_content(); ?>
		</div>
	</div>
	<!-- /Content -->

	<!-- Share/Download Bar -->
	<?php //get_template_part('template-parts/mobile', 'download-share'); ?>
	<!-- /share/download -->

	<!-- HIDDEN SHARE MENU -->
	<?php //get_template_part('template-parts/hidden', 'share-menu'); ?>
	<!-- /HIDDEN SHARE MENU -->

	<!-- RELATED CONTENT SMALL -->
	<?php //get_template_part('template-parts/mobile', 'related-content'); ?>
	<!-- /RELATED CONTENT SMALL -->

</div>