<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class BaseException extends Exception implements LarabaseException
{
    /**
     * @var array
     */
    private $debug = [];

    /**
     * @var array
     */
    private $data = [];

    /**
     * BaseException constructor.
     * @param string $message
     * @param int $code
     * @param array $debug
     * @param Throwable|null $previous
     * @param array $data
     */
    public function __construct(
        string $message = "",
        int $code = 0,
        array $debug = [],
        Throwable $previous = null,
        $data = []
    ) {
        parent::__construct($message, $code, $previous);
        $this->setDebug($debug);
        $this->setData($data);
    }

    /**
     * @return array
     */
    public function getDebug(): array
    {
        return $this->debug;
    }
    /**
     * @param array $debug
     */
    public function setDebug(array $debug = [])
    {
        $this->debug = $debug;
    }
    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
    /**
     * @param array $data
     */
    public function setData(array $data = [])
    {
        $this->data = $data;
    }
    /**
     * @return string
     */
    public function getDebugAsString(): string
    {
        return print_r($this->debug, true);
    }
}
