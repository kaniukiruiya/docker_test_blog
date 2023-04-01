/**
*
* -----------------------------------------------------------------------------
*
* Template : Grassy - One Page template js
* Author : rs-theme
* Author URI : http://www.rstheme.com/
*
* -----------------------------------------------------------------------------
*
**/

(function($) {
    "use strict";
    // sticky menu
    var header = $('.menu-sticky');
    var win = $(window);

    win.on('scroll', function() {
       var scroll = win.scrollTop();
       if (scroll < 150) {
           header.removeClass("sticky");
       } else {
           header.addClass("sticky");
       }
    });
	
	
	// One Page Navigation Setup
  $('.navbar-collapse ul').singlePageNav({
    offset: $('.menu-sticky').outerHeight(),
    filter: ':not(.external)',
    speed: 750,
    currentClass: 'active',

    beforeStart: function() {
    },
    onComplete: function() {
    }
  });

     // One Page Navigation Setup
      $('.navbar-collapse ul').singlePageNav({
        offset: $('.menu-sticky').outerHeight(),
        filter: ':not(.external)',
        speed: 750,
        currentClass: 'active',

        beforeStart: function() {
        },
        onComplete: function() {
        }
      });

  // Sticky Navbar Affix
  $('.menu-sticky').affix({
    offset: {
      top: $('.toolbar-area').outerHeight(),
    }
  });

    // collapse hidden
    $(function(){ 
         var navMain = $(".navbar-collapse"); // avoid dependency on #id
         // "a:not([data-toggle])" - to avoid issues caused
         // when you have dropdown inside navbar
         navMain.on("click", "a:not([data-toggle])", null, function () {
             navMain.collapse('hide');
         });
     });


   
	
    // scrollTop init
	var win=$(window);
    var totop = $('#scrollUp');    
    win.on('scroll', function() {
        if (win.scrollTop() > 150) {
            totop.fadeIn();
        } else {
            totop.fadeOut();
        }
    });
    totop.on('click', function() {
        $("html,body").animate({
            scrollTop: 0
        }, 500)
    });	
 

})(jQuery);