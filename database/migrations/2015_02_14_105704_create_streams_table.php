<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStreamsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('streams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kelas_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('content_id')->unsigned();
            $table->string('content_type');
            $table->timestamps();
        });

        // Relasi!
        Schema::table('streams', function(Blueprint $table) {
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
        Schema::table('streams', function(Blueprint $table) {
            $table->dropForeign('streams_kelas_id_foreign');
            $table->dropForeign('streams_user_id_foreign');
        });

        Schema::drop('streams');
    }

}
