<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductBrand;
use Carbon\Carbon;

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
                "vendor_id" => 1,
                "category_id" => 1,
                "sub_category_id" => 1,
                "product_brand_id" => 1,
                "name" => "1080p Wifi IP Camera One",
                "slug" => strtolower(str_replace(" ", "-", "1080p Wifi IP Camera One")),
                "weight" => "23",
                "price" => 500,
                "sku" => "PT0001",
                "featured_image" => "products/1.jpg",
                "description" => "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.",
                "contents" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostrud ipsum consectetur sed do, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.
                Any Product types that You want - Simple, Configurable
                Downloadable/Digital Products, Virtual Products
                Inventory Management with Backordered items
                Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
                "is_hot" => 1,
                "quantity_in_stock" => 20
            ],
            [
                "vendor_id" => 1,
                "category_id" => 1,
                "sub_category_id" => 1,
                "product_brand_id" => 1,
                "name" => "3D Printer",
                "slug" => strtolower(str_replace(" ", "-", "3D Printer")),
                "weight" => "23",
                "price" => 599,
                "sku" => "PT0003",
                "featured_image" => "products/3.jpg",
                "quantity_in_stock" => 20,
                "views" => 6,
                "description" => "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.",
                "contents" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostrud ipsum consectetur sed do, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.
                Any Product types that You want - Simple, Configurable
                Downloadable/Digital Products, Virtual Products
                Inventory Management with Backordered items
                Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
                
            ],
            [
                "vendor_id" => 1,
                "category_id" => 1,
                "sub_category_id" => 1,
                "product_brand_id" => 1,
                "name" => "Fire Station Car",
                "slug" => strtolower(str_replace(" ", "-", "Fire Station Car")),
                "weight" => "23",
                "price" => 569,
                "sku" => "PT0004",
                "quantity_in_stock" => 20,
                "is_sale" => 1,
                "sale_price" => 400,
                "views" => 11,
                "featured_image" => "products/10.jpg",
                "description" => "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.",
                "contents" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostrud ipsum consectetur sed do, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.
                Any Product types that You want - Simple, Configurable
                Downloadable/Digital Products, Virtual Products
                Inventory Management with Backordered items
                Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
                
            ],
            [
                "vendor_id" => 1,
                "category_id" => 1,
                "sub_category_id" => 1,
                "product_brand_id" => 1,
                "name" => "Galvanic Battery Charger",
                "slug" => strtolower(str_replace(" ", "-", "Galvanic Battery Charger")),
                "weight" => "23",
                "price" => 569,
                "sku" => "PT0005",
                "quantity_in_stock" => 20,
                "views" => 6,
                "featured_image" => "products/6.jpg",
                "description" => "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.",
                "contents" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostrud ipsum consectetur sed do, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.
                Any Product types that You want - Simple, Configurable
                Downloadable/Digital Products, Virtual Products
                Inventory Management with Backordered items
                Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
                
            ],
            [
                "vendor_id" => 1,
                "category_id" => 1,
                "sub_category_id" => 1,
                "product_brand_id" => 1,
                "name" => "Bluetooth Watch",
                "slug" => strtolower(str_replace(" ", "-", "Bluetooth Watch")),
                "weight" => "23",
                "price" => 569,
                "sku" => "PT0006",
                "quantity_in_stock" => 20,
                "is_featured" => 1,
                "featured_end" => Carbon::now()->addDays(10),
                "is_hot" => 1,
                "is_sale" => 1,
                "sale_price" => 200,
                "featured_image" => "products/CGdEO0B6fdHNSRLxqZQ32hkhZAaPbca2zzRuZa2D.jpg",
                "description" => "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.",
                "contents" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostrud ipsum consectetur sed do, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.
                Any Product types that You want - Simple, Configurable
                Downloadable/Digital Products, Virtual Products
                Inventory Management with Backordered items
                Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
                
            ],
            [
                "vendor_id" => 1,
                "category_id" => 1,
                "sub_category_id" => 1,
                "product_brand_id" => 1,
                "name" => "WD Element Battery",
                "slug" => strtolower(str_replace(" ", "-", "WD Element Battery")),
                "weight" => "23",
                "price" => 569,
                "sku" => "PT0007",
                "views" => 10,
                "quantity_in_stock" => 20,
                "featured_image" => "products/4.jpg",
                "description" => "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.",
                "contents" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostrud ipsum consectetur sed do, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.
                Any Product types that You want - Simple, Configurable
                Downloadable/Digital Products, Virtual Products
                Inventory Management with Backordered items
                Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
                
            ],
            [
                "vendor_id" => 1,
                "category_id" => 1,
                "sub_category_id" => 1,
                "product_brand_id" => 1,
                "name" => "USB Speaker",
                "slug" => strtolower(str_replace(" ", "-", "USB Speaker")),
                "weight" => "23",
                "price" => 560,
                "sku" => "PT0008",
                "quantity_in_stock" => 20,
                "is_hot" => 1,
                "is_sale" => 1,
                "views" => 10,
                "sale_price" => 300,
                "featured_image" => "products/5.jpg",
                "description" => "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.",
                "contents" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostrud ipsum consectetur sed do, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.
                Any Product types that You want - Simple, Configurable
                Downloadable/Digital Products, Virtual Products
                Inventory Management with Backordered items
                Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
                
            ],
            [
                "vendor_id" => 1,
                "category_id" => 1,
                "sub_category_id" => 1,
                "product_brand_id" => 1,
                "name" => "Motor Cap",
                "slug" => strtolower(str_replace(" ", "-", "Motor Cap")),
                "weight" => "23",
                "price" => 560,
                "sku" => "PT0009",
                "quantity_in_stock" => 20,
                "is_featured" => 1,
                "is_hot" => 1,
                "is_sale" => 1,
                "sale_price" => 450,
                "views" => 30,
                "featured_end" => Carbon::now()->addDays(5),
                "featured_image" => "products/8.jpg",
                "description" => "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.",
                "contents" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostrud ipsum consectetur sed do, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.
                Any Product types that You want - Simple, Configurable
                Downloadable/Digital Products, Virtual Products
                Inventory Management with Backordered items
                Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
                
            ],
            [
                "vendor_id" => 1,
                "category_id" => 1,
                "sub_category_id" => 1,
                "product_brand_id" => 1,
                "name" => "Porto Knife",
                "slug" => strtolower(str_replace(" ", "-", "Porto Knife")),
                "weight" => "23",
                "price" => 560,
                "sku" => "PT0010",
                "quantity_in_stock" => 20,
                "views" => 3,
                "featured_image" => "products/7.jpg",
                "description" => "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.",
                "contents" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostrud ipsum consectetur sed do, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.
                Any Product types that You want - Simple, Configurable
                Downloadable/Digital Products, Virtual Products
                Inventory Management with Backordered items
                Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
                
            ],
            [
                "vendor_id" => 1,
                "category_id" => 1,
                "sub_category_id" => 1,
                "product_brand_id" => 1,
                "name" => "Black Watches",
                "slug" => strtolower(str_replace(" ", "-", "Black Watches")),
                "weight" => "23",
                "price" => 560,
                "sku" => "PT0011",
                "featured_image" => "products/9.jpg",
                "quantity_in_stock" => 20,
                "views" => 3,
                "description" => "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.",
                "contents" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostrud ipsum consectetur sed do, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.
                Any Product types that You want - Simple, Configurable
                Downloadable/Digital Products, Virtual Products
                Inventory Management with Backordered items
                Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
                
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
