<?php

// For showing taxonomy menu medium+
?>
<div id="taxonomy-menu" class="show-for-medium" style="padding: 1rem;">
	<div id="taxonomy-menu" class="row">
		<div id="" class="small-12 columns">
			<?php wp_nav_menu( array(
				'menu'=>'taxonomy-menu', 
				'walker'=> new RCA_SECONDARY_WALKER
			) ); ?>
		</div>
	</div>
</div>