<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RCA_Inc.
 */

get_header(); ?>

	<!-- TOP SLIDER -->
	<section class="top-slider">

		<?php echo do_shortcode('[rca-top-slider category="front-page-top" items=1 autoPlay="true" itemsDesktop="false" itemsDesktopSmall="false" itemsTablet="false" buttonTitle =""]'); ?>
		
	</section>
	<!-- /TOP SLIDER -->

	
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<!-- CONTENT -->

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'front-page' );

			endwhile; // End of the loop.
			?>

			<!-- /CONTENT -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
?>