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
        Schema::create('status', function (Blueprint $table) {
            $table->unsignedBigInteger('mentee_id');
            $table->foreign('mentee_id')->references('id')->on('mentee')->onDelete('cascade');
            $table->unsignedBigInteger('presensi_id');
            $table->foreign('presensi_id')->references('id')->on('presensi')->onDelete('cascade');
            $table->string('status');
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
        Schema::dropIfExists('status');
    }
};
