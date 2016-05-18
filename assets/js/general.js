var stickyElement;
$( window ).load(function() {
	sellerSlider();
	listingsSlider();
	svgHover();
	otherNeighborhoodToggle();
	if ($('.sticky').length > 0) {
		stickyElement = $('.sticky').offset().top;
	}
	$('.deep-links a, a.smooth-scroll').on('click', function(e) {
		e.preventDefault();
		smoothScroll( $($.attr(this, 'href')), 0);
	})

	if ($(window).width() > 990) {
		$('.neighborhood-list').columnize({columns: 3})
	} else {
		
	}

})

$( document).ready(function() {

})

$( window ).resize(function() {
	if ($(window).width() > 990) {
		
	} else {
		
	}	
})

$(document).ajaxComplete( function() {
	
})


$(window).scroll(function() {  
	if ($('.sticky').length > 0) {
	    if ($(window).scrollTop() > stickyElement) {
	        $('.sticky').addClass('stuck');
	    }
	    else {
	        $('.sticky').removeClass('stuck');
	    }  
	}
});

google.maps.event.addDomListener(window, 'load', mainMapInitialize);
google.maps.event.addDomListener(window, 'load', neighborhoodMapInitialize);

function squareMaker(selector) {
	var width = selector.width();
	selector.css('height', width);
	if ($(window).width() > 1150) {
		$('.contact.offset-cont .side-cont').css('height', width);
	}
}

function divEqualizer(divSelector) {
	var maxHeight = 0;
	divSelector.each(function(){
   		if ($(this).height() > maxHeight) { maxHeight = $(this).height(); }
	});
	divSelector.height(maxHeight);
}

function centerBlogImages() {
	$('img.aligncenter').parent().css('text-align','center')
}

function smoothScroll(element, padding) {
	$('html, body').animate({
        scrollTop: element.offset().top - padding
    }, 600);
}

function mainMapInitialize() {
	var myOptions = {
	    zoom: 10,
	    scaleControl: false,
		scrollwheel: false,
		zoomControl: true,
		panControl:false,
		streetViewControl: false,
		mapTypeControl:false,
	    center: new google.maps.LatLng(35.2, -79.0),
	    mapTypeId: google.maps.MapTypeId.ROADMAP,
	    styles: [{"featureType":"all","stylers":[{"saturation":0},{"hue":"#e7ecf0"}]},{"featureType":"road","stylers":[{"saturation":-70}]},{"featureType":"transit","stylers":[{"visibility":"off"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"water","stylers":[{"visibility":"simplified"},{"saturation":-60}]}]
	};
	var map = new google.maps.Map(document.getElementById('map-canvas-main'), myOptions);
	var image = new google.maps.MarkerImage('/wp-content/themes/mcdevitt/assets/images/map-marker-2.png');
	var marker = new google.maps.Marker({
		position: new google.maps.LatLng(35.1736826, -79.3937891),
		map: map,
		icon: image,
		labelClass: 'pin'
	});

}

function neighborhoodMapInitialize() {
	var latitude = $('#map-canvas-neighborhood').attr('data-lat');
	var longitude = $('#map-canvas-neighborhood').attr('data-long');
	var myOptions = {
	    zoom:14,
	    scaleControl: false,
		scrollwheel: false,
		zoomControl: true,
		panControl:false,
		streetViewControl: false,
		mapTypeControl:false,
	    center: new google.maps.LatLng(latitude, longitude),
	    mapTypeId: google.maps.MapTypeId.ROADMAP,
	    styles: [{"featureType":"all","stylers":[{"saturation":0},{"hue":"#e7ecf0"}]},{"featureType":"road","stylers":[{"saturation":-70}]},{"featureType":"transit","stylers":[{"visibility":"off"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"water","stylers":[{"visibility":"simplified"},{"saturation":-60}]}]
	};
	var map = new google.maps.Map(document.getElementById('map-canvas-neighborhood'), myOptions);
	var image = new google.maps.MarkerImage('/wp-content/themes/mcdevitt/assets/images/map-marker-2.png');
	var marker = new google.maps.Marker({
		position: new google.maps.LatLng(latitude, longitude),
		map: map,
		icon: image,
		labelClass: 'pin'
	});

}

function sellerSlider() {
	$('.seller-slider').slick({
		nextArrow: '<i class="fa fa-angle-right" aria-hidden="true"></i>',
		prevArrow: '<i class="fa fa-angle-left" aria-hidden="true"></i>',
		dots: true
	});
}

function listingsSlider() {
	$('.listings-slider').slick({
		nextArrow: '<i class="fa fa-angle-right" aria-hidden="true"></i>',
		prevArrow: '<i class="fa fa-angle-left" aria-hidden="true"></i>',
		infinite: true,
		slidesToShow: 3,
		slidesToScroll: 1
	});
}

function svgHover() {
	$('.badge').on("mouseenter", function() {
		$(this).addClass('color');
		$('.badge').addClass('bandw');
		var townSlug = $(this).attr('id');
		$('svg g#' + townSlug + ' .outline, svg g#' + townSlug + ' text').css('opacity', 1);
	})
	$('.badge').on("mouseleave", function() {
		$('.badge').removeClass('bandw');
		$(this).removeClass('color');
		$('svg g.town .outline, svg g.town text').css('opacity', 0);
	})
	$('.dot').on("mouseenter",function() {
		$(this).siblings().css('opacity', 1);
		var townSlug = $(this).parent().attr('id');
		$('.badge').addClass('bandw');
		$('.badge#' + townSlug).addClass('color');
		
	})
	$('.dot').on("mouseleave",function() {
		$(this).siblings().css('opacity', 0);
		$('.badge').removeClass('color');
		$('.badge').removeClass('bandw');
	})
}

function otherNeighborhoodToggle() {
	$('.neighborhood-toggle').on('click', function() {
		$('.other-neighborhoods').slideToggle('slow');
	})
}
