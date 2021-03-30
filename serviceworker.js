var CACHE_NAME = "citytours-cache";
var urlsToCache = ["assets/frontend/img/offline.jpg"];

self.addEventListener("install", (e) => {
	e.waitUntil(
		caches.open("statik-citytours").then((cache) => {
			console.log("static cache success install");
			return cache.addAll(urlsToCache).then(() => self.skipWaiting());
		})
	);
});

self.clients.matchAll({ includeUncontrolled: true }).then((clients) => {
	for (const client of clients) {
		updateCache(new URL(client.url).href);
	}
});

function updateCache(request) {
	return caches.open(CACHE_NAME).then((cache) => {
		return fetch(request).then((response) => {
			const resClone = response.clone();
			if (response.status < 400) return cache.put(request, resClone);
			return response;
		});
	});
}

// self.addEventListener('activate', (event) => {
//   event.waitUntil(async function() {
//     const cacheNames = await caches.keys();
//     await Promise.all(
//       cacheNames.filter((cacheName) => {
//         // Return true if you want to remove this cache,
//         // but remember that caches are shared across
//         // the whole origin
//       }).map(cacheName => caches.delete(cacheName))
//     );
//   }());
// });

self.addEventListener("fetch", function (event) {
	// console.log('fetching url:'+event.request.url);
  
	event.respondWith(
		(async function () {
			try {
        
				var fetchRequest = event.request.clone();
				return await fetch(fetchRequest).then(function (response) {
					if (!response || response.status !== 200 || response.type !== "basic") {
						// console.warn("res status != 200",response.status);
						return response;
					}
					// console.warn("res status == 200", response.status);
					var responseToCache = response.clone();

					caches.open(CACHE_NAME).then(function (cache) {
						cache.put(event.request, responseToCache);
					});
					return response;
				});
			} catch (err) {
				console.log(err);
        		if (event.request.url === "https://skripsi-anggri.online/auth") {
					return caches.match("assets/frontend/img/offline.jpg");
				}
				return caches.match(event.request).then(function (response) {
					console.log("cache match, return cache");
					if (response) {
						return response;
					} else {
						return caches.match("assets/frontend/img/offline.jpg");
					}
				});
			}
		})()
	);
});
