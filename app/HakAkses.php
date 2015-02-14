<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class HakAkses extends Model {

    /**
     * @var string
     */
    protected $table = 'hak_akses';

    /**
     * @var array
     */
    protected $fillable = ['nama'];


    /**
     * Setiap Hak akses milik banyak user.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function user() {
        return $this->belongsToMany(User::class, 'hak_akses_user')->withTimestamps();
    }

}
