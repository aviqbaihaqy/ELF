<?php
/**
 * Created by Fahri Baharudin.
 * Email: fahrybaharudin@gmail.com
 * Date: 2/9/2015
 * Time: 9:08 PM
 */
namespace app\Repositories;

use App\Dosen;
use App\Mahasiswa;
use App\User;

class UserRepoitory {

    /**
     * Membuat user baru ke database
     * @param array $data
     * @return User
     */
    public function create(array $data) {
        // membaca owner terlebih dahulu
        if ($data['status_daftar'] == 'mahasiswa') {
            $owner = Mahasiswa::where('nim', '=', $data['owner_id'])->first();
            $owner->type = Mahasiswa::class;
        } elseif ($data['status_daftar'] == 'dosen') {
            $owner = Dosen::where('kode_dosen', '=', $data['owner_id'])->first();
            $owner->type = Dosen::class;
        }

        // membuat user baru sesuai dengan owner
        $user = User::create([
            'owner_id'      => $owner->id,
            'owner_type'    => $owner->type,
            'nama'          => $owner->nama,
            'jurusan'       => $owner->jurusan,
            'email'         => $data['email'],
            'password'      => $data['password']
        ]);

        return $user;
    }


    /**
     * Membaca user berdasarkan id
     * @param $id
     * @return mixed
     */
    public function findById($id) {
        $user = User::where('id', '=', $id)->first();

        return $user;
    }
}