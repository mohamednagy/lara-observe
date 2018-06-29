<?php

return [
    /**
     * 
     */
    'active' => env('LARA_OBSERVE_ACTIVE', true),
    
    /**
     * A threshold which should be notified if the query execution time exceeded
     */
    'threshold' => 0.000009,

    /**
     * Messages to be added to the report message
     */
    'report' => [
        'title' => 'Slow query detected',
    ],
    
    'requests' => [
        'active' => true,

        'threshold' => 0.0009
    ]
];