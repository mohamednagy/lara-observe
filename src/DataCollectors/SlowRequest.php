<?php
namespace Nagy\LaraObserve\DataCollectors;

class SlowRequest extends AbstractDataCollector
{

    private $request;

    private $response;

    public function __construct($request, $response)
    {
        $this->request = $request;
        $this->response = $response;        
    }

    public function collect()
    {
        $details = [
            'response' => $this->response,
            'request' => $this->request,
        ];

        return array_merge($details, $this->collectRequestData());
    }
}