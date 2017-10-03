<?php
/**
 * Template: Desktop Download Button
 */
$pdf = get_field('case_study_file');
if($pdf):
?>
<div class="row show-for-medium">
	<div class="small-10 small-offset-1 columns">
		<a href="<?php echo $pdf ?>" title="Download"><button style="margin: 1rem 0rem 0rem; width: auto;" class="text-left"><i class="fa fa-download" aria-hidden="true"></i> Download</button></a>
	</div>
</div>
<?php endif;