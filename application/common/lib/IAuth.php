<?php

namespace app\common\lib;

class IAuth{

    /** 设置密码
     * @param $data
     * @return string
     */
    public static function setPassword($data)
    {
        return md5($data.config('AppConfig.password_slat'));
    }
}