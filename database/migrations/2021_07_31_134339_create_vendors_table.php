<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('store_name');
            $table->string('store_description');
            $table->string('store_email');
            $table->integer('store_phone');
            $table->string('store_country');
            $table->string('store_state');
            $table->string('store_city');
            $table->string('store_address');
            $table->string('store_url')->nullable();
            $table->string('store_logo');
            $table->boolean('verification')->default(false);
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
        Schema::dropIfExists('vendors');
    }
}
