<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDosenTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('dosen', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_dosen')->unique();
            $table->string('nama');
            $table->string('jurusan');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('dosen');
    }

}
