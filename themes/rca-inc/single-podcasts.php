<?php
get_header();
$type = 'podcasts'; 
?>
<?php //get_template_part('template-parts/section', 'takeover-modal'); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/post-type', 'podcasts' );
			endwhile;
			?>

		</main>
	</div>

	<!-- RELATED CONTENT SMALL -->
	<?php get_template_part('template-parts/content', 'directory-links'); ?>
	<!-- /RELATED CONTENT SMALL -->

	<!-- RELATED CONTENT LARGE -->
	<?php get_template_part('template-parts/content', 'related-podcast'); ?>
	<!-- /RELATED CONTENT LARGE -->
	
	<!-- LEARN MORE -->
	<?php //get_template_part('template-parts/section', 'learn-more-form-container-blue'); ?>
	<?php get_template_part('template-parts/section', 'learn-more-cta'); ?>
	<!-- /LEARN MORE -->

<?php
//get_sidebar();
get_footer();