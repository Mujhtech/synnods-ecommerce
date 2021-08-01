<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('sub_category_id')->constrained();
            $table->string('name');
            $table->string('slug');
            $table->longText('description');
            $table->longText('contents');
            $table->string('featured_image');
            $table->string('images')->nullable();
            $table->string('sku')->unique();
            $table->longText('notes')->nullable();
            $table->string('sizes')->nullable();
            $table->string('colors')->nullable();
            $table->string('label')->nullable();
            $table->string('collections')->nullable();
            $table->string('tags')->nullable();
            $table->double('price', 15, 2)->default(0.0);
            $table->double('unit_price', 15, 2)->default(0.0);
            $table->integer('quantity_in_stock')->default(0);
            $table->integer('stock_status')->default(1);
            $table->integer('quantity_per_unit')->default(0);
            $table->integer('weight')->default(0);
            $table->boolean('featured')->default(false);
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
