<?php
namespace app\admin\controller;

use think\Controller;
use app\common\lib\IAuth;

class Login extends Base {

    public function _initialize()
    {
    }

    public function index()
    {
        $isLogin = $this->isLogin();
        if ($isLogin){
            return $this->redirect('index/index');
        }else{
            return $this->fetch();
        }
    }

    public function check()
    {
        if (request()->isPost()) {
            $data = input('post.');
//            if (!captcha_check($data['code'])) {
//                $this->error('验证码不正确');
//            }
            //验证码验证提取至validate
            $vilidate_result = $this->validate($data,'Login');
            if ($vilidate_result !== true) {
                $this->error($vilidate_result);
            }else{
                try{
                    $user = model('AdminUser')->get(['username'=>$data['username']]);
                    if (!$user || $user->status != config('AppCode.status_normal')){
//                        $this->error('用户信息不存在');
                        exception('用户信息不存在');
                    }
                    if (IAuth::setPassword($data['password']) != $user->password){
//                        $this->error('密码错误');
                        exception('密码错误');
                    }
//                $this->success('登录成功');
                    // 更新登录时间 ip 保存session
                    $udata = [
                        'last_login_time' =>  time(),
                        'last_login_ip' => request()->ip(),
                    ];
                    model('AdminUser')->save($udata, ['id' => $user->id]);
                }catch (\Exception $e){
                    $this->error($e->getMessage());
                }
                session(config('admin.session_user'), $user, config('admin.myapp_scope'));
                $this->success('登录成功','index/index');
            }
        }else{
            $this->error('请求不合法');
        }
    }

    /**
     * 退出登录
     */
    public function logout()
    {
        session(null,config('admin.myapp_scope'));
        $this->redirect('login/index');
    }
}