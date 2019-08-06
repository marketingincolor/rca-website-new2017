<?php

/**
 * Purpose: Displays all visual resources in grid format.
 * Date: 10/24/2017
 * Author: AD.,NB.,ET., MARKETING IN COLOR
 * Contains the closing of the #content div and all content after.
 */

global $post;
$backgroundImg = get_stylesheet_directory_uri() . '/images/feed-header.jpg';
$options = get_option('rca_theme_options');

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
	case('podcasts'):
		$img = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/Podcasts-Icon-Gray-01.svg';
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
				<div class="featured-img-title"><h1>Podcasts</h1></div>
		</div>
	</div>
	<!-- / Featured Image -->

	<div id="mob-before-title-block" class="row hide-for-medium" data-equalizer>
		<div id="mobile-cat-picker" class="small-offset-1 small-8 columns" data-equalizer-watch>
			<select name="mobile_category" id="" onchange="location.href=this.value">
				<option value="<?php echo site_url(); ?>/visual-resources" disabled selected>Visual Resources</option>
				<option value="<?php echo site_url(); ?>/webinars">Webinars</option></a>
				<option value="<?php echo site_url(); ?>/case-studies">Case Studies</option>
				<option value="<?php echo site_url(); ?>/white-papers">White Papers</option>
				<option value="<?php echo site_url(); ?>/published-articles">Published Articles</option>
				<option value="<?php echo site_url(); ?>/podcasts">Podcasts</option>
				<option value="<?php echo site_url(); ?>/view-all">View All</option>
			</select>
		</div>
		<div id="mobile-share-btn" class="small-2 end columns text-center" data-equalizer-watch>
			<i class="fa fa-share" aria-hidden="true"></i>
			<p>Share</p>
		</div>
	</div>

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

	<div id="mob-before-title-block" class="row hide-for-small show-for-medium hide-for-large" data-equalizer>
		<div id="mobile-cat-picker" class="small-offset-1 small-10 columns" data-equalizer-watch>
			<select name="mobile_category" id="" onchange="location.href=this.value">
				<option value="<?php echo site_url(); ?>/visual-resources" disabled selected>Visual Resources</option>
				<option value="<?php echo site_url(); ?>/webinars">Webinars</option></a>
				<option value="<?php echo site_url(); ?>/case-studies">Case Studies</option>
				<option value="<?php echo site_url(); ?>/white-papers">White Papers</option>
				<option value="<?php echo site_url(); ?>/published-articles">Published Articles</option>
				<option value="<?php echo site_url(); ?>/podcasts">Podcasts</option>
				<option value="<?php echo site_url(); ?>/view-all">View All</option>
			</select>
		</div>
	</div>
<?php get_template_part('template-parts/section', 'breadcrumbs-social'); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		$paged = get_query_var('paged') ? get_query_var('paged') : 1; 
		$args = array(
			'post_type' => 'podcasts',
			'posts_per_page' => 4,
			'paged' => $paged
		);

		$podcasts = new WP_Query($args);

		if ( $podcasts->have_posts() ) : ?>
			
			<div class="row">
				<div class="small-10 small-offset-1 columns text-center">
					<header class="page-header">
						<?php if ( $options['rca_vr_area'] != null || $options['rca_vr_area'] != "") : ?>
						<p class="description"><?php echo wp_specialchars_decode($options['rca_vr_area']); ?></p>
						<?php endif; ?>
							<!-- <p class="description">Visual Resources include handouts, posters, and correspondence that visually illustrate Regulatory Compliance Associates<sup>®</sup> Inc.’s expertise in a particular service.</p> -->
					</header><!-- .page-header -->
				</div>
			</div>

			<!-- TAXONOMIES MENU -->
			<?php #get_template_part('template-parts/taxonomy', 'menu'); ?>
			<!-- /TAXONOMIES MENU -->
			
			<div id="all-podcasts-block" class="row">
				
			<?php
				/* Start the Loop */
				while ( $podcasts->have_posts() ) : $podcasts->the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					echo '<div class="small-10 small-offset-1 xmedium-offset-0 xmedium-6 xlarge-offset-0 xlarge-3 columns end">';
					get_template_part( 'template-parts/content', 'podcasts' );
					echo '</div>';

				endwhile;
			?>
			</div>
			<div class="row text-center">
				<div class="small-10 small-offset-1 columns pagination-col">
					<?php #get_previous_posts_link(); ?>
					
					<?php //rca_tax_post_pagination(); ?>
					<?php the_posts_pagination( array( 'mid_size'  => 1, 'prev_text' => '<i class="fa fa-angle-left" aria-hidden="true"></i>', 'next_text' => '<i class="fa fa-angle-right" aria-hidden="true"></i>', 'total' => $podcasts->max_num_pages ) ); ?>
				</div>
			</div>
			<?php
				endif; 
				wp_reset_query();
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<div id="related-content-block-outer" class="directory-links row">
		<div class="row">
			<div class="small-12 columns text-center">
				<h4 style="margin:auto; position:relative; width:fit-content; background-color:#FFF; z-index:10;">&nbsp;Subscribe at your Favorite Podcast Directory!&nbsp;</h4>
			</div>
		</div>
		<div class="row" data-equalizer="jtaqay-equalizer" data-resize="2vg46n-eq" data-mutate="vgzgpo-eq">

			<div id="related-content-block-full" class="small-10 small-offset-1 columns" style="position:relative; top:-15px;">
				<div class="row small-up-2 medium-up-6" style="padding:1.5em;">
					<div class="column column-block" data-equalizer-watch="" style="height: 106px;">
						<a href="https://podcasts.apple.com/us/podcast/rca-radio/id1466890099" class="swapper" target="_blank" style="padding:1em 0em; display:inline-block;"><img src="<?php echo get_stylesheet_directory_uri();?>/images/rca-podcast-directory-icon-apple-down.png" alt=""><img src="<?php echo get_stylesheet_directory_uri();?>/images/rca-podcast-directory-icon-apple-hover.png" alt=""></a>
					</div>
					<div class="column column-block" data-equalizer-watch="" style="height: 106px;">
						<a href="https://tunein.com/podcasts/Business--Economics-Podcasts/RCA-Radio-p1227513/?topicId=131549736" class="swapper" target="_blank" style="padding:1em 0em; display:inline-block;"><img src="<?php echo get_stylesheet_directory_uri();?>/images/rca-podcast-directory-icon-tunein-down.png" alt=""><img src="<?php echo get_stylesheet_directory_uri();?>/images/rca-podcast-directory-icon-tunein-hover.png" alt=""></a>
					</div>
					<div class="column column-block" data-equalizer-watch="" style="height: 106px;">
						<a href="https://playmusic.app.goo.gl/?ibi=com.google.PlayMusic&amp;isi=691797987&amp;ius=googleplaymusic&amp;apn=com.google.android.music&amp;link=https://play.google.com/music/m/Ir72i37z4szzw7sy3t7ed2rqotu?t%3DRCA_Radio%26pcampaignid%3DMKT-na-all-co-pr-mu-pod-16" class="swapper" target="_blank" style="padding:1em 0em; display:inline-block;"><img src="<?php echo get_stylesheet_directory_uri();?>/images/rca-podcast-directory-icon-google-down.png" alt=""><img src="<?php echo get_stylesheet_directory_uri();?>/images/rca-podcast-directory-icon-google-hover.png" alt=""></a>
					</div>
					<div class="column column-block" data-equalizer-watch="" style="height: 106px;">
						<a href="https://www.stitcher.com/s?fid=419666&amp;refid=stpr" class="swapper" target="_blank" style="padding:1em 0em; display:inline-block;"><img src="<?php echo get_stylesheet_directory_uri();?>/images/rca-podcast-directory-icon-stitcher-down.png" alt=""><img src="<?php echo get_stylesheet_directory_uri();?>/images/rca-podcast-directory-icon-stitcher-hover.png" alt=""></a>
					</div>
					<div class="column column-block" data-equalizer-watch="" style="height: 106px;">
						<a href="https://soundcloud.com/rcaradio" class="swapper" target="_blank" style="padding:1em 0em; display:inline-block;"><img src="<?php echo get_stylesheet_directory_uri();?>/images/rca-podcast-directory-icon-soundcloud-down.png" alt=""><img src="<?php echo get_stylesheet_directory_uri();?>/images/rca-podcast-directory-icon-soundcloud-hover.png" alt=""></a>
					</div>
					<div class="column column-block" data-equalizer-watch="" style="height: 106px;">
						<a href="https://open.spotify.com/show/7ihX8MFaMXE3pCjp3hE2G9" class="swapper" target="_blank"><img src="<?php echo get_stylesheet_directory_uri();?>/images/rca-podcast-directory-icon-spotify-down.png" alt=""><img src="<?php echo get_stylesheet_directory_uri();?>/images/rca-podcast-directory-icon-spotify-hover.png" alt=""></a>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- LEARN MORE -->
	<?php get_template_part('template-parts/section', 'learn-more-form-container-blue'); ?>
	<!-- /LEARN MORE -->

	<!-- NEWS -->
	<?php get_template_part('template-parts/section', 'news'); ?>
	<!-- /NEWS -->
<script>

	$(document).ready(function() {
		var active = $('.navigation ul .active a img');
			active.attr('src', '<?php echo get_stylesheet_directory_uri() . '/images/RCA_MOBILE_HOMEPAGE_INDICATOR-SELECTED.jpg'; ?> ');
	});

</script>
	
<?php
get_footer();
