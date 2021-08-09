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
            $table->string('invoice');//invoice identification number or code
            $table->string('destination')->nullable();
            $table->string('payment_status')->default('processing'); //processing until finished
            $table->string('payment_method')->default('card');//card or cash on delivery
            $table->string('delivery_status')->default('store');//location of the products
            $table->float('value')->nullable();//the value will be calculated and stored like this to avoid future changes to products
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
