var stickyElement;
jQuery( window ).load(function() {
	sellerSlider();
	listingsSlider();
	svgHover();
	otherNeighborhoodToggle();
	if (jQuery('.sticky').length > 0) {
		stickyElement = jQuery('.sticky').offset().top;
	}
	jQuery('.deep-links a, a.smooth-scroll').on('click', function(e) {
		e.preventDefault();
		smoothScroll( jQuery(jQuery.attr(this, 'href')), 0);
	})

	if (jQuery(window).width() > 990) {
		jQuery('.neighborhood-list').columnize({columns: 3})
		squareMaker(jQuery('.dsidx-photo'));
		squareMaker(jQuery('.categories li'));
		mlsResultImages();
	} else {
		
	}

})

jQuery( document).ready(function() {

})

jQuery( window ).resize(function() {
	if (jQuery(window).width() > 990) {
		
	} else {
		
	}	
})

jQuery(document).ajaxComplete( function() {
	
})


jQuery(window).scroll(function() {  
	if (jQuery('.sticky').length > 0) {
	    if (jQuery(window).scrollTop() > stickyElement) {
	        jQuery('.sticky').addClass('stuck');
	    }
	    else {
	        jQuery('.sticky').removeClass('stuck');
	    }  
	}
});

if (jQuery('#map-canvas-main').length > 0) {
	google.maps.event.addDomListener(window, 'load', mainMapInitialize);
}
if (jQuery('#map-canvas-neighborhood').length > 0) {
	google.maps.event.addDomListener(window, 'load', neighborhoodMapInitialize);
}


function squareMaker(selector) {
	var width = selector.width();
	selector.css('height', width);
	if (jQuery(window).width() > 1150) {
		jQuery('.contact.offset-cont .side-cont').css('height', width);
	}
}

function divEqualizer(divSelector) {
	var maxHeight = 0;
	divSelector.each(function(){
   		if (jQuery(this).height() > maxHeight) { maxHeight = jQuery(this).height(); }
	});
	divSelector.height(maxHeight);
}

function centerBlogImages() {
	jQuery('img.aligncenter').parent().css('text-align','center')
}

function smoothScroll(element, padding) {
	jQuery('html, body').animate({
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
	var latitude = jQuery('#map-canvas-neighborhood').attr('data-lat');
	var longitude = jQuery('#map-canvas-neighborhood').attr('data-long');
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
	jQuery('.seller-slider').slick({
		nextArrow: '<i class="fa fa-angle-right" aria-hidden="true"></i>',
		prevArrow: '<i class="fa fa-angle-left" aria-hidden="true"></i>',
		dots: true
	});
}

function listingsSlider() {
	jQuery('.listings-slider').slick({
		nextArrow: '<i class="fa fa-angle-right" aria-hidden="true"></i>',
		prevArrow: '<i class="fa fa-angle-left" aria-hidden="true"></i>',
		infinite: true,
		slidesToShow: 3,
		slidesToScroll: 1
	});
}

function svgHover() {
	jQuery('.badge').on("mouseenter", function() {
		jQuery(this).addClass('color');
		jQuery('.badge').addClass('bandw');
		var townSlug = jQuery(this).attr('id');
		jQuery('svg g#' + townSlug + ' .outline, svg g#' + townSlug + ' text').css('opacity', 1);
	})
	jQuery('.badge').on("mouseleave", function() {
		jQuery('.badge').removeClass('bandw');
		jQuery(this).removeClass('color');
		jQuery('svg g.town .outline, svg g.town text').css('opacity', 0);
	})
	jQuery('.dot').on("mouseenter",function() {
		jQuery(this).siblings().css('opacity', 1);
		var townSlug = jQuery(this).parent().attr('id');
		jQuery('.badge').addClass('bandw');
		jQuery('.badge#' + townSlug).addClass('color');
		
	})
	jQuery('.dot').on("mouseleave",function() {
		jQuery(this).siblings().css('opacity', 0);
		jQuery('.badge').removeClass('color');
		jQuery('.badge').removeClass('bandw');
	})
}

function otherNeighborhoodToggle() {
	jQuery('.neighborhood-toggle').on('click', function() {
		jQuery('.other-neighborhoods').slideToggle('slow');
	})
}

function mlsResultImages() {
	jQuery('.dsidx-photo img').each(function() {
      if (jQuery(this).width() > jQuery(this).height()) {
        jQuery(this).addClass('landscape');        
      }
    });
}




