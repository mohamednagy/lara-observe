<?php
namespace Nagy\LaraObserve\Listeners;

class SlowQueryEventListener
{

    public function handle(array $details)
    {
        $logger = config('laraobserve.logger');
        $logger::warning('Slow Query Detected', $details);
    }
}