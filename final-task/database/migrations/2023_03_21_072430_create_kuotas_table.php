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
        Schema::create('kuotas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket', 100);
            $table->string('berat', 100);
            $table->string('harga', 100);
            $table->string('cabang', 100);
            $table->integer('aktif');
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
        Schema::dropIfExists('kuotas');
    }
};
