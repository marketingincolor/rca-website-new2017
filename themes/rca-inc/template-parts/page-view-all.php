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
				<div class="featured-img-title"><h1><?php echo the_title(); ?></h1></div>
		</div>
	</div>
	<!-- / Featured Image -->




	<div id="mob-before-title-block" class="row hide-for-medium" data-equalizer>
		<div id="mobile-cat-picker" class="small-offset-1 small-8 columns" data-equalizer-watch>
			<select name="mobile_category" id="" onchange="location.href=this.value">
				<option value="<?php echo site_url(); ?>/view-all" disabled selected>View All</option>
				<option value="<?php echo site_url(); ?>/case-studies">Case Studies</option>
				<option value="<?php echo site_url(); ?>/webinars">Webinars</option></a>
				<option value="<?php echo site_url(); ?>/white-papers">White Papers</option>
				<option value="<?php echo site_url(); ?>/visual-resources">Visual Resources</option>
				<option value="<?php echo site_url(); ?>/published-articles">Published Articles</option>
			</select>
		</div>
		<div id="mobile-share-btn" class="small-2 end columns text-center" data-equalizer-watch>
			<div>
				<i class="fa fa-share" aria-hidden="true"></i>
			</div>
			<p>Share</p>
		</div>
	</div>
	<!-- SOCIAL BREADCRUMBS -->
	<?php get_template_part('template-parts/section', 'breadcrumbs-social'); ?>
	<!-- /SOCIAL BREADCRUMBS -->

	<div id="mob-before-title-block" class="row hide-for-small-only hide-for-large" data-equalizer>
		<div id="mobile-cat-picker" class="small-offset-1 small-8 columns" data-equalizer-watch>
			<select name="mobile_category" id="" onchange="location.href=this.value">
				<option value="<?php echo site_url(); ?>/view-all" disabled selected>View All</option>
				<option value="<?php echo site_url(); ?>/case-studies">Case Studies</option>
				<option value="<?php echo site_url(); ?>/webinars">Webinars</option></a>
				<option value="<?php echo site_url(); ?>/white-papers">White Papers</option>
				<option value="<?php echo site_url(); ?>/visual-resources">Visual Resources</option>
				<option value="<?php echo site_url(); ?>/published-articles">Published Articles</option>
			</select>
		</div>
	</div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		
		<?php

		$paged = get_query_var('paged') ? get_query_var('paged') : 1; 
		$args = array(
			'post_type' => get_all_post_types(),
			'posts_per_page' => 8,
			'paged' => $paged
		);

		$view_all = new WP_Query($args);
		$temp_query = $wp_query;
		$wp_query   = NULL;
		$wp_query   = $view_all;
		if ( $view_all->have_posts() ) : ?>
			
			<div class="row show-for-medium">
				<div class="small-10 small-offset-1 columns text-center">
					<header class="page-header">
						<p class="description">Recent case studies, white papers, webinars, visual resources, and published articles are listed below to illustrate our work with life science clients in regulatory affairs, quality assurance, compliance challenges, assessments and audits, agency response, preparation and remediation, mergers / acquisitions, strategic consulting, new product development, launch and lifecycles, and staffing support. Click on the title to read the full account.</p>
					</header><!-- .page-header -->
				</div>
			</div>

			<!-- TAXONOMIES MENU -->
			<?php #get_template_part('template-parts/taxonomy', 'menu'); ?>
			<!-- /TAXONOMIES MENU -->
			
			<div id="all-items-block" class="row" data-equalizer>
				
			<?php
				/* Start the Loop */
				while ( $view_all->have_posts() ) : $view_all->the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					echo '<div class="small-10 small-offset-1  medium-offset-0 medium-6 large-offset-0 large-3 columns end">';
					get_template_part( 'template-parts/content', 'archive-blocks' );
					echo '</div>';

				endwhile;
			?>
			<div class="row text-center">
				<div class="small-10 small-offset-1 columns pagination-col">
					<?php #get_previous_posts_link(); ?>
					
					<?php #rca_tax_post_pagination($view_all); ?>
					<?php the_posts_pagination( array( 'mid_size'  => 1, 'prev_text' => '<i class="fa fa-angle-left" aria-hidden="true"></i>', 'next_text' => '<i class="fa fa-angle-right" aria-hidden="true"></i>', 'total' => $view_all->max_num_pages ) ); ?>
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
			<div class="row a2a_kit a2a_kit_size_32 a2a_default_style text-center">
				<div class="small-2 columns text-center">
					<a class="a2a_button_facebook"><i class="fa fa-facebook-square fa-3x a2a_button_facebook" aria-hidden="true"></i></a>
				</div>
				<div class="small-2 columns text-center">
					<a class="a2a_button_linkedin"><i class="fa fa-linkedin-square fa-3x" aria-hidden="true"></i></a>
				</div>
				<div class="small-2 columns text-center">
					<a class="a2a_button_googleplusone"><i class="fa fa-google-plus-square fa-3x" aria-hidden="true"></i></a>
				</div>
				<div class="small-2 columns text-center">
					<a class="a2a_button_twitter"><i class="fa fa-twitter-square fa-3x" aria-hidden="true"></i></a>
				</div>
				<div class="small-2 columns text-center">
					<a class="a2a_button_email"><i class="fa fa-envelope fa-3x" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
	</div>
	<!-- /HIDDEN SHARE MENU -->

<script>

	$(document).ready(function() {
		var active = $('.navigation ul .active a img');
			active.attr('src', '<?php echo get_stylesheet_directory_uri() . '/images/RCA_MOBILE_HOMEPAGE_INDICATOR-SELECTED.jpg'; ?> ');
	});

</script>

	<!-- SHARE BUTTON CLICKS -->
	<script>
		$(document).ready(function() {
			var logo = $('#masthead > section.hide-for-large > div:nth-child(1)').height();
			var close = $('#share-menu .close');
			logo = Math.abs(logo);
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
