<?php
/* Template Name: Landing Success Page Template */
/**
 * Purpose: Landing Success Page Template - reusable
 * Date: 4/23/2019
 * Author: ET, MARKETING IN COLOR
 */
global $post, $lander;
$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
$lander = TRUE;

$cta_logo = get_field('cta_logo');
$cta_title = get_field('cta_title');
$cta_content = get_field('cta_content');
$sub_container_one = get_field('sub_container_one');
$sub_container_one_style = get_field('sub_container_one_style');
$sub_container_two = get_field('sub_container_two');
$sub_container_two_style = get_field('sub_container_two_style');
$sub_container_three = get_field('sub_container_three');
$sub_container_three_style = get_field('sub_container_three_style');

get_header(); ?>

	<!-- Featured Image -->
	<div id="featured-img-wrapper" class="default">
		<div id="featured-img" style="background: linear-gradient(rgba(196,97,43, 0.7), rgba(196,97,43, 0.7)), rgba(196,97,43,0.7) url('<?php echo $backgroundImg[0]; ?>'); background-size: cover;">
			<div class="column row collapse">
		        <div class="small-10 small-offset-1 columns text-center">
		        <?php if ( $cta_logo ) : ?>
		        	<div class="cta-image"><img src="<?php echo $cta_logo; ?>" alt="<?php echo $cta_title; ?>"></div>
		        <?php endif; ?>
					<div class="cta-title"><h1><?php echo $cta_title; ?></h1></div>
					<div class="cta-content"><p><?php echo $cta_content; ?></p></div>
				</div>
			</div>
		</div>
	</div>
	<!-- / Featured Image -->

<?php if ( get_the_content() != '' ) : ?>
	<!-- The Content -->
	<div id="the-content" class="row">
		<div class="small-10 small-offset-1 columns">
			<?php echo the_content(); ?>
		</div>
	</div>
	<!-- /The Content -->
<?php endif; ?>

<?php if ( $sub_container_one != '' ) : ?>
	<!-- Subcontent One -->
	<div id="sub-container-one" class="<?php echo ($sub_container_one_style != 'normal') ? 'default' : 'row'; ?>">
		<div class="<?php echo ($sub_container_one_style != 'normal') ? 'stripped' : 'small-12 columns'; ?>">
			<?php echo $sub_container_one; ?>
		</div>
	</div>
	<!-- /Subcontent One -->
<?php endif; ?>

<?php if ( $sub_container_two != '' ) : ?>
	<!-- Subcontent Two -->
	<div id="sub-container-two" class="<?php echo ($sub_container_two_style != 'normal') ? 'default' : 'row'; ?>">
		<div class="<?php echo ($sub_container_two_style != 'normal') ? 'stripped' : 'small-12 columns'; ?>">
			<?php echo $sub_container_two; ?>
		</div>
	</div>
	<!-- /Subcontent Two -->
<?php endif; ?>

<?php if ( $sub_container_three != '' ) : ?>
	<!-- Subcontent Three -->
	<div id="sub-container-three" class="<?php echo ($sub_container_three_style != 'normal') ? 'default' : 'row'; ?>">
		<div class="<?php echo ($sub_container_three_style != 'normal') ? 'stripped' : 'small-12 columns'; ?>">
			<?php echo $sub_container_three; ?>
		</div>
	</div>
	<!-- /Subcontent Three -->
<?php endif; ?>

	<div style="clear:both;"></div>



<?php
get_footer();