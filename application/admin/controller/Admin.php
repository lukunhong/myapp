<?php
namespace app\admin\controller;

use think\Controller;
use app\common\lib\IAuth;

class Admin extends Controller
{
    public function add()
    {
        if (request()->isPost()){
            $data = input('post.');
            $validat = validate('AdminUser');
            if (!$validat->check($data)){
                $this->error($validat->getError());
            }
            $data['password'] = IAuth::setPassword($data['password']);
            $data['status'] = 1;
            try{
                $id = model('AdminUser')->add($data);
            }catch (\Exception $e){
                $this->error($e->getMessage());
            }
            if ($id){
                $this->success('插入成功,id:'.$id);
            }else{
                $this->error('插入失败');
            }

        }else{
            return $this->fetch();
        }
    }
}
