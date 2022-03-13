<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peran', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idfilm');
            $table->foreign('idfilm')->references('id')->on('film');
            $table->unsignedBigInteger('idcast');
            $table->foreign('idcast')->references('id')->on('cast');
            $table->string('nama', 45);
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
        Schema::dropIfExists('peran');
    }
}
