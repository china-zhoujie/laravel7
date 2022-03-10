<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/','Admin\TestController@one')->name('h1');


//请求域名下home目录
Route::get('home',function(){
    return '这是home目录';
});
//可选参数
Route::get('home1/{id}',function($id){
    return "您当前访问的是/home1地址，您出入的id值是$id";
});

//必选参数+?
Route::get('home2/{id?}',function($id=0){
    return "您当前访问的是/home2地址，您出入的id值是$id";
});

//传统路由参数传递
Route::any('home3',function(){
   $id=isset($_GET['id']) ? $_GET['id'] : 0;
   return "您当前访问的是/home3地址，您出入的id值是$id";
});

//路由别名
Route::get('welcome',function(){
   return view('welcome'); 
})->name('h1');

//路由群组
Route::group(['prefix' => 'home/test'],function(){
    Route::get('test1',function(){//home/test/tes1
        //
        return 'a';
    });
    Route::get('test2',function(){//home/test/tes2
        //
        return 'b';
    });
});

Route::get('test1','TestController@test1');

Route::get('home/index/test2','Home\IndexController@test2');

//DB的CURD
Route::get('/add','DbtestController@add');//增加
Route::get('/del','DbtestController@del');//删除
Route::get('/mod','DbtestController@mod');//修改
Route::get('/select','DbtestController@select');//查询

//mode_demo
Route::post('model_add','Admin\TestController@modeladd');
Route::get('model_del','Admin\TestController@modeldel');
Route::get('model_mod','Admin\TestController@modelmod');
Route::get('model_select','Admin\TestController@modelselect');

Route::get('admin_test1','Admin\TestController@test1');
Route::get('admin_test2','Admin\TestController@test2');
Route::get('admin_test3','Admin\TestController@test3');
Route::get('admin_test4','Admin\TestController@test4');
Route::get('admin_test5','Admin\TestController@test5');
Route::get('admin_test6','Admin\TestController@test6');
Route::post('admin_test7','Admin\TestController@test7')->name('t7');
Route::get('admin_test8','Admin\TestController@test8');
Route::post('admin_test9','Admin\TestController@test9')->name('t9');
Route::get('admin_test10','Admin\TestController@test10')->name('t10');
Route::get('admin_test11','Admin\TestController@test11')->name('t11');//测试json数据
//session
Route::get('admin_test12','Admin\TestController@test12')->name('t12');//测试json数据
Route::get('admin_test13','Admin\TestController@test13')->name('t13');//测试缓存数据
Route::get('admin_test14','Admin\TestController@test14')->name('t14');//测试缓存数据
Route::get('admin_test15','Admin\TestController@test15')->name('t15');//测试连表查询1V1
Route::get('admin_test16','Admin\TestController@test16')->name('t16');//测试连表查询1VN
Route::get('admin_test17','Admin\TestController@test17')->name('t17');//测试连表查询NVN
Route::get('admin_test18','Admin\TestController@test18')->name('t18');//
Route::get('admin_test18','Admin\TestController@test18')->name('t18');//

Route::get('view_test1','ViewController@test1');
