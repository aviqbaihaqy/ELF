<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiswaKelasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('siswa_kelas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kelas_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('siswa_kelas', function(Blueprint $table) {
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('siswa_kelas', function(Blueprint $table) {
            $table->dropForeign('siswa_kelas_kelas_id_foreign');
            $table->dropForeign('siswa_kelas_user_id_foreign');
        });
        Schema::drop('siswa_kelas');
    }

}
