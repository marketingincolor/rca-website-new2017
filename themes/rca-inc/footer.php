<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RCA_Inc.
 */

?>

	</div>
	<footer id="colophon" class="site-footer">
		<div class="site-info container">
			<div class="row">

				<!-- MOBILE/TABLET FOOTER MENUS -->
				<div class="small-12 columns hide-for-large">
					<div class="small-5 small-offset-1 columns text-center">
					<?php 
						$options = get_option('rca_theme_options');
						if ( $options['rca_twitter_textbox'] != null || $options['rca_twitter_textbox'] != "") : ?>
								<div class="footer-social-link">
									<a href="<?php echo $options['rca_twitter_textbox']; ?>" title="RCA Inc. Twitter" target="_blank"><i class="fa fa-twitter footer-social-icon" aria-hidden="true"></i></a>
								</div>
						<?php endif; 
					?>
					<?php wp_nav_menu( array( 'theme_location' => 'rca_mobile_footer_menu_left' ) ); ?>
					</div>
					<div class="small-5 end columns text-center">
					<?php 
						$options = get_option('rca_theme_options');
						if ( $options['rca_linkedin_textbox'] != null || $options['rca_linkedin_textbox'] != "") : ?>
								<div class="footer-social-link">
									<a href="<?php echo $options['rca_linkedin_textbox']; ?>" title="RCA Inc. LinkedIn" target="_blank"><i class="fa fa-linkedin footer-social-icon" aria-hidden="true"></i></a>
								</div>
						<?php endif; 
					?>
					<?php wp_nav_menu( array( 'theme_location' => 'rca_mobile_footer_menu_right' ) ); ?>
					</div>
				</div>
			</div>
			<!-- END MOBILE/TABLET FOOTER MENUS -->

			<!-- DESKTOP FOOTER MENU -->
			<div class="row">
				<div class="small-10 small-offset-1 columns show-for-large text-center">
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
					<p class="copyright text-center">Copyright &copy;<?php echo date('Y'); ?> by Regulatory Compliance Associates&reg; Inc. All Rights Reserved. <br /> 10411 Corporate Drive, Suite 102, Pleasant Prairie, WI 53158 &bull; 262-288-6360<br>ISO 9001:2008 certified</p>
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
				$('.hamburger-menu').on('click', function() {
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
		<!-- Slick Sliders -->
		
		<!-- /Slick Sliders -->
<!-- 		<script>

			$(document).ready(function() {
				var post_count = $('.post_count');
				console.log(post_count.attr('value') );
				//console.log(Number(post_count).attr('value'));
				if(post_count.attr('value') < 5) {
					$('.next').hide();
				}
			});
		</script>
 -->
		<!-- Script for testing Orbit Main Slider -->
<!-- 		<script>
			$('.orbit').click();
		</script> -->
		<script>
			$(document).ready(function() {
				console.log('...............starting');
				var logo = $('#masthead > section.hide-for-large > div:nth-child(1)').height();
				var close = $('#share-menu .close');
				logo = Math.abs(logo);
				console.log( 'logoheight ' + logo);
				var shareButton = $('#share-block-cs');
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

		<!-- PAGINATION -->
		<script>
			$(document).ready(function() {
				console.log('footer');
				$('.next').hover(function() {
					$('.next i').toggleClass('white-font');
				});
				$('.prev').hover(function() {
					$('.prev i').toggleClass('white-font');
				});
			});
		</script>	

		<!-- /PAGINATION -->


		<script>
			// $(document).ready(function($) {
			// 	console.log('REDAY');
			// 	$('#menu-secondary-menu > a:nth-child(1) > div > span > img').on('hover', function() {
			// 		$('#menu-secondary-menu > a:nth-child(1) > div > span > img').attr('src', afp_vars.templateURL + '/images/reversed-icons/case-study.png');
			// 	});
			// });
		</script>

</html>
