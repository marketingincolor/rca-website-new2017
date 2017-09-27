<?php
/*
Plugin Name: Really Simple Breadcrumb
Plugin URI: http://www.christophweil.de
Description: This is a really simple WP Plugin which lets you use Breadcrumbs for Pages!
Version: 1.0.2
Author: Christoph Weil, Modified by Doe for RCA.
Author URI: http://www.christophweil.de
Update Server: 
Min WP Version: 3.2.1
Max WP Version: 
*/

function simple_breadcrumb() {
    global $post;
	$terms = get_the_terms($post->ID, 'expertise');

	// Returns this term name
	if(!empty($terms)):
		$termName = $terms[0]->name;
	endif;
    // var_dump($post);
	$separator = " <i class=\"fa fa-angle-right\" aria-hidden=\"true\"></i> "; // Simply change the separator to what ever you need e.g. / or >
	
    echo '<div class="breadcrumb">';
	if (!is_front_page()) {
		echo '<a href="';
		echo get_option('home');
		echo '">';
		echo 'Home';
		echo "</a> ".$separator;
		if ( is_category() || is_single() || is_tax() ) {
			the_category(', ');
			if ( is_single() ) {
					if ( $post->post_type == 'items') {
						echo 'Our Expertise';
						echo $separator;
					}
					if ( $post->post_type == 'items') {
						echo $termName;
					}
				echo $separator;
				the_title();
			}
		} elseif ( is_page() && $post->post_parent ) {
			$home = get_page(get_option('page_on_front'));
			for ($i = count($post->ancestors)-1; $i >= 0; $i--) {
				if (($home->ID) != ($post->ancestors[$i])) {
					echo '<a href="';
					echo get_permalink($post->ancestors[$i]); 
					echo '">';
					echo get_the_title($post->ancestors[$i]);
					echo "</a>".$separator;
				}
			}
			echo the_title();
		}


		 elseif (is_page()) {
			echo the_title();
		} elseif (is_404()) {
			echo "404";
		}
	} else {
		bloginfo('name');
	}
	echo '</div>';
}
?>