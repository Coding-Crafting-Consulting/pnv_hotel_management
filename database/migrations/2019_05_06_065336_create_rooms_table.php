  <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('room_size_id')->unsigned();
            $table->string('number')->unique();
            $table->boolean('is_smoking')->default(false);
            $table->integer('price');
            $table->boolean('is_available')->default(false);
            $table->integer('beds');
            $table->foreign('room_size_id')->references('id')->on('room_sizes')->onDelete('cascade');
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
        Schema::dropIfExists('rooms');
    }
}
