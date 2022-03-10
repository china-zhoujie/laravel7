<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //定义当前模型关联的数据表
    protected $table="comment";
    //禁用时间自动更新
    public $timestamps=false;
}
