<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#cce8f0">

  <link rel="icon" type="image/png" sizes="32x32" href="/app/themes/elefant/dist/images/icons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/app/themes/elefant/dist/images/icons/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/app/themes/elefant/dist/images/icons/favicon-16x16.png">

  <!-- place this in a head section -->
  <link rel="/app/themes/elefant/dist/images/icons/apple-touch-icon" href="touch-icon-iphone.png">
  <link rel="/app/themes/elefant/dist/images/icons/apple-touch-icon" sizes="152x152" href="touch-icon-ipad.png">
  <link rel="/app/themes/elefant/dist/images/icons/apple-touch-icon" sizes="180x180" href="touch-icon-iphone-retina.png">
  <link rel="/app/themes/elefant/dist/images/icons/apple-touch-icon" sizes="167x167" href="touch-icon-ipad-retina.png">

  <!-- place this in a head section -->
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <link href="/app/themes/elefant/dist/images/icons/apple_splash_2048.png" sizes="2048x2732" rel="apple-touch-startup-image" />
  <link href="/app/themes/elefant/dist/images/icons/apple_splash_1668.png" sizes="1668x2224" rel="apple-touch-startup-image" />
  <link href="/app/themes/elefant/dist/images/icons/apple_splash_1536.png" sizes="1536x2048" rel="apple-touch-startup-image" />
  <link href="/app/themes/elefant/dist/images/icons/apple_splash_1125.png" sizes="1125x2436" rel="apple-touch-startup-image" />
  <link href="/app/themes/elefant/dist/images/icons/apple_splash_1242.png" sizes="1242x2208" rel="apple-touch-startup-image" />
  <link href="/app/themes/elefant/dist/images/icons/apple_splash_750.png" sizes="750x1334" rel="apple-touch-startup-image" />
  <link href="/app/themes/elefant/dist/images/icons/apple_splash_640.png" sizes="640x1136" rel="apple-touch-startup-image" />

<script>
  // register service worker:
          if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
              navigator.serviceWorker.register('https://elefant.page/serviceworker.js').then(function(registration) {
                // Registration was successful
                console.log('ServiceWorker registration successful with scope: ', registration.scope);
              }, function(err) {
                // registration failed :(
                console.log('ServiceWorker registration failed: ', err);
              });
            });
          }

    // A simple script that gives users a button to install your PWA directly from the browser
        let deferredPrompt = null;
        window.addEventListener('beforeinstallprompt', (e) => {
          // Prevent Chrome 67 and earlier from automatically showing the prompt
          e.preventDefault();
          // Stash the event so it can be triggered later.
          deferredPrompt = e;
        });
        async function install() {
          if (deferredPrompt) {
            deferredPrompt.prompt();
            console.log(deferredPrompt)
            deferredPrompt.userChoice.then(function(choiceResult){

              if (choiceResult.outcome === 'accepted') {
              console.log('Your PWA has been installed');
            } else {
              console.log('User chose to not install your PWA');
            }

            deferredPrompt = null;

            });
          }
        }
  </script>

  <link rel="manifest" href="/app/themes/elefant/manifest.json">

  @if (
    is_shop() ||
    is_product_category() ||
    is_cart() ||
    is_checkout() ||
    is_front_page() ||
    is_page_template( 'templates/about.php' ) ||
    is_page_template( 'views/page-sidebar.blade.php' )
  )

  <script>
    setTimeout(function() {
      let loaders = document.querySelectorAll('.preload');
      loaders.forEach(function(item) {
        item.classList.add('hidden');
      });
    }, 500);
  </script>

@endif

  @php wp_head() @endphp
</head>