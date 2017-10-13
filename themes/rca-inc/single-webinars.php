<?php
global $post;

$youtube_embed_url = get_field('youtube_embed_url');
$video_img = get_stylesheet_directory_uri() . '/images/webinar-coming-soon.jpg';


// Check for embed.
// if(empty($youtube_embed_url)):
// 	$youtube_embed_url = get_stylesheet_directory_uri() . '/images/webinar-coming-soon.jpg';
// endif;

$pop = get_field('pre_or_post');

if($pop == 'pre') {
	get_template_part('template-parts/webinars/pre', 'webinar');
}
elseif($pop == 'post'){
	get_template_part('template-parts/webinars/post', 'webinar');
}
else {

	/* Template Name: Webinar Success */
	get_header();
	get_template_part('template-parts/section', 'takeover-modal');
	$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
	if ( have_posts() ) : while ( have_posts() ) : the_post();
	$video_img = the_field('video_img');
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
					<a href="#!" data-open="webinar-video-modal"><iframe width="1000" height="562.5" src="<?php the_field('youtube_embed_url'); ?>" frameborder="0" allowfullscreen></iframe></a>
					
					<!-- MISSING EMBED CODE -->
					<?php } else { ?>
					<img src="<?php echo $video_img; ?>" />

					<?php } ?>
					<!-- /VIDEO EMBED -->
					
					<!-- DOWNLOAD LINKS -->
					<div class="download-links">
						<?php if(!empty(get_field('webinar_download_text')) && !empty(get_field('webinar_slides_download_link')) ): ?>
							<a href="<?php the_field('webinar_slides_download_link'); ?>"><button class="orange-btn width-auto"><?php the_field('webinar_download_text'); ?></button></a>
						<?php endif; ?>

						<?php if(!empty(get_field('faqs_download_link')) && !empty(get_field('faq_download_text')) ): ?>
							<a href="<?php the_field('faqs_download_link'); ?>" target="_blank"><button class="orange-btn width-auto"><?php the_field('faq_download_text'); ?></button></a>
						<?php endif; ?>
					</div>
					<!-- /DOWNLOAD LINKS -->

					<span class="share-widget"><p id="share-p" style="margin-right: 16px; display: inline-block;">Share on Social Media </p><?php echo do_shortcode('[addtoany]'); ?></span>
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

	<?php endwhile;endif;get_footer(); ?>

	<!-- Video Modal -->
	<div class="reveal" id="webinar-video-modal" data-reveal data-reset-on-close="true">
		<iframe src="<?php the_field('youtube_embed_url'); ?>" allowfullscreen></iframe>
	  <button class="close-button" data-close aria-label="Close modal" type="button">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
<?php } ?>