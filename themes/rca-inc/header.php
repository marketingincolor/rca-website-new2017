<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * TODO: 
 * 
 * Refactor WordPress Menus. Leaving right now as this is the fastest way I can work with them.
 * Clean styles out of content blocks.
 * Clean stylesheet.
 * Clean unecessary CDNs and JS files.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RCA_Inc.
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- GOOGLE FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Lora:400,700,700i|Roboto" rel="stylesheet">

		<!-- FOUNDATION INCLUDE -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/foundation/6.2.1/foundation.min.css">

		<!-- FONT AWESOME INCLUDE -->
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="profile" href="http://gmpg.org/xfn/11">

		<!-- JQUERY INCLUDE -->
		<script
		  src="https://code.jquery.com/jquery-3.2.1.min.js"
		  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
		  crossorigin="anonymous">
		  	
		</script>

		<?php wp_head(); ?>

	</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'rca-inc' ); ?></a>

	<header id="masthead" class="site-header">

		<section id="entire-header" class="show-for-large">

			<!-- LOGO -->
			<div class="row expanded">
				<div class="site-branding small-12 columns align-items-center text-center">
					<?php the_custom_logo(); ?>
				</div>
			</div>
			<!-- /LOGO -->

			<!-- PHONE ON MOBILE BUTTON -->
			<div id="phone-icon" class="row expanded title-bar hide-for-large" data-equalizer>

				<div class="small-6 columns text-center" data-equalizer-watch>
					<a href="<?php echo home_url('/contact/');?>"><p style="margin-bottom:0rem;"><i class="fa fa-phone" aria-hidden="true"></i> Contact Us</p></a>		
				</div>
				<div id="menu-section" class="small-6 columns relative" data-equalizer-watch>
					<div class="horizontal-center" data-responsive-toggle="the-menu" data-hide-for="large" style="top:50%; transform: translate(-50%,-425%);">
						<div class="hamburger-menu" type="button" data-toggle><div class="bar"></div></div>
					</div>
				</div>
			</div>

			<div id="top-menu">
				<div id="top-menu" class="row">
					<div class="large-12 columns">
						<ul id="mega-menu-container" class="dropdown menu show-for-large" data-dropdown-menu> 
							<li class="mega-menu">
								<a href="<?php echo home_url('/medical-devices/'); ?>">Medical Devices</a>
									<ul class="menu">
										<li>
											<div class="row">
												<div class="small-8 columns">

													<div class="medium-6 columns">
														<h3><a href="<?php echo home_url('services/regulatory-affairs');?>">Regulatory Affairs</a></h3>
														<?php

														wp_nav_menu( 
														  array(
														    'menu' => 'Regulatory Affairs', 
														    'menu_class' => 'menu',
														  )
														); ?>
													</div>

													<div class="medium-6 columns">
														<h3>Quality Services</h3>
													</div>

													<div class="medium-6 columns">
														<h3>Compliance Assurance</h3>
														<?php wp_nav_menu( array('menu' => 'Compliance Assurance' )); ?>
													</div>

													<div class="medium-6 column end">
														<h3>Remediation Strategy and Support</h3>
														<?php wp_nav_menu( array('menu' => 'Remediation Strategy and Support' )); ?>
													</div>

												</div>
												<div class="small-4 columns">
													<div class="medium-12 column">
														<h3>Strategic Consulting</h3>
														<?php wp_nav_menu( array('menu' => 'Strategic Consulting' )); ?>
													</div>
												</div>

											</div>
										</li>
									</ul>
								</li>
							<li class="mega-menu">
								<a href="<?php echo home_url('/medical-devices/'); ?>">Pharmaceutical</a>
									<ul class="menu">
										<li>
											<div class="row">
												<div class="small-8 columns">

													<div class="medium-6 columns">
														<h3><a href="<?php echo home_url('services/regulatory-affairs');?>">Regulatory Affairs</a></h3>
														<?php

														wp_nav_menu( 
														  array(
														    'menu' => 'Regulatory Affairs', 
														    'menu_class' => 'menu',
														  )
														); ?>
													</div>

													<div class="medium-6 columns">
														<h3>Quality Services</h3>
													</div>

													<div class="medium-6 columns">
														<h3>Compliance Assurance</h3>
														<?php wp_nav_menu( array('menu' => 'Compliance Assurance' )); ?>
													</div>

													<div class="medium-6 column end">
														<h3>Remediation Strategy and Support</h3>
														<?php wp_nav_menu( array('menu' => 'Remediation Strategy and Support' )); ?>
													</div>

												</div>
												<div class="small-4 columns">
													<div class="medium-12 column">
														<h3>Strategic Consulting</h3>
														<?php wp_nav_menu( array('menu' => 'Strategic Consulting' )); ?>
													</div>
												</div>

											</div>
										</li>
									</ul>
								</li>
								<li><a href="<?php echo get_permalink( get_page_by_path('Additional Services' ) ); ?>">Additional Services</a></li>

								<li class="mega-menu">
									<a href="<?php echo get_permalink( get_page_by_path( 'About' ) ); ?>">About</a>
										<ul class="menu">
										<li>
											<div class="row">
												<div class="small-8 columns">

													<div class="medium-6 columns">
														<h3><a href="<?php echo home_url('services/regulatory-affairs');?>">Regulatory Affairs</a></h3>
														<?php

														wp_nav_menu( 
														  array(
														    'menu' => 'Regulatory Affairs', 
														    'menu_class' => 'menu',
														  )
														); ?>
													</div>

													<div class="medium-6 columns">
														<h3>Quality Services</h3>
													</div>

													<div class="medium-6 columns">
														<h3>Compliance Assurance</h3>
														<?php wp_nav_menu( array('menu' => 'Compliance Assurance' )); ?>
													</div>

													<div class="medium-6 column end">
														<h3>Remediation Strategy and Support</h3>
														<?php wp_nav_menu( array('menu' => 'Remediation Strategy and Support' )); ?>
													</div>

												</div>
												<div class="small-4 columns">
													<div class="medium-12 column">

													</div>
												</div>

											</div>
										</li>
									</ul>
								</li>
								<li><a href="<?php echo home_url('/news/' );?>">News</a>
								</li>
								<li class="contact-menu-item" style="float:right;"><a href="<?php echo home_url('/contact/');?>"><i class="fa fa-phone" aria-hidden="true"></i> Contact</a></li></a>
							</li>
						</ul>	 	
					</div>
				</div>
		<!-- SECONDARY NAV ON DESKTOP -->
		<div id="secondary-menu">
			<div  class="row show-for-large">
				<div class="large-12 columns" style="background-color: #9d938a; padding: 1rem;">
					<div class="row" data-equalizer>
						<div class="small-8 columns" data-equalizer-watch>
							<?php 
								wp_nav_menu( 
									$args = array( 
										'menu' => 'Secondary Menu',
										'walker' => new RCA_SECONDARY_WALKER()
								 	)
								); 
							?>
						</div>
						<div class="small-4 columns" data-equalizer-watch>
							<?php get_search_form(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- MOBILE NAV -->
	<section id="" class="hide-for-large">

		<div class="row expanded hide-for-large">
			<div class="site-branding small-12 columns align-items-center text-center">
				<?php the_custom_logo(); ?>
			</div>
		</div>
		<!-- PHONE ON MOBILE BUTTON -->
		<div id="mobile-top-bar" class="row expanded title-bar hide-for-large" data-equalizer>

			<div class="small-6 columns text-center" data-equalizer-watch style="padding: 1rem 0rem;">
				<a href="<?php echo home_url('/contact/');?>"><p style="margin-bottom:0rem; border-right: 2px solid #fff;"><i class="fa fa-phone" aria-hidden="true"></i> Contact Us</p></a>		
			</div>
			<div id="menu-section" class="small-6 columns relative" data-equalizer-watch style="">
				<div class="horizontal-center" data-responsive-toggle="the-menu" data-hide-for="large" style="top:50%; transform: translate(-50%,-425%);">
					<div class="hamburger-menu" type="button" data-toggle><div class="bar"></div></div>
				</div>
			</div>
		</div>
<ul id="mobile-menu" class="vertical menu accordion-menu hide" data-accordion-menu >
	<div id="top-nav-wrapper">
		<div class="row">
			<div class="small-10 small-offset-1 columns">
				<?php get_search_form(); ?>
			</div>
		</div>
		<div class="row">
			<div class="small-10 small-offset-1 columns">
				<button class="">Explore all of Our Expertise</button>
			</div>
		</div>
	</div>
		<div id="bottom-nav-wrapper">
			<li>
				<a href="<?php echo get_permalink( get_page_by_path( 'Medical Devices' ) ); ?>">Medical Devices</a>
		<!-- 		<ul class="menu vertical nested">
					<li><a href="#">Item 1Ai</a></li>
					<li><a href="#">Item 1Aii</a></li>
					<li><a href="#">Item 1Aiii</a></li>
				</ul> -->
				<!-- Regulatory Affairs -->
				<ul>
					<li>
						<h3>Regulatory Affairs</h3>
						<?php wp_nav_menu( array('menu' => 'Regulatory Affairs')); ?>

					</li>
				</ul>
				
				<!-- Compliance Assurance -->
				<ul>
					<li>
						<h3>Compliance Assurance</h3>
						<?php wp_nav_menu( array('menu' => 'Compliance Assurance')); ?>

					</li>
				</ul>

				<!-- Quality Services -->
				<ul>
					<li>
						<h3>Quality Services</h3>
						<?php #wp_nav_menu( array('menu' => 'Quality Services')); ?>

					</li>
				</ul>
				
				<!-- Remediation Strategy & Support -->
				<ul>
					<li>
						<h3>Remediation Strategy and Support</h3>
						<?php wp_nav_menu( array('menu' => 'Remediation Strategy and Support')); ?>

					</li>
				</ul>

				<!-- Strategic Consulting -->
				<ul>
					<li>
						<h3>Strategic Consulting</h3>
						<?php wp_nav_menu( array('menu' => 'Strategic Consulting')); ?>

					</li>
				</ul>
			</li>
			<li>
					<a href="<?php echo get_permalink( get_page_by_path( 'Pharmaceutical' ) ); ?>">Pharmaceutical</a>
		<!-- 			<ul class="menu vertical nested">
					
					</ul> -->
			</li>
			<li><a href="<?php echo get_permalink( get_page_by_path( 'Additional Services' ) ); ?>">Additional Services</a></li>
			<li><a href="<?php echo get_permalink( get_page_by_path( 'About' ) ); ?>">About</a></li>
			<li><a href="#">News</a></li>
			

</ul>
</div>
	</section>
	<!-- /MOBILE NAV -->

	</header>

	<div id="content" class="site-content relative">
