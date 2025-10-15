const CACHE_NAME = 'proyecto7m-v1.0.0';
const urlsToCache = [
  './',
  './index.php',
  './vista/info.php',
  './vista/registro.php',
  './controlador/css/main.css',
  './controlador/css/util.css',
  './controlador/js/main.js',
  './controlador/vendor/bootstrap/js/bootstrap.min.js',
  './controlador/vendor/jquery/jquery-3.2.1.min.js',
  './controlador/vendor/animsition/js/animsition.min.js',
  './controlador/vendor/select2/select2.min.js',
  './controlador/vendor/daterangepicker/moment.min.js',
  './controlador/vendor/daterangepicker/daterangepicker.js',
  './vista/images/bg-01.jpg',
  './vista/images/icons/icon-192x192.png',
  './vista/images/icons/icon-512x512.png',
  './offline.html'
];

// Instalación del Service Worker
self.addEventListener('install', function(event) {
  console.log('SW: Instalando Service Worker...');
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(function(cache) {
        console.log('SW: Cache abierto');
        return cache.addAll(urlsToCache);
      })
      .catch(function(error) {
        console.log('SW: Error al cachear archivos:', error);
      })
  );
});

// Activación del Service Worker
self.addEventListener('activate', function(event) {
  console.log('SW: Service Worker activado');
  event.waitUntil(
    caches.keys().then(function(cacheNames) {
      return Promise.all(
        cacheNames.map(function(cacheName) {
          if (cacheName !== CACHE_NAME) {
            console.log('SW: Eliminando cache antiguo:', cacheName);
            return caches.delete(cacheName);
          }
        })
      );
    })
  );
});

// Interceptar peticiones de red
self.addEventListener('fetch', function(event) {
  event.respondWith(
    caches.match(event.request)
      .then(function(response) {
        // Si encuentra el recurso en cache, lo devuelve
        if (response) {
          return response;
        }
        
        // Si no está en cache, lo solicita a la red
        return fetch(event.request)
          .then(function(response) {
            // Verificar si la respuesta es válida
            if (!response || response.status !== 200 || response.type !== 'basic') {
              return response;
            }

            // Clonar la respuesta para guardarla en cache
            var responseToCache = response.clone();

            caches.open(CACHE_NAME)
              .then(function(cache) {
                cache.put(event.request, responseToCache);
              });

            return response;
          })
          .catch(function() {
            // Si falla la red, mostrar página offline para navegación
            if (event.request.mode === 'navigate') {
              return caches.match('./offline.html');
            }
          });
      })
  );
});