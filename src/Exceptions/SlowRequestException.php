<?php

namespace Nagy\LaraObserve\Exceptions;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Config\Repository as Config;
use Psr\Log\LoggerInterface;

class SlowRequestException extends \Exception
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

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Response
     */
    protected $response;

    public function __construct(string $message)
    {
        parent::__construct($message);
        $this->setConfig(config('laraobserve.requests'));
        $this->logger = app(config('laraobserve.logger')) ?? logger();
        $this->config = new Config(config('laraobserve.requests'));
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

    public function setResponse(Response $response)
    {
        $this->response = $response;
        return $this;
    }

    public function getResponse(): Response
    {
        return $this->response;
    }
    
}
