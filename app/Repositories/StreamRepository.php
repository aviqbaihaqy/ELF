<?php
/**
 * Created by Fahri Baharudin.
 * Email: fahrybaharudin@gmail.com
 * Date: 2/14/2015
 * Time: 7:02 PM
 */
namespace App\Repositories;

use App\Pengumuman;
use App\Stream;
use App\Tugas;
use Illuminate\Auth\Guard;
use League\Flysystem\Exception;

class StreamRepository {

    /**
     * @var
     */
    private $auth;

    /**
     * @var KelasRepository
     */
    private $kelasRepository;

    /**
     * @var UserRepoitory
     */
    private $userRepoitory;


    /**
     * @param Guard $auth
     * @param KelasRepository $kelasRepository
     * @param UserRepoitory $userRepoitory
     */
    public function __construct(Guard $auth, KelasRepository $kelasRepository, UserRepoitory $userRepoitory) {
        $this->auth = $auth;
        $this->kelasRepository = $kelasRepository;
        $this->userRepoitory = $userRepoitory;
    }


    /**
     * @param array $data
     * @return bool
     */
    public function create(array $data) {
        // Buat content terlebih dahulu Pengumuman/Tugas.
        if ($data['type'] == 'pengumuman') {
            $content = Pengumuman::create(['content' => $data['content']]);
        } elseif ($data['type'] == 'tugas') {
            $content = Tugas::create(['judul_tugas' => $data['judul_tugas'], 'deskripsi' => $data['deskripsi_tugas'], 'batas_akhir' => $data['batas_akhir']]);
        }

        // Buat Stream barus sesuai dengan contenya.
        $stream = new Stream();
        $stream->kelas()->associate($this->kelasRepository->findById($data['kelas_id']));
        $stream->user()->associate($this->userRepoitory->findById($this->auth->user()->id));
        $stream->content()->associate($content);

        return $stream->save();
    }


    /**
     * Membaca stream untuk kelas tertentu berasarkan id kelas.
     * @param $kelas_id
     * @param int $paginate
     * @return mixed
     */
    public function getForKelas($kelas_id, $paginate = 10) {
        return Stream::with('kelas', 'user', 'content')->where('kelas_id', '=', $kelas_id)->orderBy('created_at', 'ascending')->limit($paginate)->simplePaginate($paginate);
    }
}