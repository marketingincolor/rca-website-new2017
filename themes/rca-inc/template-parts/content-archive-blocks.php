<?php

global $post;
$post_type = get_post_type();

switch($post_type) {
	case('case_studies'):
		$img = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/Case-Studies-Icon-Gray-01.svg';
	break;
	case('published_articles'):
		$img = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/Published-Articles-Icon-Gray-01.svg';
	break;
	case('webinars'):
		$img = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/Webinar-Icon-Gray-01.svg';
	break;
	case('white_papers'):
		$img = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/White-Papers-Icon-Gray-01.svg';
	break;
	case('visual_resources'):
		$img = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/Visual-Resources-Icon-Gray-01.svg';
	break;
	default:
		$img = '#';
	break;
}

?>

<div class="item-block">
	<div class="archive-img row text-center">
		<a href="<?php the_permalink(); ?>"><img src="<?php echo $img; ?>" /></a>
	</div>
	<div class="row text-center archived-title">
		<div class="small-10 small-offset-1 columns pagination-col">
			<a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 8, "..."); ?></a>
		</div>
	</div>
	<div class="row text-center">
		<a href="<?php the_permalink(); ?>"><button class="orange-btn">Learn More</button></a>
	</div>
</div>