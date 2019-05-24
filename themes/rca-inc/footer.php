<?php

/**
 * Purpose: Template file for displaying the footer
 * Date: 10/24/2017
 * Author: AD.,NB.,ET., MARKETING IN COLOR
 * Contains the closing of the #content div and all content after.
 */
global $lander;
?>

	</div>
	<footer id="<?php echo ( is_page_template( 'page-lander-success-template.php' ) ? 'nocolophon' : 'colophon' ) ; ?>" class="site-footer">
		<div class="site-info container">
			<div class="row">

				<!-- MOBILE/TABLET FOOTER MENUS -->
				<div class="small-12 columns hide-for-large">

					<?php if (!$lander) : ?>
					<div class="small-10 small-offset-1 columns text-center">
					<?php 
						$options = get_option('rca_theme_options');
						if ( $options['rca_twitter_textbox'] != null || $options['rca_twitter_textbox'] != "") : ?>
								<div class="footer-social-link">
									<a href="<?php echo $options['rca_twitter_textbox']; ?>" title="RCA Inc. Twitter" target="_blank"><i class="fa fa-twitter footer-social-icon" aria-hidden="true"></i></a>
								</div>
						<?php endif; 
					?>
					<?php 
						$options = get_option('rca_theme_options');
						if ( $options['rca_linkedin_textbox'] != null || $options['rca_linkedin_textbox'] != "") : ?>
								<div class="footer-social-link">
									<a href="<?php echo $options['rca_linkedin_textbox']; ?>" title="RCA Inc. LinkedIn" target="_blank"><i class="fa fa-linkedin footer-social-icon" aria-hidden="true"></i></a>
								</div>
						<?php endif; 
					?>
					<?php 
						$options = get_option('rca_theme_options');
						if ( $options['rca_fb_textbox'] != null || $options['rca_fb_textbox'] != "") : ?>
								<div class="footer-social-link">
									<a href="<?php echo $options['rca_facebook_textbox']; ?>" title="RCA Inc. Facebook" target="_blank"><i class="fa fa-facebook footer-social-icon" aria-hidden="true" style="min-width:34px;"></i></a>
								</div>
						<?php endif; 
					?>
					</div>
					<div class="small-5 small-offset-1 columns text-center">
					<?php wp_nav_menu( array( 'theme_location' => 'rca_mobile_footer_menu_left' ) ); ?>
					</div>
					<div class="small-5 end columns text-center">
					<?php wp_nav_menu( array( 'theme_location' => 'rca_mobile_footer_menu_right' ) ); ?>
					</div><br /><br />
					<?php endif; ?>

					<p class="copyright text-center" style="padding-top:10px; display:inline-block; width:100%;">Copyright &copy;<?php echo date('Y'); ?> by Regulatory Compliance Associates&reg; Inc.<br /> All Rights Reserved. <br /> 10411 Corporate Drive, Suite 102<br>Pleasant Prairie, WI 53158 <br /> <?php echo $options['rca_phone_number']; ?><br><a href="https://www.rcainc.com/wp-content/uploads/2018/05/RCA-ISO-Certificate.pdf" target="_blank" style="font-weight: normal;">ISO 9001 Certified</a></p>
				</div>

			</div>
			<!-- END MOBILE/TABLET FOOTER MENUS -->

			<!-- DESKTOP FOOTER MENU -->
			<div class="row">
				<div class="small-10 small-offset-1 columns show-for-large text-center">

					<?php if (!$lander) : ?>
					<?php wp_nav_menu( array( 'theme_location' => 'rca_desktop_footer_menu' ) ); ?>
					<?php 
						$options = get_option('rca_theme_options');
						if ( $options['rca_twitter_textbox'] != null || $options['rca_twitter_textbox'] != "") : ?>
								<div class="footer-social-link">
									<a href="<?php echo $options['rca_twitter_textbox']; ?>" title="RCA Inc. Twitter" target="_blank"><i class="fa fa-twitter footer-social-icon" aria-hidden="true"></i></a>
								</div>
						<?php endif; 
					?>
					<?php 
						$options = get_option('rca_theme_options');
						if ( $options['rca_linkedin_textbox'] != null || $options['rca_linkedin_textbox'] != "") : ?>
								<div class="footer-social-link">
									<a href="<?php echo $options['rca_linkedin_textbox']; ?>" title="RCA Inc. LinkedIn" target="_blank"><i class="fa fa-linkedin footer-social-icon" aria-hidden="true"></i></a>
								</div>
						<?php endif; 
					?>
					<?php 
						$options = get_option('rca_theme_options');
						if ( $options['rca_fb_textbox'] != null || $options['rca_fb_textbox'] != "") : ?>
								<div class="footer-social-link">
									<a href="<?php echo $options['rca_fb_textbox']; ?>" title="RCA Inc. Facebook" target="_blank"><i class="fa fa-facebook footer-social-icon" aria-hidden="true" style="min-width:34px;"></i></a>
								</div>
						<?php endif; 
					?>
					<?php endif; ?>

					<p class="copyright text-center">Copyright &copy;<?php echo date('Y'); ?> by Regulatory Compliance Associates&reg; Inc. All Rights Reserved. <br /> 10411 Corporate Drive, Suite 102, Pleasant Prairie, WI 53158 &bull; <?php echo $options['rca_phone_number']; ?><br><a href="https://www.rcainc.com/wp-content/uploads/2018/05/RCA-ISO-Certificate.pdf" target="_blank" style="font-weight: normal;">ISO 9001 Certified</a></p>
				</div>
			</div>
			<!-- /DESKTOP FOOTER MENU -->


		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

		<!-- For Navigation -->
		<script>
			(function () {
				$('#menu-section').on('click', function() {
					$('.bar').toggleClass('animate');
				})
			})();
		</script>
		

		<!-- For Toggling Mobile Clicks Colors on Menus -->
		<script>
			jQuery(document).ready(function($) {
				$('.is-accordion-submenu-parent').on('click', function() {
					$(this).children("a:first-of-type").toggleClass('orange-bg');
					$(this).children("a").toggleClass('white-font');
				}),
				function(){
					$(this).children("a").toggleClass('orange-bg');
				};
			});
		</script>

		<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() . '/js/mobile-nav.js'; ?>"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.2/js/foundation.js"></script>


		<script>
			$(document).ready(function() {
				//console.log('...............starting');
				var logo = $('#masthead > section.hide-for-large > div:nth-child(1)').height();
				var close = $('#share-menu .close');
				logo = Math.abs(logo);
				var shareButton = $('.share-block');
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

				<script>
			$(document).ready(function() {
				//console.log('...............starting');
				var logo = $('#masthead > section.hide-for-large > div:nth-child(1)').height();
				var close = $('#share-menu .close');
				logo = Math.abs(logo);
				var shareButton = $('#share-block');
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

		<!-- Include Foundation -->
		<script>
			jQuery(function() {
			  jQuery(document).foundation();
			});
		</script>
		
		<script>

			$(document).ready(function() {
				var active = $('.navigation ul .active a img');
					active.attr("src", "<?php echo get_stylesheet_directory_uri();?>/images/RCA_MOBILE_HOMEPAGE_INDICATOR-Selected.jpg");
			});

		</script>

		<!-- STICKY FOOTER -->
		<script>
		 $(window).bind("load", function () {
		    var footer = $("#colophon");
		    var pos = footer.position();
		    var height = $(window).height();
		    height = height - pos.top;
		    height = height - footer.height();
		    if (height > 0) {
		        footer.css({
		            'margin-top': height + 'px'
		        });
		    }
		});
		</script>
		<!-- /STICKY FOOTER -->

		<!-- HEADER -->
		<script>
		    $(document).ready(function() {
		        var $header = $(".top-menu"),
		            $clone = $header.before($header.clone().addClass("clone"));
		        
		        $(window).on("scroll", function() {
		            var fromTop = $(window).scrollTop();
		            $("body").toggleClass("down", (fromTop > 400));
		        });
		    });
		</script>
		<!-- /HEADER -->

		<!-- PAGINATION CHANGES ARROW COLORS -->
		<script>
			$(document).ready(function() {
				//console.log('footer');
				$('.next').hover(function() {
					$('.next i').toggleClass('white-font');
				});
				$('.prev').hover(function() {
					$('.prev i').toggleClass('white-font');
				});
			});
		</script>	
		<!-- /PAGINATION CHANGES ARROW COLORS-->

		<!-- Preserve Aspect Ratios -->
		<script>
			// Find all YouTube videos
			var $allVideos = $("iframe[src^='//www.youtube.com']"),

			    // The element that is fluid width
			    $fluidEl = $("body");

			// Figure out and save aspect ratio for each video
			$allVideos.each(function() {

			  $(this)
			    .data('aspectRatio', this.height / this.width)

			    // and remove the hard coded width/height
			    .removeAttr('height')
			    .removeAttr('width');

			});

			// When the window is resized
			$(window).resize(function() {

			  var newWidth = $fluidEl.width();

			  // Resize all videos according to their own aspect ratio
			  $allVideos.each(function() {

			    var $el = $(this);
			    $el
			      .width(newWidth)
			      .height(newWidth * $el.data('aspectRatio'));

			  });

			// Kick off one resize to fix all videos on page load
			}).resize();
		</script>
		
		<script>
			$(document).ready(function() {
				
				var urlParams = new URLSearchParams(window.location.search);
				function getUrlParameter(name) {
				    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
				    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
				    var results = regex.exec(location.search);
				    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
				};

				var cat = getUrlParameter("cat");

			});

		</script>

</html>
