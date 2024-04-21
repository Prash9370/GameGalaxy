jQuery(function($){
    "use strict";
    jQuery('.main-menu > ul').superfish({
        delay:       500,
        animation:   {opacity:'show',height:'show'},
        speed:       'fast'
    });
});

"use strict";

//* Navbar Fixed
function navbarFixed(){
    if ( jQuery('.main-header.is-sticky-on').length ){ 
        $(window).on('scroll', function() {
            var scroll = jQuery($).scrollTop();
            if (scroll >= 295) {
                $(".main-header.is-sticky-on").addClass("header-fixed");
            } else {
                $(".main-header.is-sticky-on").removeClass("header-fixed");
            }
        });  
    };
};

jQuery('.navbar-menubar.responsive-menu .navbar-nav').find( 'a' ).on( 'focus blur', function() {
    jQuery( this ).parents( 'ul, li' ).toggleClass( 'focus' );
});   
    
/*Function Calls*/ 

jQuery(document).ready(function() {
    jQuery(".navbar-toggler").on("click", function(n) {
        if (jQuery(this).attr('aria-expanded') == 'false' ) {
            jQuery(".navbar-menubar").removeClass('active');
            jQuery(".navbar-toggler:not(.navbar-toggler-close)").focus();
        } else {
            jQuery(".navbar-menubar").addClass('active');
            jQuery(".navbar-toggler.navbar-toggler-close").focus();
            n.preventDefault();
            var t, a, c, o = document.querySelector(".navbar-menu");
            let e = 'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])',
                m = document.querySelector(".navbar-toggler-close"),
                u = o.querySelectorAll(e),
                r = u[u.length - 1];
            if (!o) return !1;
            for (a = 0, c = (t = o.getElementsByTagName("button")).length; a < c; a++) t[a].addEventListener("focus", l, !0), t[a].addEventListener("blur", l, !0);

            function l() {
                for (var e = this; - 1 === e.className.indexOf("navbar-menu");) "li" === e.tagName.toLowerCase() && (-1 !== e.className.indexOf("focus") ? e.className = e.className.replace("focus", "") : e.className += " focus"), e = e.parentElement
            }
            document.addEventListener("keydown", function(e) {
                ("Tab" === e.key || 9 === e.keyCode) && (e.shiftKey ? document.activeElement === m && (r.focus(), e.preventDefault()) : document.activeElement === r && (m.focus(), e.preventDefault()))
            })
        }
    });

    var gadget_store_dropdownToggle = jQuery('.navbar-nav.main-nav .dropdown > a.nav-link');
    gadget_store_dropdownToggle.after('<button type="button" class="dropdown-icon"></button>');
    gadget_store_dropdownToggle.removeAttr('data-bs-toggle').removeAttr('data-bs-target').removeAttr('aria-expanded').removeAttr('data-bs-name').removeAttr('aria-haspopup');
    jQuery(document).on('click', '.navbar-nav.main-nav .dropdown > button.dropdown-icon', function() {
        jQuery(this).parent(".menu-item").toggleClass("show");
        jQuery(this).next(".sub-menu").slideToggle();
    });
    jQuery(window).on('resize', gadget_store_desktopmenu);
    function gadget_store_desktopmenu() {
        if (window.matchMedia("(min-width: 992px)").matches) {
            jQuery('.sub-menu.collapse').removeAttr('style');
        }
    }
    jQuery(document).on('click', '.navbar-nav.main-nav .dropdown > a', function() {
        location.href = this.href;
    });
});
var btn = jQuery('#scrolltop');

jQuery(window).scroll(function() {
  if (jQuery(window).scrollTop() > 300) {
    btn.addClass('scroll');
  } else {
    btn.removeClass('scroll');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  jQuery('html, body').animate({scrollTop:0}, '300');
});

window.addEventListener('load', (event) => {
    jQuery(".loading").delay(2000).fadeOut("slow");
});

// dropdown category
jQuery(document).ready(function(){
  jQuery(".category-dropdown").hide();
  
  jQuery("button.category-btn").click(function(){
    jQuery(".category-dropdown").toggle();
  });

  // Handle focus using Tab and Shift+Tab
  jQuery(".category-btn, .category-dropdown").on("keydown", function(e) {
    var dropdownItems = jQuery(".category-dropdown").find("a"); // Assuming dropdown items are represented by <a> tags
    
    if (e.keyCode === 9) { // Tab key
      if (!e.shiftKey && document.activeElement === dropdownItems.last().get(0)) {
        e.preventDefault();
        jQuery(".category-btn").focus();
      } else if (e.shiftKey && document.activeElement === dropdownItems.first().get(0)) {
        e.preventDefault();
        jQuery(".category-btn").focus();
      }
    }
  });
});

//sticy header js

jQuery(window).scroll(function () {
    var sticky = jQuery('.sticky-header'),
    scroll = jQuery(window).scrollTop();

    if (scroll >= 100) sticky.addClass('fixed-header');
    else sticky.removeClass('fixed-header');
});