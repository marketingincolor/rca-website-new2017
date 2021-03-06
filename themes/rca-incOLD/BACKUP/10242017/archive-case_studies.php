<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RCA_Inc.
 */
global $post;
$term = $wp_query->queried_object;
$name = 'Case Studies';
$term_obj = get_term_by( 'name', $name, 'expertise' );
$term_id = $term_obj->term_taxonomy_id;
$backgroundImg = get_stylesheet_directory_uri() . '/images/feed-header.jpg';
// Switch determines bg img


get_header(); ?>

	<!-- Featured Image -->
	<div id="featured-img-wrapper" class="row expanded">
		<div id="featured-img" style="background: linear-gradient(rgba(196,97,43, 0.7), rgba(196,97,43, 0.7)),
	            rgba(196,97,43,0.7) url('<?php echo $backgroundImg; ?>'); background-size: cover;">
				<div class="featured-img-title"><h1>Case Studies</h1></div>
		</div>
	</div>
	<!-- / Featured Image -->



	<div id="mob-before-title-block" class="row hide-for-medium" data-equalizer>
		<div id="mobile-cat-picker" class="small-offset-1 small-8 columns" data-equalizer-watch>
			<select name="mobile_category" id="" onchange="location.href=this.value">
				<option value="/case-studies">Case Studies</option>
				<option value="/webinars">Webinars</option></a>
				<option value="/white-papers">White Papers</option>
				<option value="/published-articles">Published Articles</option>
				<option value="/visual-resources">Visual Resources</option>
			</select>
		</div>
		<div id="mobile-share-btn" class="small-2 end columns text-center" data-equalizer-watch>
			<i class="fa fa-share" aria-hidden="true"></i>
			<p>Share</p>
		</div>
	</div>
	<!-- SOCIAL BREADCRUMBS -->
	<?php get_template_part('template-parts/section', 'breadcrumbs-social'); ?>
	<!-- /SOCIAL BREADCRUMBS -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		$paged = get_query_var('paged') ? get_query_var('paged') : 1; 
		$args = array(
			'post_type' => 'case_studies',
			'posts_per_page' => 8,
			'paged' => $paged
		);

		$case_studies = new WP_Query($args);

		if ( $case_studies->have_posts() ) : ?>
			
			<div class="row show-for-medium">
				<div class="small-10 small-offset-1 columns text-center">
					<header class="page-header">
						<p class="description">Regulatory Compliance Associates® Inc. utilizes Case Studies to exemplify real-life dilemmas, conflicts, or concerns from our life science clients, and the corresponding actions we developed to solve them.</p>
					</header><!-- .page-header -->
				</div>
			</div>

			<!-- TAXONOMIES MENU -->
			<?php get_template_part('template-parts/taxonomy', 'menu'); ?>
			<!-- /TAXONOMIES MENU -->
			
			<div id="all-items-block" class="row" data-equalizer>
				
			<?php
				/* Start the Loop */
				while ( $case_studies->have_posts() ) : $case_studies->the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */

					echo '<div class="small-10 small-offset-1 medium-offset-0 medium-3 columns archive-row end">';
						get_template_part( 'template-parts/content', 'archive-blocks' );
					echo '</div>';

				endwhile;
			?>
			
			<div class="row text-center">
				<div class="small-10 small-offset-1 columns pagination-col">
					<?php get_previous_posts_link(); ?>
					
					<?php rca_tax_post_pagination(); ?>
				</div>
			</div>
			<?php
				endif; 
				wp_reset_query();
			?>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

	<!-- HIDDEN SHARE MENU -->
	<div id="share-menu" style="display:none;">
		<div class="row close">
			<div class="small-offset-10 small-2 columns">
				<i class="fa fa-times fa-2x" aria-hidden="true"></i>
			</div>
		</div>
		<div class="row title">
			<div class="small-12 columns">
				<h1>Share This Page</h1>
			</div>
		</div>
		<div id="social-icons">
			<div class="row a2a_kit a2a_kit_size_32 a2a_default_style">
				<div class="small-offset-2 small-8 columns">
					<div class="small-4 columns text-center">
						<a class="a2a_button_facebook"><i class="fa fa-facebook-square fa-3x a2a_button_facebook" aria-hidden="true"></i></a>
					</div>
					<div class="small-4 columns text-center">
						<a class="a2a_button_linkedin"><i class="fa fa-linkedin-square fa-3x" aria-hidden="true"></i></a>
					</div>
					<div class="small-4 columns text-center">
						<a class="a2a_button_googleplusone"><i class="fa fa-google-plus-square fa-3x" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="small-offset-2 small-8 columns">
					<div class="small-6 columns text-center">
						<a class="a2a"><i class="fa fa-twitter-square fa-3x" aria-hidden="true"></i></a>	
					</div>
					<div class="small-6 columns text-center">
						<i class="fa fa-envelope fa-3x" aria-hidden="true"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /HIDDEN SHARE MENU -->


	<!-- SHARE BUTTON CLICKS -->
	<script>
		$(document).ready(function() {
			var logo = $('#masthead > section.hide-for-large > div:nth-child(1)').height();
			var close = $('#share-menu .close');
			logo = Math.abs(logo);
			console.log( 'logoheight ' + logo);
			var shareButton = $('#mobile-share-btn');
			var shareMenu = $('#share-menu');

			shareButton.on('click', function() {

				// Show the Menu
				shareMenu.show();
				shareMenu.toggleClass('share-menu-js');
				shareMenu.css('top', logo); 

				// Disable scrolling
				$('html, body').css( { 
					overflow:'hidden', 
					height: '100%'
				});
			});

			close.on('click', function() {

				//Enable scrolling
				$('html, body').css({
				    overflow: 'auto',
				    height: 'auto'
				});

				// Hide the Menu
				shareMenu.toggleClass('share-menu-js');
				shareMenu.hide();
			});


		})
	</script>

<?php
get_footer();
