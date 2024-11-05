if ('serviceWorker' in navigator) {
    window.addEventListener('load', function() {
        navigator.serviceWorker.register('/service-worker.js')
            .then(function(registration) {
                console.log('Service Worker registered with scope:', registration.scope);
                Notification.requestPermission(function(result) {
                    if (result === 'granted') {
                        console.log('Notification permission granted.');
                        subscribeUserToPush();
                    } else {
                        console.warn('Notification permission denied.');
                    }
                });
            })
            .catch(function(error) {
                console.error('Service Worker registration failed:', error);
            });
    });
}

function subscribeUserToPush() {
    navigator.serviceWorker.ready.then(function(registration) {
        if (!registration.pushManager) {
            console.warn('Push manager unavailable.');
            return;
        }

        registration.pushManager.subscribe({
            userVisibleOnly: true,
            applicationServerKey: urlBase64ToUint8Array('BDoztrrnqtLupCQd2JrdiAtGnumfOyqsquGdFck0JX4=')
        }).then(function(subscription) {
            console.log('User is subscribed:', subscription);
            sendSubscriptionToServer(subscription);
        }).catch(function(error) {
            console.error('Failed to subscribe the user: ', error);
        });
    });
}

function sendSubscriptionToServer(subscription) {
    fetch('/api/save-subscription', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify(subscription)
    }).then(function(response) {
        if (!response.ok) {
            throw new Error('Failed to save subscription on server.');
        }
        console.log('Subscription saved successfully.');
    }).catch(function(error) {
        console.error('Error saving subscription:', error);
    });
}

function urlBase64ToUint8Array(base64String) {
    const padding = '='.repeat((4 - base64String.length % 4) % 4);
    const base64 = (base64String + padding).replace(/\-/g, '+').replace(/_/g, '/');
    const rawData = window.atob(base64);
    const outputArray = new Uint8Array(rawData.length);
    for (let i = 0; i < rawData.length; ++i) {
        outputArray[i] = rawData.charCodeAt(i);
    }
    return outputArray;
}
