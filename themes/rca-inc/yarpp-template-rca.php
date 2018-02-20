<?php
/*
YARPP Template: RCA Inc.
Description: Custom Template built for Regulatory Compliance Associates.
Author: Adam Doe
*/
?>
<div class="row">
	<div class="small-10 small-offset-1 columns text-center">
		<h3 class="related-posts-title">Related Posts</h3>
	</div>
</div>

<?php if (have_posts()):
	$postsArray = array();
	while (have_posts()) : the_post();
		$postsArray[] = '<a href="'.get_permalink().'" rel="bookmark">'.get_the_title().'</a><!-- ('.get_the_score().')-->';
	endwhile;

echo implode(', '."\n",$postsArray); // print out a list of the related items, separated by commas

else:?>

<p>No related posts.</p>
<?php endif; ?>
