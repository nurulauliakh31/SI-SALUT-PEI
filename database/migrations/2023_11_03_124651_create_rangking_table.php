<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rangking', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('mahasiswas_id')->unsigned()->index();
            $table->decimal('nilai');
            $table->integer('rangking');
            $table->year('periode');
            $table->timestamps();
            $table->foreign('mahasiswas_id')->references('id')->on('mahasiswas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rangking');
    }
};
