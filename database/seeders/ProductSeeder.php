<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductBrand;

class ProductSeeder extends Seeder
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
                "name" => "Super Admin",
                "featured_image" => "products/CGdEO0B6fdHNSRLxqZQ32hkhZAaPbca2zzRuZa2D.jpg",
            ],
        ];

    	foreach ($datas as $data) {
    		$existing = Product::where('name', $data['name'])->get();
    		if( !$existing->isEmpty() ){
    			continue;
    		}
           Product::create($data);
    	}
    }
}
