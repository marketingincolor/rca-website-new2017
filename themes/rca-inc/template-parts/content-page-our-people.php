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

	<div class="row">
		<div class="small-10 small-offset-1 columns text-center">
			<div class="entry-content">
				<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rca-inc' ),
						'after'  => '</div>',
					) );
				?>
		</div>
	</div>
	<div class="row">
		<div class="small-12 columns">


				<!-- board of directors -->
				<div class="row staff-block-area text-center" data-equalizer>
					<h2 id="board-of-directors">Board of Directors</h2></a>
					<?php get_team_members('board-of-directors'); ?>
				</div>
				<!-- end board of directors -->

				<div class="staff-seperator"></div>

				<!-- executive leadership team -->
				<div class="row staff-block-area text-center"  data-equalizer>
					<h2 id="executive">Executive Leadership Team</h2>
					<?php get_team_members('executive-leadership-team'); ?>
				</div>				
				<!-- end ex#ecutive leadership team -->

				<div class="staff-seperator" ></div>


				<!-- directors-->
				<div class="row staff-block-area text-center"data-equalizer >
					<h2 id="directors">Directors</h2>
					<a href="<?php echo get_permalink( get_page_by_title( 'Operations' ) ) ?>"><h3>Operations</h3></a>
					<?php #get_team_members('operations'); ?>
				</div>
				<!-- end directors -->

				<!-- directors > sales operations-->
				<div class="row staff-block-area no-avatar text-center" data-equalizer>
					<a href="<?php echo get_permalink( get_page_by_title( 'Sales Operations' ) ) ?>"><h3>Sales Operations</h3></a>
					<?php #get_team_members('sales_operations'); ?>
				</div>
				<!-- end directors > sales operations -->


				<!-- directors > sales operations-->
				<div class="row staff-block-area text-center" data-equalizer>
					<a href="<?php echo get_permalink( get_page_by_title( 'Finance' ) ) ?>"><h3>Finance</h3></a>
					<?php #get_team_members('finance'); ?>
				</div>
				<!-- end directors > sales operations -->	

				<!-- directors > directors -->
				<div class="row staff-block-area text-center" data-equalizer>
					<a href="<?php echo get_permalink( get_page_by_title( 'Directors' ) ) ?>"><h3>Directors</h3></a>
					<?php #get_team_members('directors'); ?>
				</div>
				<!-- directors > directors -->

			</div><!-- .entry-content -->
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
