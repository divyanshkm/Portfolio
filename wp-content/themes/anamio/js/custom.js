(function($) {
	'use strict';
	
	$(document).ready(function() {
		/*
			* Slider Script
		*/
		var $owlHome    = $('.main-slider-anamio');
		var $owlHomeParent  = $('.slider-wrapper-anamio');
		$owlHome.owlCarousel({
			rtl: $("html").attr("dir") == 'rtl' ? true : false,
			// nav:  $owlHome.children().length > 1,
			nav: true,
			navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
			dots: true,
			loop: $owlHome.children().length > 1,
			autoplayTimeout:10000,
			margin: 0,
			autoplay:true,
			autoHeight: true,	  
			items:1,
			smartSpeed:450,
			responsive: {
				0: {
					items: 1,
					nav: false,
					dots: false
				},
				600: {
					items: 1
				},
				1000: {
					items: 1
				}
			}
		});
		$owlHome.owlCarousel();
		$owlHome.on('translate.owl.carousel', function (event) {
			var data_anim = $("[data-animation]");
			data_anim.each(function() {
				var anim_name = $(this).data('animation');
				$(this).removeClass('animated ' + anim_name).css('opacity', '0');
			});
		});
		$("[data-delay]").each(function() {
			var anim_del = $(this).data('delay');
			$(this).css('animation-delay', anim_del);
		});
		$("[data-duration]").each(function() {
			var anim_dur = $(this).data('duration');
			$(this).css('animation-duration', anim_dur);
		});
		$owlHome.on('translated.owl.carousel', function() {
			var data_anim = $owlHome.find('.owl-item.active').find("[data-animation]");
			data_anim.each(function() {
				var anim_name = $(this).data('animation');
				$(this).addClass('animated ' + anim_name).css('opacity', '1');
			});
		});
	
		
		//anamio CTA Section Auto Height
		var cta_height = $("#cta-unique").height();
		$(":root").css("--cta-height",-cta_height+"px");
		
	});
	
}(jQuery));