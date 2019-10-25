<?php
namespace app\admin\controller;

use think\Controller;

/**
 * 后台图片上传
 * Class Image
 * @package app\admin\controller
 */
class Image extends Controller
{

    public function add()
    {
        return $this->fetch();
    }

    public function upload() {
        $data = [
            'status' => 1,
            'message' => 'OK',
            'data' => $_POST,
            'file'  => $_FILES
        ];
        echo json_encode($data);exit;
    }

}