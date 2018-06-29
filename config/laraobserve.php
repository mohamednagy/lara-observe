<?php

return [
    'logger' => \Psr\Log\LoggerInterface::class,

    'queries' => [
        'active' => env('LARA_OBSERVE_QUERIES_ACTIVE', true),
        'threshold' => 0.000009,
        'report' => [
            'active' => env('LARA_OBSERVE_QUERIES_REPORT', true),
            'title' => 'Slow query detected',
        ],
    ],

    'requests' => [
        'active' => true,
        'threshold' => 0.0009,
        'report' => [
            'active' => env('LARA_OBSERVE_REQUESTS_REPORT', true),
            'title' => 'Slow request detected',
        ],
    ],
];