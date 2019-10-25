<?php
namespace app\admin\controller;


use think\Controller;

class News extends Controller
{

    public function add()
    {
        return $this->fetch();
    }

}