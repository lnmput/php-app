<?php
namespace app\common\lib;

use Exception;
use think\exception\Handle;

class APIException extends Handle
{
    public $httpCode = 500;
    public function render(Exception $e)
    {
        if ($e instanceof MyException) {
            $this->httpCode = $e->httpCode;
        }

        if (config('app_debug') == true) {
            return parent::render($e);
        }
        return json([
            'status' => 0,
            'message' => $e->getMessage() ,
            'data' => []
        ], $this->httpCode);
    }
}