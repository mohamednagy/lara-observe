<?php

return [
    'logger' => \Psr\Log\LoggerInterface::class,

    'queries' => [
        'active' => env('LARA_OBSERVE_QUERIES_ACTIVE', true),
        'threshold' => 0.000009,
        'listner' => \Nagy\LaraObserve\Listeners\SlowQueryEventListener::class
    ],

    'requests' => [
        'active' => true,
        'threshold' => 0.0009,
        'listner' => \Nagy\LaraObserve\Listeners\SlowRequestEventListener::class
    ],
];