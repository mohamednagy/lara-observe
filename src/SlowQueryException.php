<?php

namespace Nagy\LaravelDB;

class SlowQueryException extends \Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }

    public function report()
    {
        logger()->info(config('laraveldb.report.title') . $this->getMessage());
    }
}