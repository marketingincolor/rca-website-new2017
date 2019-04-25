<?php
/********************************
 * RCA INC.
 * BUILT BY MARKETING IN COLOR.
 ********************************/
global $lander; ?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- GOOGLE FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Lora:400,700,700i|Roboto" rel="stylesheet">

		<!-- FOUNDATION INCLUDE -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/foundation/6.2.1/foundation.min.css">

		<!-- FONT AWESOME INCLUDE -->
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<link rel="profile" href="http://gmpg.org/xfn/11">

		<!-- JQUERY INCLUDE -->
		<script
		  src="https://code.jquery.com/jquery-3.2.1.min.js"
		  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
		  crossorigin="anonymous">
		</script>
		<!-- /JQUERY INCLUDE -->

		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-PK6DK6');</script>
		<!-- End Google Tag Manager -->
		
		<!-- SS Site Tracking -->
		<script type="text/javascript">

		  // SS TRACKING CODE FOR PRODUCTION ONLY
			var _ss = _ss || [];
			_ss.push(['_setDomain', 'https://koi-3QMGUWHS20.marketingautomation.services/net']);
			_ss.push(['_setAccount', 'KOI-3QYOJMP1ZC']);
			_ss.push(['_trackPageView']);
			(function() {
			    var ss = document.createElement('script');
			    ss.type = 'text/javascript'; ss.async = true;

			    ss.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'koi-3QMGUWHS20.marketingautomation.services/client/ss.js?ver=1.1.1';
			    var scr = document.getElementsByTagName('script')[0];
			    scr.parentNode.insertBefore(ss, scr);
			})();

			// SS TRACKING CODE FOR DEV ONLY
			// var _ss = _ss || [];
			// _ss.push(['_setDomain', 'https://koi-3QMGUWHS20.marketingautomation.services/net']);
			// _ss.push(['_setAccount', 'KOI-3V2M10JN7S']);
			// _ss.push(['_trackPageView']);
			// (function() {
			//     var ss = document.createElement('script');
			//     ss.type = 'text/javascript'; ss.async = true;

			//     ss.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'koi-3QMGUWHS20.marketingautomation.services/client/ss.js?ver=1.1.1';
			//     var scr = document.getElementsByTagName('script')[0];
			//     scr.parentNode.insertBefore(ss, scr);
			// })();
		</script>

		<!-- WP HEADER -->
		<?php wp_head(); ?>

	</head>

	<!-- BODY -->
	<body <?php body_class(); ?>>

		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PK6DK6"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->

		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'rca-inc' ); ?></a>

			<header id="masthead" class="site-header">

				<!-- ENTIRE HEADER ON DESKTOP -->
				<section id="entire-header" class="show-for-large">

					<!-- LOGO -->
					<div class="row expanded">
						<div class="site-branding small-12 columns align-items-center text-center">
							<?php #the_custom_logo(); ?>
							<a href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri() . '/images/rca-header-logo-svg.svg'; ?>" style="display:block; margin: 0 auto;"/></a>
						</div>
					</div>
					<!-- /LOGO -->

					<?php if (!$lander) : ?>
					<!-- PRIMARY MENU -->
					<div class="top-menu">
						<div class="row">

							<div class="small-12 columns relative">
								<?php echo do_shortcode( '[maxmegamenu location=menu-1]' ); ?>
								<a href="<?php echo home_url('/contact/');?>">
									<div id="contact-header-btn" class="">
										<li class="contact-menu-item columns" style="float:right;"><i class="fa fa-paper-plane contact-header-icon" aria-hidden="true"></i> Contact</li>
									</div>
								</a>
							</div>

						</div>
					</div>
					<!-- /PRIMARY MENU -->

					<!-- SECONDARY NAV ON DESKTOP -->
					<div id="secondary-menu">
						<div  class="row show-for-large">
							<div class="large-12 columns" style="background-color: #9d938a; padding: 1.375rem 1rem;">
								<div class="row">
									<div class="small-8 columns">
										<?php
										    wp_nav_menu($args = array(
													'menu' => 'Secondary Menu',
													'walker' => new RCA_SECONDARY_WALKER()
											 	)
											);
										?>
									</div>
									<div class="small-4 columns">
										<?php get_search_form(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /SECONDARY NAV ON DESKTOP -->
					<?php endif; ?>

				</section>
				<!-- ENTIRE HEADER ON DESKTOP -->

				<!-- MOBILE NAV -->
				<section id="" class="hide-for-large">

					<div class="row expanded hide-for-large">
						<div class="site-branding small-12 columns align-items-center text-center">
							<?php the_custom_logo(); ?>
						</div>
					</div>
				<?php if (!$lander) : ?>
					<!-- CONTACT ON MOBILE BUTTON -->
					<div id="mobile-top-bar" class="row expanded title-bar hide-for-large" data-equalizer>
						<div class="small-6 columns text-center" data-equalizer-watch style="padding: 1rem 0rem;">
							<a href="<?php echo home_url('/contact/');?>"><p class="mobile-divider" style="margin-bottom:0rem;"><i class="fa fa-paper-plane" aria-hidden="true"></i> Contact</p></a>
						</div>
						<div id="menu-section" class="small-6 columns relative end" data-equalizer-watch style="">
							<div class="horizontal-center" data-responsive-toggle="the-menu" data-hide-for="large" style="top:50%; transform: translate(-50%,-425%); line-height: 1rem;">
								<div class="hamburger-menu no-js" type="button" data-toggle><div class="bar"></div></div>
							</div>
						</div>
					</div>
					<!-- CONTACT ON MOBILE -->

					<!-- MOBILE MENU -->

					<div id="top-nav-wrapper" class="hide">
						<div class="row">
							<div class="small-10 small-offset-1 columns">
								<?php get_search_form(); ?>
							</div>
						</div>
						<div class="row">
							<div class="small-10 small-offset-1 columns">
								<a href="<?php echo site_url() . '/view-all' ?>" ><button class="">Explore all of Our Expertise</button></a>
							</div>
						</div>
					</div>
					<?php

						$args = array(
							'container'      => false,
							'menu'           => 'Main Menu',
							'menu_class'     => 'vertical menu accordion-menu hide',
							'menu_id' => 'mobile-menu',
							'items_wrap'     => '<ul id="%1$s" class="%2$s" data-accordion-menu style="width: 100%;">%3$s</ul>',
							//Recommend setting this to false, but if you need a fallback...
							'fallback_cb'    => 'false',
							'walker'         => new RCA_Mega_Mobile_Menu_Walker()

						);
						wp_nav_menu( $args );
					?>
					<!-- /MOBILE MENU -->
				<?php endif; ?>
				</section>
			</header>

			<div id="content" class="site-content relative">
