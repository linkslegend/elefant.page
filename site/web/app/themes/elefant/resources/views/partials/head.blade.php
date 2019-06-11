<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#cce8f0">
  <script>
      // register service worker:
      (function () {
          if ('serviceWorker' in navigator) {
              window.addEventListener('load', function () {
                  navigator.serviceWorker.register('/app/themes/elefant/serviceworker.js');
              });
          }
      })();
    </script>
@if (
  is_shop() || 
  is_front_page() || 
  is_page_template( 'templates/about.php') || 
  is_page_template( 'views/page-sidebar.blade.php' ) || 
  is_product() 
)
  <script>
    window.addEventListener("load", function () {
      const loader = document.querySelector(".preload");
      const loader2 = document.querySelector(".preloader");
      loader.className += " hidden"; // class "loader hidden"
      loader2.className += " hidden"; // class "loader hidden"
    });
  </script>
@endif

  <link rel="manifest" href="/app/themes/elefant/manifest.json">

  @php wp_head() @endphp
</head>
