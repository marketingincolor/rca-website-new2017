<?php

/**
 * Purpose: Displays related content section.
 * Date: 7/1/2019
 * Author: ET. MARKETING IN COLOR
 */

function get_icon( $icontype ){

if($icontype == 'case_studies'):
  $icon   = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/Case-Studies-Icon-Gray-01.svg';
elseif($icontype == 'webinars'):
  $icon   = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/Webinar-Icon-Gray-01.svg';
elseif($icontype == 'white_papers'):
  $icon   = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/White-Papers-Icon-Gray-01.svg';
elseif($icontype == 'visual_resources'):
  $icon   = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/Visual-Resources-Icon-Gray-01.svg';
elseif($icontype == 'podcasts'):
  $icon   = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/Podcasts-Icon-Gray-01.svg';
elseif($icontype == 'published_articles'):
  $icon   = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/Published-Articles-Icon-Gray-01.svg';
endif;

return $icon;

}

$resources = get_field('podcast_resources');

if ($resources) :
?>	

	<div id="related-content-block-outer" class="row">
		<div class="row">
			<div class="small-12 columns text-center">
				<h4>Related Content</h4>
			</div>
		</div>
		<div class="row" data-equalizer>
		<?php 
		if ( $resources['r1_title'] && $resources['r2_title'] && $resources['r3_title'] ) : 
			$place = 'small-12 medium-4 columns';
		elseif ( $resources['r1_title'] && $resources['r2_title'] ) : 
			$place = 'small-12 medium-6 columns';
		elseif ( $resources['r1_title'] ) : 
			$place = 'small-12 medium-4 medium-offset-4 columns';
		endif;
		?>

			<div id="related-content-block" class="small-10 small-offset-1 columns">
				<div class="row">
			<?php if ( $resources['r1_title'] ) : ?>
				<div class="<?php echo $place; ?> random-item" data-equalizer-watch>
					<img src="<?php echo get_icon( $resources['r1_icon']); ?>" alt="">
					<p><?php echo $resources['r1_title']; ?>... <a href="<?php echo $resources['r1_link']; ?>">Read More</a></p>
				</div>
			<?php endif; ?>
			<?php if ( $resources['r2_title'] ) : ?>
				<div class="<?php echo $place; ?> random-item" data-equalizer-watch>
					<img src="<?php echo get_icon( $resources['r2_icon']); ?>" alt="">
					<p><?php echo $resources['r2_title']; ?>... <a href="<?php echo $resources['r2_link']; ?>">Read More</a></p>
				</div>
			<?php endif; ?>
			<?php if ( $resources['r3_title'] ) : ?>
				<div class="<?php echo $place; ?> random-item" data-equalizer-watch>
					<img src="<?php echo get_icon( $resources['r3_icon']); ?>" alt="">
					<p><?php echo $resources['r3_title']; ?>... <a href="<?php echo $resources['r3_link']; ?>">Read More</a></p>
				</div>
			<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>

