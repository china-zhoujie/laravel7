<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('comment')->insert([
           [
             'comment' => '测试评论啊，随便什么鬼吧',
             'article_id' => 1
               ], 
           [
             'comment' => '测试评论啊，又怎么样啊',
             'article_id' => 2
               ], 
           [
             'comment' => '测试评论啊，嗷嗷啊',
             'article_id' => 3
               ], 
        ]);
    }
}
