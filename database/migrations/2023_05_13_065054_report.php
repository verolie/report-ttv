<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Report extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->integer('height');
            $table->integer('weight');
            $table->timestamps();
        });

        Schema::create('ttv-report', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patient')->onDelete('cascade');
            $table->integer('tekanan_darah');
            $table->integer('denyut_nadi');
            $table->integer('laju_pernapasan');
            $table->integer('suhu_tubuh');
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
        Schema::dropIfExists('patient');
        Schema::dropIfExists('ttv-report');
    }
}
