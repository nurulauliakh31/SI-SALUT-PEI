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
        Schema::create('nilailulusan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alternatif_id');
            $table->unsignedBigInteger('crips_id');
            $table->unsignedBigInteger('prodi_id');
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
        Schema::dropIfExists('nilailulusan');
    }
};
