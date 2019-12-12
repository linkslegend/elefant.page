import lozad from 'lozad';
import { tns } from 'tiny-slider/src/tiny-slider';


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

    window.addEventListener('load', function() {
      var observer = lozad('.lozad', {
        rootMargin: '500px 0px',
        threshold: 0.1,
        load: function(el) {
          el.src = el.dataset.src;
        },
      });
      observer.observe()
    })

    // lazy load to DOMNodeInserted event
    $(document).bind('DOMNodeInserted', function() {
      const observer = lozad('.lozad', {
        rootMargin: '500px 0px',
        threshold: 0.1,
        load: function(el) {
          el.src = el.dataset.src;
        },
      });
      observer.observe();
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
    $(window).on('load', function() {
      if ( $('.multiple-items').length > 0 ) {
        tns({
          container: '.multiple-items',
          items: 2,
          slideBy: 'page',
          mouseDrag: true,
          controlsText: ['<i class="fas fa-arrow-left"></i><span class="hide">zurück</span>', '<i class="fas fa-arrow-right"></i><span class="hide">Weiter</span>'],
          gutter: 10,
          lazyload: true,
          disable: false,
          autoplay: false,
          responsive: {
            280: {
                items: 1,
                disable: true,
            },
            600: {
                items: 1,
                disable: false,
            },
            1024: {
                items: 2,
                disable: false,
            },
          },
        });
      }

      if ( $('.multiple-items-top').length > 0 ) {
        tns({
          container: '.multiple-items-top',
          items: 2,
          slideBy: 'page',
          mouseDrag: true,
          controlsText: ['<i class="fas fa-arrow-left"></i><span class="hide">zurück</span>', '<i class="fas fa-arrow-right"></i><span class="hide">Weiter</span>'],
          gutter: 10,
          lazyload: true,
          disable: false,
          autoplay: false,
          responsive: {
            280: {
                items: 1,
                disable: true,
            },
            600: {
                items: 2,
                disable: false,
            },
            1024: {
                items: 2,
                disable: false,
            },
          },
        });
      }

      if ( $('.product-slider').length > 0 ) {
        tns({
          container: '.product-slider',
          items: 2,
          slideBy: 'page',
          mouseDrag: true,
          controlsText: ['<i class="fas fa-arrow-left"></i><span class="hide">zurück</span>', '<i class="fas fa-arrow-right"></i><span class="hide">Weiter</span>'],
          gutter: 10,
          lazyload: true,
          disable: false,
          autoplay: false,
          responsive: {
            480: {
                items: 1,
                disable: true,
            },
            600: {
                items: 2,
                disable: false,
            },
            1024: {
                items: 3,
                disable: false,
            },
            1440: {
              items: 4,
              disable: false,
            },
          },
        });
      }

      if ( $('.columns-8').length > 0 ) {
        tns({
          container: '.columns-8',
          items: 4,
          slideBy: 'page',
          mouseDrag: true,
          controlsText: ['<i class="fas fa-arrow-left"></i><span class="hide">zurück</span>', '<i class="fas fa-arrow-right"></i><span class="hide">Weiter</span>'],
          gutter: 10,
          lazyload: true,
          disable: false,
          autoplay: false,
          responsive: {
            480: {
                items: 1,
                disable: true,
            },
            600: {
                items: 2,
                disable: false,
            },
            1024: {
                items: 3,
                disable: false,
            },
          },
        });
      }

      if ( $('.upsells .columns-4').length > 0 ) {
        tns({
          container: '.upsells .columns-4',
          items: 4,
          slideBy: 'page',
          mouseDrag: true,
          controlsText: ['<i class="fas fa-arrow-left"></i><span class="hide">zurück</span>', '<i class="fas fa-arrow-right"></i><span class="hide">Weiter</span>'],
          gutter: 10,
          lazyload: true,
          disable: false,
          autoplay: false,
          responsive: {
            480: {
                items: 1,
                disable: true,
            },
            600: {
                items: 2,
                disable: false,
            },
            1024: {
                items: 4,
                disable: false,
            },
          },
        });
      }

      if ( $('.related .columns-4').length > 0 ) {
        tns({
          container: '.related .columns-4',
          items: 4,
          slideBy: 'page',
          mouseDrag: true,
          controlsText: ['<i class="fas fa-arrow-left"></i><span class="hide">zurück</span>', '<i class="fas fa-arrow-right"></i><span class="hide">Weiter</span>'],
          gutter: 10,
          lazyload: true,
          disable: false,
          autoplay: false,
          responsive: {
            480: {
                items: 1,
                disable: true,
            },
            600: {
                items: 2,
                disable: false,
            },
            1024: {
                items: 4,
                disable: false,
            },
          },
        });
      }

      if ( $('.div-li-slider').length > 0 ) {
        tns({
          container: '.div-li-slider',
          items: 4,
          slideBy: 'page',
          mouseDrag: true,
          controlsText: ['<i class="fas fa-arrow-left"></i><span class="hide">zurück</span>', '<i class="fas fa-arrow-right"></i><span class="hide">Weiter</span>'],
          gutter: 10,
          lazyload: true,
          disable: false,
          autoplay: false,
          responsive: {
            480: {
                items: 1,
                disable: true,
            },
            600: {
                items: 2,
                disable: false,
            },
            1024: {
                items: 3,
                disable: false,
            },
          },
        });
      }
  
      if ( $('.product-slider-frontpage').length > 0 ) {
        tns({
          container: '.product-slider-frontpage',
          items: 4,
          slideBy: 'page',
          mouseDrag: true,
          controlsText: ['<i class="fas fa-arrow-left"></i><span class="hide">zurück</span>', '<i class="fas fa-arrow-right"></i><span class="hide">Weiter</span>'],
          gutter: 10,
          lazyload: true,
          disable: false,
          autoplay: false,
          responsive: {
            280: {
                items: 1,
                disable: true,
            },
            460: {
              items: 2,
              disable: false,
            },
            660: {
                items: 3,
                disable: false,
            },
            1024: {
              items: 4,
              disable: false,
            },
          },
        });
      }
  
      if ( $('.logo-slider-frontpage').length > 0 ) {
        tns({
          container: '.logo-slider-frontpage',
          items: 6,
          slideBy: 'page',
          mouseDrag: true,
          controlsText: ['<i class="fas fa-arrow-left"></i><span class="hide">zurück</span>', '<i class="fas fa-arrow-right"></i><span class="hide">Weiter</span>'],
          gutter: 10,
          lazyload: true,
          disable: false,
          autoplay: false,
          responsive: {
            280: {
                items: 2,
                disable: true,
            },
            400: {
              items: 2,
              disable: false,
            },
            600: {
                items: 4,
                disable: false,
            },
            1024: {
                items: 5,
                disable: false,
            },
          },
        });
      }
    });
  },
};
