<?php 
	/* Template Name: Webinar Success */
	get_header();
	$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
	if ( have_posts() ) : while ( have_posts() ) : the_post();
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
				<a href="#!" data-open="webinar-video-modal"><img src="<?php the_field('video_img'); ?>" alt="Watch Video" title="Watch Video"></a>
				<!-- Download Links -->
				<div class="download-links">
					<a href="<?php the_field('webinar_slides_download_link'); ?>"><button class="orange-btn">Download Webinar Slides</button></a>
					<a href="<?php the_field('faqs_download_link'); ?>"><button class="orange-btn">Download FAQs</button></a>
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
