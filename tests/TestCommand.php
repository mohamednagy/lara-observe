<?php

namespace Nagy\LaraObserve\Tests;

use Illuminate\Console\Command;
use DB;

class TestCommand extends Command
{
    protected $signature = 'test:something';

    public function handle()
    {
        DB::table('users')->get();
    }
}