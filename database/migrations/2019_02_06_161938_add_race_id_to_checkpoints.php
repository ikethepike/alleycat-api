<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRaceIdToCheckpoints extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('checkpoints', function (Blueprint $table) {
            $table->integer('race_id')->unsigned();
            $table->foreign('race_id')->references('id')->on('races')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('checkpoints', function (Blueprint $table) {
            //
        });
    }
}
