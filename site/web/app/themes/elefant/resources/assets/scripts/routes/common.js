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

    $('#mobile-filters > button').on('click', function () {
      $('div.aside').toggleClass('visible');
      $('body').toggleClass('lock-scroll2');
    });

    $('.overlay').on('click', function () {
      $('div.aside').toggleClass('visible');
      $('body').toggleClass('lock-scroll2');    
    });
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
