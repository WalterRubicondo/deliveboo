<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RestaurantGenre extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_genre', function (Blueprint $table) {
            $table->unsignedBigInteger('restaurant_id');
    
            $table->foreign('restaurant_id')
                 ->references('id')
                 ->on('restaurants');
    
           $table->unsignedBigInteger('genre_id');
    
           $table->foreign('genre_id')
                ->references('id')
                ->on('genres');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurant_genre');
    }
}
