<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
	        RoleSeeder::class,
	        ProductLabelSeeder::class,
            PaymentMethodSeeder::class,
            SettingSeeder::class,
            EmailTemplateSeeder::class,
            TopLevelCategorySeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,
            UserSeeder::class,
            VendorSeeder::class,
            ProductBrandSeeder::class,
            ProductSeeder::class
	    ]);
    }
}
