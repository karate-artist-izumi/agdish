<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('description');
            $table->datetime('plan_date');
            $table->text('photo');
            $table->string('ag_latitude');
            $table->string('ag_longitude');
            $table->string('dish_latitude');
            $table->string('dish_longitude');
            $table->integer('adult_price');
            $table->integer('child_price');
            $table->string('place');
            $table->string('small_place');
            $table->string('vegetable');
            $table->text('ag_name');
            $table->text('dish_name');
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
        Schema::dropIfExists('plans');
    }
}
