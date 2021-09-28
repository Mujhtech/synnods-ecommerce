<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
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
                "name" => "Camera",
                "description" => "",
                "slug" => "camera",
                "image" => "categories/oVHMrwmM1XYGy89Gl267aTXt043z3ubl1BTSukvY.jpg",
                "top_level_category_id" => 1
            ],
            [
                "name" => "Television",
                "description" => "",
                "slug" => "television",
                "image" => "categories/oVHMrwmM1XYGy89Gl267aTXt043z3ubl1BTSukvY.jpg",
                "top_level_category_id" => 1
            ],
            [
                "name" => "Audio & Sound System",
                "description" => "",
                "slug" => "audio_&_sound_system",
                "image" => "categories/oVHMrwmM1XYGy89Gl267aTXt043z3ubl1BTSukvY.jpg",
                "top_level_category_id" => 1
            ],
            [
                "name" => "Games & Consoles",
                "description" => "",
                "slug" => "games_&_consoles",
                "image" => "categories/oVHMrwmM1XYGy89Gl267aTXt043z3ubl1BTSukvY.jpg",
                "top_level_category_id" => 1
            ],
            [
                "name" => "Phone",
                "description" => "",
                "slug" => "phone",
                "image" => "categories/oVHMrwmM1XYGy89Gl267aTXt043z3ubl1BTSukvY.jpg",
                "top_level_category_id" => 2
            ],
            [
                "name" => "Tablet",
                "description" => "",
                "slug" => "tablet",
                "image" => "categories/oVHMrwmM1XYGy89Gl267aTXt043z3ubl1BTSukvY.jpg",
                "top_level_category_id" => 2
            ],
            [
                "name" => "Laptop",
                "description" => "",
                "slug" => "laptop",
                "image" => "categories/oVHMrwmM1XYGy89Gl267aTXt043z3ubl1BTSukvY.jpg",
                "top_level_category_id" => 4
            ],
            [
                "name" => "Desktop & Monitors",
                "description" => "",
                "slug" => "desktop_&_monitors",
                "image" => "categories/oVHMrwmM1XYGy89Gl267aTXt043z3ubl1BTSukvY.jpg",
                "top_level_category_id" => 4
            ],
            [
                "name" => "Printers & Scanners",
                "description" => "",
                "slug" => "printers_&_scanners",
                "image" => "categories/oVHMrwmM1XYGy89Gl267aTXt043z3ubl1BTSukvY.jpg",
                "top_level_category_id" => 4
            ],
        ];

    	foreach ($datas as $data) {
    		$existing = Category::where('name', $data['name'])->get();
    		if( !$existing->isEmpty() ){
    			continue;
    		}
            Category::create($data);
    	}
    }
}
