<?php

return [
    'host' => env('RABBITMQ_HOST', 'rmq1.pptik.id'),
    'port' => env('RABBITMQ_PORT', '5672'),
    'login' => env('RABBITMQ_USER', 'ubliot'),
    'password' => env('RABBITMQ_PASSWORD', 'qwerty1245'),
    'vhost' => env('RABBITMQ_VHOST', '/mahasiswaubl'),
    'exchange' => [
        'name' => env('RABBITMQ_EXCHANGE_NAME', 'amq.topic'),
        'type' => env('RABBITMQ_EXCHANGE_TYPE', 'topic'),
    ],
    'queue' => [
        'name' => env('RABBITMQ_QUEUE_NAME', 'amonia'),
    ],
];
