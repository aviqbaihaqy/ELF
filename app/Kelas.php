<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model {

    /**
     * @var string
     */
    protected $table = 'kelas';

    /**
     * @var array
     */
    protected $fillable = ['dosen_id', 'kode_kelas', 'nama_kelas', 'deskripsi'];


    /**
     * Setiap kelas milik seorang dosen
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dosen() {
        return $this->belongsTo(User::class, 'dosen_id', 'id');
    }


    /**
     * Setiap kelas milik banyak user mahasiswa
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function mahasiswa() {
        return $this->belongsToMany(User::class, 'siswa_kelas')->withTimestamps();
    }
}
