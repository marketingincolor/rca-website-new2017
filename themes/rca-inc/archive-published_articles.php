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

switch($post_type) {
	case('case_studies'):
		$img = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/Case-Studies-Icon-Gray-01.svg';
	break;
	case('published_articles'):
		$img = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/Published-Articles-Icon-Gray-01.svg';
	break;
	case('webinars'):
		$img = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/Webinar-Icon-Gray-01.svg';
	break;
	case('white_papers'):
		$img = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/White-Papers-Icon-Gray-01.svg';
	break;
	case('visual_resources'):
		$img = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/Visual-Resources-Icon-Gray-01.svg';
	break;
	default:
		$img = '#';
	break;
}

get_header(); ?>

	<!-- Featured Image -->
	<div id="featured-img-wrapper" class="row expanded">
		<div id="featured-img" style="background: linear-gradient(rgba(196,97,43, 0.7), rgba(196,97,43, 0.7)),
	            rgba(196,97,43,0.7) url('<?php echo $backgroundImg; ?>'); background-size: cover;">
				<div class="featured-img-title"><h1>Published Articles</h1></div>
		</div>
	</div>
	<!-- / Featured Image -->

	<div id="mob-before-title-block" class="row hide-for-medium" data-equalizer>
		<div id="mobile-cat-picker" class="small-offset-1 small-8 columns" data-equalizer-watch>
			<select name="mobile_category" id="" onchange="location.href=this.value">
				<option value="<?php echo site_url(); ?>/published-articles" disabled selected>Published Articles</option>
				<option value="<?php echo site_url(); ?>/webinars">Webinars</option></a>
				<option value="<?php echo site_url(); ?>/case-studies">Case Studies</option>
				<option value="<?php echo site_url(); ?>/white-papers">White Papers</option>
				<option value="<?php echo site_url(); ?>/visual-resources">Visual Resources</option>
				<option value="<?php echo site_url(); ?>/view-all">View All</option>
			</select>
		</div>
		<div id="mobile-share-btn" class="small-2 end columns text-center" data-equalizer-watch>
			<i class="fa fa-share" aria-hidden="true"></i>
			<p>Share</p>
		</div>
	</div>

	<!-- SOCIAL BREADCRUMBS -->
	<div class="row show-for-medium">
		<div class="small-10 small-offset-1 medium-6 medium-offset-0 columns text-center medium-text-left">
			<div id="breadcrumbs">
					<?php if($termName != 'Webinars'): ?>
						<?php if( function_exists('simple_breadcrumb') ) { simple_breadcrumb(); }?>
					<?php endif; ?>
			</div>
		</div>
		<div class="small-12 medium-6 columns text-right show-for-medium">
			<div id="share" class="">
				<p>Share on Social Media</p>
				<?php echo do_shortcode('[addtoany]'); ?>
			</div>
		</div>

	</div>
	<!-- /SOCIAL BREADCRUMBS -->

	<div id="mob-before-title-block" class="row hide-for-small show-for-medium hide-for-large" data-equalizer>
		<div id="mobile-cat-picker" class="small-offset-1 small-10 columns" data-equalizer-watch>
			<select name="mobile_category" id="" onchange="location.href=this.value">
				<option value="<?php echo site_url(); ?>/published-articles" disabled selected>Published Articles</option>
				<option value="<?php echo site_url(); ?>/case-studies">Case Studies</option>
				<option value="<?php echo site_url(); ?>/webinars">Webinars</option></a>
				<option value="<?php echo site_url(); ?>/white-papers">White Papers</option>
				<option value="<?php echo site_url(); ?>/visual-resources">Visual Resources</option>
				<option value="<?php echo site_url(); ?>/view-all">View All</option>
			</select>
		</div>
	</div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		$paged = get_query_var('paged') ? get_query_var('paged') : 1; 
		$args = array(
			'post_type' => 'published_articles',
			'posts_per_page' => 8,
			'paged' => $paged
		);

		$published_articles = new WP_Query($args);

		if ( $published_articles->have_posts() ) : ?>
			
			<div class="row">
				<div class="small-10 small-offset-1 columns text-center">
					<header class="page-header">
							<p class="description">Published articles are written by Regulatory Compliance Associates<sup>®</sup> Inc. experts on industry-related subjects, and published in relevant life science digital and/or print media.</p>
					</header><!-- .page-header -->
				</div>
			</div>

			<!-- TAXONOMIES MENU -->
			<?php #get_template_part('template-parts/taxonomy', 'menu'); ?>
			<!-- /TAXONOMIES MENU -->
			
			<!-- ARCHIVE BLOCK -->
			<div id="all-items-block" class="row">
				
				<?php
					/* Start the Loop */
					while ( $published_articles->have_posts() ) : $published_articles->the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						echo '<div class="small-10 small-offset-1 medium-offset-0 medium-6 large-offset-0 large-3 columns end">';
						get_template_part( 'template-parts/content', 'archive-blocks' );
						echo '</div>';

					endwhile;
				?>
			</div>
			<!-- /ARCHIVE BLOCK -->

			<!-- PAGINATION -->
			<div class="row text-center">
				<div class="small-10 small-offset-1 columns pagination-col">
					<?php #get_previous_posts_link(); ?>
					
					<?php //rca_tax_post_pagination(); ?>
					<?php the_posts_pagination( array( 'mid_size'  => 1, 'prev_text' => '<i class="fa fa-angle-left" aria-hidden="true"></i>', 'next_text' => '<i class="fa fa-angle-right" aria-hidden="true"></i>', 'total' => $published_articles->max_num_pages ) ); ?>
				</div>
			</div>
			<!-- /PAGINATION -->

			<?php
				endif; 
				wp_reset_query();
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<script>

	$(document).ready(function() {
		var active = $('.navigation ul .active a img');
			active.attr('src', '<?php echo get_stylesheet_directory_uri() . '/images/RCA_MOBILE_HOMEPAGE_INDICATOR-SELECTED.jpg'; ?> ');
	});

</script>

<?php
get_footer();
