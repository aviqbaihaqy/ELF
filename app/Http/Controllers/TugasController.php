<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\KelasRepository;
use App\Repositories\TugasRepository;
use Illuminate\Http\Request;

class TugasController extends Controller {

    /**
     * @var TugasRepository
     */
    private $tugasRepository;


    /**
     * @param TugasRepository $tugasRepository
     */
    public function __construct(TugasRepository $tugasRepository) {
        $this->tugasRepository = $tugasRepository;
    }

	public function getShowForMahasiswa($kelas_id, $tugas_id) {
        $tugas = $this->tugasRepository->findById($tugas_id);

        return view('kelas.tugas.show-for_mahasiswa', compact('tugas'));
    }

}
