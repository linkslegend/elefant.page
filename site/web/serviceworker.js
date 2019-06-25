importScripts('https://storage.googleapis.com/workbox-cdn/releases/4.3.1/workbox-sw.js');

const cacheName = 'intermac';

workbox.routing.registerRoute(/.*\.(?:js|css)/, workbox.strategies.cacheFirst({
    cacheName
}));

workbox.routing.registerRoute('/', workbox.strategies.cacheFirst({
    cacheName
}));

workbox.setConfig({
  debug: true,
});

if (workbox) {
  console.log(`Yay! Workbox is loaded 🎉`);
} else {
  console.log(`Boo! Workbox didn't load 😬`);
}

