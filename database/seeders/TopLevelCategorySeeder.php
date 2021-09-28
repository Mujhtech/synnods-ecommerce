<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TopLevelCategory;

class TopLevelCategorySeeder extends Seeder
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
                "name" => "Electronics",
                "description" => "",
                "slug" => "electronics",
                "image" => "categories/oVHMrwmM1XYGy89Gl267aTXt043z3ubl1BTSukvY.jpg",
            ],
            [
                "name" => "Phone & Tablets",
                "description" => "",
                "slug" => "phone_&_tablets",
                "image" => "categories/oVHMrwmM1XYGy89Gl267aTXt043z3ubl1BTSukvY.jpg"
            ],
            [
                "name" => "Furnitures",
                "description" => "",
                "slug" => "furnitures",
                "image" => "categories/oVHMrwmM1XYGy89Gl267aTXt043z3ubl1BTSukvY.jpg"
            ],
            [
                "name" => "Computer & Accessories",
                "description" => "",
                "slug" => "computer_&_accessories",
                "image" => "categories/oVHMrwmM1XYGy89Gl267aTXt043z3ubl1BTSukvY.jpg"
            ],
            [
                "name" => "Home & Kitchen",
                "description" => "",
                "slug" => "home_&_kitchen",
                "image" => "categories/oVHMrwmM1XYGy89Gl267aTXt043z3ubl1BTSukvY.jpg",
            ],
            [
                "name" => "Baby, Kids & Toys",
                "description" => "",
                "slug" => "baby_kids_&_toys",
                "image" => "categories/oVHMrwmM1XYGy89Gl267aTXt043z3ubl1BTSukvY.jpg"
            ],

        ];

    	foreach ($datas as $data) {
    		$existing = TopLevelCategory::where('name', $data['name'])->get();
    		if( !$existing->isEmpty() ){
    			continue;
    		}
            TopLevelCategory::create($data);
    	}
    }
}
