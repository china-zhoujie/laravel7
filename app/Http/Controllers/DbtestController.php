<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//引入DB
use DB;

class DbtestController extends Controller
{
    /*//
    public function test1(){
        echo phpinfo();
    }*/
    //add方法
    public function add()
    {
        $res=DB::table('member')->insert([
            [
           'name' => '张三', 
           'age' => 22, 
           'email' => 'zs@qq.com'
           ],
            [
           'name' => '张香', 
           'age' => 29, 
           'email' => 'zx@qq.com'
           ]
        ]);
        dump($res);
/*        for ($i = 1; $i <= 100; $i++) {
             // code...
             $name="张三".$i;
             $age=22+$i;
             $email=$i."@qq.com";
             DB::table('member')->insert([
                ['name' =>  $name,
                'age' => $age,
                'email' => $email]
            ]);
        }*/
    }
    
    public function del()
    {   
        //删除单条数据
        $res=DB::table('member')->where('id','<','6')->delete();
        dump($res);
        //清空表
        //DB::table(‘member’) -> truncate();
    }
    
    public function mod()
    {   $rec=DB::table('member')->increment('age');
        $res=DB::table('member')->where('id',1)->update([
            'name' => '李连杰'
        ]);
        dump($res);
    }
    
    public function select()
    {
        $db=DB::table('member');
/*        $data=$db->get();
        //dump($data->toArray());
        foreach ($data as $k=>$v){
            echo "id是：{$v->id},名字是：{$v->name},邮箱是：{$v->email}<br/>";
        }*/
        
/*        //查询id>3的数据
        $data=$db->where('id','>','3')->get();
        dump($data);
        
        //查询di>2且年龄小于51的数据
        $data=$db->where('id','>','2')->where('age','<','51')->get();
        dd($data);*/
        
/*        //取出单行数据
        $data=$db->where('id','1')->first();
        dump($data);*/
        
/*        //获取某个具体的值（一个字段）
        $data=$db->where('id','1')->value('name');
        dump($data);*/
        
/*        //获取某些字段数据（多个字段）
        $data=$db->where('id','1')->select('name','age','email')->get();
        dump($data->toArray());*/
        
/*        //排序操作
        $data=$db->orderBy('age','desc')->get();
        dump($data->toArray());*/
        
        //分页操作
        $data=$db->limit(10)->offset(2)->get();
        dump($data);
    }
/*    
6、执行原生的SQL语句（补充了解）
（1）执行原生查询语句
DB::select(“selec语句”);

（2）执行原生插入语句
DB::insert("insert语句"); 

（3）执行原生修改语句
DB::update("update语句"); 

（4）执行原生删除语句
DB::delete("delete语句"); 

（5）执行一个通用语句
DB::statement("语句");*/ 

}
