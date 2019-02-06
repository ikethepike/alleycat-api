<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckpointsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('checkpoints', function (Blueprint $table) {
            $table->increments('id');
            $table->float('longitude')->comment('x-axis');
            $table->float('latitude')->comment('y-axis');
            $table->string('name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('checkpoints');
    }
}
