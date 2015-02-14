<?php
/**
 * Created by Fahri Baharudin.
 * Email: fahrybaharudin@gmail.com
 * Date: 2/10/2015
 * Time: 5:32 AM
 */
namespace App\Repositories;

use App\Kelas;
use Illuminate\Auth\Guard;
use League\Flysystem\Exception;

class KelasRepository {

    /**
     * @var Guard
     */
    protected $auth;


    /**
     * @param Guard $auth
     */
    public function __construct(Guard $auth) {
        $this->auth = $auth;
    }


    /**
     * Membaca semua kelas milik user yang sedang login.
     * Mahasiswa atau Dosen.
     * @return mixed
     */
    public function getAllForCurrentUser() {
        if ($this->auth->user()->hasRole('Mahasiswa'))
            return $this->auth->user()->kelas_mahasiswa()->with('dosen')->get();
        elseif ($this->auth->user()->hasRole('Dosen'))
            return $this->auth->user()->kelas_dosen()->with('dosen')->get();

        return null;
    }


    /**
     * @param $id
     * @return Kelas
     */
    public function findById($id) {
        $kelas = Kelas::where('id', '=', $id)->with('dosen')->first();

        return $kelas;
    }


    /**
     * Mencari kelas berdasarkan field tertentu
     * @param $key
     * @param $value
     * @return mixed
     * @throws Exception
     */
    public function findByField($key, $value) {
        $kelas = Kelas::where($key, '=', $value)->with('dosen')->first();
        if(is_null($kelas))
            throw new Exception('Kelas tidak ditemukan');

        return $kelas;
    }


    /**
     * Join kelas untuk user yang sedang login
     * @param $kelas_id
     */
    public function joinKelas($kelas_id) {
        $this->auth->user()->kelas_mahasiswa()->attach($kelas_id);
    }
}