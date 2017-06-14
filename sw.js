// var CACHE_NAME = 'ldaniel-cache-v1';
// var urlsToCache = [
//   '/',
//   '/assets/css/style.min.css',
//   '/assets/js/scripts.min.js',
//   '/assets/fonts/hkgrotesk-regular-webfont.woff',
//   '/assets/fonts/hkgrotesk-regular-webfont.woff2',
//   '/assets/fonts/hkgrotesk-medium-webfont.woff',
//   '/assets/fonts/hkgrotesk-medium-webfont.woff2',
//   '/assets/fonts/hkgrotesk-bold-webfont.woff',
//   '/assets/fonts/hkgrotesk-bold-webfont.woff2',
// ];

self.addEventListener('install', function(event) {
  // Perform install steps
  // event.waitUntil(
  //   caches.open(CACHE_NAME)
  //     .then(function(cache) {
  //       console.log('Opened cache');
  //       return cache.addAll(urlsToCache);
  //     })
  // );
});

self.addEventListener('fetch', function(event) {
});
