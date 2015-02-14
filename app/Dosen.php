<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model {

    /**
     * @var string
     */
    protected $table = 'dosen';

    /**
     * @var array
     */
    protected $fillable = ['kode_dosen', 'nama', 'jurusan'];


    /**
     * Setiap Dosen memiliki satu akun
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function user() {
        return $this->morphMany(User::class, 'owner', 'owner_type', 'owner_id', 'id');
    }



}
