<?php

use Illuminate\Database\Seeder;

class KeywordAndRelationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //写关键词表数据
        DB::table('keyword')->insert([
            ['keyword' => '搞笑'],    
            ['keyword' => '生活方式'],    
            ['keyword' => '言情时间'],    
            ['keyword' => '生活百科'],    
            ['keyword' => '有问必答'],    
            ['keyword' => '科普大全'],    
        ]);
        //写关系表
        DB::table('relation')->insert([
            [
              'article_id' => rand(1,4),
              'keyword_id' => rand(1,6)
                ],
            [
              'article_id' => rand(1,4),
              'keyword_id' => rand(1,6)
                ],
            [
              'article_id' => rand(1,4),
              'keyword_id' => rand(1,6)
                ],
        ]);
        
    }
}
