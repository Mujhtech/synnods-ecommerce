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
                "name" => "Electronics",
                "description" => "",
                "slug" => "electronics",
                "image" => "categories/oVHMrwmM1XYGy89Gl267aTXt043z3ubl1BTSukvY.jpg",
                "icon" => "icon-category-fashion"
            ],
            [
                "name" => "Phone & Tablets",
                "description" => "",
                "slug" => "phone_&_tablets",
                "image" => "categories/oVHMrwmM1XYGy89Gl267aTXt043z3ubl1BTSukvY.jpg",
                "icon" => "icon-category-gifts"
            ],
            [
                "name" => "Grocery",
                "description" => "",
                "slug" => "grocery",
                "image" => "categories/oVHMrwmM1XYGy89Gl267aTXt043z3ubl1BTSukvY.jpg",
                "icon" => "icon-category-gifts"
            ],
            [
                "name" => "Computing",
                "description" => "",
                "slug" => "computing",
                "image" => "categories/oVHMrwmM1XYGy89Gl267aTXt043z3ubl1BTSukvY.jpg",
                "icon" => "icon-category-electronics"
            ],
            [
                "name" => "Home & Office",
                "description" => "",
                "slug" => "home_&_office",
                "image" => "categories/oVHMrwmM1XYGy89Gl267aTXt043z3ubl1BTSukvY.jpg",
                "icon" => "icon-category-furniture"
            ],
            [
                "name" => "Fashion",
                "description" => "",
                "slug" => "fashion",
                "image" => "categories/oVHMrwmM1XYGy89Gl267aTXt043z3ubl1BTSukvY.jpg",
                "icon" => "icon-category-fashion"
            ],
            [
                "name" => "Health & Beauty",
                "description" => "",
                "slug" => "health_&_beauty",
                "image" => "categories/oVHMrwmM1XYGy89Gl267aTXt043z3ubl1BTSukvY.jpg",
                "icon" => "icon-category-music"
            ],
            [
                "name" => "Baby Product",
                "description" => "",
                "slug" => "baby_product",
                "image" => "categories/oVHMrwmM1XYGy89Gl267aTXt043z3ubl1BTSukvY.jpg",
                "icon" => "icon-category-garden"
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
