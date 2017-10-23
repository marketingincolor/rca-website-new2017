<?php
// Template: For Downloading and Sharing Buttons on Mobile Devices
$post_type = get_post_type();

switch ($post_type) {
	case 'white_papers':
		$pdf = get_field('white_paper_pdf');
		break;
	case 'case_studies':
		$pdf = get_field('case_study_file');
		break;
	case 'visual_resources':
		$pdf = get_field('visual_resource_pdf');
		break;
}
// $pdf = get_field('case_study_file');

if($pdf):
	$shareBlockClass = '6';
else:
	$shareBlockClass = '12';
endif;

?>
<!-- BUTTONS SMALL -->
<div class="row">
	<div class="small-12 columns">

		<div class="row">
			<?php if($pdf): ?>
			<a href="<?php echo $pdf; ?>" title="Download" target="_blank">
				<div id="dl-block" class="small-6 columns text-center hide-for-medium">
					<p>Download <i class="fa fa-download" aria-hidden="true"></i></p>
				</div>
			</a>
		<?php endif; ?>
			<div id="" class="small-<?php echo $shareBlockClass;?> columns text-center hide-for-medium share-block">
				<p>Share <i class="fa fa-share" aria-hidden="true"></i></p>
			</div>
		</div>
	</div>

</div>
<!-- /BUTTONS SMALLS -->