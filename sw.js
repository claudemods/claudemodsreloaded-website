const CACHE_NAME = 'claudemods-v3.0';
const ASSETS_TO_CACHE = [
  '/',
  '/index.php',
  'https://i.postimg.cc/JhMRf2RZ/claudemods-03-17-2025.gif',
  'https://i.postimg.cc/Hs2vbbZ8/Deep-Seek-Homepage.png',
  'https://i.postimg.cc/7LwstxCz/me.webp',
  'https://i.postimg.cc/fWJGVHgm/claudemodsapex.webp',
  'https://i.postimg.cc/d3S9GmH0/Apex-Desktop.png',
  'https://i.postimg.cc/YqHFyPgw/claudemods.webp',
  'https://i.postimg.cc/d0gMqrmG/Spit-Fire-Desktio.png',
  'https://i.postimg.cc/xTmRX7Dk/claudemodsckgbe2.webp',
  'https://i.postimg.cc/5tz1TbZ4/Desktop-CKGBE.png',
  'https://i.postimg.cc/7Y7Zj108/apextools-high.webp',
  'icons/icon-192x192.png',
  'icons/icon-512x512.png'
];

// Install event
self.addEventListener('install', event => {
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(cache => {
        return cache.addAll(ASSETS_TO_CACHE);
      })
  );
});

// Activate event
self.addEventListener('activate', event => {
  event.waitUntil(
    caches.keys().then(cacheNames => {
      return Promise.all(
        cacheNames.map(cache => {
          if (cache !== CACHE_NAME) {
            return caches.delete(cache);
          }
        })
      );
    })
  );
});

// Fetch event
self.addEventListener('fetch', event => {
  // Skip YouTube API requests
  if (event.request.url.includes('youtube.com/iframe_api')) {
    return;
  }

  event.respondWith(
    fetch(event.request)
      .then(response => {
        // Clone the response
        const responseClone = response.clone();
        // Cache new responses
        caches.open(CACHE_NAME)
          .then(cache => {
            cache.put(event.request, responseClone);
          });
        return response;
      })
      .catch(() => {
        // Fallback to cache if offline
        return caches.match(event.request)
          .then(response => response || caches.match('/offline.html'));
      })
  );
});
