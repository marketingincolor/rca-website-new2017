<?php

/**
 * Purpose: Template part for displaying page content in page.php
 * Date: 10/24/2017
 * Author: AD.,NB.,ET., MARKETING IN COLOR
 */
get_header();
$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );

?>

<!-- Featured Image -->
<div id="featured-img-wrapper" class="row expanded">
	<div id="featured-img" style="background: linear-gradient(rgba(196,97,43, 0.7), rgba(196,97,43, 0.7)),
            rgba(196,97,43,0.7) url('<?php echo $backgroundImg[0]; ?>'); background-size: cover;">
			<div class="featured-img-title"><h1><?php the_title(); ?></h1></div>
	</div>
</div>
<!-- / Featured Image -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<!-- SHARE -->
	<?php if(!is_page('privacy-policy') ): ?>
	<div class="row hide-for-medium">
		<div class="small-10 small-offset-1">
			<button id="share-btn" style="margin-top: .5rem;">Share</button>
		</div>
	</div>
	<?php endif; ?>
	<!-- /SHARE -->

	<div class="row">
		<div class="small-10 small-offset-1 columns">
			<div class="entry-content">
				<?php

					the_content();
					echo do_shortcode( '[taleo]' ); 
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rca-inc' ),
						'after'  => '</div>',
					) );
			
				?>
			</div><!-- .entry-content -->
		</div>
	</div>

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

	<!-- For Custom Share Buttons -->
	<script async src="https://static.addtoany.com/menu/page.js"></script>
	<!-- SHARE BUTTON CLICKS -->
	<script>
		$(document).ready(function() {
			var logo = $('#masthead > section.hide-for-large > div.hide-for-large').height();
			var close = $('#share-menu .close');
			logo = Math.abs(logo);
			var shareButton = $('#share-btn');
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
</article><!-- #post-<?php the_ID(); ?> -->

<?php get_footer();
