<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
        	[
        		'name' => 'Henry',
        		'email' => 'okolihenry25@gmail.com',
        		'password' => bcrypt('secret')
        	],
        	[
        		'name' => 'mma',
        		'email' => 'ochidimma446@gmail.com',
        		'password' => bcrypt('secret')
        	]

        ]);
    }
}
