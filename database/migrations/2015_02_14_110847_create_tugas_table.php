<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTugasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tugas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul_tugas');
            $table->text('deskripsi');
            $table->string('attachment')->nullable();
            $table->timestamp('batas_akhir');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('tugas');
    }

}
