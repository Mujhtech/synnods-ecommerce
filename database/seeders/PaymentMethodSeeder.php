<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaymentMethod;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $methods = [
            [
                "name" => "Cash on delivery",
                "type" => "cash_on_delivery",
                "status" => true
            ],
            [
                "name" => "Instalmental Payment",
                "type" => "instalmental_payment",
                "status" => true
            ],
            [
                "name" => "Instant Payment",
                "type" => "instant_payment",
                "status" => true
            ],
        ];

    	foreach ($methods as $method) {
    		$existing = PaymentMethod::where('name', $method['name'])->get();
    		if( !$existing->isEmpty() ){
    			continue;
    		}
            PaymentMethod::create($method);
    	}
    }
}
