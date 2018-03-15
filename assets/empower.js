jQuery(document).ready(function($) {
	
	"use strict";
	
	/*	
	Register Lightbox by magnific-popup
	------------------------------------------------------------------------*/	
	$('.image-lightbox').magnificPopup({type:'image'});
	$('.video-lightbox').magnificPopup({type:'iframe'});
	$('.inline-lightbox').magnificPopup({type:'inline'});
		
	$('.image-lightbox-child').magnificPopup({type:'image'});
	$('.video-lightbox-child').magnificPopup({
		type:'iframe',
		delegate: 'a',
	});
	$('.inline-lightbox-child').magnificPopup({type:'inline'});
	
});