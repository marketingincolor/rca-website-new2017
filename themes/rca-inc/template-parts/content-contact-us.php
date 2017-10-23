<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RCA_Inc.
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div id="top-contact-us" class="row">
		<div class="small-10 small-offset-1 large-8 large-offset-2 text-center columns">
			<div class="entry-content">
				<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rca-inc' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->

			<!-- THIS DISPLAYS THE LOCATIONS FOR DESKTOP -->
			<div class="row">
				<div id="all-locations" class="small-10 small-offset-1 show-for-medium">
					<?php
						$args = array(
							'post_type' => 'locations',
						);

						$locations = new WP_Query($args);
						//var_dump($locations);

						if ( $locations->have_posts() ) {
							while ( $locations->have_posts() ) {
								$locations->the_post(); 
								//
								// Post Content here
								for($i=0;$i<count($locations); $i++) {
									$location_address = get_field('location_address');
									$location_phone = get_field('location_phone');
									$location_fax = get_field('location_fax');
									$location_email = get_field('location_email');
									$block = "";
									$block .= '<div id="location-block" class="row text-left">';
									$block .= '<div class="small-6 columns">';
									$block .= '<a href="https://maps.google.com/?q=' . $location_address . '" target="_blank" title="Directions"><img src="'. get_the_post_thumbnail_url() . '"/></a>';
									$block .= '</div>';
									$block .= '<div class="small-6 columns">';
									$block .= '<div class="location-name">' . get_the_title() . '</div>';

									if($location_address):
										$block .= '<a href="https://maps.google.com/?q=' . $location_address . '" target="_blank"><div class="location-address"><i class="fa fa-map-marker" aria-hidden="true"></i><p>' . $location_address . '</p></div></a>';
									endif;
									if($location_phone):
										$block .= '<div class="location-phone"><i class="fa fa-phone" aria-hidden="true"></i><p> ' . $location_phone . '</p></div>';
									endif;
									if($location_fax):
										$block .= '<div class="location-fax"><i class="fa fa-fax" aria-hidden="true"></i><p>' . $location_fax . '</p></div>';
									endif;								
									if($location_email):
										$block .= '<div class="location-email"><i class="fa fa-envelope" aria-hidden="true"></i><p>' . $location_email . '</p></div>';
									endif;
									$block .= '</div>';
									$block .= '</div>';
									echo $block;

								} // end for loop
							} // end while
						} // end if
						wp_reset_postdata();
					?>

				</div>
			</div>
			<!-- END DESKTOP LAYOUT HERE -->
		</div>

	</div>
		<!-- MOBILE CONTACT PAGE LAYOUT -->
		<ul id="location-accordian" class="accordion hide-for-medium" data-accordion  data-allow-all-closed="true">

			<?php
				$args = array(
					'post_type' => 'locations',
				);

				$locations = new WP_Query($args);
				//var_dump($locations);
				//
				if ( $locations->have_posts() ) {
					while ( $locations->have_posts() ) {
						$locations->the_post(); 
						//
						// Post Content here
						for($i=0;$i<count($locations); $i++) {
							$location_address = get_field('location_address');
							$location_phone   = get_field('location_phone');
							$location_fax     = get_field('location_fax');
							$location_email   = get_field('location_email');

							$block = '<li class="accordion-item" data-accordion-item>';
							$block .= '<a href="#" class="accordion-title location-name">' . get_the_title() . '</a>';
							$block .= '<div class="accordion-content" data-tab-content>';
							$block .= '<div class="row"><div class="small-8 small-offset-2 columns">';
							if($location_address):
								$block .= '<a href="https://maps.google.com/?q=' . $location_address . '" target="_blank"><div class="location-address"><i class="fa fa-map-marker" aria-hidden="true"></i> <p style="margin-bottom: 0rem;">' . $location_address . '</p></div></a>';
							endif;
							if($location_phone):
								$block .= '<div class="location-phone"><i class="fa fa-phone" aria-hidden="true"></i><p style="margin-bottom: 0rem;">' . $location_phone . '</p></div>';
							endif;
							if($location_fax):
								$block .= '<div class="location-fax"><i class="fa fa-fax" aria-hidden="true"></i><p style="margin-bottom: 0rem;">' . $location_fax . '</p></div>';
							endif;
							if($location_email):
								$block .= '<div class="location-email"><i class="fa fa-envelope" aria-hidden="true"></i><p style="margin-bottom: 0rem;">' . $location_email . '</p></div>';
							endif;
							if($location_address):
								$block .= '<a href="https://maps.google.com/?q=' . $location_address . '" target="_blank"><p style="margin-bottom: 0rem;"><button class="orange-btn map-btn">Map</button></a>';
							endif;	
							$block .= '</div></div>';
							$block .= '</li>';
							echo $block;

						} // end for loop
					} // end while
				} // end if
				wp_reset_postdata();
			?>
		</ul>
		<!-- /MOBILE CONTACT PAGE LAYOUT -->

</article>

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


<!-- SHARE BUTTON CLICKS -->
<script>
	$(document).ready(function() {
		var logo = $('#masthead > section.hide-for-large > div:nth-child(1)').height();
		var close = $('#share-menu .close');
		logo = Math.abs(logo);
		console.log( 'logoheight ' + logo);
		var shareButton = $('#share-section .orange-btn');
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
<!-- #post-<?php the_ID(); ?> -->
