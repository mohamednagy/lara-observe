<?php

namespace Nagy\LaraObserve\Middlewares;

use Closure;
use Nagy\LaraObserve\SlowRequestException;
use Nagy\LaraObserve\DataCollectors\SlowRequest;

class RequestObserver
{
    public function handle($request, Closure $next)
    {
        $time = microtime(false);

        $response = $next($request);

        $executionTime = microtime(false) - $time;
        if (config('laraobserve.requests.active') && $executionTime > config('laraobserve.request.threshold')) {
            $details = (new SlowRequest($request, $response))->collect();
            $listener = config('laraobserve.requests.listener');
            (new $listener)->handle($details);
        }

        return $response;
    }
}