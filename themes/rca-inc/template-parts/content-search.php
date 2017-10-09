<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RCA_Inc.
 */


global $post;

// $taxonomy = 'expertise';
// $terms    = get_the_terms($post->ID, $taxonomy);
// $itemSlug = $terms[0]->name;
// $term_id  = $terms[0]->term_id;

$icon_img = rca_get_post_type_icon(get_post_type( $post->ID ));

?>

<div class="item-block">
	<?php if($icon_img != "" || $icon_img != NULL ): ?>
		<div class="row text-center">
			<img src="<?php echo $icon_img; ?>" />
		</div>
	<?php endif; ?>
	<div class="row text-center archived-title">
		<div class="small-10 small-offset-1 columns pagination-col">
			<a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 8, "..."); ?></a>
		</div>
	</div>
	<div class="row text-center">
		<a href="<?php the_permalink(); ?>"><button class="orange-btn">Learn More</button></a>
	</div>
</div>