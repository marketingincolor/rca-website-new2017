<?php
/*
Plugin Name: SharpSpring Wordpress
Description: Use SharpSpring's features in Wordpress without coding
Version: 1.2
Author: Accel Web Marketing
Author URI: https://www.accelweb.ca
License: GPL2+
*/

include('inc/admin-settings.php');
include('inc/tracking-code.php');
include('inc/shortcodes.php');


// CSS
function sswp__enqueue_scripts() {
	wp_enqueue_style( 'sswp__public_css', plugin_dir_url( __FILE__ ) . 'css/public.css' );
	wp_enqueue_script( 'sswp__cookie_js', plugin_dir_url( __FILE__ ) . 'js/js.cookie.js', array(), '1', true );
	wp_enqueue_script( 'sswp__public_js', plugin_dir_url( __FILE__ ) . 'js/public.js', array('sswp__cookie_js'), '1', true );
}
add_action( 'wp_enqueue_scripts', 'sswp__enqueue_scripts' );