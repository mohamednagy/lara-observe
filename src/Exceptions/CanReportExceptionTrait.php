<?php

namespace Nagy\LaraObserve\Exceptions;

trait CanReportExceptionTrait
{
    public function report()
    {
        if ($this->getConfig()->get('active')) {
            $this->getLogger()->warning($this->getReportMessage());
        }
    }

    public function getReportMessage(): string
    {
        $msg = $this->getConfig()->get('report.title') . ': ' . $this->getMessage();
        if ($request = $this->getRequest()) {
            $msg .= PHP_EOL . 'Url: ' . $request->url();
        }

        if ($command = $this->getCommand()) {
            $msg .= PHP_EOL . 'Command: ' . $command;
        }

        return $msg;
    }
}
