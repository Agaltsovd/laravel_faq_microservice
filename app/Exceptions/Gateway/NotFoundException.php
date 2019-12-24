<?php

namespace App\Exceptions\Gateway;

use App\Exceptions\BaseException;
use App\Exceptions\ErrorCodes;
use Throwable;

class NotFoundException extends BaseException
{
    public function __construct(string $message = "", array $debug = [], Throwable $previous = null, array $data = [])
    {
        parent::__construct($message, ErrorCodes::NOT_FOUND, $debug, $previous, $data);
    }
}
