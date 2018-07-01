<?php
namespace Nagy\LaraObserve\Listeners;

class SlowRequestEventListener
{

    public function handle(array $details)
    {
        $logger = config('laraobserve.logger');
        $logger::warning('Slow Request Detected', $details);
    }
}