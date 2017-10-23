<?php
/**
 * Template for published articles
 * 
 */

global $post;

// Get External URL of Article
// Need to add these fields to ACF
$article_link      = get_field('link_to_article'); 
$article_link_text = get_field('article_link_text'); 

?>
<?php get_template_part('template-parts/section', 'breadcrumbs-social'); ?>

<div id="all-expertise-content">

	<!-- Title/Date -->
	<div class="row">
		<div class="small-10 small-offset-1 columns text-left">
			<h1><?php the_title(); ?></h1>
			<p class="date"><?php the_date('F d, Y') ?></p>
		</div>
	</div>
	<!-- /Title/Date -->

	<!-- Content -->
	<div class="row">
		<div class="small-10 small-offset-1 columns" >
			<?php the_content(); ?>
			<a href="<?php echo $article_link; ?>" class="orange-btn"><button style="width:auto"><?php echo (!empty($article_link_text)) ? $article_link_text : 'Continue Reading this Article'; ?></button></a>
		</div>
	</div>
	<!-- /Content -->
</div>
