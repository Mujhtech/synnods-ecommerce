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
            ],
            [
                "name" => "Nokia"
            ],
            [
                "name" => "iPhone"
            ],
            [
                "name" => "Samsung"
            ],
            [
                "name" => "Themocool"
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
