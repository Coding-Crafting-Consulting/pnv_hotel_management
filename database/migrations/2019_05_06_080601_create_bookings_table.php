<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('booking_type_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('room_id')->unsigned();
            $table->date('entry_date');
            $table->date('exit_date');
             $table->boolean('is_paid')->default(false);
            $table->integer('booking_purpose_id')->unsigned();

            $table->foreign('booking_type_id')->references('id')->on('booking_types')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->foreign('booking_purpose_id')->references('id')->on('booking_purposes')->onDelete('cascade');
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
        Schema::dropIfExists('bookings');
    }
}
