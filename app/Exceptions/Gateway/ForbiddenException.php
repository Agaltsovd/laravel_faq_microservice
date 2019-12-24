<?php

namespace App\Exceptions\Gateway;

use App\Exceptions\BaseException;
use App\Exceptions\ErrorCodes;
use Throwable;

class ForbiddenException extends BaseException
{
    public function __construct(string $message = "", array $debug = [], Throwable $previous = null, array $data = [])
    {
        parent::__construct($message, ErrorCodes::FORBIDDEN, $debug, $previous, $data);
    }
}
