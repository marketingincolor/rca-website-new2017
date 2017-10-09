<?php

// Get sswp-contact cookie and return as PHP object
function getContactCookie() {
	if (isset($_COOKIE['sswp-contact'])) {
		return json_decode(str_replace("\\", "", $_COOKIE['sswp-contact']));
	} else {
		return false;
	}	
}

// Display field shortcodes
// Usage: [sswp-field field="First_Name" default="Some other first name"]
function sswp__display_field_shortcode( $atts ) {
	$shortcode_atts = shortcode_atts( array(
			'field' => 'First Name',
			'default' => '',
		), $atts );
	
	$contact_cookie = getContactCookie();
	if ($contact_cookie->$shortcode_atts['field']) {
		$content = $contact_cookie->$shortcode_atts['field'];
	} else {
		$content = $shortcode_atts['default'];
	}
	$output = "<span class='sswp_field' data-field='" . $shortcode_atts['field'] . "' data-default='" . $shortcode_atts['default'] . "'>" . do_shortcode($content) . "</span>";
	return $output;
}
add_shortcode('sswp-field', 'sswp__display_field_shortcode');

// If field equals this value, show content within these tags shortcode
function sswp__if_field_equals_shortcode( $atts, $content = null ) {
	$shortcode_atts = shortcode_atts( array(
			'field' => 'First Name',
			'equals' => ''
		), $atts );
		
	$contact_cookie = getContactCookie();
	if ($contact_cookie->$shortcode_atts['field'] == $shortcode_atts['equals']) {
		$show_initially = 'show_initially';
	} else {
		$show_initially = '';
	}
	$output = "<div class='sswp_if_field_equals $show_initially' data-field='" . $shortcode_atts['field'] . "' data-field-equals='" . $shortcode_atts['equals'] . "'>" . do_shortcode($content) . "</div>";
	return $output;
}
add_shortcode('sswp-if-field-equals', 'sswp__if_field_equals_shortcode');

// If field is empty, show content within these tags shortcode
function sswp__if_field_empty_shortcode( $atts, $content = null ) {
	$shortcode_atts = shortcode_atts( array(
			'field' => 'First Name'
		), $atts );
		
	$contact_cookie = getContactCookie();
	if (!$contact_cookie->$shortcode_atts['field']) {
		$show_initially = 'show_initially';
	} else {
		$show_initially = '';
	}
	$output = "<div class='sswp_if_field_empty $show_initially' data-field='" . $shortcode_atts['field'] . "'>" . do_shortcode($content) . "</div>";
	return $output;
}
add_shortcode('sswp-if-field-empty', 'sswp__if_field_empty_shortcode');

// If field is not empty, show content within these tags shortcode
function sswp__if_field_not_empty_shortcode( $atts, $content = null ) {
	$shortcode_atts = shortcode_atts( array(
			'field' => 'First Name'
		), $atts );
		
	$contact_cookie = getContactCookie();
	if ($contact_cookie->$shortcode_atts['field']) {
		$show_initially = 'show_initially';
	} else {
		$show_initially = '';
	}
	$output = "<div class='sswp_if_field_not_empty $show_initially' data-field='" . $shortcode_atts['field'] . "'>" . do_shortcode($content) . "</div>";
	return $output;
}
add_shortcode('sswp-if-field-not-empty', 'sswp__if_field_not_empty_shortcode');

// If visitor is a contact, show content within these tags shortcode
function sswp__if_is_contact( $atts, $content = null ) {
	$contact_cookie = getContactCookie();
	if ($contact_cookie) {
		$show_initially = 'show_initially';
	} else {
		$show_initially = '';
	}
	$output = "<div class='sswp_if_is_contact $show_initially'>" . do_shortcode($content) . "</div>";
	return $output;
}
add_shortcode('sswp-if-is-contact', 'sswp__if_is_contact');

// If visitor is not a contact, show content within these tags shortcode
function sswp__if_is_not_contact( $atts, $content = null ) {
	$contact_cookie = getContactCookie();
	if (!$contact_cookie) {
		$show_initially = 'show_initially';
	} else {
		$show_initially = '';
	}
	$output = "<div class='sswp_if_is_not_contact $show_initially'>" . do_shortcode($content) . "</div>";
	return $output;
}
add_shortcode('sswp-if-is-not-contact', 'sswp__if_is_not_contact');