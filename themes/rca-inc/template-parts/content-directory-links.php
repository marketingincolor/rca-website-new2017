<?php

/**
 * Purpose: Displays alternative podcast directory section.
 * Date: 7/1/2019
 * Author: ET. MARKETING IN COLOR
 */

$resources = get_field('directory_links');
if ($resources) : ?>	

	<div id="related-content-block-outer" class="directory-links row">
		<div class="row">
			<div class="small-12 columns text-center">
				<h4 style="margin:auto; position:relative; width:fit-content; background-color:#FFF; z-index:10;">&nbsp;Subscribe at your Favorite Podcast Directory!&nbsp;</h4>
			</div>
		</div>
		<div class="row" data-equalizer>

			<div id="related-content-block-full" class="small-10 small-offset-1 columns" style="position:relative; top:-15px;">
				<div class="row small-up-2 medium-up-6" style="padding:1.5em;">
			<?php if ( $resources['apple_link'] ) : ?>
				<div class="column column-block" data-equalizer-watch>
					<a href="<?php echo $resources['apple_link']; ?>" class="swapper" target="_blank" style="padding:1em 0em; display:inline-block;"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/rca-podcast-directory-icon-apple-down.png" alt=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/rca-podcast-directory-icon-apple-hover.png" alt=""></a>
				</div>
			<?php endif; ?>
			<?php if ( $resources['tunein_link'] ) : ?>
				<div class="column column-block" data-equalizer-watch>
					<a href="<?php echo $resources['tunein_link']; ?>" class="swapper" target="_blank" style="padding:1em 0em; display:inline-block;"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/rca-podcast-directory-icon-tunein-down.png" alt=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/rca-podcast-directory-icon-tunein-hover.png" alt=""></a>
				</div>
			<?php endif; ?>
			<?php if ( $resources['google_link'] ) : ?>
				<div class="column column-block" data-equalizer-watch>
					<a href="<?php echo $resources['google_link']; ?>" class="swapper" target="_blank" style="padding:1em 0em; display:inline-block;"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/rca-podcast-directory-icon-google-down.png" alt=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/rca-podcast-directory-icon-google-hover.png" alt=""></a>
				</div>
			<?php endif; ?>
			<?php if ( $resources['stitcher_link'] ) : ?>
				<div class="column column-block" data-equalizer-watch>
					<a href="<?php echo $resources['stitcher_link']; ?>" class="swapper" target="_blank" style="padding:1em 0em; display:inline-block;"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/rca-podcast-directory-icon-stitcher-down.png" alt=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/rca-podcast-directory-icon-stitcher-hover.png" alt=""></a>
				</div>
			<?php endif; ?>
			<?php if ( $resources['soundcloud_link'] ) : ?>
				<div class="column column-block" data-equalizer-watch>
					<a href="<?php echo $resources['soundcloud_link']; ?>" class="swapper" target="_blank" style="padding:1em 0em; display:inline-block;"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/rca-podcast-directory-icon-soundcloud-down.png" alt=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/rca-podcast-directory-icon-soundcloud-hover.png" alt=""></a>
				</div>
			<?php endif; ?>
			<?php if ( $resources['spotify_link'] ) : ?>
				<div class="column column-block" data-equalizer-watch>
					<a href="<?php echo $resources['spotify_link']; ?>" class="swapper" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/rca-podcast-directory-icon-spotify-down.png" alt=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/rca-podcast-directory-icon-spotify-hover.png" alt=""></a>
				</div>
			<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>

