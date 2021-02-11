<?php

use Illuminate\Database\Seeder;

use App\User;

class UserSeeder extends Seeder
{
	private $userData = [];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <100; $i++){
        	$userData[] = [
            	'name'=>'Adminsee',
            	'email'=>Str::random(8).'@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ];
        }

        foreach ($userData as $users) {
        	User::create($users);
        }
    }
}
