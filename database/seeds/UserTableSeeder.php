<?php

use App\User;
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
    	User::truncate();
    	$users = [
    		[    			
    			'name' => 'Captain',
    			'email' => 'admin@mail.com',
    			'password' => bcrypt('12345678'),
                'usertype' => 'admin',
    			'created_at' => now(),
    			'updated_at' => NULL,
    		],
    	];

    	foreach ($users as $user) {
    		$data = User::where('email', $user['email'])->first();
    		if(!$data){
    			User::create($user);
    		}
    	}
    }
}
