<?php

namespace app\common\validate;

use think\Validate;
class Login extends Validate{
    protected  $rule = [
        'username'  =>  'require|max:20',
        'password'  =>  'require|max:20',
        'code'   => 'require|captcha',
    ];
}