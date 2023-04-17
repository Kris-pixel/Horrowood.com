$(document).ready(function(){
    $(".owl-carousel").owlCarousel({
      loop:true,
      margin:20,
      nav:true,
      autoplayHoverPause:true,
      autoplay:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:3
          },
          1000:{
              items:6
          }
      }
  });
  });