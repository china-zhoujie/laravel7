<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引入DB
use DB;
//模型的引入
use App\Member;
use App\Article;
use App\Comment;
//引入Session
use Session;
//引入Cache
use Cache;

class TestController extends Controller
{
    //首页
    public function one()
    {
        return view('welcome');
    }
    
    public function test1()
    {
        return view('admin.test.test1');
    }
    
    
    public function test2()
    {   
        $data=time();
        return view('admin.test.test2',['data'=>$data]);
    }
    
    //测试视图优先级
    public function test3()
    {
        $data=time();
        //演示compact函数
        $data2='aaa';
        $data3='ccc';
        $data4=['1','3'];
        //dump(compact('data','data2','data3','data4'));die;
        return view('admin.test.test3',compact('data'));
        //return view('admin.test.test3');
    }
    
    //循环判断标签
    public function test4()
    {
        $data=DB::table('member')->get();
        $day=date('N');
        return view('admin.test.test4',compact('data','day'));
    }
    
    //模板继承demo ,继承parent
    public function test5()
    {
        return view('admin.test.test5');
    }
    
    //模拟csrf攻击
    public function test6()
    {
        return view('admin.test.test6');
    }
    
    //模拟csrf攻击
    public function test7()
    {
        return '转账成功，已付款10000000000000元！';
    }
    
    public function test8()
    {
        return view('admin.test.test8');
    }
    
    //数据验证和文件上传
    public function test9(Request $request)
    {
        //先验证数据的合法性
        $this->validate($request,[
            'name' => 'required|unique:member|min:2|max:20',
            'age' => 'required|min:2|max:90|integer',
            'email' => 'required|email',
            'yzm' => 'required|captcha' //captcha用于匹配验证码是否正确
        ]
/*        [
            'required.name' => '用户名不能为空',
            'required.min' => '用户名至少2个字符'
        ]*/
        );
        //处理文件上传
        //判断文件是否上传正常与存在
        if($request->hasFile('touxiang') && $request->file('touxiang')->isValid()){
            //对文件进行重命名
            $name=sha1(time().rand(100000,999999)).'.'.$request->file('touxiang')->extension();
            //文件的移动操作
            $request->file('touxiang')->move('./statics/upload/',$name);
            $path='./statics/upload/'.$name;
        }
        //通过验证后则写入数据库
        $data=$request->except(['_token','touxiang','yzm']);//设置不写入数据库的字段
        $data['avatar']=isset($path) ? $path : '';
        $res=Member::insert($data);
        //返回上传结果
        if($res){
            //如果成功
            return redirect(route('h1'));
        }else{
            //文件没有上传成功
            //reruen 重新上传文件
            return redirect('admin_test8')->withErrors(['请重新上传文件']);
        }
        //获取上传错误信息
        //$request -> file(‘avatar’) -> getErrorMessage();
    }
    
    //分页实例
    public function test10()
    {
        //查询全部的数据
        //先不考虑分页
        //$data=Member::all();
        $data=Member::paginate(1);
        return view('admin.test.test10',compact('data'));
        
    }
    
    //实例化model
    public function modeladd(Request $request)
    {
/*        //1.AR模式进行增加
        //映射关系1：将表映射到模型
        $model=new Member();
        //映射关系2：将字段映射到属性
        $model->name = '张海洋';
        $model->age = '22';
        $model->email = 'zhy@qq.com';
        //映射关系3：将记录映射到实例
        $res=$model->save();dd($res);*/
        
        //2.自动创建方式添加
        //实例化模型
        $model=new Member();
        //dd($request->all());
        //更加高级的写法
        //$res=$model->create($request->all());
        //a. DB类中的insert方法，在模型中也是可以使用的（其他方法也是如此）；
	    //b. insert方法必须要求先排除不写入数据表的字段，模型中的fillable属性对insert不生效，如果不事先排除如“_token”等字段，则会报错；
        $res=$model->insert($request->all());
        dump($res->toArray());
        
    }
    
    //响应json数据
    public function test11()
    {
        //查询全部的数据
        $data=Member::all();
        return response() -> json($data);
    }
    
    //测试session
    public function test12()
    {
        //1.设置一个session信息
        dump(session::put('name','88880'));
        //2.获取一个session信息
        dump(session::get('name'));
        dump(session::get('xusanduo','0090909009'));
        dump(session::get('88888',function(){
            return Member::all();
        }));
        //3.获取所有的session
        dump(session::all());
        //4.删除单个session操作
        dump(session::forget('name'));
        //5.判断某个session是否存在
        dump(session::has('name'));
        //6.删除全部
        dump(session::flush());
        //7.显示所有
        dump(session::all());
    }
    
    //设置cache
    public function test13()
    {
        //缓存一个session
        Cache::put('nihao','马什么梅','5');
        //在没有session的情况下，使用add
        Cache::add('你好','马什么梅','5');
        //永久缓存到2026年
        Cache::forever('nmd','你妹的');
    }
    //获取Cache
    public function test14()
    {
/*        //获取缓存数据
        $data=Cache::get('nmd');
        //获取缓存，没有则使用默认值
        $data=Cache::get('你好','男');
        //获取缓存，获取不到使用默认值的匿名函数
        $data=Cache::get('你好',function(){
           return Member::where('id','41')->get(); 
        });
        //判断缓存是否存在
        $data=Cache::has('nmd');
        dump($data);
        //获取之后再删除
        $res=Cache::pull('你好');
        //直接删除缓存项
        $res=Cache::forget('你好');
        //移除全部缓存包括目录文件
        $res=Cache::flush();
        dump($res);
        */
        //缓存递增与递减
        Cache::add('count',0,999999);
        Cache::increment('count',rand(10,100));
        dump(Cache::get('count'));
        Cache::decrement('count',5);
        dump(Cache::get('count'));
        
        //获取并存储缓存
        $value=Cache::remember('test1',10,function(){
           return Member::where('id','50')->get(); 
        });
        dump($value);
    }
    
    //联表查询，左链接查询(关联关系1V1)
    public function test15()
    {
/*        $users=DB::table('article as t1')
            ->select('t1.id','t1.article_name as article_name','t2.author_name as author_name')
            ->leftjoin('author as t2','t1.id','=','t2.id')
            ->get();
        dump($users);*/
        
        //查询文章信息
        $data=Article::all();
        //每个遍历输出
        foreach ($data as $k=>$v){
            echo '文章id：'.$v->id.'<br/>';
            echo '文章名称：'.$v->article_name.'<br/>';
            echo '作者名称：'.$v->rel_author->author_name.'<br/>';
            echo '<hr/>';
        }
        
    }
    
    //关联关系1VN
    public function test16()
    {
        //查询文章信息
        $data=Article::all();
        //每个遍历输出
        foreach ($data as $k=>$v){
            echo '文章id：'.$v->id.'<br/>';
            echo '文章名称：'.$v->article_name.'<br/>';
            //dump($v->rel_comment);die;
            foreach ($v->rel_comment as $k=>$v1){
               echo '&emsp;&emsp;' .$v1->comment.'<br/>'; 
            }
            echo '<hr/>';
        }
    }
    
    //关联关系NVN
    public function test17()
    {
        //查询文章信息
        $data=Article::all();
        //每个遍历输出
        foreach ($data as $k=>$v){
            echo '文章id：'.$v->id.'<br/>';
            echo '文章名称：'.$v->article_name.'<br/>';
            //dump($v->rel_comment);die;
            foreach ($v->rel_keyword as $k=>$v1){
               echo '&emsp;&emsp;' .$v1->keyword.'<br/>'; 
            }
            echo '<hr/>';
        }        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    //2.查询操作
    public function modelselect()
    {
        $res=Member::find(44)->toArray();
        dump($res);
        /*查询多行并且指定字段（了解）
        Member::all()    		//查询全部的数据，类似于get()
        Member::all([字段1,字段2])     //与get方法的区别，all不支持连接其他的辅助查询方法
        相当于get方法
        Member::get()    
        Member::get([字段1,字段2])
        按条件查询指定多个字段
        Member ::where('id','>',2)->get([' 列 1',' 列 2']);	//数组选列
        Member::where('id','>',2)->select('列1','列2')->get(); //字符串选列
        Member::where('id','>',2)->select( [' 列 1',' 列 2'] )->get(); //数组选列
        
        案例：测试在all方法之前，写一些辅助方法实现连贯操作（报错）
        注意：all方法之前，必须是模型/DB类，不能是其他的辅助方法（例如where等），否则会报错，此时可以使用get方法替代all。
        */
    }
    //修改操作
    public function modelmod()
    {
        //实现ORM形式模型的修改操作
        $data=Member::find(50);
        $data->email = '827480942@qq.com';
        return $data->save() ? 'OK' : "fial";
        
        //实现AR修改操作
        Member::where('id',54)->update(['name' => '许留山','age' => '66']);
    }
    
    //删除操作
    public function modeldel()
    {
        //实现ORM形式
        $data=Member::find(55);
        return $data->delete() ? 'OK' : 'FAIL';
        //实现AR操作
        Member::where('id',56)->delete();
    }
}
