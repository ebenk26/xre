// Portfolio
var Portfolio = function() {
  'use strict';

  // Handle Portfolio
  var handlePortfolio = function() {
    // init cubeportfolio
    $('.js-grid-faq').cubeportfolio({
        filters: '.js-filters-faq',
        defaultFilter: '*',
        animationType: 'sequentially',
        gridAdjustment: 'default',
        displayType: 'default',
        caption: 'expand',
        gapHorizontal: 0,
        gapVertical: 0
    });
  }

  return {
    init: function() {
      handlePortfolio(); // initial setup for Portfolio
    }
  }
}();

$(document).ready(function() {
  Portfolio.init();
});