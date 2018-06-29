<?php

namespace Nagy\LaraObserve\Middlewares;

use Closure;
use Nagy\LaraObserve\SlowRequestException;

class RequestObserver
{
    public function handle($request, Closure $next)
    {
        $time = microtime(false);

        $response = $next($request);

        $executionTime = microtime(false) - $time;
        if (config('laraobserve.requests.active') && $executionTime > config('laraobserve.request.threshold')) {
            throw (new SlowRequestException())
                ->setRequest($request)
                ->setResponse($response);
        }

        return $response;
    }
}