<?php

namespace Nagy\LaraObserve\Exceptions;

trait CanReportExceptionTrait
{
    public function report()
    {
        if ($this->config->get('active')) {
            $this->logger->info($this->prepareReportMessage());
        }
    }

    protected function prepareReportMessage(): string
    {
        return $this->config->get('report.title') . ': ' . $this->getMessage();
    }
}
