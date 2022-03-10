<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    // 定义当前模型关联的数据表
    protected $table = 'member';
    // 禁用时间的自动更新
    public $timestamps = false;
    // 定义fillable属性
    protected $fillable = ['name','age','email','avatar'];
}
