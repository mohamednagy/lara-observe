<?php

namespace Nagy\LaraObserve;

class SlowRequestException extends \Exception
{
    protected $request;

    protected $response;
    
    public function __construct(string $message)
    {
        parent::__construct($message);
    }

    public function setRequest($request)
    {
        $this->request = $request;

        return $this;
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function setResponse($response)
    {
        $this->response = $response;

        return $this;
    }

    public function getResponse()
    {
        return $this->response;
    }
    
}


?>