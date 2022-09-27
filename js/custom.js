jQuery(document).ready(function () {


        jQuery('span.toggle-sub-nav').on('click', function(){
            if (jQuery(this).hasClass('active')) {
                jQuery(this).removeClass('active');
            }
            else{
                jQuery(this).addClass('active')
            }
        })
	jQuery(".product-related-categories.owl-carousel").owlCarousel({
		loop:true,
		nav:false,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:2
			},
			1000:{
				items:4
			}
		}
	});
	jQuery(".banner_home.owl-carousel").owlCarousel({
		loop:true,
		nav:false,
		autoplay:true,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:1
			},
			1000:{
				items:1
			}
		}
	});
	jQuery("#block12 .owl-carousel").owlCarousel({
		loop:false,
		nav:true,
		autoplay:true,
		margin: 20,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:2
			},
			1000:{
				items:3
			}
		}
	});
	jQuery(".carusel_block.owl-carousel").owlCarousel({
		loop:true,
		nav:true,
		autoplay:true,
		margin: 20,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:2
			},
			1000:{
				items:5
			}
		}
	});
	jQuery("#photogalery-carousel.owl-carousel").owlCarousel({
		loop:false,
		nav:true,
		autoplay:true,
		margin: 20,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:1
			},
			1000:{
				items:1
			}
		}
	});
	jQuery("#carousel_proekt.owl-carousel").owlCarousel({
		loop:false,
		nav:true,
		autoplay:true,
		margin: 20,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:1
			},
			1000:{
				items:1
			}
		}
	});
	jQuery("#photogalery-mini-carousel.owl-carousel").owlCarousel({
		loop:false,
		nav:true,
		autoplay:true,
		margin: 20,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:2
			},
			1000:{
				items:3
			}
		}
	});
	jQuery('.show_var').click(function(){
		if (jQuery(this).parent().hasClass('active')) {
			jQuery(this).parent().removeClass('active');
			jQuery(this).text('Показать ещё...');

		}
		else{
			jQuery(this).parent().addClass('active');
			jQuery(this).text('Скрыть');
		}

	})

})
jQuery(document).ready(function(){
	jQuery("#cs").chosen({
		placeholder_text_single: "Выбирите длину",
		no_results_text: "Нужной длины нет",
		width: "110px"
	});
	jQuery(".mob_i i.fa-search").on('click', function(){
		if (jQuery(this).hasClass('active')) {
			jQuery(this).removeClass('active');
			jQuery('.catalog_mod, #row2column2').removeClass('active');
		}
		else{
			jQuery(this).addClass('active');
			jQuery('.catalog_mod, #row2column2').addClass('active');
		}
	})
})
jQuery(window).scroll(function(){
	if (jQuery(window).scrollTop() > 150) {
		jQuery('#wrapper1_mobile, #wrapper2').addClass('header-fixed');
        }
        else {
        	jQuery('#wrapper1_mobile, #wrapper2').removeClass('header-fixed');
        }
    });