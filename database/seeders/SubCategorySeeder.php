<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubCategory;

class SubCategorySeeder extends Seeder
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
                "name" => "Camera & Photo",
                "description" => "",
                "slug" => "camera_&_photo",
                "category_id" => 1,
                "image" => "sub_categories/oVHMrwmM1XYGy89Gl267aTXt043z3ubl1BTSukvY.jpg"
            ],
            [
                "name" => "Televisio & Video",
                "description" => "",
                "slug" => "television_&_video",
                "category_id" => 1,
                "image" => "sub_categories/oVHMrwmM1XYGy89Gl267aTXt043z3ubl1BTSukvY.jpg"
            ],
            [
                "name" => "Home Audio",
                "description" => "",
                "slug" => "home_audio",
                "category_id" => 1,
                "image" => "sub_categories/oVHMrwmM1XYGy89Gl267aTXt043z3ubl1BTSukvY.jpg"
            ],
            [
                "name" => "Mobile Phone",
                "description" => "",
                "slug" => "mobile_phone",
                "category_id" => 2,
                "image" => "sub_categories/oVHMrwmM1XYGy89Gl267aTXt043z3ubl1BTSukvY.jpg"
            ],
            [
                "name" => "Tablets",
                "description" => "",
                "slug" => "tablets",
                "category_id" => 2,
                "image" => "sub_categories/oVHMrwmM1XYGy89Gl267aTXt043z3ubl1BTSukvY.jpg"
            ],
            [
                "name" => "Accessories",
                "description" => "",
                "slug" => "accessories",
                "category_id" => 2,
                "image" => "sub_categories/oVHMrwmM1XYGy89Gl267aTXt043z3ubl1BTSukvY.jpg"
            ],
            [
                "name" => "Foods",
                "description" => "",
                "slug" => "foods",
                "category_id" => 3,
                "image" => "sub_categories/oVHMrwmM1XYGy89Gl267aTXt043z3ubl1BTSukvY.jpg"
            ],
            [
                "name" => "Beer, Wine & Spirits",
                "description" => "",
                "slug" => "beer_wine_&_spirits",
                "category_id" => 3,
                "image" => "sub_categories/oVHMrwmM1XYGy89Gl267aTXt043z3ubl1BTSukvY.jpg"
            ],
            [
                "name" => "House cleaning",
                "description" => "",
                "slug" => "house_cleaning",
                "category_id" => 3,
                "image" => "sub_categories/oVHMrwmM1XYGy89Gl267aTXt043z3ubl1BTSukvY.jpg"
            ],
            [
                "name" => "Computers",
                "description" => "",
                "slug" => "computers",
                "category_id" => 4,
                "image" => "sub_categories/oVHMrwmM1XYGy89Gl267aTXt043z3ubl1BTSukvY.jpg"
            ],
            [
                "name" => "Accessories",
                "description" => "",
                "slug" => "accessories",
                "category_id" => 4,
                "image" => "sub_categories/oVHMrwmM1XYGy89Gl267aTXt043z3ubl1BTSukvY.jpg"
            ],
            [
                "name" => "Printers",
                "description" => "",
                "slug" => "printers",
                "category_id" => 4,
                "image" => "sub_categories/oVHMrwmM1XYGy89Gl267aTXt043z3ubl1BTSukvY.jpg"
            ],
        ];

    	foreach ($datas as $data) {
    		$existing = SubCategory::where('name', $data['name'])->get();
    		if( !$existing->isEmpty() ){
    			continue;
    		}
            SubCategory::create($data);
    	}
    }
}
