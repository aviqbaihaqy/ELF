<?php namespace App\Http\Controllers;

use App\Commands\CreateNewStreamCommand;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateStreamRequest;
use App\Repositories\KelasRepository;
use App\Repositories\StreamRepository;
use Flash;
use Illuminate\Http\Request;
use League\Flysystem\Exception;

class KelasController extends Controller {

    /**
     * @var KelasRepository
     */
    protected $kelasRepository;

    /**
     * @var StreamRepository
     */
    private $streamRepository;


    /**
     * @param KelasRepository $kelasRepository
     * @param StreamRepository $streamRepository
     */
    public function __construct(KelasRepository $kelasRepository, StreamRepository $streamRepository) {
        $this->kelasRepository = $kelasRepository;
        $this->streamRepository = $streamRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $kelas = $this->kelasRepository->getAllForCurrentUser();

        return view('kelas.index', compact('kelas'));
    }


    /**
     * Mencari kelas berdasarkan kode kelas
     * @param Request $request
     * @return mixed
     */
    public function postSearch(Request $request) {
        try {
            $kelas = $this->kelasRepository->findByField('kode_kelas', $request->get('kode_kelas'));
        } catch (Exception $e) {
            Flash::warning('Kelas tidak di temukan!');
            return redirect()->back()->withInput();
        }

        return redirect()->back()->with('hasil_cari', $kelas)->withInput();
    }


    /**
     * Join ke kelas tertentu.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postJoin(Request $request) {
        $this->kelasRepository->joinKelas($request->get('kode_kelas'));

        return redirect(route('home'));
    }


    /**
     * Menampilkan halaman ruang kelas untuk mahasiswa.
     * @param $kelas_id
     * @return \Illuminate\View\View
     */
    public function getShowKelasMahasiswa($kelas_id) {
        $kelas = $this->kelasRepository->findById($kelas_id);

        return view('kelas.show-kelas_mahasiswa', compact('kelas', 'streams'));
    }


    /**
     * Menampilkan halaman ruang kelas untuk dosen.
     * @param $kelas_id
     * @return \Illuminate\View\View
     */
    public function getShowKelasDosen($kelas_id) {
        $kelas = $this->kelasRepository->findById($kelas_id);
        $streams = $this->streamRepository->getForKelas($kelas_id);

        return view('kelas.show-kelas_dosen', compact('kelas', 'streams'));
    }


    /**
     * Menampilkan halaman buat pengumuman.
     * @param $kelas_id
     * @return \Illuminate\View\View
     */
    public function getCreatePengumuman($kelas_id) {
        $kelas = $this->kelasRepository->findById($kelas_id);

        return view('kelas.pengumuman.create', compact('kelas'));
    }


    /**
     * Membuat stream baru dengan content pengumuman!
     * @param $kelas_id
     * @param CreateStreamRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @internal param $ Requests\CreateStreamRequest
     */
    public function postCreatePengumuman($kelas_id, CreateStreamRequest $request) {
        $this->dispatch(new CreateNewStreamCommand($request->all()));

        return redirect(route('kelas.show-dosen', $kelas_id));
    }


    /**
     * Menampilkan halaman buat tugas
     * @param $kelas_id
     * @return \Illuminate\View\View
     */
    public function getCreateTugas($kelas_id) {
        $kelas = $this->kelasRepository->findById($kelas_id);

        return view('kelas.tugas.create', compact('kelas'));
    }


    /**
     * Membuat stream baru dengan content tugas
     * @param $kelas_id
     * @param CreateStreamRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postCreateTugas($kelas_id, CreateStreamRequest $request) {
        $this->dispatch(new CreateNewStreamCommand($request->all()));

        return redirect(route('kelas.show-dosen', $kelas_id));
    }
}
