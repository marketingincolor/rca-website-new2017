<?php

/**
 * Purpose: Template part for displaying page content in page.php
 * Date: 10/24/2017
 * Author: AD.,NB.,ET., MARKETING IN COLOR
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- Title -->
	<div class="row">
		<div class="small-10 small-offset-1 small-text-center medium-text-left columns">
			<h1><?php the_title(); ?></h1>
				<p class="post-date"><?php echo get_the_date(); ?></p>
		</div>
	</div>
	<!-- /Title -->
	<div class="row">
		<div class="small-10 small-offset-1 columns">
			<div class="entry-content">
				<?php
					the_content();
					if (get_field('bottom_button_link') && get_field('bottom_button_text')) {
				?>

					<p style="margin-top:30px"><a href="<?php if(!get_field('external_link')){echo site_url();} ?><?php the_field('bottom_button_link'); ?>" <?php if(get_field('external_link')){echo 'target="_blank"';} ?>><button class="orange-btn width-auto"><?php the_field('bottom_button_text'); ?></button></a></p>
					
				<?php
				  }
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rca-inc' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
