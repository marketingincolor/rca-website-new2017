<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RCA_Inc.
 */


global $post;

$taxonomy = 'expertise';
$terms    = get_the_terms($post->ID, $taxonomy);
$itemSlug = $terms[0]->name;
$term_id  = $terms[0]->term_id;

$icon_img = get_field('taxonomy_feed_icon',  'expertise_' . $term_id);

?>

<div class="item-block">
	<?php if($icon_img["url"] != "" || $icon_img["url"] != NULL ): ?>
		<div class="row text-center">
			<img src="<?php echo $icon_img["url"]; ?>" />
		</div>
	<?php endif; ?>
	<div class="row text-center">
		<a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a>
	</div>
	<div class="row text-center">
		<a href="<?php the_permalink(); ?>"><button class="orange-btn">Learn More</button></a>
	</div>
</div>