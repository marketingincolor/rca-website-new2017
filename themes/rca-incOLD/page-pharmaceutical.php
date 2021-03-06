<?php

/**
 * Purpose: For displaying pharmaceutical page content.
 * Date: 10/24/2017
 * Author: AD.,NB.,ET., MARKETING IN COLOR
 */

global $post;
$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
get_header(); 

?>
	
	<!-- FEATURED IMAGE -->
	<div id="featured-img-wrapper" class="row expanded">
		<div id="featured-img" style="background: linear-gradient(rgba(196,97,43, 0.7), rgba(196,97,43, 0.7)),
	            rgba(196,97,43,0.7) url('<?php echo $backgroundImg[0]; ?>'); background-size: cover;">
				<div class="featured-img-title"><h1><?php the_title(); ?></h1></div>
		</div>
	</div>
	<!-- / FEATURED IMAGE -->
	
	<!-- BREADCRUMS -->
	<?php get_template_part( 'template-parts/section', 'breadcrumbs-social'); ?>
	<!-- /BREADCRUMBS -->
	
	<div class="page-wrapper">
		
		<!-- The Content -->
		<div class="row text-center">
			<div class="small-12 columns">
				<?php echo the_content(); ?>
			</div>
		</div>
		<!-- /The Content -->


		<!-- List of Services -->
		<?php

		$services_array = array(
			'regulatory_affairs' => array(
				'title' => 'Regulatory Affairs',
				'menu_name'   => 'Pharmaceutical Regulatory Affairs',
				'slug' => 'regulatory-affairs'
			),
			'strategic_consulting' => array(
				'title' => 'Strategic Consulting',
				'menu_name'   => 'Pharmaceutical Strategic Consulting',
				'slug' => 'strategic-consulting'
			),
			'compliance_assurance' => array(
				'title' => 'Compliance Assurance',
				'menu_name'   => 'Pharmaceutical Compliance Assurance',
				'slug' => 'compliance-assurance'
			),
			'remediation' => array(
				'title' => 'Remediation Strategy and Support',
				'menu_name'   => 'Pharmaceutical Remediation Strategy and Support',
				'slug' => 'remediation-strategy-support'
			),
		);

		?>
		<!-- /List of Services -->
			
			<!-- MENUS -->
			<div id="" class="row">

				<!-- Loop Through Services. -->
				<div class="small-12 medium-8 columns">
				<?php
					$count = 1;
					foreach($services_array as $service){
						if($count % 2 == 0):
							echo '<div class="row" data-equalizer>';
						endif;

						if ( true ): 
							echo '<div class="small-10 small-offset-1 medium-6 medium-offset-0 columns text-center" data-equalizer-watch>';
							echo '<div class="service-block">';
							  echo '<div class="row">';
							    echo '<div class="small-12 columns">';
							      echo '<a href="' . home_url( 'pharmaceutical/' . $service['slug'] ) . '"><div class="service-icon"><img src="' . get_service_image($service['title']) . '"/></div>';
							        echo '<div class="service-title">' . $service['title'] . '</a></div>';
							    echo '</div>';
							  echo '</div>';
							echo '</div>';
						endif;

						if($service['menu_name'] == 'Pharmaceutical Regulatory Affairs' || $service['menu_name'] == 'Pharmaceutical Compliance Assurance' || $service['menu_name'] == 'Pharmaceutical Remediation Strategy and Support' || $service['menu_name'] == 'Pharmaceutical Strategic Consulting' ):
							echo '<div class="text-left service-menu-items">';
							echo wp_nav_menu( array('menu' => $service['menu_name']));
							echo '</div>';
						endif;

						echo '</div>';

						if($count % 2 == 0):
							echo '</div>';
						endif;
						$count++;
					}

				?>
				</div>
				<!-- /Loop Through Services -->
				
				<!-- Hardcoded Quality Assurance  -->
				<div class="hide-for-medium">
					<div class="small-10 small-offset-1 medium-12 medium-offset-0 columns text-center">
						<div class="service-block">
							<div class="service-icon"><img src="<?php echo get_service_image('Quality Assurance'); ?>" alt=""></div>
							<div class="service-title"><a href="<?php echo home_url('pharmaceutical/quality-assurance'); ?>">Quality Assurance</a></div>
						</div>
						<div class="text-left service-menu-items">
						</div>
					</div>
				</div>
				<!-- /Hardcoded Quality Assurance -->
	 
				<!-- Hardcoded Quality Assurance  -->
				<div class="show-for-medium medium-4 columns">
					<div class="small-10 small-offset-1 medium-12 medium-offset-0 columns text-center">
						<div class="service-block">
							<div class="service-icon"><img src="<?php echo get_service_image('Quality Assurance'); ?>" alt=""></div>
							<div class="service-title"><a href="<?php echo home_url('pharmaceutical/quality-assurance'); ?>">Quality Assurance</a></div>
						</div>
						<div class="text-left service-menu-items">
						</div>
					</div>
				</div>
				<!-- /Hardcoded Strategic Consulting -->

			</div>
			<!-- /MENUS -->
	</div>

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