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
        Schema::create('mentee', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('jenis_kelamin');
            $table->string('alamat_asal');
            $table->string('alamat_domisili');
            $table->string('prodi');
            $table->bigInteger('no_hp')->length(12)->unsigned();
            $table->string('akun_ig');
            $table->unsignedBigInteger('kelompok_id')->nullable();
            $table->foreign('kelompok_id')->references('id')->on('kelompok')->onDelete('set null');
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
        Schema::dropIfExists('mentee');
    }
};
