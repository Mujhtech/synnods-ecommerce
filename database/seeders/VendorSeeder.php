<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vendor;

class VendorSeeder extends Seeder
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
                "store_name" => "Muhideen & Co",
                "store_description" => "",
                "store_slug" => "muhideen_&_co",
                "store_url" => "",
                "store_phone" => "",
                "store_email" => "muhideen@gmail.com",
                "store_country" => "Nigeria",
                "store_state" => "Niger",
                "store_city" => "Minna",
                "store_address" => "Bosso",
                "store_logo" => "",
                "user_id" => 1
            ],
        ];

    	foreach ($datas as $data) {
    		$existing = Vendor::where('store_name', $data['store_name'])->get();
    		if( !$existing->isEmpty() ){
    			continue;
    		}
            Vendor::create($data);
    	}
    }
}
