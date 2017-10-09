<?php
add_action('wp_head', 'sswp__add_tracking_code');

function sswp__add_tracking_code() {
	$sswp__settings = get_option('sswp__settings', false);
	if ($sswp__settings['sswp__tracking_code']) {
		echo "\n\n<!-- SharpSpring WP Plugin - START SharpSpring Tracking Code -->\n";
		echo $sswp__settings['sswp__tracking_code'];
		echo "\n<!-- SharpSpring WP Plugin - END SharpSpring Tracking Code -->\n\n";
	}
}