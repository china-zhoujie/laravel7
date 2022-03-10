<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    //定义当前模型关联的数据表
    protected $table="keyword";
    //禁用时间自动更新
    public $timestamps=false;
}
