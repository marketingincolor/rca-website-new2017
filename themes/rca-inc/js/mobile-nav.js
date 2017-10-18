jQuery(document).ready(function($) {
	// console.log('Start Mobile Navigation....');
	var menu_section = $('#menu-section');
	//console.log(menu_section);
	var menu = $('.bar');
	menu.on('click', function() {
		$('#mobile-menu').toggleClass('hide');
		$('div > #menu-section').toggleClass('open');
		$('div > .animate:before').toggleClass('bar-open');
		$('#top-nav-wrapper').toggleClass('hide');
	});
	// $('body').on("click mousedown mouseup focus blur keydown change",function(e){
	//      console.log(e);
	// });
	// 
	var topNavButton = $('#mobile-menu > li > a');
	topNavButton.on('click', function() {
		$(this).toggleClass('orange-bg');
		$(this).toggleClass('white-font');
		//$(this > ul ).toggleClass('is-active');
	});

	$('#mobile-menu > li > ul > li > ul').removeClass('is-submenu','submenu');

	jQuery( document ).ready(function($) {
	    $('#mobile-menu  li  ul  li  a.mega-menu-link').unbind();
	});
});