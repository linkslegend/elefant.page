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

      window.addEventListener("load", function () {
      const loader = document.querySelector(".preload");
      loader.className += " hidden"; // class "loader hidden"
      });
    </script>
  <link rel="manifest" href="/app/themes/elefant/manifest.json">

  @php wp_head() @endphp
</head>
