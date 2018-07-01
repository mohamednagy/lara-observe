<?php
namespace Nagy\LaraObserve\DataCollectors;

class AbstractDataCollector
{
    protected function isHttpRequest()
    {
        return php_sapi_name() !== "cli";
    }

    protected function getFilteredDebugTrace()
    {
        $trace = debug_backtrace();
        $filterTrace = [];
        foreach ($trace as $item) {
            if (str_contains($item['file'], ['LaraObserve', 'Controller', 'ServiceProvider'])) {
                break;
            }

            array_unshift($filterTrace, $item);
        }

        return $filterTrace;
    }

    protected function collectRequestData()
    {
        $request = request();

        $requestData = [
            'headers' => $request->header(),
            'url' => $request->fullUrl()
        ];

        return $requestData;
    }

    protected function collectCommandData()
    {
        $request = request();

        $commandData = [
            'command' => $request->server('argv')
        ];

        return $commandData;
    }
}