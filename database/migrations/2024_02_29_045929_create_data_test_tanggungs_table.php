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
        Schema::create('data_test_tanggungs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pegawai')->constrained('data_tests')->onUpdate('cascade')->onDelete('cascade');
            $table->string('norut_kel')->nullable();
            $table->string('namap_kel')->nullable();
            $table->string('jnkel_kel')->nullable();
            $table->string('tgl_lhr_kel')->nullable();
            $table->string('stkel_kel')->nullable();
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
        Schema::dropIfExists('data_test_tanggungs');
    }
};
