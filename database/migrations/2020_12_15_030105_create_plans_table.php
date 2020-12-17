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
            $table->text('description')->nullable();
            $table->datetime('plan_date')->nullable();
            $table->text('ag_name')->nullable();
            $table->text('dish_name')->nullable();
            $table->text('ag_photo')->nullable();
            $table->text('dish_photo')->nullable();
            $table->string('ag_latitude')->nullable();
            $table->string('ag_longitude')->nullable();
            $table->string('dish_latitude')->nullable();
            $table->string('dish_longitude')->nullable();
            $table->integer('adult_price')->nullable();
            $table->integer('child_price')->nullable();
            $table->string('place')->nullable();
            $table->string('small_place')->nullable();
            $table->string('vegetable')->nullable();
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
