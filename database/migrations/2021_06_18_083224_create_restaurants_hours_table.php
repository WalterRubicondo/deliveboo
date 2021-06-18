<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants_hours', function (Blueprint $table) {
            $table->unsignedBigInteger('restaurant_id');

            $table->foreign('restaurant_id')
                ->references('id')
                ->on('restaurants');

            $table->unsignedBigInteger('hour_id');

            $table->foreign('hour_id')
                ->references('id')
                ->on('hours');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants_hours');
    }
}
