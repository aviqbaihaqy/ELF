<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model {

    /**
     * @var string
     */
    protected $table = 'pengumuman';

    /**
     * @var array
     */
    protected $fillable = ['content', 'attachment'];


    /**
     * Setiap pengumuman adalah content milik stream
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function streams() {
        return $this->morphMany(Streams::class, 'content', 'content_type', 'content_id', 'id');
    }

}
