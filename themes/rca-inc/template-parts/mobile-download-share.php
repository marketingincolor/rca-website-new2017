<?php
// Template: For Downloading and Sharing Buttons on Mobile Devices
$pdf = get_field('case_study_file');

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
			<a href="<?php echo $pdf; ?>" title="Download">
				<div id="dl-block" class="small-6 columns text-center hide-for-medium">
					<p>Download <i class="fa fa-download" aria-hidden="true"></i></p>
				</div>
			</a>
		<?php endif; ?>
			<div id="share-block-cs" class="small-<?php echo $shareBlockClass;?> columns text-center hide-for-medium">
				<p>Share <i class="fa fa-share" aria-hidden="true"></i></p>
			</div>
		</div>
	</div>

</div>
<!-- /BUTTONS SMALLS -->