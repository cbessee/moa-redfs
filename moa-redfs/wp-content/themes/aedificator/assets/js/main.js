jQuery(document).ready(function(){
	
	jQuery(window).load(function() {
		
		// menu drop down
		jQuery('.menu-top li').hover(function(){
			jQuery(this).children('.sub-menu').stop().slideDown(200, function(){
				jQuery(this).parent('li').children('a').addClass('hover');
			});
		}, function(){
			jQuery(this).children('.sub-menu').stop().slideUp(200, function(){
				jQuery(this).parent('li').children('a').removeClass('hover');
			});
		});
		jQuery('.menu-top .sub-menu').parent('li').children('a').addClass('icon-arrow');
		
		jQuery('.menu-top li').hover(function(){
			jQuery(this).children('.children').stop().slideDown(200, function(){
				jQuery(this).parent('li').children('a').addClass('hover');
			});
		}, function(){
			jQuery(this).children('.children').stop().slideUp(200, function(){
				jQuery(this).parent('li').children('a').removeClass('hover');
			});
		});
		jQuery('.menu-top .children').parent('li').children('a').addClass('icon-arrow');		
		
		jQuery('.menu-top-container .icon-menu').click(function(e) {
			e.preventDefault();
		}).toggle(function(){
			jQuery(this).parent('.menu-top-container').children('.menu-top-mob').stop().slideDown(200);
		}, function(){
			jQuery(this).parent('.menu-top-container').children('.menu-top-mob').stop().slideUp(200);
		});			
		
		// owl-carousel
		jQuery(".welcome-carousel").owlCarousel({
			// Most important owl features
			itemsTabletSmall: true,
			singleItem : true,
			itemsScaleUp : true,
			//Basic Speeds
			paginationSpeed : 800,
			rewindSpeed : 1000,
			stopOnHover : true,
			// Navigation
			navigation : true,
			navigationText : ["",""],
			rewindNav : true,
			scrollPerPage : false,
			//Pagination
			pagination : true,
			paginationNumbers: false,
			// Responsive
			responsive: true,
			responsiveRefreshRate : 100,
			responsiveBaseWidth: window,
			// CSS Styles
			baseClass : "owl-carousel",
			theme : "owl-theme",
			//Lazy load
			lazyLoad : false,
			lazyFollow : true,
			lazyEffect : "fade",
			//Auto height
			autoHeight : true,
			//JSON
			jsonPath : false,
			jsonSuccess : false,
			//Mouse Events
			dragBeforeAnimFinish : true,
			mouseDrag : true,
			touchDrag : true,
			//Transitions
			transitionStyle : "fade", // "fade", "backSlide", "goDown", "fadeUp"
			// Other
			addClassActive : true		
		});

		// article-image hover effect
		jQuery('.article-image').hover(function(){
			jQuery(this).children('.fa').stop().fadeIn(300);
		}, function(){
			jQuery(this).children('.fa').stop().fadeOut(300);
		});
		
		// input focus
		jQuery(".contact-form .wpcf7-text, .contact-form .wpcf7-textarea, .comment-form :text, .comment-form textarea, .searchform #s").focus(function(){
			var value = jQuery(this).attr("value");
			if (value == "")
			var attrfor = jQuery(this).attr('id');
			jQuery("label[for=" + attrfor + "]").css({"display":"none"});
		});
		jQuery(".contact-form .wpcf7-text, .contact-form .wpcf7-textarea, .comment-form :text, .comment-form textarea, .searchform #s").blur(function(){
			var value = jQuery(this).attr("value");
			if (value == "")
			var attrfor = jQuery(this).attr('id');
			jQuery("label[for=" + attrfor + "]").css({"display":"block"});
		});
		
		// some css fixe
		jQuery('.social li:first-child, .social-links li:first-child, .menu-tabs li:first-child, .ui-tabs .ui-tabs-nav li:first-child, .pagination a:first-child, .popular-posts li:first-child, .menu-sidebar li:first-child, .sidebar-block ul li:first-child, .menu-top-mob > li:first-child').addClass('first-child');
		jQuery('.social li:last-child, .social-links li:last-child, .contact-info .contact-info-row:last-child, .pagination a:last-child, .popular-posts li:last-child, .menu-sidebar li:last-child, .sidebar-block ul li:last-child, .menu-top-mob > li:last-child').addClass('last-child');
		jQuery('.icon-search, #searchsubmit').attr({"value":""});
		
	}); // Final load
	
}); // Final ready