<div class="panel panel-primary">
    <div class="panel-body">
        <ul class="nav nav-pills">
            <li class="{{ (Request::segment(5) == '') ? 'active': '' }}"><a href="{{ route('kelas.show-dosen', $kelas->id) }}">Streams</a></li>
            @if (Auth::user()->hasRole('Dosen'))
                <li class="{{ (Request::segment(5) == 'buat-pengumuman') ? 'active': '' }}"><a href="{{ route('kelas.show-buat_pengumuman', $kelas->id) }}">Buat Pengumuman</a></li>
                <li class="{{ (Request::segment(5) == 'buat-tugas') ? 'active': '' }}"><a href="{{ route('kelas.show-buat_tugas', $kelas->id) }}">Buat Tugas</a></li>
            @endif
        </ul>
    </div>
</div>