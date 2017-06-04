<?php

// Change here.

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSensors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensors', function (Blueprint $table) {
            $table->increments('id');

            $table->string('label', 100);

            $table->decimal('point_latitude', 9, 7);

            $table->decimal('point_longitude', 9, 7);

            $table->integer('sensor_type_id')->unsigned();

            $table->foreign('sensor_type_id')->references('id')->on('sensor_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sensors');
    }
}

?>