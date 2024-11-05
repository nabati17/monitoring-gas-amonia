<?php
return [
    'host' => env('RABBITMQ_HOST', 'rmq2.pptik.id'),  // Use your actual RABBITMQ_HOST from .env
    'port' => env('RABBITMQ_PORT', 5672),               // Use your actual RABBITMQ_PORT from .env
    'login' => env('RABBITMQ_USER', 'ubl-IoT'),       // Use your actual RABBITMQ_USER from .env
    'password' => env('RABBITMQ_PASSWORD', 'ubl-IoT23'), // Use your actual RABBITMQ_PASSWORD from .env
    'vhost' => env('RABBITMQ_VHOST', '/ubl-IoT'),           // Use your actual RABBITMQ_VHOST from .env
    'queue' => [
        'name' => env('RABBITMQ_QUEUE_NAME', 'amonia'), // Use your actual RABBITMQ_QUEUE_NAME from .env
    ],
    'exchange' => [
        'name' => env('RABBITMQ_EXCHANGE_NAME', 'amq.topic'), // Use your actual RABBITMQ_EXCHANGE_NAME from .env
        'type' => env('RABBITMQ_EXCHANGE_TYPE', 'topic'),     // Use your actual RABBITMQ_EXCHANGE_TYPE from .env
    ],
];
