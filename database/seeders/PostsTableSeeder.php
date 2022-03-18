<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
              'user_id' => 1,
              'title' => 'hoge',
              'content' => 'test'
            ],
            [
              'user_id' => 1,
              'title' => 'hoge',
              'content' => 'test2'
            ],
            [
              'user_id' => 1,
              'title' => 'hoge',
              'content' => 'test3'
            ]
        ]);
    }
}
