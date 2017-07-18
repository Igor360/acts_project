jQuery(document).ready(function($) {
	var $searchToggle = $('.search-btn > i, .toolbar');
	$searchToggle.on('click', function(){
		$(this).parent().find('.search-box').addClass('open');
	});
	$('.search-btn').on('click', function(e) {
    e.stopPropagation();
	});
	$(document).on('click', function(e) {
		$('.search-box').removeClass('open');
	});
		// Toggle Mobile Navigation
	var $navToggle = $('.nav-toggle', '.navbar');
	$navToggle.on('click', function(){
		$(this).toggleClass('active').parents('.navbar').find('.toolbar, .main-navigation, .mobile-socials').toggleClass('expanded');
	});

	// Mobile Submenu
	var $hasSubmenu = $('.menu-item-has-children > a', '.main-navigation');
	$hasSubmenu.on('click', function(){
		$(this).parent().toggleClass('active').find('.sub-menu, .mega-menu').toggleClass('expanded');
	});

	
	// Waves Effect (on Buttons)
	if($('.waves-effect').length > 0) {
		Waves.displayEffect( { duration: 600 } );
	}
	// Animated Scroll to Top Button
	var $scrollTop = $('.scroll-to-top-btn');
	if ($scrollTop.length > 0) {
		$(window).on('scroll', function(){
	    if ($(window).scrollTop() > 600) {
	      $scrollTop.addClass('visible');
	    } else {
	      $scrollTop.removeClass('visible');
	    }
		});
		$scrollTop.on('click', function(e){
			e.preventDefault();
			$('html').velocity("scroll", { offset: 0, duration: 1000, easing:'easeOutExpo', mobileHA: false });
		});
	}

	// Smooth scroll to element
	var $scrollTo = $('.scroll-to');
	$scrollTo.on('click', function(event){
		var $elemOffsetTop = $(this).data('offset-top');
		$('html').velocity("scroll", { offset:$(this.hash).offset().top-$elemOffsetTop, duration: 1000, easing:'easeOutExpo', mobileHA: false});
		event.preventDefault();
	});
		// Contacts Slider (Master Slider)
	if($('#contact-slider').length) {
		var contactSlider = new MasterSlider();

		contactSlider.control('arrows');

		contactSlider.setup('contact-slider' , {
			width:1140,
			height:480,
			space:0,
			loop:true,
			view:'basic',
			layout:'partialview',
	    filters: {
	      opacity: 0.1
	    }
		});
	}

	if($('#conference-slider').length) {
		var conferSlider = new MasterSlider();

		conferSlider.control('arrows', {hideUnder: 800});
		conferSlider.control("bullets", {autohide:false});
		conferSlider.control('timebar', {color: 'rgba(255,255,255,.5)', align: 'top'});

		conferSlider.setup('conference-slider' , {
			width: 1920,
			height: 10,
			space: 0,
			layout: "fillwidth",
      autoHeight: true,
      loop: true,
      view: 'flow',
      autoplay: true
		});
	}

	if($('#intro-slider').length) {
		var introSlider = new MasterSlider();

		introSlider.control('arrows', {hideUnder: 800});
		introSlider.control("bullets", {autohide:false});

		introSlider.setup('intro-slider' , {
			width: 1920,
			height: 10,
			space: 0,
			layout: "fillwidth",
      autoHeight: true,
      loop: true,
      view: 'stack'
		});
	}

	var $imageCarousel = $( '.image-carousel .inner' );
	if ( $imageCarousel.length > 0 ) {
		$imageCarousel.each( function () {

			var dataLoop 	 = $( this ).parent().data( 'loop' ),
					autoPlay   = $( this ).parent().data( 'autoplay' ),
					timeOut    = $( this ).parent().data( 'interval' ),
					autoheight = $( this ).parent().data( 'autoheight' );

			$( this ).owlCarousel( {
				items: 1,
				loop: dataLoop,
				margin: 0,
				nav: true,
				dots: false,
				navText: [ , ],
				autoplay: autoPlay,
				autoplayTimeout: timeOut,
				autoHeight: autoheight
			} );
		} );
	}

	var $logoCarousel = $( '.logo-carousel .inner' );
	if ( $logoCarousel.length > 0 ) {
		$logoCarousel.each( function () {

			var dataLoop 	 = $( this ).parent().data( 'loop' ),
					autoPlay = $( this ).parent().data( 'autoplay' ),
					timeOut = $( this ).parent().data( 'interval' );

			$( this ).owlCarousel( {
				loop: dataLoop,
				margin: 20,
				nav: false,
				dots: false,
				autoplay: autoPlay,
				autoplayTimeout: timeOut,
				responsiveClass: true,
				responsive: {
					0: { items: 2 },
					480: { items: 3 },
					700: { items: 4 },
					1000: { items: 5 },
					1200: { items: 6 },
				}
			} );
		} );
	}

	var $gallItem = $( '.gallery-item' );
	if( $gallItem.length > 0 ) {
		$gallItem.magnificPopup( {
		  type: 'image',
		  mainClass: 'mfp-fade',
		  gallery: {
		    enabled: true
		  },
		  removalDelay: 500,
		  image: {
		  	titleSrc: 'data-title'
		  }
		} );
	}

	});

window.addEventListener("load", showPage, false);


function showPage(){
	document.body.classList.remove('cp-spiner');
}