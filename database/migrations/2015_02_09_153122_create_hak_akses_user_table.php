<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHakAksesUserTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('hak_akses_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hak_akses_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('hak_akses_user', function (Blueprint $table) {
            $table->foreign('hak_akses_id')->references('id')->on('hak_akses')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('hak_akses_user', function(Blueprint $table) {
            $table->dropForeign('hak_akses_user_hak_akses_id_foreign');
            $table->dropForeign('hak_akses_user_user_id_foreign');
        });

        Schema::drop('hak_akses_user');
    }

}
