<?php
global $post;
$terms = get_the_terms( $post->ID, 'registration' );

/* Template Name: Webinar Expertise Page */
// Get Webinar Information
$date  = new DateTime(get_field('when', false, false));
$time  = get_field('time_range');
$where = get_field('where');
$people = get_field('who_will_benefit');
$webinar_form_title = get_field('webinar_form_title');
$webinar_form_copy = get_field('webinar_form_copy');
$webinar_title = get_field('webinar_title');
$presenters = get_field('your_presenters');
//var_dump($presenters);
//$presenters = explode(',', $presenters);


// Header BG
$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); 

get_header(); ?>
	<?php #get_template_part('template-parts/section', 'takeover-modal'); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/post-type', 'webinars' );

			endwhile;
			?>

		</main>

		<!-- Presenters Small -->
		<?php if($presenters): ?>

 		<ul id="presenter-accordian" class="accordion hide-for-medium" data-accordion data-allow-all-closed="true" style="border: none;">
			<li class="accordion-item" data-accordion-item>
				<a href="#!" class="accordion-title">Your Expert Presenters <i class="fa fa-chevron-right" aria-hidden="true"></i><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
				<div id="your-expert-presenters" class="accordion-content" data-tab-content>
					<div id="title" class="row">
						<div class="small-10 small-offset-1">
							<div class="medium-8 medium-offset-2 columns">
								<h2 class="text-center medium-text-left">Your Expert Presenters</h2>
							</div>
						</div>
					</div>		

					<div class="row">
						<div class="small-10 small-offset-1 columns">

							<?php foreach($presenters as $presenter) {
								$user_data = get_userdata($presenter);
								$user_meta = get_user_meta($presenter->ID);
								echo '<div id="presenter-block" class="row">';
								echo '<div class="small-12 medium-2 columns text-center">';
								echo get_the_post_thumbnail( $presenter->ID, 'thumbnail' );
								echo '</div>';
								echo '<div class="small-12 medium-8 columns text-center end">';
								echo '<h3>' . $presenter->post_title . '</h3>';
								echo '<p>' . $presenter->position . '</p>';
								echo $presenter->webinar_biography;
								echo '</div>';
								echo '</div>';

							}
							?>
							
						</div>
					</div>
				</div>
			</li>
		</ul>
		<?php endif; ?>
		<!-- /Presenters Small -->

		<!-- Presenters Medium -->
		<?php if($presenters): ?>

		<div id="your-expert-presenters" class="show-for-medium">

			<div id="title" class="row">
				<div class="small-10 small-offset-1">
					<div class="medium-8 medium-offset-2 columns">
						<h2 class="text-center medium-text-left">Your Expert Presenters</h2>
					</div>
				</div>
			</div>		

			<div class="row">
				<div class="small-10 small-offset-1 columns">

					<?php foreach($presenters as $presenter) {

						$user_data = get_userdata($presenter->ID);
						$user_meta = get_user_meta($presenter->ID);

						
						//var_dump($user_meta);
						echo '<div id="presenter-block" class="row">';
						echo '<div class="small-12 medium-2 columns small-text-center">';
						echo get_the_post_thumbnail( $presenter->ID );
						echo '</div>';
						echo '<div class="small-12 medium-8 columns end">';
						echo '<h3>' . $presenter->post_title . '</h3>';

						if( !empty($presenter->position) ):
							echo '<p>' . $presenter->position . '</p>';
						else: 
							echo '<br/>';
						endif;

						echo $presenter->webinar_biography;
						echo '</div>';
						echo '</div>';
					}
					?>
					
				</div>
			</div>
		</div>
		<?php endif; ?>
		<!-- /Presenters Medium -->
	</div>

	<!-- LEARN MORE -->
	<?php //get_template_part('template-parts/section', 'learn-more-form-container-blue'); ?>
	<?php get_template_part('template-parts/section', 'learn-more-cta'); ?>
	<!-- /LEARN MORE -->


<?php
//get_sidebar();

get_footer();