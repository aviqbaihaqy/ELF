<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('kelas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dosen_id')->unsigned();
            $table->string('kode_kelas')->unique();
            $table->string('nama_kelas');
            $table->string('deskripsi');

            $table->timestamps();
        });

        Schema::table('kelas', function(Blueprint $table) {
           $table->foreign('dosen_id')->references('id')->on('dosen')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('kelas', function(Blueprint $table) {
            $table->dropForeign('kelas_dosen_id_foreign');
        });

        Schema::drop('kelas');
    }

}
