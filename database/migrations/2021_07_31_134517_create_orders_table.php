<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('order_number');
            $table->integer('string');
            $table->foreignId('shipment_id')->constrained();
            $table->foreignId('delivery_address_id')->constrained();
            $table->foreignId('payment_method_id')->constrained();
            $table->dateTime('payment_date')->nullable();
            $table->dateTime('shipment_date')->nullable();
            $table->dateTime('order_date')->nullable();
            $table->longText('note');
            $table->boolean('status')->default(false);
            $table->boolean('confimed')->default(false);
            $table->boolean('completed')->default(false);
            $table->boolean('transaction_status')->default(false);
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
        Schema::dropIfExists('orders');
    }
}
