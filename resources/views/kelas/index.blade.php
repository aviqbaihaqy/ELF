@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="well">
                    <h2>Profile</h2>
                    <hr/>
                    <p>Nama: {{ Auth::user()->nama }}</p>
                    <p>Jurusan: {{ Auth::user()->jurusan }}</p>
                </div>
            </div>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">
                        <strong>{{ (Auth::user()->hasRole('Dosen')) ? 'Daftar Kelas Milik Anda' : 'Daftar Kelas Yang Kamu Ikuti'}}</strong>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus cupiditate, dolore eius fugit iure magnam minima modi nobis odio rem? Cum, ducimus fuga id iure magni necessitatibus numquam praesentium. Quo!</p>
                    </div>
                    @if ( ! empty($kelas->toArray()))
                        <!-- List group -->
                        <ul class="list-group">
                            @foreach ($kelas as $ruangKelas)
                                <li class="list-group-item">
                                    {{ $ruangKelas->nama_kelas }}.
                                    <small><span class="text-muted">{{$ruangKelas->deskripsi}} - Dosen: {{ $ruangKelas->dosen->nama }}</span></small>
                                    <span class="pull-right">
                                        <a href="
                                            @if (Auth::user()->hasRole('Mahasiswa'))
                                                {{ route('kelas.show-mahasiswa', $ruangKelas->id) }}
                                            @elseif (Auth::user()->hasRole('Dosen'))
                                                {{ route('kelas.show-dosen', $ruangKelas->id) }}
                                            @endif
                                        " class="btn btn-success btn-xs">Masuk kelas</a>
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="alert alert-warning fade in" style="margin: 0 20px 20px 20px">
                            <h4>Kamu belum punya kelas !</h4>
                            @if (Auth::user()->hasRole('Dosen'))
                                <p>Silahkan buat kelas terlebih dahulu.</p>
                            @else
                                <p>Hubungi dosen kamu untuk meminta kode kelas yang dimilikinya.</p>
                            @endif
                        </div>
                    @endif
                </div>

                @include('kelas.partials.tambah-kelas')
            </div>
        </div>
    </div>
@stop