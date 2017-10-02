<?php
/*
Plugin Name:  RCA Breadcrumbs
Plugin URI: 
Description: Built From Really Simple Breadcrumbs. 
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

			if(!$post->post_name == 'view-all'):
				the_category(', ');
			endif;
			if ( is_single() ) {
					if( $post->post_type == 'white_papers' ):
						echo 'White Papers';
						echo $separator;
					elseif( $post->post_type == 'case_studies'):
						echo 'Case Studies';
						echo $separator;
					elseif( $post->post_type == 'published_articles'):
						echo 'Published Articles';
						echo $separator;
					elseif( $post->post_type == 'webinars'):
						echo 'Webinars';
						echo $separator;
					elseif( $post->post_type == 'visual_resources'):
						echo 'Visual Resources';
						echo $separator;
					else:
						echo $separator;							
					endif;
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

		elseif (is_archive()) {
			if( $post->post_type == 'case_studies' ):
				echo 'Case Studies';
			elseif( $post->post_type == 'published_articles'):
				echo 'Published Articles';
			elseif( $post->post_type == 'webinars'):
				echo 'Webinars';
			elseif( $post->post_type == 'white_papers' ):
				echo 'White Papers';
			elseif( $post->post_type == 'visual_resources' ):
				echo 'Visual Resources';
			endif;
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