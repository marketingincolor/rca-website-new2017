<?php
/*
Plugin Name:  RCA Breadcrumbs - Do Not Update. Modified For RCA INC. Theme.
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
    global $wp;
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
						echo '<a href="'.get_permalink(get_page_by_title('White Papers')).'">White Papers</a>';
						echo $separator;
					elseif( $post->post_type == 'case_studies'):
						echo '<a href="'.get_permalink(get_page_by_title('Case Studies')).'">Case Studies</a>';
						echo $separator;
					elseif( $post->post_type == 'published_articles'):
						echo '<a href="'.get_permalink(get_page_by_title('Published Articles')).'">Published Articles</a>';
						echo $separator;
					elseif( $post->post_type == 'webinars'):
						echo '<a href="'.get_permalink(get_page_by_title('Webinars')).'">Webinars</a>';
						echo $separator;
					elseif( $post->post_type == 'visual_resources'):
						echo '<a href="'.get_permalink(get_page_by_title('Visual Resources')).'">Visual Resources</a>';
						echo $separator;
					elseif( $post->post_type == 'post'):
						echo '<a href="'.get_permalink(get_page_by_title('News')).'">News</a>';
						echo $separator;
					elseif( $post->post_type == 'staff'):
						echo '<a href="'.get_permalink(get_page_by_path('news')).'">About</a> ' . $separator . ' <a href="'.get_permalink(get_page_by_path('about/our-people')).'">Our People</a>' . $separator;

					else:
						echo $separator;							
					endif;
                $current_url = home_url(add_query_arg(array(),$wp->request));
				echo '<a href="'.$current_url.'">'.get_the_title().'<a/>';
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
            $current_url = home_url(add_query_arg(array(),$wp->request));
		    echo '<a href="'.$current_url.'">'.get_the_title().'<a/>';
		}

		elseif (is_archive()) {
			if( $post->post_type == 'case_studies' ):
                $current_url = home_url(add_query_arg(array(),$wp->request));
				echo '<a href="'.$current_url.'">Case Studies<a/>';
			elseif( $post->post_type == 'published_articles'):
				echo '<a href="'.$current_url.'">Published Articles<a/>';
                $current_url = home_url(add_query_arg(array(),$wp->request));
			elseif( $post->post_type == 'webinars'):
                $current_url = home_url(add_query_arg(array(),$wp->request));
				echo '<a href="'.$current_url.'">Webinars<a/>';
			elseif( $post->post_type == 'white_papers' ):
                $current_url = home_url(add_query_arg(array(),$wp->request));
				echo '<a href="'.$current_url.'">White Papers<a/>';
			elseif( $post->post_type == 'visual_resources' ):
                $current_url = home_url(add_query_arg(array(),$wp->request));
				echo '<a href="'.$current_url.'">Visual Resources<a/>';
			endif;
		}


		 elseif (is_page()) {
			$current_url = home_url(add_query_arg(array(),$wp->request));
			echo '<a href="'.$current_url.'">'.get_the_title().'<a/>';
		} elseif (is_404()) {
			echo "404";
		}
	} else {
		bloginfo('name');
	}
	echo '</div>';
}
?>