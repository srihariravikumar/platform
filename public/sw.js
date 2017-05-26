var CACHE_NAME = 'my-site-cache-v1';
var urlsToCache = [
  'https://doctub-cdn.firebaseapp.com/css/print-styles.css',
  'https://doctub-cdn.firebaseapp.com/css/icon-bundle/css/icon-bundle.min.css',
  'https://doctub-cdn.firebaseapp.com/js/jquery.min.js',
  'https://doctub-cdn.firebaseapp.com/js/jquery-ui.min.js',
];

self.addEventListener('install', function(event) {
  // Perform install steps
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(function(cache) {
        console.log('Opened cache');
        return cache.addAll(urlsToCache);
      })
  );
});