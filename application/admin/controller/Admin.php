<?php
namespace app\admin\controller;

use think\Controller;

class Admin extends Controller
{
    public function add()
    {
        if (request()->isPost()) {
            $data = input('post.');
            $validate = validate('AdminUser');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $data['password'] = md5($data['password'].'yangzie');
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
