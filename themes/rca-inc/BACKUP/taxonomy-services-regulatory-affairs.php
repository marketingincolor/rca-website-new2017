<?php

global $post;

// Get the background image for taxonomy.
$title = 'Regulatory Affairs Services
for the Medical Device Industry';
$name = 'Regulatory Affairs';
$term_obj = get_term_by( 'name', $name, 'services' );
$term_id = $term_obj->term_taxonomy_id;
$backgroundImg = get_field('featured_image',  'services_' . $term_id);

get_header(); ?>
	
	<!-- Featured Image -->
	<div id="featured-img-wrapper" class="row expanded">
		<div id="featured-img" style="background: linear-gradient(rgba(196,97,43, 0.7), rgba(196,97,43, 0.7)),
	            rgba(196,97,43,0.7) url('<?php echo $backgroundImg['url']; ?>'); background-size: cover;">
				<div class="featured-img-title text-center"><h1><?php echo $title; ?></h1></div>
		</div>
	</div>
	<!-- / Featured Image -->

	<?php get_template_part( 'template-parts/section', 'breadcrumbs-social'); ?>

	<!-- The Content -->
	<div class="row">

	
		<div id="link-column" class="small-0 large-2 columns show-for-large" style="position: relative; ">
		</div>

		<div id="services-list" class="small-12 large-10 columns" >

			<div class="row">
				<div class="small-10 small-offset-1 columns">
					<p><?php echo get_field('services_content', 'services_'.$term_id); ?></p>
					<img src="<?php echo get_stylesheet_directory_uri() . '/images/taxonomy-pages/regulatory-affairs/rca-long-fpo.jpg'; ?>" alt="fpo image">
					<h1 class="linked firstH1">Regulatory Support for New Products</h1>

					<div class="small-12 medium-12 medium-offset-0 columns">
						
						<!-- Left Menus -->
						<div class="small-10 small-offset-1 medium-6 medium-offset-0 columns">
							<?php 

								echo '<div class="service-menu">';
								echo '<h2>Global Regulatory Strategy</h2>';
								wp_nav_menu( 
									array(
										'menu' => 'Regulatory Affairs: Global Regulatory Strategy',
										'walker' => new RCA_REMOVE_MENU_LINKS()
									)
								); 
								echo '</div>';

								echo '<div class="service-menu">';
								echo '<h2>Global Market Entry Regulatory Services</h2>';
								wp_nav_menu(
									array(
										'menu' => 'Regulatory Affairs: Global Market Entry Regulatory Services',
										'walker' => new RCA_REMOVE_MENU_LINKS()
									)
								);
								echo '</div>';

								echo '<div class="service-menu">';
								echo '<h2>Global Regulatory Submissions Services</h2>';
								wp_nav_menu(
									array(
										'menu' => 'Regulatory Affairs: Global Regulatory Submissions Services',
										'walker' => new RCA_REMOVE_MENU_LINKS()
									)
								);
								echo '</div>';

								echo '<div class="service-menu">';
								echo '<h2>Pre Market Regulatory Services</h2>';
								wp_nav_menu(
									array(
										'menu' => 'Pre-Market Regulatory Services',
										'walker' => new RCA_REMOVE_MENU_LINKS()
								));
								echo '</div>';

								echo '<div class="service-menu">';
								echo '<h1 class="linked secondH1">Regulatory Post Product Release Support</h1>';
								wp_nav_menu(
									array(
										'menu' => 'Regulatory Affairs: Regulatory Post Product Release Support',
										'walker' => new RCA_REMOVE_MENU_LINKS()
								));
								echo '</div>';

								echo '<div class="service-menu">';
								echo '<h1 class="linked thirdH1">Other Regulatory Services</h1>';
								wp_nav_menu(
									array(
										'menu' => 'Regulatory Affairs: Other Regulatory Services',
										'walker' => new RCA_REMOVE_MENU_LINKS()
								));
								echo '</div>';								

							?>
							<h2>Interim Management: Outsourcing Quality and Regulatory Management</h2>

							<p>
							Outsourcing has become an increasingly common practice in the life science industry. The quality assurance (QA) and regulatory affairs (RA) functions create extra complexity for large and small life science companies because needs may vary greatly depending on the lifecycle of the organization. These companies turn to outsourcing to manage operations and tactical skills, and also help adopt best practices.<br /><br />

							Early in the company life cycle, strategic leadership is needed for product filings, regulatory pathway, setting up manufacturing, and creating quality management systems. As the company matures, these functions often transition to a maintenance mode. <br /><br />

							Outsourcing strategic management can provide a better match to changing QA/RA strategic needs through the company lifecycle. RCA’s interim management brings needed expertise while saving costs.
							</p>

							<?php 

							echo '<div class="service-menu">';
							echo '<h2>RCA can assist in the following situations:</h2>';
							wp_nav_menu(
								array(
									'menu' => 'Regulatory Affairs: RCA can assist in the following situations:',
									'walker' => new RCA_REMOVE_MENU_LINKS()
							));
							echo '</div>';

							echo '<div class="service-menu">';
							echo '<h2>RCA can provide needed expertise while saving costs in areas including:</h2>';
							wp_nav_menu(
								array(
									'menu' => 'Regulatory Affairs: RCA can provide needed expertise while saving costs in areas including:',
									'walker' => new RCA_REMOVE_MENU_LINKS()
							));
							echo '</div>';		


							?>

						</div>
					<!-- /Left Menus -->

					<!-- Right Menus -->
					<div class="small-10 small-offset-1 medium-6 medium-offset-0 columns">
						<?php
							echo '<h2>Regulatory Maintenance Services</h2>';
							wp_nav_menu( 
								array(
									'menu' => 'Regulatory Affairs: Regulatory Maintenance Services',
									'walker' => new RCA_REMOVE_MENU_LINKS()
								)
							); 

							echo '<h2>Pre-Submission Report</h2>';
							wp_nav_menu( 
								array(
									'menu' => 'Regulatory Affairs: Pre-Submission Report',
									'walker' => new RCA_REMOVE_MENU_LINKS()
								)
							); 	

							echo '<h2>Submissions (Domestic & International)</h2>';
							wp_nav_menu( 
								array(
									'menu' => 'Regulatory Affairs: Submissions (Domestic & International)',
									'walker' => new RCA_REMOVE_MENU_LINKS()
								)
							); 

							echo '<h2>Global Regulatory Strategy</h2>';
							wp_nav_menu( 
								array(
									'menu' => 'Regulatory Affairs: Global Regulatory Strategy',
									'walker' => new RCA_REMOVE_MENU_LINKS()
								)
							); 						
							//End Right Column
							?>
							<img src="<?php echo get_stylesheet_directory_uri() . '/images/taxonomy-pages/regulatory-affairs/rca-short-fpo.jpg';?>" />
							
							<p>As a registered U.S. Agent, we provide assistance with U.S. registration and service. Any foreign establishment engaged in the manufacture, preparation, propagation, compounding, or processing of a device imported into the United States must identify a U.S. Agent for that establishment.</p>

							<h2>U.S. Agent Responsibilities</h2>
							<p>The responsibilities of the U.S. Agent are limited and include:</p>
							<ul>
								<li>Assisting FDA in communications with the foreign establishment</li>
								<li>Responding to questions concerning the foreign establishment’s devices that are imported or offered for import </li>
								<li>Assisting FDA in scheduling inspections of the foreign establishment</li>
								<li>If FDA is unable to contact the foreign establishment directly or expeditiously, FDA may provide information or documents to the U.S. Agent, and such an action shall be considered to be equivalent to providing the same information or documents to the foreign establishment.</li>
							</ul>

							<p>Please note that the U.S. Agent has no responsibility related to reporting of adverse events under the Medical Device Reporting regulation (21 CFR Part 803), or submitting 510(k) Premarket Notifications (21 CFR Part 807, Subpart E).</p> 

							<!-- End Menus -->
					</div>
					<!-- /Right Menus -->
					</div>
				</div>
			</div>

				

		</div>
	</div>
	<!-- /The Content -->


	

	<!-- Related Content -->
	<div class="row">
		<div class="small-12 columns text-center">
			<h4>Related Content</h4>
		</div>
	</div>
	<!-- /Related Content -->
	
	<div id="contact-learn-more-wrapper">
		<?php get_template_part('template-parts/section', 'learn-more-form-container-blue'); ?>
	</div>

	<!-- NEWS -->
	<div id="news-container">
		<div style="background: url('<?php echo get_stylesheet_directory_uri() . '/images/news-section.jpg';?>'); background-size: cover; height: auto; padding: 2.5rem 0rem;">
			
			<div class="row">
				<div class="small-12 columns text-center" style="color: white;">
					<h3>News</h3>
				</div>
			</div>
			<div id="news-snippets-wrapper" class="row text-center">
					
					<?php
						wp_reset_postdata();
						$category_id = get_cat_ID('news');

						$args = array(
							'post_type' => 'post',
							'cat' => $category_id,
							'posts_per_page' => 3

						);

						$news_query = new WP_Query($args);

						if ( $news_query->have_posts() ) { 
							while ( $news_query->have_posts() ) {
								$news_query->the_post();
								echo '<div class="small-12 medium-6 large-4 columns" style="Color: white;">';
								#the_title();
								echo wp_trim_words(get_the_content(), $num_words = 15, '...<br/>Read More');
								echo '</div>';
							}
						}
					?>

			</div>
		</div>		
	
	</div>
	</div>
	<!-- /NEWS -->
	<script>

		// 1.0 get the headers on the page
		var headers = $('h1.linked').map(function() { return $(this).text();}).get();
		//var locations = $('h1.linked').map(function() { return $(this).scrollTop();}).get();
		var column = $('#link-column');

		// 2.0 Print the header links to the screen.
		for(var i = 0; i < headers.length; i++ ) {
			column.append('<div class="list-item" style="position:relative; margin-bottom: 1rem;"><p style="display:inline-block; margin-bottom: 0rem; cursor:pointer; text-align: right; padding-right: 1rem;">' + headers[i] + '</p><img src="<?php echo get_stylesheet_directory_uri() . '/images/indicator-unselected.jpg';?>" totalClicks="1" order="' + i + '" class="service-bullets"></div>');
		}

		// 3.0 On Click toggle state of button and move user to selection.
		
		$('#link-column .list-item').on('click', function() {

			// Track order in list item
			var order = $(this).find('img').attr('order');
			order = Number(order) + 1;

			//console.log('Order: ' + Number(order));

			// Tracks number of clicks on list item
			count = $(this).find('img').attr('totalClicks');
			count = Number(count) + Number(1);

			var update = $(this).find('img').attr('totalClicks', count);
			var clickedText = $(this).text();

			var image = $(this).find('img');
			var allBullets = $('#link-column .list-item img');



			// Reset all bullets to unselected.
			allBullets.attr('src', '<?php echo get_stylesheet_directory_uri() . '/images/indicator-unselected.jpg'; ?>');

			if( count % 2 == 0) {
				$(image).attr('src', '<?php echo get_stylesheet_directory_uri() . '/images/indicator-selected.jpg'; ?>');
			}
			else {
				$(image).attr('src', '<?php echo get_stylesheet_directory_uri() . '/images/indicator-unselected.jpg'; ?>');
			}

			//console.log("Scroll" + scrollToHeader);
			var headings = $('#services-list > div > h1.linked');
			//console.warn(headings);

			var firstH1 = $('.firstH1');
			var secondH1 = $('.secondH1');
			var thirdH1 = $('.thirdH1');

			// Depending on the order number clicked scroll to the position.
			if(order == 1){
			    $('html, body').animate({
	        		scrollTop: $('.firstH1').offset().top
	    		}, 2000);
			}
			
			if(order == 2){
				$('html, body').animate({
	        		scrollTop: $('.secondH1').offset().top
	    		}, 2000);			

			}

			if (order == 3) {
				$('html, body').animate({
					scrollTop: $('.thirdH1').offset().top
				}, 2000);
			}

			// 4.0 Bring user to selection 

		});


		$(document).ready(function() {

			/**
			 * Moves list of items down to first H1
			 *
			 * @author  Doe
			 * @return void
			 */
			function moveListToH1() {
				var firstH1FromTop = $('.firstH1').offset().top;
				var linkColumnFromTop = $('#link-column').offset().top;
				pxOffset = firstH1FromTop - linkColumnFromTop;
				$('#link-column').css('top', pxOffset);
				$('#link-column').css('margin', '1.375rem 0rem');
			}

			/**
			 * Description:
			 *
			 * Slides List Column Down Page
			 * @author  Doe
			 * @return void
			 */
			function slideListDown() {

				// element to detect scroll direction of
				var el = $(window);
				var linkColumnFromTop = $('#link-column').offset().top;
				el.on('scroll', function() {
				    // get current scroll position
				    var currentY = el.scrollTop();
				        // console.log('Current: ' + currentY);
				    	// console.log('Link Column: ' + linkColumnFromTop);

				    var difference = currentY - 500;
				    console.log(difference);

				    if(currentY >= 500 && currentY < 2000 ) {
				    	$('#link-column').animate( { top: difference}, 1 );
				    }
				    // else {
				    // 	$('#link-column').css('position', 'relative');
				    // }
				});


				var serviceList = $('#services-list');
				var serviceHeight = serviceList.offset().top;
				console.log('Service Height: ' + serviceHeight);
			}

			moveListToH1();
			slideListDown();


		})

	</script>
		
<?php
//get_sidebar();
get_footer();