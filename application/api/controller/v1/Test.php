<?php

namespace app\api\controller\v1;
use think\Controller;

class Test extends Controller
{
    public function index()
    {
        $data = [
            'status' => 200,
            'message' => 'okdd'
        ];
        return json($data, 201);
    }
}