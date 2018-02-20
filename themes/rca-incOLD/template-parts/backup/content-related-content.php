<?php

$post_type   = get_post_type();
$terms       = wp_get_post_terms($post->ID,'services');
$terms_array = array();
foreach ($terms as $term) {
	array_push($terms_array, $term->term_id);
}

if($post_type == 'case_studies'):
  $icon   = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/Case-Studies-Icon-Gray-01.svg';
elseif($post_type == 'webinars'):
  $icon   = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/Webinar-Icon-Gray-01.svg';
elseif($post_type == 'white_papers'):
  $icon   = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/White-Papers-Icon-Gray-01.svg';
elseif($post_type == 'visual_resources'):
  $icon   = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/Visual-Resources-Icon-Gray-01.svg';
elseif($post_type == 'published_articles'):
  $icon   = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/Published-Articles-Icon-Gray-01.svg';
endif;

if (!is_page()) {
	$args = array(
		'post_type'      => $post_type,
		'posts_per_page' => 3,
		'post__not_in'   => array($post->ID),
	  'orderby'        => 'rand',
		'tax_query'      => array(
			array(
				'taxonomy'   => 'services',
				'field'      => 'term_id',
				'terms'      => $terms_array,
			),
		),
	);
}else{
	$args = array(
		'post_type'      => array('webinars', 'published_articles', 'case_studies','visual_resources','white_papers'),
		'posts_per_page' => 3,
		'post__not_in'   => array($post->ID),
	  'orderby'        => 'rand',
		'tax_query'      => array(
			array(
				'taxonomy'   => 'services',
				'field'      => 'term_id',
				'terms'      => $terms_array,
			),
		),
	);
}	


$the_query = new WP_Query($args);

if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		$count = '';
		$count = $the_query->found_posts;

		}} wp_reset_postdata();
		if (empty($count) || $count < 3) {
			echo '<div class="hide">';
		}
?>	
	<div id="related-content-block-outer" class="row show-for-large">
		<div class="row">
			<div class="small-12 columns text-center">
				<h4>Related Content</h4>
			</div>
		</div>
		<div class="row" data-equalizer>
			<div id="related-content-block" class="small-10 small-offset-1 columns">
				<?php
				$the_query = new WP_Query($args);

				if ( $the_query->have_posts() ) {
					while ( $the_query->have_posts() ) {
						$the_query->the_post();
				?>
				
				<div class="small-12 medium-4 columns random-item" data-equalizer-watch>
					<img src="<?php echo $icon; ?>" alt="">
					<p><?php echo wp_trim_words(get_the_title(),10,'') ?>...<a href="<?php the_permalink(); ?>">Read More</a></p>
				</div>

				<?php }} wp_reset_postdata(); ?>

			</div>
		</div>
	</div>
<?php
	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$count = $the_query->found_posts;

			}} wp_reset_postdata();
			if (!$count || $count < 3) {
				echo '</div>';
			}
?>
