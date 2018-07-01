<?php

namespace Nagy\LaraObserve;

use Illuminate\Support\Facades\DB;
use Nagy\LaraObserve\DataCollectors\SlowQuery;

class LaraObserve
{
    public static function boot()
    {
        DB::listen(function ($query) {
            if (!config('laraobserve.queries.active')) {
                return;
            }

            if ($query instanceof \Illuminate\Database\Events\QueryExecuted) {
                if ($query->time > config('laraobserve.queries.threshold')) {
                    $details = (new SlowQuery($query))->collect();
                    $listner = config('laraobserve.queries.listner');
                    (new $listner)->handle($details);
                }
            }
        });
    }
}
