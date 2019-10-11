<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#cce8f0">

  <link rel="icon" type="image/png" sizes="32x32" href="/app/themes/elefant/dist/images/icons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/app/themes/elefant/dist/images/icons/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/app/themes/elefant/dist/images/icons/favicon-16x16.png">

  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="#ffffff">
  <meta name="apple-mobile-web-app-title" content="Intermac Systems">
  
  <link rel="apple-touch-icon" href="/app/themes/elefant/dist/images/icons/apple-touch-icon">
  <link rel="apple-touch-icon" sizes="180x180" href="/app/themes/elefant/dist/images/icons/apple-touch-icon">

  <link rel="apple-touch-startup-image" href="/app/themes/elefant/dist/images/icons/apple_splash_640.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)">
  <link rel="apple-touch-startup-image" href="/app/themes/elefant/dist/images/icons/apple_splash_750.png" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)">
  <link rel="apple-touch-startup-image" href="/app/themes/elefant/dist/images/icons/apple_splash_1242.png" media="(device-width: 414px) and (device-height: 736px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)">
  <link rel="apple-touch-startup-image" href="/app/themes/elefant/dist/images/icons/apple_splash_1125.png" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)">
  <link rel="apple-touch-startup-image" href="/app/themes/elefant/dist/images/icons/apple_splash_1536.png" media="(min-device-width: 768px) and (max-device-width: 1024px) and (-webkit-min-device-pixel-ratio: 2) and (orientation: portrait)">
  <link rel="apple-touch-startup-image" href="/app/themes/elefant/dist/images/icons/apple_splash_1668.png" media="(min-device-width: 834px) and (max-device-width: 834px) and (-webkit-min-device-pixel-ratio: 2) and (orientation: portrait)">
  <link rel="apple-touch-startup-image" href="/app/themes/elefant/dist/images/icons/apple_splash_2048.png" media="(min-device-width: 1024px) and (max-device-width: 1024px) and (-webkit-min-device-pixel-ratio: 2) and (orientation: portrait)">

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
@endif

  @php wp_head() @endphp

  <script>
    jQuery(window).on('load', function () {
      jQuery('.preload').addClass('hidden');
    });
  </script>  

  <!--<script>
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
    </script>-->
    
</head>