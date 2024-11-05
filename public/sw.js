self.addEventListener('push', function(event) {
    const data = event.data.json();
    const options = {
        body: data.body,
        icon: '../img/ayam.jpeg',
        vibrate: [100, 50, 100],
        data: {
            dateOfArrival: Date.now(),
            primaryKey: '2'
        }
    };

    event.waitUntil(
        self.registration.showNotification(data.title, options)
    );
});

self.addEventListener('notificationclick', function(event) {
    event.notification.close();
    clients.openWindow('http://gasamonia.my.id/'); // Ganti dengan URL yang sesuai
});

self.addEventListener('notificationclose', function(event) {
    console.log('Notification closed');
});
