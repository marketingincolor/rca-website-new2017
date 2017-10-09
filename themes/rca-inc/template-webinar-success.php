<?php 
	/* Template Name: Webinar Success */
	get_header();
	global $post;
	var_dump($post);
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
			<div class="featured-img-title"><h1><?php the_field('page_title'); ?></h1></div>
	</div>
</div>
<!-- / Featured Image -->

<section class="webinar-success">

	<section class="webinar-success-top">
		<div class="row">
			<div class="small-10 small-centered columns">
				<!-- Video Embed -->
				<a href="#!" data-open="webinar-video-modal"><img src="<?php echo $video_img; ?>" alt="Watch Video" title="Watch Video"></a>
				<!-- Download Links -->
				<div class="download-links">
					<?php if(!empty(the_field('webinar_download_text')) && !empty(the_field('webinar_slides_download_link'))): ?>
						<a href="<?php the_field('webinar_slides_download_link'); ?>"><button class="orange-btn"><?php the_field('webinar_download_text'); ?></button></a>
					<?php endif; ?>
					<?php if(!empty(the_field('faq_download_text')) && !empty(the_field('faq_download_text'))): ?>
						<a href="<?php the_field('faqs_download_link'); ?>"><button class="orange-btn"><?php the_field('faq_download_text'); ?></button></a>
					<?php endif; ?>
				</div>
				<span class="share-widget">Share on Social Media<?php echo do_shortcode('[addtoany]'); ?></span>
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
