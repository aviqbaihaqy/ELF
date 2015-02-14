<div class="panel panel-primary">
    <div class="panel-body">
        <ul class="nav nav-pills">
            <li class="{{ (Request::segment(5) == '') ? 'active': '' }}"><a href="{{ route('kelas.show-dosen', $kelas->id) }}">Streams</a></li>
            <li class="{{ (Request::segment(5) == 'buat-pengumuman') ? 'active': '' }}"><a href="{{ route('kelas.show-buat_pengumuman', $kelas->id) }}">Pengumuman</a></li>
            <li><a href="#">Tugas</a></li>
        </ul>
    </div>
</div>