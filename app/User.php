<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Hash;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['owner_id', 'owner_type', 'nama', 'jurusan', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];


	/**
	 * @param $password
     */
	public function setPasswordAttribute($password) {
		$this->attributes['password'] = Hash::make($password);
	}


	/**
	 * Setiap user milik seorang Mahasiswa atau Dosen
	 * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
	public function owner() {
		return $this->morphTo();
	}


	/**
	 * Setiap user milik banyak hak akses.
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
	public function hak_akses() {
		return $this->belongsToMany(HakAkses::class, 'hak_akses_user')->withTimestamps();
	}


	/**
	 * Cek apakah user punya hak akses tertentu.
	 * @param $name
	 * @return bool
     */
	public function hasRole($name) {
		foreach ($this->hak_akses()->get() as $hak_akses) {
			if ($hak_akses->nama == $name) {
				return true;
			}
		}

		return false;
	}


	/**
	 * Setiap user dosen punya banyak kelas
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function kelas_dosen() {
		return $this->hasMany(Kelas::class, 'dosen_id', 'id');
	}


	/**
	 * Setiap user mahasiswa milik banyak kelas
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
	public function kelas_mahasiswa() {
		return $this->belongsToMany(Kelas::class, 'siswa_kelas')->withTimestamps();
	}


	/**
	 * Cek apakah seorang user sudah join ke kelas.
	 * @param $kelas_id
	 * @return bool
     */
	public function hasKelas($kelas_id) {
		foreach ($this->kelas_mahasiswa()->get() as $kelas) {
			if ($kelas->id == $kelas_id) {
				return true;
			}

			return false;
		}
	}
}
