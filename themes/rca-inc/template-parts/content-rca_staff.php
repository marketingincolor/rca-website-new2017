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

	<?php get_template_part('template-parts/button', 'share'); ?>
	<!-- HEADSHOT -->
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<?php the_post_thumbnail(); ?>
			</div>
		</div>
	</div>
	<!-- /HEADSHOT -->

	<div class="container">
		<div class="row">
			<div class="col-12">
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					<h2><?php the_field('staff_position'); ?></h2>
					<p><i class="fa fa-download" aria-hidden="true"></i>Download CV</p>
					<p><i class="fa fa-envelope" aria-hidden="true"></i>Staff Email</p>
				</header><!-- .entry-header -->

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
	</div>

		<?php if ( get_edit_post_link() ) : ?>
			<footer class="entry-footer">
				<?php
					edit_post_link(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Edit <span class="screen-reader-text">%s</span>', 'rca-inc' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							get_the_title()
						),
						'<span class="edit-link">',
						'</span>'
					);
				?>
			</footer><!-- .entry-footer -->
		<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
