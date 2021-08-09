<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $datas = [
            [
                "first_name" => "Mujeeb",
                "last_name" => "Adeoye",
                "email" => "mujhtech@gmail.com",
                "phone" => "2347063148208",
                "password" => "12345678",
                "verified" => 1,
                "role_id" => 1
            ],
        ];

    	foreach ($datas as $data) {
    		$existing = User::where('email', $data['email'])->get();
    		if( !$existing->isEmpty() ){
    			continue;
    		}
            User::create($data);
    	}
        
    }
}
