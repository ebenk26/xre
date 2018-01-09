// Portfolio
var Portfolio = function() {
  'use strict';

  // Handle Portfolio
  var handlePortfolio = function() {
    // init cubeportfolio
    $('.js-grid-tabs').cubeportfolio({
      filters: '.js-filters-tabs',
      defaultFilter: '.-is-active',
      animationType: 'fadeOut',
      gridAdjustment: 'default',
      displayType: 'default',
      caption: '',
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