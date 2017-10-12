<?php
namespace app\common\lib;

class IAuth
{

    public static function setPassword($password)
    {
        return md5($password.config('app.password_prefix'));
    }

}