<?php
namespace Nagy\LaravelDB;

use Nagy\LaravelDB\Logger;
use Nagy\LaravelDB\Formatter;
use Illuminate\Support\Facades\DB;

class LaravelDB
{
    public static function boot()
    {
        $formatter = new Formatter();
        
        DB::listen(function ($query) use ($formatter) {
            if ($query instanceof \Illuminate\Database\Events\QueryExecuted) {
                throw_if(
                    $query->time > config('laraveldb.threshold'),
                    new SlowQueryException($formatter->setQuery($query)->format())
                );
            }
        });
    }
}

