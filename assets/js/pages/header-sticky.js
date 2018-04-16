// Header Sticky
var HeaderSticky = function() {
  'use strict';

  // Handle Header Sticky
  var handleHeaderSticky = function() {
    // On loading, check to see if more than 15rem, then add the class
    if ($('.js-header-sticky').offset().top > 15) {
      $('.js-header-sticky').addClass('s-header-shrink');
    }

    // On scrolling, check to see if more than 15rem, then add the class
    $(window).on('scroll', function() {
      if ($('.js-header-sticky').offset().top > 15) {
        $('.js-header-sticky').addClass('s-header-shrink');
      } else {
        $('.js-header-sticky').removeClass('s-header-shrink');
      }
    });
  }

  return {
    init: function() {
      handleHeaderSticky(); // initial setup for Header Sticky
    }
  }
}();

$(document).ready(function() {
  HeaderSticky.init();
});