<?php

use Illuminate\Database\Seeder;

class ArticleAndAuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('article')->insert([
           [
             'article_name' => 'php从入门到精通',
             'author_id' => 1
               ],
           [
             'article_name' => '从未来到现在',
             'author_id' => 2
               ],
           [
             'article_name' => '明天过后',
             'author_id' => 3
               ],
        ]);
        
        DB::table('author')->insert([
           ['author_name' => '张恒'], 
           ['author_name' => '罗盘'], 
           ['author_name' => '许三多'],
        ]);
    }
}
