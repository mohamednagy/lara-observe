<?php

namespace Nagy\LaraObserve\Exceptions;

class SlowQueryException extends LaraObserveException
{
    use CanReportExceptionTrait;
}
