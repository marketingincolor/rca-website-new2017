jQuery(document).ready(function($){


  $('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav'
  });

  $('.slider-nav').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    dots: true,
    arrows: true,
  });

  $('.news-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: false,
    arrows: true,
    fade: true,
    asNavFor: '.news-slider-overlay'
  });

  $('.news-slider-overlay').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: '.news-slider',
    dots: false,
    arrows: true,
  });
    
});