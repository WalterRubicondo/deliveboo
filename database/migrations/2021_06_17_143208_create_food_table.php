<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->text('description');
            $table->float('price',5,2);
            $table->boolean('avaible');
            $table->string('photo');
            $table->unsignedBigInteger('restaurant_id');
    
            $table->foreign('restaurant_id')
                 ->references('id')
                 ->on('restaurants');
                 
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
        Schema::dropIfExists('food');
    }
}
