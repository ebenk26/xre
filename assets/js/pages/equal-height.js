// Equal Height
var EqualHeight = function() {
  "use strict";

  // Handle Equal Height
  var handleEqualHeight = function() {
    $(function($) {
      $('.js-form-equal-height-v1').responsiveEqualHeightGrid();
      $('.js-tab-equal-height-v1').responsiveEqualHeightGrid();
    });
  }

  return {
    init: function() {
      handleEqualHeight(); // initial setup for equal height
    }
  }
}();

$(document).ready(function() {
    EqualHeight.init();
});