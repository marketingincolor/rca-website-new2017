<?php
/**
 * Purpose: Displays suggest topic form section.
 * Date: 10/29/2019
 * Author: ET. MARKETING IN COLOR
 */

?>	

<?php if (is_single('offline')) : ?>
	<div class="hide-for-medium" style="width:100%;display: block;margin-bottom: 4em;"><hr style=" width: 80%; margin: auto; height: 2px; "></div>
	<div id="related-content-block-outer" class="row">
		<div class="row">
			<div class="small-12 columns text-center">
				<h4>Suggest A Topic</h4>
			</div>
		</div>
		<div class="row" data-equalizer>
			<div id="related-content-block" class="small-10 small-offset-1 medium-6 medium-offset-3 columns">
				<div class="row">

				<div class="small-12 medium-8 medium-offset-2 columns random-item" data-equalizer-watch>
					<img src="<?php echo get_stylesheet_directory_uri() . '/images/icons/suggest-topic-icon.png'; ?>" alt="">
					<p>Have a suggestion or idea for a Podcast topic that you'd like to listen to? <a href="<?php echo site_url(); ?>/suggest-a-topic">Submit It!</a></p>
				</div>

				</div>
			</div>
		</div>
	</div>
<?php endif; ?>

<section id="learn-more-cta">
	<div class="row">
		<div class="small-10 small-centered columns text-center">
			<h3>Suggest A Topic</h3>
			<p style="font-size:18px; color:#fff; padding-bottom:1.5em; margin-bottom:1em;">Have a suggestion or idea for a Podcast topic that you'd like to listen to?</p>
			<a href="<?php echo site_url(); ?>/suggest-a-topic" class="white-btn">Submit It!</a>
		</div>
	</div>
</section>
