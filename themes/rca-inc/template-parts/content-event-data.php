<?php
$event_date     = get_field('event_date');
$event_location = get_field('event_location');
$event_time     = get_field('event_time');
?>	
<div id="related-content-block-outer" class="row show-for-large" style="padding-bottom: 0px;">
	<div class="row" data-equalizer>
		<div id="related-content-block" class="small-10 small-offset-1 columns">
			<div class="small-12 medium-4 columns random-item" data-equalizer-watch>
				<i class="fa fa-calendar" aria-hidden="true"></i><?php the_field('event_date'); ?>
			</div>
			<div class="small-12 medium-4 columns random-item" data-equalizer-watch>
				<i class="fa fa-calendar" aria-hidden="true"></i><?php the_field('event_location'); ?>
			</div>
			<div class="small-12 medium-4 columns random-item" data-equalizer-watch>
				<i class="fa fa-calendar" aria-hidden="true"></i><?php the_field('event_time'); ?>
			</div>
		</div>
	</div>
</div>