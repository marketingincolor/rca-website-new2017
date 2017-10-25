<?php
/**
 * Purpose: Displays a single gated webinar page.
 * Date: 10/24/2017
 * Author: AD.,NB.,ET., MARKETING IN COLOR
 */

global $post;

$youtube_embed_url = get_field('youtube_embed_url');
$video_img = get_stylesheet_directory_uri() . '/images/webinar-coming-soon.jpg';
$pop = get_field('pre_or_post');
$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
$video_img = the_field('video_img');

// Displays pre webinar layout
if($pop == 'pre') {
	get_template_part('template-parts/webinars/pre', 'webinar');
}

// Displays post webinar layout
elseif($pop == 'post'){
	get_template_part('template-parts/webinars/post', 'webinar');
}

// Displays gated webinar
else {

get_header();
get_template_part('template-parts/section', 'takeover-modal');

if ( have_posts() ) : while ( have_posts() ) : the_post();

// If we don't have a video display coming soon screen. 
if(empty($video_img)) {
	$video_img = get_stylesheet_directory_uri() . '/images/webinar-coming-soon.jpg';
}
?>

	<!-- Featured Image -->
	<div id="featured-img-wrapper" class="row expanded">
		<div id="featured-img" style="background: linear-gradient(rgba(196,97,43, 0.7), rgba(196,97,43, 0.7)),
	            rgba(196,97,43,0.7) url('<?php echo $backgroundImg[0]; ?>'); background-size: cover;">
				<div class="featured-img-title"><h1><?php the_title(); ?></h1></div>
		</div>
	</div>
	<!-- / Featured Image -->

	<section class="webinar-success">

		<section class="webinar-success-top">
			<div class="row">
				<div class="small-10 small-centered columns">

					<!-- VIDEO EMBED -->

					<!-- IF WE HAVE AN EMBED CODE -->
					<?php if(!empty(get_field('youtube_embed_url'))) { ?>
					<div class="videoWrapper">
						<a href="#!" data-open="webinar-video-modal"><iframe width="1000" height="562.5" src="<?php the_field('youtube_embed_url'); ?>" frameborder="0" allowfullscreen></iframe></a>
						
					</div>
					
					<!-- MISSING EMBED CODE -->
					<?php } else { ?>
					<img src="<?php echo $video_img; ?>" />

					<?php } ?>
					<!-- /VIDEO EMBED -->
					

					<div class="row">
						<div class="small-12 medium-6 columns">
							<!-- DOWNLOAD LINKS -->
							<div class="download-links">
								<?php if(!empty(get_field('webinar_download_text')) && !empty(get_field('webinar_slides_download_link')) ): ?>
									<a href="<?php the_field('webinar_slides_download_link'); ?>" target="_blank"><button class="orange-btn width-auto"><?php the_field('webinar_download_text'); ?></button></a>
								<?php endif; ?>

								<?php if(!empty(get_field('faqs_download_link')) && !empty(get_field('faq_download_text')) ): ?>
									<a href="<?php the_field('faqs_download_link'); ?>" target="_blank"><button class="orange-btn width-auto"><?php the_field('faq_download_text'); ?></button></a>
								<?php endif; ?>
							</div>
							<!-- /DOWNLOAD LINKS -->
						</div>
						<div id="webinar-share-btns" class="small-12 medium-6 columns">
							<span class="share-widget text-center medium-text-right"><p id="share-p" style="margin-right: 16px; display: inline-block;">Share on Social Media </p><?php echo do_shortcode('[addtoany]'); ?></span>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="webinar-success-bottom">
			<div class="row">
				<div class="small-10 small-centered columns">
					<article><?php the_content(); ?></article>
				</div>
			</div>
		</section>

	</section>

	<?php endwhile;endif; ?>
	<?php get_template_part('template-parts/section', 'learn-more-cta'); ?>
	<?php get_footer(); ?>

<?php } ?>