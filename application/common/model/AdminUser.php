<?php

namespace app\common\model;

use think\Model;
class AdminUser extends Model{

    //自动插入时间
    protected $autoWriteTimestamp = true;
    public function add($data)
    {
        if (!is_array($data)){
            exception('数据不合法');
        }
        //过滤表结构不存在字段
        $this->allowField(true)->save($data);
        return $this->id;
    }
}