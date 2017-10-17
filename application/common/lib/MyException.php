<?php

namespace app\common\lib;


use think\Exception;
use Throwable;

class MyException extends Exception
{
    public $message = '';
    public $httpCode =500;
    public $code = 0;

    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $this->httpCode = $code;
        $this->message = $message;
    }

}