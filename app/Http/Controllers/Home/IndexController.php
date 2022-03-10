<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//引入input
use Input;
class IndexController extends Controller
{
    //
    public function test2(){
        //1.获取sex参数的值，如果不存在则用0替换
        $data=Input::get('sex',0);
        //2.获取全部参数值
        $data=Input::all();
        //3.获取id的参数值
        $data=Input::get('id');
        //4.获取指定参数的值
        $data=Input::only(['id','name']);
        //5.获取指定参数之外的值
        $data=Input::except(['id','name']);
        //6.判断某个参数是否存在
        $data=Input::has('number');
        dd($data);
    }
}
