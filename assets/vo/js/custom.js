/*------------------------------------------------------------------
Project:    Wolfram
Author:     Yevgeny Simzikov
URL:        http://simpleqode.com/
            https://twitter.com/YevSim
Version:    1.1.1
Created:        18/08/2014
Last change:    19/11/2014
-------------------------------------------------------------------*/

/*
 * Preloader
 */

$(window).load(function(){
    $('.preloader').fadeOut(1000);
});

/*
 * Sidebar
 */

$(".sidebar-btn").on('click', function() {
    $(".sidebar-overlay").toggleClass("show hidden");
    $(".sidebar-menu").toggleClass("show hidden");
    return false;
});

/*
 * Navbar Transparent : Removing and adding on scroll
 */

$('.screen:first').waypoint(function() {
  $(".navbar").toggleClass("navbar-transparent");
}, {
  offset: function() {
    return -$(this).height();
  }
});

/*
 * Backstretch Carousel :: Replace with your images if necessary.
 */

$(".backstretch-carousel").backstretch([
  base_url+"assets/img/screen-bg_7.jpg",
  base_url+"assets/img/screen-bg_1.jpg",
  base_url+"assets/img/screen-bg_2.jpg",
  base_url+"assets/img/screen-bg_3.jpg",   
  base_url+"assets/img/screen-bg_4.jpg",   
  base_url+"assets/img/screen-bg_5.jpg",   
  base_url+"assets/img/screen-bg_6.jpg"
], {
    duration: 1000,
    fade: 1000
  });

$(".backstretch-carousel").backstretch("pause");

$('.screen').waypoint(function(direction) {
  if (direction === 'down') {
   $(".backstretch-carousel").backstretch("next");
  }
  if (direction === 'up') {
   $(".backstretch-carousel").backstretch("prev");
  }
}, { offset: '50%' });

/*
 * Smooth Scrolling
 */

$(document).ready(function(){
    $('a[href=#welcome],a[href=#about], a[href=#portfolio], a[href=#pricing], a[href=#team], a[href=#features], a[href=#contact-us]').bind("click", function(e){
      var anchor = $(this);
      $('html, body').stop().animate({
        scrollTop: $(anchor.attr('href')).offset().top
      }, 1000);
      e.preventDefault();
    });
   return false;
});
