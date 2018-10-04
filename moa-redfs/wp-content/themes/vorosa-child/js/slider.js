jQuery( document ).ready( function( $ ) {

  function nextSlide() {
    jQuery('.slider-area .owl-carousel .owl-nav .owl-next').click();
  }
  setInterval(nextSlide, 7000);
} );