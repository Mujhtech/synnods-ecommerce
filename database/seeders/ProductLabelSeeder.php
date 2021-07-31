<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductLabel;

class ProductLabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $labels = [
            [
                "name" => "Sales",
                "color" => "",
            ],
            [
                "name" => "New",
                "color" => "",
            ],
            [
                "name" => "Hot",
                "color" => "",
            ],
        ];

    	foreach ($labels as $label) {
    		$existing = ProductLabel::where('name', $label['name'])->get();
    		if( !$existing->isEmpty() ){
    			continue;
    		}
            ProductLabel::create($label);
    	}
    }
}
