<?php
/**
 * Created by PhpStorm.
 * User: yangzie
 * Date: 2017/10/12
 * Time: 19:58
 */

namespace app\common\lib;


use Qiniu\Auth;
use Qiniu\Storage\UploadManager;

class Upload
{

    public static function image()
    {


        if (empty($_FILES['file']['tmp_name'])) {
            exception('您提交的数据不合法', 404);
        }


        $file = $_FILES['file']['tmp_name'];
        $ext = explode('.', $_FILES['file']['name']);
        $ext = $ext[1];
        $config = config('qiniu');

        $auth = new Auth($config['ak'], $config['sk']);
        $token = $auth->uploadToken($config['bucket']);
        $key = date('Y').'/'.date('m').'/'.substr(md5($file), 0, 5).date('YmdHis').rand(0, 9999).'.'.$ext;

        $upload = new UploadManager();
        list($ret, $err) = $upload->putFile($token, $key, $file);
        if ($err != null) {
            return null;
        } else {
            return $key;
        }



    }

}