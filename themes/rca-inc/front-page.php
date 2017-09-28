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

		<style>
		  .owl-carousel .item{
		  	background-repeat: no-repeat;
		  	background-position: center center;
		  	background-size: cover;
		  	padding: 30px 0;
		  }
		  .owl-carousel .slide-meta{
		  	left: 0;
		  	padding: 30px;
		  	background-color: rgba(196,97,43,0.8);
		  	color: #FFF
		  }
		  .owl-carousel .slide-meta p{
		  	margin-bottom: 30px;
		  	font-size: 22px;
		  	font-weight: 700;
		  }
		  .owl-carousel .slide-meta a{
				color: #FFF;
				border: 2px solid #FFF;
				padding: 5px 15px;
				font-size: 16px;
		  }
		</style>

		<?php echo do_shortcode('[rca-top-slider category="front-page-top" items=1 autoPlay="false" itemsDesktop="false" itemsDesktopSmall="false" itemsTablet="false"]'); ?>
		
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