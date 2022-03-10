<?php

use Illuminate\Database\Seeder;

class PaperTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paper')->insert([
            [
              'paper_name' => '小学一年级语文考试',
              'total_score' => 100,
              'start_time' => time()+86400,
              'duration' => 120,
              'status' => 1,
                ],
            [
              'paper_name' => '小学一年级数学考试',
              'total_score' => 100,
              'start_time' => time()+86400,
              'duration' => 120,
              'status' => 1,
                ],
            [
              'paper_name' => '小学一年级英语考试',
              'total_score' => 100,
              'start_time' => time()+86400,
              'duration' => 120,
              'status' => 1,
                ]
        ]);
    }
}
