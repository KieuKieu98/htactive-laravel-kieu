<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
    		['email' => 'kieu.nguyen98@gmail.com',
    		'name' => 'kieu.nguyen',
			'password' => bcrypt('123456789'),
			'created_at' => new DateTime,
            'updated_at' => new DateTime,
    		'email_verified_at'=> new DateTime,
    		'remember_token'=> str_random(10),
    	],
    	[
    		'email' => 'thuong.nguyen@gmail.com',
    		'name' => 'thuong nguyen',
			'password' => bcrypt('123456789'),
			'created_at' => new DateTime,
            'updated_at' => new DateTime,
    		'email_verified_at'=> new DateTime,
    		'remember_token'=> str_random(10),
    	],
    	[
    		'email' => 'hien.nguyen@gmail.com',
    		'name' => 'hien nguyen',
			'password' => bcrypt('123456789'),
			'created_at' => new DateTime,
            'updated_at' => new DateTime,
    		'email_verified_at'=> new DateTime,
    		'remember_token'=> str_random(10),
    	],
    ];


    DB::table('users')->insert($users);
    }
}
