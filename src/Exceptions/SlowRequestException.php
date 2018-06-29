<?php

namespace Nagy\LaraObserve\Exceptions;

use Illuminate\Http\Response;

class SlowRequestException extends LaraObserveException
{
    use CanReportExceptionTrait;

    /**
     * @var Response
     */
    protected $response;

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
