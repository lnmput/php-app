<?php
/**
 * Created by PhpStorm.
 * User: yangzie
 * Date: 2017/10/11
 * Time: 21:59
 */

namespace app\admin\controller;


use think\Request;

class Image extends Base
{

    public function upload()
    {
        $file = Request::instance()->file('file');
        $info = $file->move('upload');

        if ($info && $info->getPathname()) {
            $data = [
                'status' => 1,
                'message' => 'ok',
                'data' => '/'.$info->getPathname()
            ];

            return json_encode($data);
        }

        return json_encode(['status' => 0, 'message' => 'fail']);
    }

}