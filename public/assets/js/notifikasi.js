// Variabel untuk menyimpan referensi ke progress bar
var semiBar;
var lastGasLevel = null; // Variabel untuk menyimpan nilai gas level terakhir

// Fungsi untuk menutup alert merah
function closeRedAlert() {
    var alert = document.getElementById('redAlert');
    alert.style.display = 'none';
    localStorage.setItem('notificationClosed', 'true');
}

// Fungsi untuk menutup alert kuning
function closeYellowAlert() {
    var alert = document.getElementById('yellowAlert');
    alert.style.display = 'none';
    localStorage.setItem('yellowNotificationClosed', 'true');
}
// Fungsi ini digunakan untuk menampilkan notifikasi sistem jika indikator hijau tidak aktif.
function showSystemNotification(title, message) {
    var greenIndicator = getComputedStyle(document.getElementById('green-indicator')).backgroundColor;
    // Only show notification if the green indicator is not active
    if (greenIndicator !== 'rgb(0, 128, 0)') {
        if (Notification.permission === 'granted') {
            navigator.serviceWorker.ready.then(function(registration) {
                registration.showNotification(title, {
                    body: message,
                    icon: '../assets/img/logo-ct.jpg'
                });
            });
        }
    }
}

// Fungsi untuk meminta izin notifikasi
function askForNotificationPermission() {
    Notification.requestPermission().then(function(permission) {
        if (permission === 'granted') {
            console.log('Notification permission granted.');
        } else {
            console.warn('Notification permission denied.');
        }
    });
}

function checkNotification() {
    var greenIndicator = getComputedStyle(document.getElementById('green-indicator')).backgroundColor;

    // Stop the function if the green indicator is active
    if (greenIndicator === 'rgb(0, 128, 0)') { // Ensure that the color value matches your CSS green color
        document.getElementById('redAlert').style.display = 'none';
        document.getElementById('yellowAlert').style.display = 'none';
        localStorage.removeItem('notificationClosed');
        localStorage.removeItem('yellowNotificationClosed');
        return; // Exit the function early if the green indicator is active
    }

    var redIndicator = getComputedStyle(document.getElementById('red-indicator')).backgroundColor;
    var yellowIndicator = getComputedStyle(document.getElementById('yellow-indicator')).backgroundColor;

    // Show red notification if red indicator is active
    if (redIndicator === 'rgb(255, 0, 0)') {
        if (!localStorage.getItem('notificationClosed')) {
            document.getElementById('redAlert').style.display = 'block';
            showSystemNotification('Peringatan!', 'Tingkat Gas Amonia tinggi! segera bersihkan kandang!');
            localStorage.setItem('notificationClosed', 'true'); // Ensure this flag is set
        }
    } else {
        document.getElementById('redAlert').style.display = 'none';
        localStorage.removeItem('notificationClosed');
    }

    // Show yellow notification if yellow indicator is active
    if (yellowIndicator === 'rgb(255, 255, 0)') {
        if (!localStorage.getItem('yellowNotificationClosed')) {
            document.getElementById('yellowAlert').style.display = 'block';
            showSystemNotification('Peringatan!', 'Tingkat Gas Amonia hampir tinggi! segera bersihkan kandang!');
            localStorage.setItem('yellowNotificationClosed', 'true'); // Ensure this flag is set
        }
    } else {
        document.getElementById('yellowAlert').style.display = 'none';
        localStorage.removeItem('yellowNotificationClosed');
    }
}

// Fungsi untuk memperbarui data level gas
function updateGasLevels() {
    fetch('/api/getGasLevels')
        .then(response => response.json())
        .then(data => {
            if (data.gasLevels && data.gasLevels.length > 0) {
                const gasLevel = data.gasLevels[0].gas_level;
                console.log("Gas Level Received: ", gasLevel); // Logging gas level received from API

                if (lastGasLevel !== null && gasLevel === lastGasLevel) {
                    console.log("Gas level has not changed. Skipping update.");
                    return; // Keluar dari fungsi jika nilai tidak berubah
                }

                lastGasLevel = gasLevel; // Perbarui nilai gas level terakhir

                // Update the progress bar value
                if (!semiBar) {
                    semiBar = new ProgressBar.SemiCircle("#semi-container", {
                        color: gasLevel <= 20 ? "green" : (gasLevel < 25 ? "yellow" : "red"),
                        strokeWidth: 2,
                        trailWidth: 8,
                        trailColor: "black",
                        easing: "bounce",
                        from: {
                            color: "#FF0099",
                            width: 1
                        },
                        to: {
                            color: "#FF9900",
                            width: 2
                        },
                        text: {
                            value: gasLevel + ' ppm',
                            className: 'progress-text',
                            style: {
                                color: 'black',
                                position: 'absolute',
                                top: '50%', // Adjusted top position for centering
                                left: '50%',
                                padding: 0,
                                margin: 0,
                                transform: 'translate(-50%, -50%)', // Center the text
                            }
                        },
                        step: (state, shape) => {
                            shape.path.setAttribute("stroke", state.color);
                            shape.path.setAttribute("stroke-width", state.width);
                            shape.setText(gasLevel + ' ppm');
                        }
                    });
                    // semiBar.animate(gasLevel / 50, {
                    //     duration: 1000
                    // })
                    semiBar.animate(gasLevel / 55, {
    duration: 1000
})
                } else {
                    semiBar.animate(gasLevel / 55, {
                        duration: 1000
                    }, () => {
                        semiBar.setText(gasLevel + ' ppm');
                    });
                }

                // Update the color indicators based on gas level
                var redIndicator = document.getElementById('red-indicator');
                var yellowIndicator = document.getElementById('yellow-indicator');
                var greenIndicator = document.getElementById('green-indicator');

                // Remove existing classes
                redIndicator.classList.remove('red-indicator');
                yellowIndicator.classList.remove('yellow-indicator');
                greenIndicator.classList.remove('green-indicator');

                // Add new classes based on gas level
                if (gasLevel <= 20) {
                    greenIndicator.classList.add('green-indicator');
                } else if (gasLevel < 25) {
                    yellowIndicator.classList.add('yellow-indicator');
                } else {
                    redIndicator.classList.add('red-indicator');
                }
            } else {
                console.log("No gas level data received.");
                // Jangan set nilai awal ke 0 jika tidak ada data
                if (!semiBar) {
                    semiBar = new ProgressBar.SemiCircle("#semi-container", {
                        color: "green", // Set color to green for initial value
                        strokeWidth: 2,
                        trailWidth: 8,
                        trailColor: "black",
                        easing: "bounce",
                        from: {
                            color: "#FF0099",
                            width: 1
                        },
                        to: {
                            color: "#FF9900",
                            width: 2
                        },
                        text: {
                            value: 'Waiting for data...',
                            className: 'progress-text',
                            style: {
                                color: 'black',
                                position: 'absolute',
                                top: '50%', // Adjusted top position for centering
                                left: '50%',
                                padding: 0,
                                margin: 0,
                                transform: 'translate(-50%, -50%)', // Center the text
                            }
                        },
                        step: (state, shape) => {
                            shape.path.setAttribute("stroke", state.color);
                            shape.path.setAttribute("stroke-width", state.width);
                            shape.setText('Waiting for data...');
                        }
                    });
                }
            }
        })
        .catch(error => console.error('Error fetching gas level data:', error));
}

// Panggil fungsi checkNotification saat halaman dimuat
window.onload = function() {
    askForNotificationPermission(); // Panggil fungsi untuk meminta izin notifikasi
    checkNotification();
    updateGasLevels(); // Panggil fungsi untuk memperbarui gas levels saat halaman pertama dimuat
};

// Periksa notifikasi secara berkala setiap 2 detik
setInterval(checkNotification, 2000);

// Perbarui data gas levels secara berkala setiap 5 detik
setInterval(updateGasLevels, 5000);
