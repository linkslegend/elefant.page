importScripts('https://storage.googleapis.com/workbox-cdn/releases/3.0.0/workbox-sw.js');

const cacheName = 'intermac';

workbox.routing.registerRoute(/.*\.(?:js|css)/, workbox.strategies.cacheFirst({
    cacheName
}));

workbox.routing.registerRoute('/', workbox.strategies.cacheFirst({
    cacheName
}));
