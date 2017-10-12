<?php
namespace app\admin\controller;

use app\common\lib\IAuth;
use think\Controller;

class Login extends Controller
{
    public function index()
    {
        return $this->fetch();

    }

    public function check()
    {
        $data = input('post.');
        if (!captcha_check($data['code'])) {
            $this->error('验证码不正确');
        } else {
            $user = model('AdminUser')->get(['username' => $data['username']]);
            if (!$user || $user->status != 1) {
                $this->error('用户不存在');
            }

            if (IAuth::setPassword($data['password']) != $user['password']) {
                $this->error('密码不正确');
            }
            $udata = [
                'last_login_time' => time(),
                'last_login_ip' => request()->ip()
            ];
            model('AdminUser')->save($udata, ['id' => $user->id]);
            session('adminuser', $user, 'yangzie');
            $this->success('登录成功', 'index/index');
        }
    }

    public function logout()
    {
        session(null, 'yangzie');
        $this->redirect('login/index');
    }
}
