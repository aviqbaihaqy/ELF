<?php

// DONE:
// TODO 1: Member sistem: Membuat sistem membership, ACL! dan view registrasi dan login (DONE!) :)
// TODO 2: Sistem kelas: Membuat migrasi kelas, model kelas + relasi (DONE!) :)
// TODO 3: Sistem kelas: index kelas + tammbah kelas (DONE!) :)
// TODO 4: Sistem kelas: show kelas (DONE!) :)
// TODO 5: Stream: buat model pengumuman, tugas, dan stream (DONE!) :)
// TODO 6: Stream: membuat CreateNewStream (use-case) + command handler dan Membuat StreamRepository (DONE!) :D
// TODO 7: Stream: buat pengumuman (DONE!) :)
// TODO 8: Stream: buat tugas (DONE!) :D

// UNDONE:
// TODO 9: Stream: beranda.. incoming! :D
// ...
// ...

# Landing Page
Route::get('/', ['middleware' => 'guest', 'uses' => 'WelcomeController@index']);

# Harus login!
Route::group(['middleware' => 'auth'], function() {

	# Home
	Route::get('home', ['as' => 'home', 'uses' => 'KelasController@index']);

	# Kelas - Tampil Kelas
	Route::get('mahasiswa/kelas/show/{kelas_id}', ['as' => 'kelas.show-mahasiswa', 'uses' => 'KelasController@getShowKelasMahasiswa']);
	Route::get('dosen/kelas/show/{kelas_id}', ['as' => 'kelas.show-dosen', 'uses' => 'KelasController@getShowKelasDosen']);
	# Kelas - Cari kelas
	Route::post('kelas/cari', ['as' => 'kelas.cari', 'uses' => 'KelasController@postSearch']);
	Route::post('kelas/join', ['as' => 'kelas.join', 'uses' => 'KelasController@postJoin']);
	# Kelas - Buat Pengumuman
	Route::get('dosen/kelas/show/{kelas_id}/buat-pengumuman', ['as' => 'kelas.show-buat_pengumuman', 'uses' => 'KelasController@getCreatePengumuman']);
	Route::post('dosen/kelas/show/{kelas_id}/buat-pengumuman', ['as' => 'kelas.store-buat_pengumuman', 'uses' => 'KelasController@postCreatePengumuman']);
	# Kelas - Buat Tugas
	Route::get('dosen/kelas/show/{kelas_id}/buat-tugas', ['as' => 'kelas.show-buat_tugas', 'uses' => 'KelasController@getCreateTugas']);
	Route::post('dosen/kelas/show/{kelas_id}/buat-tugas', ['as' => 'kelas.store-buat_tugas', 'uses' => 'KelasController@postCreateTugas']);

	# User
	Route::resource('users', 'UsersController', ['only' => 'show']);

	# Halaman admin, hanya bisa di akses user tertentu
	Route::group(['middleware' => 'admin'], function() {

		# Dashboard
		Route::get('admin-cp', ['as' => 'admin-cp.dashboard', 'uses' => 'Admin\DashboardController@dashboard']);

	});

});

# Login dan register
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
