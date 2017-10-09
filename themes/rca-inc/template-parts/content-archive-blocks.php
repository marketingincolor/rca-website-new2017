<?php

global $post;
$post_type = get_post_type();

switch($post_type) {
	case('case_studies'):
		$img = get_stylesheet_directory_uri() . '/images/icons/archive-case-studies-icon.jpg';
	break;
	case('published_articles'):
		$img = get_stylesheet_directory_uri() . '/images/icons/archive-published-articles-icon.jpg';
	break;
	case('webinars'):
		$img = get_stylesheet_directory_uri() . '/images/icons/archive-webinars-icon.jpg';
	break;
	case('white_papers'):
		$img = get_stylesheet_directory_uri() . '/images/icons/archive-white-papers-icon.jpg';
	break;
	case('visual_resources'):
		$img = get_stylesheet_directory_uri() . '/images/icons/archive-visual-resources-icon.jpg';
	break;
	default:
		$img = '#';
	break;
}

?>

<div class="item-block">
	<div class="archive-img row text-center">
		<img src="<?php echo $img; ?>" />
	</div>
	<div class="row text-center archived-title">
		<div class="small-10 small-offset-1 columns pagination-col">
			<a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 5, "..."); ?></a>
		</div>
	</div>
	<div class="row text-center">
		<a href="<?php the_permalink(); ?>"><button class="orange-btn">Learn More</button></a>
	</div>
</div>