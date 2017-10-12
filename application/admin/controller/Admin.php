<?php
namespace app\admin\controller;

use app\common\lib\IAuth;
use think\Controller;

class Admin extends Base
{
    public function add()
    {
        if (request()->isPost()) {
            $data = input('post.');
            $validate = validate('AdminUser');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $data['password'] = IAuth::setPassword($data['password']);
            $data['status'] = 1;
            try {
                $id = model('AdminUser')->add($data);
            } catch (\Exception $exception) {
                $this->error($exception->getMessage());
            }
            if (!empty($id)) {
                $this->success('用户新增成功');
            } else {
                $this->error('eoor');
            }



        } else {
            return $this->fetch();
        }
    }
}
