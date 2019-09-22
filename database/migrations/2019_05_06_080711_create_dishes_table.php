<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dish_type_id')->unsigned();
            $table->string('name');
            $table->string('image')->nullable();
            $table->integer('price')->nullable();
            $table->string('description')->nullable();
            $table->boolean('is_available')->default(false);
            $table->foreign('dish_type_id')->references('id')->on('dish_types')->onDelete('cascade');
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
        Schema::dropIfExists('dishes');
    }
}
