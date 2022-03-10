<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    // 定义当前模型关联的数据表
    protected $table = 'author';
    // 禁用时间的自动更新
    public $timestamps = false;
}
