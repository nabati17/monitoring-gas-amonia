<?php

return [

    'default' => env('QUEUE_CONNECTION', 'rabbitmq'),

    'connections' => [

        'sync' => [
            'driver' => 'sync',
        ],

        'database' => [
            'driver' => 'database',
            'table' => 'jobs',
            'queue' => 'default',
            'retry_after' => 90,
            'after_commit' => false,
        ],

        'beanstalkd' => [
            'driver' => 'beanstalkd',
            'host' => 'localhost',
            'queue' => 'default',
            'retry_after' => 90,
            'block_for' => 0,
            'after_commit' => false,
        ],

        'sqs' => [
            'driver' => 'sqs',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'prefix' => env('SQS_PREFIX', 'https://sqs.us-east-1.amazonaws.com/your-account-id'),
            'queue' => env('SQS_QUEUE', 'default'),
            'suffix' => env('SQS_SUFFIX'),
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'after_commit' => false,
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => 'default',
            'queue' => env('REDIS_QUEUE', 'default'),
            'retry_after' => 90,
            'block_for' => null,
            'after_commit' => false,
        ],

       'rabbitmq' => [
            'driver' => 'rabbitmq',
            'hosts' => [
                [
                    'host' => env('RABBITMQ_HOST', 'rmq2.pptik.id'),    // Use your actual RABBITMQ_HOST from .env
                    'port' => env('RABBITMQ_PORT', 5672),                 // Use your actual RABBITMQ_PORT from .env
                    'user' => env('RABBITMQ_USER', 'ubl-IoT'),          // Use your actual RABBITMQ_USER from .env
                    'password' => env('RABBITMQ_PASSWORD', 'ubl-IoT23'),  // Use your actual RABBITMQ_PASSWORD from .env
                    'vhost' => env('RABBITMQ_VHOST', '/ubl-IoT'),             // Use your actual RABBITMQ_VHOST from .env
                ],
            ],
            'options' => [
                'ssl_options' => [],  // Add SSL options if needed
                'exchange' => [
                    'name' => env('RABBITMQ_EXCHANGE_NAME', 'amq.topic'), // Use your actual RABBITMQ_EXCHANGE_NAME from .env
                    'type' => env('RABBITMQ_EXCHANGE_TYPE', 'topic'),     // Use your actual RABBITMQ_EXCHANGE_TYPE from .env
                ],
                'queue' => [
                    'name' => env('RABBITMQ_QUEUE_NAME', 'amonia'),       // Use your actual RABBITMQ_QUEUE_NAME from .env
                ],
            ],
        ],
    ],

    'batching' => [
        'database' => env('DB_CONNECTION', 'mysql'),
        'table' => 'job_batches',
    ],

    'failed' => [
        'driver' => env('QUEUE_FAILED_DRIVER', 'database-uuids'),
        'database' => env('DB_CONNECTION', 'mysql'),
        'table' => 'failed_jobs',
    ],

];
