<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RCA_Inc.
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- Title -->
<!-- 	<div class="row">
		<div class="small-10 small-offset-1 small-text-center medium-text-left columns">
			<h1><?php #the_title(); ?></h1>
		</div>
	</div> -->
	<!-- /Title -->
	<div class="row">
		<div class="small-10 small-offset-1 columns">
			<div class="entry-content">
				<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rca-inc' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
