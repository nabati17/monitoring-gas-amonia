<?php

return [
    'vapid' => [
        'subject' => 'mailto:asnaba93@gmail.com', // Alamat email yang digunakan
        'public_key' => env('VAPID_PUBLIC_KEY'),
        'private_key' => env('VAPID_PRIVATE_KEY'),
        'pem_file' => '', // Opsional: path ke file.pem
        'ttl' => 24 * 60 * 60, // Time To Live dalam detik (default: 1 hari)
    ],
];

