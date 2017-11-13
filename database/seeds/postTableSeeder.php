<?php

use Illuminate\Database\Seeder;

class postTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->truncate();

        DB::table('posts')->insert([
        	[
        	'author_id' => 1,
        	'title' => 'Example Post 1',
        	'slug' => 'example-post-1',
        	'body' => 'This is example Post 1',
        	'published_at' => date('Y-m-d H:i:s', strtotime('now'))
        ],
       [
        	'author_id' => 2,
        	'title' => 'Example Post 2',
        	'slug' => 'example-post-2',
        	'body' => 'This is example Post 2',
        	'published_at' => date('Y-m-d H:i:s', strtotime('+ 2weeks'))
        ] ,
        [
        	'author_id' => 1,
        	'title' => 'Example Post 3',
        	'slug' => 'example-post-3',
        	'body' => 'This is example Post 3',
        	'published_at' => null
        ]
    ]);
    }
}
