// Event listener untuk service worker install
self.addEventListener('install', function(event) {
    console.log('Service Worker installing.');
});

// Event listener untuk service worker activate
self.addEventListener('activate', function(event) {
    console.log('Service Worker activating.');
});

// Event listener untuk menerima push notification
self.addEventListener('push', function(event) {
    console.log('Push Notification received.');
    const data = event.data.json();
    self.registration.showNotification(data.title, {
        body: data.body,
        icon: data.icon
    });
});

// Event listener untuk menangani action dari user terhadap notifikasi
self.addEventListener('notificationclick', function(event) {
    console.log('Notification click received.');

    event.notification.close();

    event.waitUntil(
        clients.openWindow('http://gasamonia.my.id/')
    );
});

self.addEventListener('push', function(event) {
    const data = event.data.json();
    const options = {
        body: data.body,
        icon: data.icon
    };
    event.waitUntil(
        self.registration.showNotification(data.title, options)
    );
});
