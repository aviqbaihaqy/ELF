<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model {

    /**
     * @var string
     */
    protected $table = 'tugas';

    /**
     * @var array
     */
    protected $fillable = ['judul_tugas', 'deskripsi', 'attacment', 'batas_akhir'];


    /**
     * Setiap Tugas adalah content milik streams
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function stream() {
        return $this->morphMany(Sstreams::class, 'content', 'content_type', 'content_id', 'id');
    }

}
