jQuery(document).ready(function($) {
	// console.log('Start Mobile Navigation....');
	var menu_section = $('#menu-section');
	//console.log(menu_section);
	var menu = $('.bar');
	menu.on('click', function() {
		$('#mobile-menu').toggleClass('hide');
		$('div > #menu-section').toggleClass('open');
		$('div > .animate:before').toggleClass('bar-open');
	});
	// $('body').on("click mousedown mouseup focus blur keydown change",function(e){
	//      console.log(e);
	// });

});