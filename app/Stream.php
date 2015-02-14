<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Stream extends Model {

    /**
     * @var string
     */
    protected $table = 'streams';

    /**
     * @var array
     */
    protected $fillable = ['kelas_id', 'user_id', 'content_id', 'content_type'];


    /**
     * Setiap stream memiliki content yang berbeda (polymorphic)
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function content() {
        return $this->morphTo();
    }


    /**
     * Setiap stream milik sebuah kelas
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kelas() {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }


    /** Setiap stream milik seorang user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
