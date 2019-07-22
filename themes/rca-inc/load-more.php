<?php 

/**
 * Purpose: For displaying more posts on news page.
 * Date: 10/24/2017
 * Author: AD.,NB.,ET., MARKETING IN COLOR
 */

require('../../../wp-blog-header.php');
header("HTTP/1.1 200 OK"); 
?>

<?php
	
	// Retrieve Query Vars.
	$category  = $_POST['category'];

	if($category == 'all') {
		$category = '';
	}

	if($category == 'blog') {
		$category = 'blog';
	}

	$dropdown_query = $_POST['dropdown_query'];

	// If we have an offset use that.
	if(isset($_POST['offset'])):
		$offset = $_POST['offset'];
	endif;

	// If we don't have an offset go back to the beginning.
	if(isset($_POST['offset']) == NULL):
		$offset = 0;
	endif;

	

  
  	// Change News Query Based on whats clicked in rca-filter-news.js
  	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

	$news_query = new WP_Query( array(
    	'post_type' => 'post',
    	'category_name' => $category,
    	'paged' => $paged,
    	'date_query' => array(
    		'year' => $dropdown_query
    	),
    	'posts_per_page' => 5,
    	'offset' => $offset,
	));

	echo '<!-- cat: ' . $category . '-->';

	if($news_query->have_posts()) { while($news_query->have_posts()) { $news_query->the_post(); 
?>

	<a href="#!"><?php the_post_thumbnail(); ?></a>

	<div class="row">
		<div class="small-10 small-offset-1 columns">
			<div class="story-container">
				<h2><a href="<?php echo get_post_permalink(); ?>"><?php the_title(); ?></a></h2>
				<p class="story-date">Posted <?php echo get_the_date(); ?></p>
				<?php echo wp_trim_words(get_the_excerpt(), 25, '...<a href="'. get_permalink() . '">Read More</a>'); ?>
			</div>
		</div>
	</div>

<?php 
	}
	wp_reset_postdata();

	}
	else{
		echo '<script>';
		echo '$(\'.load-more\').hide(); ';
		echo '</script>';
		echo '<div class="row">';
		echo '<div class="small-10 small-offset-1 columns">';
		echo '<h3 class="">Sorry, but there are no more available posts for loading.</p>';
		echo '</div>';
		echo '</div>';
	}
?>
