<?php
get_header();
$type = 'visual resource'; 
?>
<?php get_template_part('template-parts/section', 'takeover-modal'); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/post-type', 'visual-resources' );
			endwhile;
			?>

		</main>
	</div>

	<!-- RELATED CONTENT -->
	<?php get_template_part('template-parts/content', 'related-content'); ?>
	<!-- /RELATED CONTENT -->
	
	<!-- LEARN MORE -->
	<?php //get_template_part('template-parts/section', 'learn-more-form-container-blue'); ?>
	<?php get_template_part('template-parts/section', 'learn-more-cta'); ?>
	<!-- /LEARN MORE -->

<?php
//get_sidebar();
get_footer();