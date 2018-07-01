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
<<<<<<< HEAD
                    $listner = config('laraobserve.queries.listener');
=======
                    $listner = config('laraobserve.queries.listner');
>>>>>>> 4de6fdaccfbbe8fff2d32eb5fa8600366095000a
                    (new $listner)->handle($details);
                }
            }
        });
    }
}
