<?php
global $post;
$post_type = get_post_type();
$audio_link = get_field('podcast_link');
$audio_desc = get_field('podcast_description');
?>

<div class="podcast-block <?php echo $post_type;?>">

	<div class="row">
		<div class="small-10 small-offset-1 columns">
			<p class="post-date"><?php echo get_the_date(); ?></p>
			<h2><?php the_title(); ?></h2>
		</div>
	</div>

	<div class="row">
		<div class="small-10 small-offset-1 columns">
		<?php if($audio_desc) { ?>
			<p><?php echo $audio_desc;//the_content(); ?>... <a href="<?php the_permalink(); ?>">Read More</a></p>
		<?php } ?>
		</div>
	</div>

	<div class="row">
		<div class="small-10 small-offset-1 columns">
			<?php //echo $audio_link; ?>
			<script src="<?php echo $audio_link; ?>" type="text/javascript" charset="utf-8"></script>
		</div>
	</div>
		
</div>