<?php
/**
   API 的公共方法
 */

namespace app\api\controller;


use think\Controller;

class Common extends Controller
{
    public function __initialize()
    {
        $this->checkRequestAuth();
        halt(123);
    }

    public function checkRequestAuth()
    {
        $headers = request()->header();

        return $headers;

    }


}