<?php

namespace Nagy\LaraObserve;

use Psr\Log\LoggerInterface;

class SlowQueryException extends \Exception
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    public function __construct(string $message)
    {
        parent::__construct($message);
        $this->logger = app(config('laraobserve.report.logger'));
    }

    public function report()
    {
        if (config('laraobserve.report.active')) {
            $this->logger->info($this->prepareReportMessage());
        }
    }

    private function prepareReportMessage(): string
    {
        return config('laraobserve.report.title') . ': ' . $this->getMessage();
    }
    
}
