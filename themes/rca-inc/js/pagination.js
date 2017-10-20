$(document).ready(function() {
	$('.pagination .current:hover, .pagination .next:hover, .pagination .prev:hover').on('hover', function() {
		$('.navigation i').css('color', 'white');
	});
});