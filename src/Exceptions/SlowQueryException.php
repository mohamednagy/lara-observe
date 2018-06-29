<?php

namespace Nagy\LaraObserve\Exceptions;

use Illuminate\Config\Repository as Config;
use Psr\Log\LoggerInterface;

class SlowQueryException extends \Exception
{
    use CanReportExceptionTrait;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var Config
     */
    protected $config;

    public function __construct(string $message)
    {
        parent::__construct($message);
        $this->logger = app(config('laraobserve.logger')) ?? logger();
        $this->config = new Config(config('laraobserve.queries'));
    }
}
