<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductBrand;

class ProductBrandSeeder extends Seeder
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
                "name" => "Tecno",
                "slug" => "tecno"
            ],
            [
                "name" => "Nokia",
                "slug" => "nokia"
            ],
            [
                "name" => "iPhone",
                "slug" => "iphone"
            ],
            [
                "name" => "Samsung",
                "slug" => "samsung"
            ],
            [
                "name" => "Themocool",
                "slug" => "themocool"
            ]
        ];

    	foreach ($datas as $data) {
    		$existing = ProductBrand::where('name', $data['name'])->get();
    		if( !$existing->isEmpty() ){
    			continue;
    		}
            ProductBrand::create($data);
    	}
    }
}
