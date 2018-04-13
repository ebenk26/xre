$(window).load(function(){
  /* One Item */
  var swiper = new Swiper('.js-swiper-one-item', {
    nextButton: '.js-swiper-btn-next',
    prevButton: '.js-swiper-btn-prev',
    speed: 1000,
    autoplay: 7000,
    loop: true
  });

  /* Slider */
  var swiper = new Swiper('.js-swiper-slider', {
    pagination: '.js-swiper-pagination',
    paginationClickable: true,
    speed: 1000,
    autoplay: 7000,
    loop: true
  });

  // Swiper Clients
  var swiper = new Swiper('.js-swiper-clients', {
    slidesPerView: 5,
    spaceBetween: 50,
    loop: true,
    breakpoints: {
      1024: {
        slidesPerView: 4,
        spaceBetween: 50
      },
      992: {
        slidesPerView: 3,
        spaceBetween: 40
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 30
      },
      600: {
        slidesPerView: 2,
        spaceBetween: 30
      },
      480: {
        slidesPerView: 2,
        spaceBetween: 0
      }
    }
  });

  // Swiper News
  var swiper = new Swiper('.js-swiper-news', {
    pagination: '.js-swiper-pagination',
    paginationClickable: true,
    slidesPerView: 4,
    spaceBetween: 30,
    loop: true,
    breakpoints: {
      1024: {
        slidesPerView: 4,
        spaceBetween: 30
      },
      992: {
        slidesPerView: 3,
        spaceBetween: 30
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 30
      },
      600: {
        slidesPerView: 2,
        spaceBetween: 30
      },
      480: {
        slidesPerView: 1,
        spaceBetween: 0
      }
    }
  });

  /* Testimonials */
  var swiper = new Swiper('.js-swiper-testimonials', {
    pagination: '.js-swiper-fraction',
    paginationType: 'fraction',
    paginationClickable: true,
    nextButton: '.js-swiper-btn-next',
    prevButton: '.js-swiper-btn-prev',
    slidesPerView: 1,
    speed: 1000,
    autoplay: 7000,
    loop: true
  });
});