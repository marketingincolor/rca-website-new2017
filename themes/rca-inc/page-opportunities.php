<?php

/**
 * Purpose: Template part for displaying page content in page.php
 * Date: 10/24/2017
 * Author: AD.,NB.,ET., MARKETING IN COLOR
 */

?>

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

				if(is_user_logged_in()) {
					require_once 'taleo/Api.php';

					$Taleo = new RyanSechrest\Taleo\Api(
						'RCA',
						'adoe',
						'RCARCA!',
						'https://tbe.taleo.net/MANAGER/dispatcher/api/v1/serviceUrl'
					);


					// LOGIN
					$Taleo->login();

					// SET AUTH TOKEN
					$auth_token = $Taleo->get_auth_token();
					$Taleo->set_auth_token($auth_token);

					// SET HOST URL
					$host_url = $Taleo->get_host_url();

					#echo $host_url;
					$Taleo->set_host_url($host_url);

					$result = $Taleo->get_entity('requisitiontemplate');
					$result = $Taleo->get_entity_code('requisitiontemplate');
					$result = $Taleo->get_entity_custom_fields('requisitiontemplate');

					echo '<pre>';
					print_r($result[50]->name);
					echo '</pre>';


					$Taleo->logout();
					
				}










			if(false):
			// Taleo API Call
	     	// First make APi cal to dispatcher url
		    $dispatcher_url = 'https://tbe.taleo.net/MANAGER/dispatcher/api/v1/serviceUrl/RCA.xml';

		    $response = file_get_contents($dispatcher_url);
		    $xml = simplexml_load_string($response);
		    $xml_url = $xml->response[0]->URL;
		    #var_dump($xml_url);
		    #
		    #$formatted_url = $xml_url . 'login?orgCode=RCA&userName=adoe&password=RCARCA!';
		    $formatted_url = $xml_url . 'object/requisitiontemplate/search?status=open';
		    echo 'URL: ' . $formatted_url;


		      //parse the new JSON object $xml looking for the URL property

		      // https://www.thepolyglotdeveloper.com/2014/09/parse-xml-response-php/

		          // get out the host variable from URL
		     // Place host url variable into file_get_contents call below

		     $options = array(
		       'http'=>array(
		         'method'=>"GET",
		         'header'=>"Username=adoe@RCA\r\n" .
		                   "Password=RCARCA!\r\n" .
		                   "Content-type: application/json\r\n" 
		       )
		     );
		     $context=stream_context_create($options);

		     var_dump('CONTEXT' . $context);
		     $data=file_get_contents($formatted_url,false,$context);
		     var_dump($data);



					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rca-inc' ),
						'after'  => '</div>',
					) );
			endif;
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
