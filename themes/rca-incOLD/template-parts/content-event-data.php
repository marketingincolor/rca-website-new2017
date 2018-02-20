<?php

/**
 * Purpose: Used on posts categorized as events.
 * Date: 10/24/2017
 * Author: AD.,NB.,ET., MARKETING IN COLOR
 */

$event_date     = get_field('event_date');
$event_date_format     = new DateTime($event_date);
$end_date       = get_field('end_date');
$end_date_format       = new DateTime($end_date);
$event_location = get_field('event_location');
$event_time     = get_field('event_time');

?>	
<div id="related-content-block-outer" class="row show-for-small" style="padding-bottom: 0px;">
	<div class="row" data-equalizer>
		<div id="related-content-block" class="small-10 small-offset-1 columns">

			<!-- IF NO END DATE -->
			<?php if($end_date == NULL || $end_date == "" ): ?>
			<div class="small-12 medium-4 columns random-item" data-equalizer-watch>
				<i class="fa fa-calendar" aria-hidden="true"></i><p><?php echo $event_date_format->format('F d, Y') ?></p>
			</div>
			<!-- /IF NO END DATE -->

			<!-- IF START & END DATE -->
			<?php else: ?>
			<div class="small-12 medium-4 columns random-item" data-equalizer-watch>
				<i class="fa fa-calendar" aria-hidden="true"></i><p><?php echo $event_date_format->format('F d') . '-' . $end_date_format->format('d, Y'); ?></p>
			</div>
			<?php endif; ?>
			<!-- /IF START & END DATE -->

			<div class="small-12 medium-4 columns random-item" data-equalizer-watch>
				<i class="fa fa-globe" aria-hidden="true"></i><p><?php the_field('event_location'); ?></p>
			</div>
			<div class="small-12 medium-4 columns random-item" data-equalizer-watch>
				<i class="fa fa-clock-o" aria-hidden="true"></i><p><?php the_field('event_time'); ?></p>
			</div>
		</div>
	</div>
</div>