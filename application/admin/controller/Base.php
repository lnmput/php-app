<?php
/**
 * Created by PhpStorm.
 * User: yangzie
 * Date: 2017/10/11
 * Time: 21:16
 */

namespace app\admin\controller;


use think\Controller;

class Base extends Controller
{
    public function _initialize()
    {
        $isLogin = $this->isLogin();
        if (!$isLogin) {
            return $this->redirect('login/index');
        }
    }

    public function isLogin()
    {
        $user = session('adminuser', '', 'yangzie');
        if ($user && $user->id) {
            return true;
        }
        return false;
    }

}