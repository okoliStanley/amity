<?php

use Illuminate\Database\Seeder;

class pageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->truncate();

        DB::table('pages')->insert([
        	[
        		'title' => 'About',
        		'uri'	=> 	'about',
        		'content' => 'This is the About page.',
                'parent_id' => null,
                'lft' => 3,
                'rgt' => 8,
                'depth' => 0
        	],
        	[
        		'title' => 'Contact',
        		'uri'	=> 	'contact',
        		'content' => 'This is the Contact page.',
                'parent_id' => 1,
                'lft' => 4,
                'rgt' => 5,
                'depth' => 1
        	],
        	[
        		'title' => 'Media',
        		'uri'	=> 	'media',
        		'content' => 'This is the Media page.',
                'parent_id' => null,
                'lft' => 1,
                'rgt' => 2,
                'depth' => 0
        	],
        	[
        		'title' => 'FAQ',
        		'uri'	=> 	'faq',
        		'content' => 'This is the FAQ page.',
                'parent_id' => 1,
                'lft' => 6,
                'rgt' => 7,
                'depth' => 1
        	],

            [
                'title' => 'Characters',
                'uri'   =>  'characters',
                'content' => 'This is the characters page.',
                'parent_id' => null,
                'lft' => 9,
                'rgt' => 10,
                'depth' => 0
            ]
        ]);
    }
}
