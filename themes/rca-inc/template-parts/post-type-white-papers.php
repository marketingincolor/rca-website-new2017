<?php 
/**
 * Template for White Paper Items
 * 
 */
$pdf = get_field('white_paper_pdf');

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

	<!-- Button -->
	<div class="row">
		<div class="small-10 small-offset-1 columns">
			<a href="<?php echo $pdf; ?>" title="Download White Paper"><button style="margin: 1rem 0rem 0rem; width: auto;" class="text-left"><i class="fa fa-download" aria-hidden="true"></i> Download</button></a>
		</div>
	</div>
	<!-- /Button -->

	<!-- Content -->
	<div id="expertise-content" class="row">
		<div class="small-10 small-offset-1 columns" >
			<?php the_content(); ?>
		</div>
	</div>
	<!-- /Content -->

	<!-- Button -->
	<div class="row">
		<div class="text-center">
			<a href="<?php echo $pdf; ?>" title="Download White Paper"><button style="margin: 1rem 0rem 0rem; width: auto;"><i class="fa fa-download" aria-hidden="true"></i> Download</button></a>
		</div>
	</div>
	<!-- /Button -->

</div>