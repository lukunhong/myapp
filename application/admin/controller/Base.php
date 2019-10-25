<?php
namespace app\admin\controller;

use think\Controller;

/**
 * 后台基础类
 * Class Base
 * @package app\admin\controller
 */
class Base extends Controller
{
    public function _initialize()
    {
        $isLogin = $this->isLogin();
        if (!$isLogin){
            return $this->redirect('login/index');
        }
    }

    /**
     * 判断登录
     */
    public function isLogin()
    {
        $user = session(config('admin.session_user'), '', config('admin.myapp_scope'));
        if ($user && $user->id){
            return true;
        }
        return false;
    }
}
