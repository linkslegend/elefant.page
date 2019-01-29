<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#cce8f0">
  <script>
      // register service worker:
      if (navigator.serviceWorker) {
        navigator.serviceWorker.register('app/themes/elefant/serviceworker.js').then(function() {
          return navigator.serviceWorker.ready;
        })
        .then(function(registration) {
          console.log(registration); // service worker is ready and working...
        });

        navigator.serviceWorker.addEventListener('message', function(event) {
          console.log(event.data.message); // Hello World !
        });
      }
    </script>
  <link rel="manifest" href="/app/themes/elefant/manifest.json">

  @php wp_head() @endphp
</head>
