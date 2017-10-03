<!-- Buttons -->
<div id="news-all-buttons" class="row">
	<div class="small-10 small-offset-1 large-2 large-offset-1 columns">
		<a href="<?php echo get_permalink( get_page_by_path( 'news' ) );  ?>"><button id="filter-news" class="news-filter" onclick="" title="News" news_filter="news">News</button></a>
	</div>
	<div class="small-10 small-offset-1 large-2 large-offset-0 columns">
		<a href="<?php echo get_permalink( get_page_by_path( 'press-releases' ) ); ?>"><button id="press" class="news-filter" onclick="" title="Press Releases" news_filter="press-releases">Press Releases</button></a>
	</div>
	<div class="small-10 small-offset-1 large-2 large-offset-0 columns">
		<a href="<?php echo get_permalink( get_page_by_path( 'events' ) ); ?>"><button id="events" class="news-filter" onclick="" title="Events" news_filter="events">Events</button></a>
	</div>
	<div class="small-10 small-offset-1 large-2 large-offset-0 columns">
		<a href="<?php echo get_permalink( get_page_by_path( 'view-all-articles' ) ); ?>"><button id="all" class="news-filter" onclick="" title="" news_filter="all">View All</button></a>
	</div>
	<div class="small-10 small-offset-1 large-2 large-offset-0 columns end">
		<select id="newsFilterSelect" class="" onclick="" onchange="document.getElementById('').submit();>
		<?php 
			$beginning_year = 2016;
			$current_year = date("Y");
			var_dump($current_year);
			echo '<option value="Year Published">Year Published</option>';
			for ($i = $beginning_year; $i <= $current_year; $i++ ){ ?>
				<center><option class="news-filter" value="<?php echo $i;?>" news_filter="<?php echo $i; ?>"><?php echo $i; ?></option></center>
		<?php	}
		?>
		</select>
	</div>
</div>
<!-- /Buttons -->