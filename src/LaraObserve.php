<?php

namespace Nagy\LaraObserve;

use Nagy\LaraObserve\Logger;
use Nagy\LaraObserve\Formatter;
use Illuminate\Support\Facades\DB;
use Nagy\LaraObserve\Exceptions\SlowQueryException;

class LaraObserve
{
    public static function boot()
    {
        $formatter = new Formatter();

        DB::listen(function ($query) use ($formatter) {
            if (!config('LaraObserve.active')) {
                return;
            }

            if ($query instanceof \Illuminate\Database\Events\QueryExecuted) {
                if ($query->time > config('LaraObserve.threshold')) {
                    throw (new SlowQueryException($formatter->setQuery($query)->format()))->setRequest(request());
                }
            }
        });
    }
}
