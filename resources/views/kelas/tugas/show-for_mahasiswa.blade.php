@extends('kelas.layout.tugas')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <h3>{{ $tugas->judul_tugas }}</h3>
            <hr/>
            <p><strong>Deskripsi: </strong>{{ $tugas->deskripsi }}</p>
            <p><strong>Batas akhir mengumpulkan: </strong>{{ $tugas->batas_akhir->diffForHumans() }}</p>
            <hr/>

        </div>
    </div>
@stop