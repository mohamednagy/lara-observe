<?php

namespace Nagy\LaraObserve;

class SlowQueryException extends \Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }

    public function report()
    {
        if (config('laraobserve.report.active')) {
            logger()->info($this->prepareReportMessage());
        }
    }

    private function prepareReportMessage(): string
    {
        return config('laraobserve.report.title') . ': ' . $this->getMessage();
    }
    
}
