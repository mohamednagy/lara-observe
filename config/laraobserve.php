<?php

return [
    'logger' => \Psr\Log\LoggerInterface::class,

    'queries' => [
        'active' => env('LARA_OBSERVE_QUERIES_ACTIVE', true),
        'threshold' => 0.000009,
<<<<<<< HEAD
        'listener' => \Nagy\LaraObserve\Listeners\SlowQueryEventListener::class
=======
        'listner' => \Nagy\LaraObserve\Listeners\SlowQueryEventListener::class
>>>>>>> 4de6fdaccfbbe8fff2d32eb5fa8600366095000a
    ],

    'requests' => [
        'active' => true,
        'threshold' => 0.0009,
<<<<<<< HEAD
        'listener' => \Nagy\LaraObserve\Listeners\SlowRequestEventListener::class
=======
        'listner' => \Nagy\LaraObserve\Listeners\SlowRequestEventListener::class
>>>>>>> 4de6fdaccfbbe8fff2d32eb5fa8600366095000a
    ],
];