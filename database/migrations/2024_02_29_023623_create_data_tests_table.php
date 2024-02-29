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
        Schema::create('data_tests', function (Blueprint $table) {
            $table->id();
            $table->string('noreg')->nullable();
            $table->string('namap')->nullable();
            $table->string('tplhr')->nullable();
            $table->string('tglhr')->nullable();
            $table->string('jnkel')->nullable();
            $table->string('stkwn')->nullable();
            $table->string('alamat')->nullable();
            $table->string('rtrw')->nullable();
            $table->string('keluharahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kota')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('phone')->nullable();
            $table->string('noktp')->nullable();
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
        Schema::dropIfExists('data_tests');
    }
};
