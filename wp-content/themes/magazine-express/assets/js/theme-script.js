function magazine_express_openNav() {
  jQuery(".sidenav").addClass('show');
}
function magazine_express_closeNav() {
  jQuery(".sidenav").removeClass('show');
}

( function( window, document ) {
  function magazine_express_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const magazine_express_nav = document.querySelector( '.sidenav' );

      if ( ! magazine_express_nav || ! magazine_express_nav.classList.contains( 'show' ) ) {
        return;
      }

      const elements = [...magazine_express_nav.querySelectorAll( 'input, a, button' )],
        magazine_express_lastEl = elements[ elements.length - 1 ],
        magazine_express_firstEl = elements[0],
        magazine_express_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;

      if ( ! shiftKey && tabKey && magazine_express_lastEl === magazine_express_activeEl ) {
        e.preventDefault();
        magazine_express_firstEl.focus();
      }

      if ( shiftKey && tabKey && magazine_express_firstEl === magazine_express_activeEl ) {
        e.preventDefault();
        magazine_express_lastEl.focus();
      }
    } );
  }

  magazine_express_keepFocusInMenu();
} )( window, document );

jQuery(document).ready(function() {
   var slider_loop = jQuery('.image1').attr('slider-loop');
	var owl = jQuery('.image1 .owl-carousel');
		owl.owlCarousel({
			margin: 0,
			nav: false,
			autoplay:true,
			autoplayTimeout:3000,
			autoplayHoverPause:true,
			loop: slider_loop == 0 ? false : slider_loop,
      dots:false,
      rtl:true,
			navText : ['<i class="fa fa-lg fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-lg fa-chevron-right" aria-hidden="true"></i>'],
			responsive: {
			  0: {
			    items: 1
			  },
			  600: {
			    items: 1
			  },
			  1024: {
			    items: 1
			}
		}
	})
    window.addEventListener('load', (event) => {
    jQuery(".loading").delay(2000).fadeOut("slow");
  });
})

jQuery(document).ready(function() {
   var slider_loop = jQuery('.image2').attr('slider-loop');
  var owl = jQuery('.image2 .owl-carousel');
    owl.owlCarousel({
      margin: 0,
      nav: false,
      autoplay:true,
      autoplayTimeout:3000,
      autoplayHoverPause:true,
      loop: slider_loop == 0 ? false : slider_loop,
      dots:false,
      rtl:true,
      navText : ['<i class="fa fa-lg fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-lg fa-chevron-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 1
        },
        1024: {
          items: 1
      }
    }
  })
})

jQuery(document).ready(function() {
   var slider_loop = jQuery('.image3').attr('slider-loop');
  var owl = jQuery('.image3 .owl-carousel');
    owl.owlCarousel({
      margin: 0,
      nav: false,
      autoplay:true,
      autoplayTimeout:3000,
      autoplayHoverPause:true,
      loop: slider_loop == 0 ? false : slider_loop,
      dots:false,
      rtl:true,
      navText : ['<i class="fa fa-lg fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-lg fa-chevron-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 1
        },
        1024: {
          items: 1
      }
    }
  })
})

jQuery(document).ready(function(){
  jQuery('span.search-box a').click(function(){
    jQuery(".serach_outer").toggle();
  });
});

jQuery('.serach_inner input.search-field').on('keydown', function (e) {
  if (jQuery("this:focus") && (e.which === 9)) {
    e.preventDefault();
    jQuery(this).blur();
    jQuery('.serach_inner [type="submit"]').focus();
  }
});

jQuery('.serach_inner [type="submit"]').on('keydown', function (e) {
  if (jQuery("this:focus") && (e.which === 9)) {
    e.preventDefault();
    jQuery(this).blur();
    jQuery('span.search-box a').focus();
  }
});

var btn = jQuery('#button');

jQuery(window).scroll(function() {
  if (jQuery(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  jQuery('html, body').animate({scrollTop:0}, '300');
});

jQuery(window).scroll(function() {
  var data_sticky = jQuery('.menu-header').attr('data-sticky');
  if (data_sticky == "true") {
    if (jQuery(this).scrollTop() > 1){
      jQuery('.menu-header').addClass("stick_header");
    } else {
      jQuery('.menu-header').removeClass("stick_header");
    }
  }
});
