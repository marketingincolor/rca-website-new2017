<?php

/**
 * Purpose: For displaying the additional services page
 * Date: 10/24/2017
 * Author: AD.,NB.,ET., MARKETING IN COLOR
 */

global $post;
$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );

get_header(); ?>
	
	<!-- FEATURED IMAGE -->
	<div id="featured-img-wrapper" class="row expanded">
		<div id="featured-img" style="background: linear-gradient(rgba(196,97,43, 0.7), rgba(196,97,43, 0.7)),
	            rgba(196,97,43,0.7) url('<?php echo $backgroundImg[0]; ?>'); background-size: cover;">
				<div class="featured-img-title"><h1><?php the_title(); ?></h1></div>
		</div>
	</div>
	<!-- /FEATURED IMAGE -->

	<div class="page-wrapper">
		
		<?php get_template_part( 'template-parts/section', 'breadcrumbs-social'); ?>

		<!-- THE CONTENT -->
		<div class="row text-center">
			<div class="small-10 small-offset-1 medium-12 medium-offset-0 columns text-center">
				<?php the_content(); ?>
			</div>
		</div>
		<!-- /THE CONTENT -->


		<!-- LIST OF SERVICES -->
		<?php

		$services_array = array(
			'biologics' => array(
				'title'     => 'Biologics',
				'menu_name' => 'Biologics',
				'slug'      => 'biologics'
			),
			'combination_products' => array(
				'title'     => 'Combination Products',
				'menu_name' => 'Combination Products',
				'slug'      => 'combination-products'
			),
			'compounding_pharmacies' => array(
				'title'     => 'Compounding Pharmacies',
				'menu_name' => 'Compounding Pharmacies',
				'slug'      => 'compounding-pharmacies'
			)
		);

		?>
		<!-- /LIST OF SERVICES -->

		<div id="additional-services" class="row">

			<!-- LOOP THROUGH THE SERVICES -->
			<?php
				$count = 1;
				foreach($services_array as $service){

						echo '<div class="small-10 small-offset-1 medium-4 medium-offset-0 columns text-center end" data-equalizer-watch>';
						echo '<div class="service-block">';
						echo '<a href="' . home_url( 'additional-services/' . $service['slug'] ) . '"><div class="service-icon"><img src="' . get_service_image($service['title']) . '"/></div>';
						echo '<div class="service-title">' . $service['title'] . '</a></div>';
						echo '</div>';

					echo '</div>';
				}

			?>
			<!-- /LOOP THROUGH THE SERVICES -->

		</div>

	</div> <!-- /.page-wrapper -->
	
	<!-- LEARN MORE FORM -->
	<div id="contact-learn-more-wrapper">
		<?php get_template_part('template-parts/section', 'learn-more-form-container-blue'); ?>
	</div>
	<!-- /LEARN MORE FORM -->

	<!-- NEWS -->
	<?php get_template_part('template-parts/section', 'news'); ?>
	<!-- /NEWS -->

<?php
get_footer();