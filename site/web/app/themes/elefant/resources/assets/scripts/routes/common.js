import lozad from 'lozad';

export default {
  init() {
    // JavaScript to be fired on all pages

    /* eslint-disable */
    /* eslint-enable */
    $(document).ready(function(){

      jQuery.event.special.touchstart = {
          setup: function( _, ns, handle ){
              if ( ns.includes('noPreventDefault') ) {
                  this.addEventListener('touchstart', handle, { passive: false });
              } else {
                  this.addEventListener('touchstart', handle, { passive: true });
              }
          },
      };

    const observer = lozad('.lozad', {
      rootMargin: '500px 0px',
      threshold: 0.1,
      load: function(el) {
        el.src = el.dataset.src;
      },
    });
    observer.observe();

    $('.multiple-items').slick({
      infinite: false,
      dots: true,
      slidesToShow: 3,
      slidesToScroll: 1,
      prevArrow:'<button class="prev"><i class="fas fa-arrow-left"></i>Previous</button>',
      nextArrow:'<button class="next"><i class="fas fa-arrow-right"></i>Next</button>',
      responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        dots: true,
      },
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
    ],
    });

    $('.multiple-items-top').slick({
      infinite: false,
      dots: false,
      slidesToShow: 2,
      slidesToScroll: 1,
      prevArrow:'<button class="prev"><i class="fas fa-arrow-left"></i>Previous</button>',
      nextArrow:'<button class="next"><i class="fas fa-arrow-right"></i>Next</button>',
      responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        dots: true,
      },
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
    ],
    });

    $('.product-slider').slick({
      infinite: false,
      dots: false,
      slidesToShow: 4,
      slidesToScroll: 1,
      prevArrow:'<button class="prev"><i class="fas fa-arrow-left"></i>Previous</button>',
      nextArrow:'<button class="next"><i class="fas fa-arrow-right"></i>Next</button>',
      responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: true,
      },
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
    ],
    });

    $('.div-li-slider').slick({
      infinite: false,
      dots: false,
      slidesToShow: 4,
      slidesToScroll: 1,
      prevArrow:'<button class="prev"><i class="fas fa-arrow-left"></i>Previous</button>',
      nextArrow:'<button class="next"><i class="fas fa-arrow-right"></i>Next</button>',
      responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: true,
      },
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
    ],
    });

    $('.product-slider-frontpage').slick({
      infinite: false,
      dots: false,
      slidesToShow: 4,
      slidesToScroll: 1,
      prevArrow:'<button class="prev"><i class="fas fa-arrow-left"></i>Previous</button>',
      nextArrow:'<button class="next"><i class="fas fa-arrow-right"></i>Next</button>',
      responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: true,
      },
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
    ],
    });

    $('.logo-slider-frontpage').slick({
      infinite: false,
      dots: false,
      slidesToShow: 6,
      slidesToScroll: 1,
      prevArrow:'<button class="prev"><i class="fas fa-arrow-left"></i>Previous</button>',
      nextArrow:'<button class="next"><i class="fas fa-arrow-right"></i>Next</button>',
      responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 5,
        slidesToScroll: 1,
        infinite: true,
        dots: true,
      },
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
      },
    },
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
    ],
    });

    $('#mobile-filters > button').on('click', function () {
      $('div.aside').toggleClass('visible');
      $('body').toggleClass('lock-scroll2');
    });
    $('.overlay').on('click', function () {
      $('div.aside').removeClass('visible');
      $('body').removeClass('lock-scroll2');
    });
    $('.navbar-toggler').on('click', function () {
      $('body').toggleClass('overlay-show'); 
    });


  });
    
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
