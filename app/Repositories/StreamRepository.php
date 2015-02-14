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
     * @param $data
     * @return bool
     * @throws Exception
     */
    public function create($data) {
        if ($data['type'] == 'pengumuman') {
            $content = Pengumuman::create(['content' => $data['content']]);
        } elseif ($data['type'] == 'tugas') {
            throw new Exception('Fitur belum dibuat! :p');
        }

        $stream = new Stream();
        $stream->kelas()->associate($this->kelasRepository->findById($data['kelas_id']));
        $stream->user()->associate($this->userRepoitory->findById($this->auth->user()->id));
        $stream->content()->associate($content);

        return $stream->save();
    }
}