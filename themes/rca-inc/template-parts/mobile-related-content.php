<?
// Template: For related content on mobile pages

// BUILD QUERIES
// 


?>
<div id="related-content-mobile" class="row expanded text-center hide-for-large">
	<div class="small-12 columns">
		<h4 class="related-content">Related Articles</h4>
		<?php echo do_shortcode('[rca-related-case-studies-mobile category="" navigation="true" navigationText="&#xf104;, &#xf105;" items=1 autoPlay="false" itemsDesktop="false" itemsDesktopSmall="false" itemsTablet="false"]'); ?>
	</div>
</div>
<script>
   $( ".owl-prev").html('<i class="fa fa-chevron-left"></i>');
   $( ".owl-next").html('<i class="fa fa-chevron-right"></i>');
 //   $(".owl-carousel").owlCarousel({
	//   navigation: true,
	//   navigationText: [$( ".owl-next"),$( ".owl-previous")]
	// });
</script>