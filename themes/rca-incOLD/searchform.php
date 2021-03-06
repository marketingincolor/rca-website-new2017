<?php

/**
 * Purpose: Default search form for RCA Inc.
 * Date: 10/24/2017
 * Author: AD.,NB.,ET., MARKETING IN COLOR
 */

?>
<form role="search" method="get" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="search-wrap">
    	<label class="screen-reader-text" for="s"><?php _e( 'Search for:', 'presentation' ); ?></label>
        <input type="search" placeholder="<?php echo esc_attr( 'Search…', 'presentation' ); ?>" name="s" id="search-input" value="<?php echo esc_attr( get_search_query() ); ?>" />
        <div id="search-icon">
			<!-- <img src="<?php #echo get_stylesheet_directory_uri() . '/images/search-icon.jpg';?>">	 -->
			<input type="image" name="submit" src="<?php echo get_stylesheet_directory_uri() . '/images/search-icon.jpg';?>" border="0" alt="Submit" />
    	</div>
        <input class="screen-reader-text" type="submit" id="search-submit" value="Search" />
    </div>

</form>