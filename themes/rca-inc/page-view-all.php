<?php

/**
 * Purpose: For displaying all expertise items on a page.
 * Date: 10/24/2017
 * Author: AD.,NB.,ET., MARKETING IN COLOR
 */

global $post;
$backgroundImg = get_stylesheet_directory_uri() . '/images/feed-header.jpg';
$options = get_option('rca_theme_options');

get_header(); 

?>

	<!-- Featured Image -->
	<div id="featured-img-wrapper" class="row expanded">
		<div id="featured-img" style="background: linear-gradient(rgba(196,97,43, 0.7), rgba(196,97,43, 0.7)),
	            rgba(196,97,43,0.7) url('<?php echo $backgroundImg; ?>'); background-size: cover;">
				<div class="featured-img-title"><h1><?php echo the_title(); ?></h1></div>
		</div>
	</div>
	<!-- / Featured Image -->

	<!-- SELECT FOR SMALL -->
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
	<!-- /SELECT FOR SMALL -->

	<!-- SOCIAL BREADCRUMBS -->
<!-- 	<div class="row show-for-medium">
		<div class="small-10 small-offset-1 medium-6 medium-offset-0 columns text-center medium-text-left">
			<div id="breadcrumbs">
				<?php #if( function_exists('simple_breadcrumb') ) { simple_breadcrumb(); }?>
			</div>
		</div>
		<div class="small-12 medium-6 columns text-right show-for-medium">
			<div id="share" class="">
				<p>Share on Social Media</p>
				<?php #echo do_shortcode('[addtoany]'); ?>
			</div>
		</div>

	</div> -->
	<!-- /SOCIAL BREADCRUMBS -->

	<!-- SELECT BOX FOR MEDIUM -->
	<div id="mob-before-title-block" class="row hide-for-small show-for-medium hide-for-large" data-equalizer>
		<div id="mobile-cat-picker" class="small-offset-1 small-10 columns" data-equalizer-watch>
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
	<!-- SELECT BOX FOR MEDIUM -->

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
						<?php if ( $options['rca_va_area'] != null || $options['rca_va_area'] != "") : ?>
						<p class="description"><?php echo wp_specialchars_decode($options['rca_va_area']); ?></p>
						<?php endif; ?>
						<!-- <p class="description">Recent case studies, white papers, webinars, visual resources, and published articles are listed below to illustrate our work with life science clients in regulatory affairs, quality assurance, compliance challenges, assessments and audits, agency response, preparation and remediation, mergers / acquisitions, strategic consulting, new product development, launch and lifecycles, and staffing support. Click on the title to read the full account.</p> -->
					</header><!-- .page-header -->
				</div>
			</div>
			
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
			</div>

			<!-- PAGINATION -->
			<div class="row text-center">
				<div class="small-10 small-offset-1 columns pagination-col">					
					<?php the_posts_pagination( array( 'mid_size'  => 1, 'prev_text' => '<i class="fa fa-angle-left" aria-hidden="true"></i>', 'next_text' => '<i class="fa fa-angle-right" aria-hidden="true"></i>', 'total' => $view_all->max_num_pages ) ); ?>
				</div>
			</div>
			<?php endif; wp_reset_query(); ?>
			<!-- /PAGINATION -->

		</main><!-- #main -->
	</div><!-- #primary -->

	<!-- HIDDEN SHARE MENU -->
	<?php get_template_part('template-parts/hidden', 'share-menu'); ?>
	<!-- /HIDDEN SHARE MENU -->

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

	<!-- LEARN MORE -->
	<?php get_template_part('template-parts/section', 'learn-more-form-container-blue'); ?>
	<!-- /LEARN MORE -->

	<!-- NEWS -->
	<?php get_template_part('template-parts/section', 'news'); ?>
	<!-- /NEWS -->
	
<?php
get_footer();
