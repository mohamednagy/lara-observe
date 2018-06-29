<?php

namespace Nagy\LaraObserve\Exceptions;

use Illuminate\Config\Repository as Config;
use Illuminate\Http\Request;
use Psr\Log\LoggerInterface;
use Exception;

class LaraObserveException extends Exception
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var Config
     */
    protected $config;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var string
     */
    protected $command;

    public function __construct(string $message)
    {
        parent::__construct($message);
        $this->logger = app(config('laraobserve.logger')) ?? logger();
        $this->config = new Config(config('laraobserve.queries'));
        $this->request = request();
        $this->command = $this->request->server('argv.1');
    }

    public function setRequest(Request $request)
    {
        $this->request = $request;
        return $this;
    }

    public function getRequest(): Request
    {
        return $this->request;
    }

    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCommand()
    {
        return $this->command;
    }

    public function getConfig(): Config
    {
        return $this->config;
    }

    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }
}