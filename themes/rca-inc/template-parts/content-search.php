<?php

/**
 * Purpose: Template part for displaying results in search pages
 * Date: 10/24/2017
 * Author: AD.,NB.,ET., MARKETING IN COLOR
 */

global $post;
$the_post = get_post( $post->ID );
$icon_img = rca_get_search_icons($the_post->post_type);

?>

<div class="item-block">
	<?php if($icon_img != "" || $icon_img != NULL ): ?>
		<div class="row text-center">
			<a href="<?php the_permalink(); ?>"><img src="<?php echo $icon_img; ?>" /></a>
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