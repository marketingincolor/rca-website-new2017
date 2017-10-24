<?php
/**
 * Purpose: Adds breadcrumbs and social links to pages that need it.
 */

global $post;
$terms = get_the_terms($post->id, 'expertise');

// Returns this term name
if($terms):
	$termName = $terms[0]->name;
else: 
	$termName = '';
endif;

?>

<div class="row">
	<div class="small-10 small-offset-1 medium-6 medium-offset-0 columns text-center medium-text-left">
		<div id="breadcrumbs">
				<?php if($termName != 'Webinars'): ?>
					<?php if( function_exists('simple_breadcrumb') ) { simple_breadcrumb(); }?>
				<?php endif; ?>
		</div>
	</div>
	<div class="small-12 medium-6 columns text-right show-for-medium">
		<div id="share" class="">
			<p>Share on Social Media</p>
			<?php echo do_shortcode('[addtoany]'); ?>
		</div>
	</div>
</div>