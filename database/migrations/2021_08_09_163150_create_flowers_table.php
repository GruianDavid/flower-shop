<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flowers', function (Blueprint $table) {
            $table->id();
            $table->string('category')->default('mixed');//interior,exterior
            $table->string('name');
            $table->string('name_scientific')->nullable();
            $table->date('period_bloom_start')->nullable();//the period of the year that it is blooming
            $table->date('period_bloom_end')->nullable();//the period of the year that it is blooming
            $table->date('period_plant_start')->nullable();//the best time to (re)plant it
            $table->date('period_plant_end')->nullable();//the best time to (re)plant it
            $table->string('colors')->nullable();
            $table->string('pot_sizes')->nullable();//height and diameter
            $table->string('height')->nullable();//height of the plant
            $table->string('origin')->nullable();// the country of origin
            $table->string('destination')->nullable();//at home, on the balcony
            $table->string('water')->nullable();
            $table->string('temperature')->nullable();

            $table->string('slug')->nullable();//used to access one product by a slug formatted text
            $table->float('price')->nullable();
            $table->string('code')->nullable();//a code random generated to match the product
            $table->string('availability')->default('unavailable');
            $table->decimal('stock')->default(0);
            $table->decimal('importance')->default(0);//used to order the flowers

            $table->unsignedBigInteger('shop_id')->nullable();//the shop that sells this flower
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
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
        Schema::dropIfExists('flowers');
    }
}
