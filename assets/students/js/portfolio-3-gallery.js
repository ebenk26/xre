(function($, window, document, undefined) {
    'use strict';

    // init cubeportfolio
    $('#js-grid-lightbox-gallery').cubeportfolio({
        filters: '#js-filters-lightbox-gallery1, #js-filters-lightbox-gallery2',
        loadMore: '#js-loadMore-lightbox-gallery',
        loadMoreAction: 'click',
        layoutMode: 'grid',
        mediaQueries: [{
            width: 1500,
            cols: 6
        }, {
            width: 1100,
            cols: 6
        }, {
            width: 800,
            cols: 6
        }, {
            width: 480,
            cols: 6
        }, {
            width: 320,
            cols: 4
        }],
        defaultFilter: '*',
        animationType: 'rotateSides',
        gapHorizontal: 10,
        gapVertical: 10,
        gridAdjustment: 'responsive',
        caption: 'zoom',
        displayType: 'sequentially',
        displayTypeSpeed: 100,
        

        // lightbox
        lightboxDelegate: '.cbp-lightbox',
        lightboxGallery: true,
        lightboxTitleSrc: 'data-title',
        lightboxCounter: '<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>',

    
    });
})(jQuery, window, document);
