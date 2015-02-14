<?php
use App\Dosen;
use App\HakAkses;
use App\Kelas;
use App\Mahasiswa;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MahasiswaTableSeeder extends Seeder {

	public function run() {
		Mahasiswa::truncate();

		Mahasiswa::create(['nim' => '120083', 'nama' => 'Fahri Baharudin', 'jurusan' => 'Teknik Informatika']);
		Mahasiswa::create(['nim' => '120095', 'nama' => 'Dwi Hardiman', 'jurusan' => 'Teknik Arsitektur']);
		Mahasiswa::create(['nim' => '120145', 'nama' => 'Maulana Nur Aji', 'jurusan' => 'Manajemen Informatika']);
		Mahasiswa::create(['nim' => '120045', 'nama' => 'Ardi Khomsa', 'jurusan' => 'Teknik Elektro']);
		Mahasiswa::create(['nim' => '120111', 'nama' => 'Arif Hidayat', 'jurusan' => 'Teknik Sipil']);

	}
}

class DosenTableSeeder extends Seeder {

	public function run() {
		Dosen::truncate();

		Dosen::create(['kode_dosen' => 'D001', 'nama' => 'M. Alif Muafiq', 'jurusan' => 'Teknik Informatika']);
		Dosen::create(['kode_dosen' => 'D002', 'nama' => 'Erna Dwi Astuti', 'jurusan' => 'Manajemen Informatika']);

	}
}

class UserTableSeeder extends Seeder {

	public function run() {
		User::truncate();

		User::create(['owner_id' => Mahasiswa::find(1)->id, 'owner_type' => Mahasiswa::class, 'nama' => Mahasiswa::find(1)->nama, 'jurusan' => Mahasiswa::find(1)->jurusan , 'email' => 'fahrybaharudin@gmail.com', 'password' => 'password']);
		User::create(['owner_id' => Dosen::find(1)->id, 'owner_type' => Dosen::class, 'nama' => Dosen::find(1)->nama, 'jurusan' => Dosen::find(1)->jurusan ,  'email' => 'aviq@gmail.com', 'password' => 'password']);
		User::create(['owner_id' => Mahasiswa::find(2)->id, 'owner_type' => Mahasiswa::class, 'nama' => Mahasiswa::find(2)->nama, 'jurusan' => Mahasiswa::find(2)->jurusan ,  'email' => 'dwihardiman@gmail.com', 'password' => 'password']);
		User::create(['owner_id' => Mahasiswa::find(3)->id, 'owner_type' => Mahasiswa::class, 'nama' => Mahasiswa::find(3)->nama, 'jurusan' => Mahasiswa::find(3)->jurusan ,  'email' => 'warasmaulana@gmail.com', 'password' => 'password']);
		User::create(['owner_id' => Mahasiswa::find(4)->id, 'owner_type' => Mahasiswa::class, 'nama' => Mahasiswa::find(4)->nama, 'jurusan' => Mahasiswa::find(4)->jurusan ,  'email' => 'ardikhomsa@gmail.com', 'password' => 'password']);
		User::create(['owner_id' => Mahasiswa::find(5)->id, 'owner_type' => Mahasiswa::class, 'nama' => Mahasiswa::find(5)->nama, 'jurusan' => Mahasiswa::find(5)->jurusan ,  'email' => 'arifhidayat@gmail.com', 'password' => 'password']);
		User::create(['owner_id' => Dosen::find(2)->id, 'owner_type' => Dosen::class, 'nama' => Dosen::find(2)->nama, 'jurusan' => Dosen::find(2)->jurusan ,  'email' => 'erna@gmail.com', 'password' => 'password']);
	}
}

class HakAksesTableSeeder extends Seeder {

	public function run() {
		HakAkses::truncate();

		HakAkses::create(['nama' => 'Mahasiswa']);
		HakAkses::create(['nama' => 'Dosen']);
		HakAkses::create(['nama' => 'Administrator']);
	}
}

class HakAksesUserTableSeeder extends Seeder {

	public function run() {
		DB::table('hak_akses_user')->truncate();

		User::find(1)->hak_akses()->attach(HakAkses::find(3)->id);
		User::find(1)->hak_akses()->attach(HakAkses::find(1)->id);
		User::find(2)->hak_akses()->attach(HakAkses::find(2)->id);
	}
}

class KelasTableSeeder extends Seeder {

	public function run() {
		Kelas::truncate();

		Kelas::create(['kode_kelas' => strtoupper(str_random(7)), 'dosen_id' => User::find(2)->id, 'nama_kelas' => 'Pemrograman Web', 'deskripsi' => 'Semester 3']);
		Kelas::create(['kode_kelas' => strtoupper(str_random(7)), 'dosen_id' => User::find(2)->id, 'nama_kelas' => 'Grafika Komputer', 'deskripsi' => 'Semester 5']);
	}
}

class SiswaKelasTableSeeder extends Seeder  {

	public function run() {
		DB::table('siswa_kelas')->truncate();

		User::find(1)->kelas_mahasiswa()->attach(1);
		User::find(3)->kelas_mahasiswa()->attach(2);
		User::find(4)->kelas_mahasiswa()->attach(1);
	}
}

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		DB::statement('SET FOREIGN_KEY_CHECKS=0');

		$this->call('MahasiswaTableSeeder');
		$this->call('DosenTableSeeder');
		$this->call('UserTableSeeder');
		$this->call('HakAksesTableSeeder');
		$this->call('HakAksesUserTableSeeder');
		$this->call('KelasTableSeeder');
		$this->call('SiswaKelasTableSeeder');

		DB::statement('SET FOREIGN_KEY_CHECKS=1');
	}

}