<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $settings = [
            [
                "type" => "site_email",
                "value" => "synnods@gmail.com"
            ],
            [
                "type" => "site_name",
                "value" => "Synnods Ecommerce"
            ],
            [
                "type" => "site_description",
                "value" => "synnods@gmail.com"
            ],
        ];

    	foreach ($settings as $setting) {
    		$existing = Setting::where('type', $setting['type'])->get();
    		if( !$existing->isEmpty() ){
    			continue;
    		}
            Setting::create($setting);
    	}
    }
}
