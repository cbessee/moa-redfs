(function($){

	"use strict"; 

	// Header Area start
    $(window).on('scroll',function() {    
        var scroll = $(window).scrollTop();
        if (scroll < 300) {
        $(".header-sticky").removeClass("sticky");
        }else{
        $(".header-sticky").addClass("sticky");
        }
    }); 

	if ( $('body').hasClass('logged-in') ) {
		var top_offset = $('.header-area').height() + 32;
	} else {
		var top_offset = $('.header-area').height() - 0;
	}
	$('.primary-nav-one-page nav').onePageNav({
	     scrollOffset: top_offset,
		 scrollSpeed: 750,
		 easing: 'swing',
		 currentClass: 'active',
	});

	$('body').scrollspy({target: ".main-menu nav"});
	$(".primary-nav-one-page nav ul li:first-child").addClass("active"); 
	$('.main-menu > nav > ul > li').slice(-4).addClass('last-elements');
    $("body").find(".header-top-area").parents("body").find(".header-transparent").addClass("transparent-with-top-bar");

    
    /*-- Mobile Menu --*/
    $('.main-menu nav').meanmenu({
        meanScreenWidth: mobile_menu_data.menu_width,
        meanMenuContainer: '.mobile-menu',
        meanMenuClose: '<i class="fa fa-times"></i>',
        meanMenuOpen: '<i class="fa fa-bars"></i>',
        meanRevealPosition: 'right',
        meanMenuCloseSize: '25px',
    });


	/*========================================*/
	/*  scrollUp
	/*========================================*/
    $.scrollUp({
        scrollText: '<i class="fa fa-angle-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });

    //WOW
	new WOW().init();

	/* Magnific Popup video popup */
	$('a.video-popup').magnificPopup({
		type: 'iframe',
		closeOnContentClick: true,
		closeBtnInside: true,
		mainClass: 'mfp-with-zoom mfp-img-mobile',
		image: {
			verticalFit: true,
			titleSrc: function(item) {
				return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
			}
		},
		gallery: {
			enabled: false
		},
		zoom: {
			enabled: true,
			duration: 300, // don't foget to change the duration also in CSS
			opener: function(element) {
				return element.find('img');
			}
		}
	});

	/* magnificPopup image popup */
    $('.image-popup').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });

	/* slider active  */
    $('.slider-owl').owlCarousel({
        loop: true,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        items: 1,
        dots: false,
        nav: true,
        navText: ['prev', 'next'],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

	/*----------------------
    gallery active
    ------------------------*/
    $('.gallery-active').slick({
        centerMode: true,
        dots: true,
        centerPadding: '0',
        slidesToShow: 5,
        arrows: false,
        responsive: {
            0: {
                items: 1
            },
            767: {
                items: 2
            },
            970: {
                items: 3
            },
            1100: {
                items: 6
            }
        }
    });

    /*------------------------
	testimonials active
	------------------------*/
	$('.testimonials-active').owlCarousel({
		loop: true,
		nav: false,
		items : 1,
		navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		responsive: {
			0: {
				items: 1
			},
			768: {
				items: 1
			},
			1000: {
				items: 1
			}
		}
	})

	/* countdown */
    $('[data-countdown]').each(function() {
        var $this = $(this),
        finalDate = $(this).data('countdown');
        $this.countdown(finalDate, function(event) {
            $this.html(event.strftime('<span class="cdown days"><span class="time-count">%-D</span> <p>Days</p></span> <span class="cdown hour"><span class="time-count">%-H</span> <p>Hour</p></span> <span class="cdown minutes"><span class="time-count">%M</span> <p>Min</p></span> <span class="cdown second"><span class="time-count">%S</span> <p>Sec</p></span>'));
        });
    });

    // masonry
    $('.masonry-blog-grid').imagesLoaded( function() {
        $('.masonry-blog-grid').masonry();
    });
	
	/* youtube video */
    $('.youtube-bg').YTPlayer({
        containment: '.youtube-bg',
        autoPlay: true,
        loop: true,
    });

	function searchEffect(){
		var trigger = $('.search-bar-button span'),
			container = $('.widget_searchform_content');
		
		trigger.on('click', function(){
			$(this).find('.fa').toggleClass('fa-times');
			container.toggleClass('is-visible');
		});
	}
	searchEffect();

})(jQuery);