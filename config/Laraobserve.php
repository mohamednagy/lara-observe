<?php

return [
    /**
     * 
     */
    'active' => env('LARA_OBSERVE_ACTIVE', true),
    
    /**
     * A threshold which should be notified if the query execution time exceeded
     */
    'threshold' => 0.000009
];