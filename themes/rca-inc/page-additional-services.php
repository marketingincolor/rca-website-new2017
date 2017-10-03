<?php

global $post;
$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );

get_header(); ?>
	
	<!-- Featured Image -->
	<div id="featured-img-wrapper" class="row expanded">
		<div id="featured-img" style="background: linear-gradient(rgba(196,97,43, 0.7), rgba(196,97,43, 0.7)),
	            rgba(196,97,43,0.7) url('<?php echo $backgroundImg[0]; ?>'); background-size: cover;">
				<div class="featured-img-title"><h1><?php the_title(); ?></h1></div>
		</div>
	</div>
	<!-- / Featured Image -->

	<?php get_template_part( 'template-parts/section', 'breadcrumbs-social'); ?>

	<!-- The Content -->
	<div class="row text-center">
		<div class="small-12 columns">
			<article class="article-content"><?php echo the_content(); ?></article>
		</div>
	</div>
	<!-- /The Content -->


	<!-- List of Services -->
	<?php

	// $services_array = array(
	// 	'regulatory_affairs' => array(
	// 		'title' => 'Regulatory Affairs',
	// 		'menu_name'   => 'Regulatory Affairs'
	// 	),
	// 	'compliance_assurance' => array(
	// 		'title' => 'Compliance Assurance',
	// 		'menu_name'   => 'Compliance Assurance'
	// 	),
	// 	'remediation' => array(
	// 		'title' => 'Remediation Strategy and Support',
	// 		'menu_name'   => 'Remediation Strategy and Support'
	// 	),
	// 	'quality_services' => array(
	// 		'title' => 'Quality Services',
	// 		'menu_name'   => ''
	// 	)
	// );

	?>
	
	<div id="contact-learn-more-wrapper">
		<?php get_template_part('template-parts/section', 'learn-more-form-container-blue'); ?>
	</div>

	<!-- NEWS -->
	<?php get_template_part('template-parts/section', 'news'); ?>
	<!-- /NEWS -->

<?php
//get_sidebar();
get_footer();