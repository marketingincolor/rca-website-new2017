<?php

global $post;

$taxonomy = 'expertise';
$terms    = get_the_terms($post->ID, $taxonomy);
$itemSlug = $terms[0]->name;
$term_id  = $terms[0]->term_id;
$icon_img = get_field('taxonomy_feed_icon',  'expertise_' . $term_id);

?>

<div class="item-block">
	<div class="row text-center">
		<img src="<?php echo $icon_img["url"]; ?>" />
	</div>
	<div class="row text-center">
		<a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a>
	</div>
	<div class="row text-center">
		<a href="<?php the_permalink(); ?>"><button class="orange-btn">Learn More</button></a>
	</div>
</div>