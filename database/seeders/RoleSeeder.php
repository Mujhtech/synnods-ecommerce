<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = [
            [
                "name" => "Super Admin",
            ],
            [
                "name" => "Admin",
            ],
            [
                "name" => "Vendor",
            ],
            [
                "name" => "Customer",
            ],
            [
                "name" => "User",
            ]
        ];

    	foreach ($roles as $role) {
    		$existing = Role::where('name', $role['name'])->get();
    		if( !$existing->isEmpty() ){
    			continue;
    		}
           Role::create($role);
    	}
    }
}
