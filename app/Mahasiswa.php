<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model {

    /**
     * @var string
     */
    protected $table = 'mahasiswa';

    /**
     * @var array
     */
    protected $fillable = ['nim', 'nama', 'jurusan'];


    /**
     * Setiap Mahasiswa memiliki sebuah user
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function user() {
        return $this->morphMany(User::class, 'owner', 'owner_type', 'owner_id', 'id');
    }
}
