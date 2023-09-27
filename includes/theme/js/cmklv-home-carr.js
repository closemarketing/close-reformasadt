jQuery( function($) {
	$(document).ready(function(){
		$('.owl-carousel.cmklv-carousel-block').owlCarousel({
			loop:true,
			margin:20,
			autoplay: false,
			nav:false,
			responsive:{
				0:{
					items:1
				},
				400:{
					items:1
				},
				768:{
					items:2
				},
				1000:{
					items:2
				}
			}
		})
	});
});