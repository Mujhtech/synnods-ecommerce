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
            $table->integer('product_brand_id')->nullable()->unsigned();
            $table->string('name');
            $table->string('slug');
            $table->integer('views')->default(0);
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
            $table->boolean('is_sale')->default(false);
            $table->boolean('is_variant')->default(false);
            $table->boolean('is_hot')->default(false);
            $table->integer('ratings')->default(0);
            $table->double('price', 15, 2)->default(0.0);
            $table->double('sale_price', 15, 2)->default(0.0);
            $table->integer('quantity_in_stock')->default(0);
            $table->integer('stock_status')->default(1);
            $table->integer('weight')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->dateTime('featured_end')->nullable();
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
