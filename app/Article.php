<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // 定义当前模型关联的数据表
    protected $table = 'article';
    // 禁用时间的自动更新
    public $timestamps = false;
    
    // 定义关联方法，关联作者模型，一对一（rel：relate）
    public function rel_author()
    {
        return $this -> hasOne('App\Author','id','author_id');
    }
    
    // 定义关联方法，关联评论模型，一对多
    public function rel_comment()
    {
        return $this -> hasMany('App\Comment','article_id','id');
    }
    
    // 定义关联方法，关联关键词，多对多
    public function rel_keyword()
    {
        return $this->belongsToMany('App\Keyword','relation','article_id','keyword_id');
    }
}
