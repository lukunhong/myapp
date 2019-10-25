<?php
namespace app\admin\controller;


class Index extends Base
{

    public function index()
    {
        return $this->fetch();
    }

    public function welcome()
    {
        echo session(config('admin.session_user'), '', config('admin.myapp_scope'));
        echo 1;
        return 'welcome';
    }
}
