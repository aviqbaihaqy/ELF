@extends('kelas.layout.ruang_kelas')

@section('content')
    @include('kelas.partials.menu-content')

    <div class="panel panel-default">
        <form action="{{ route('kelas.store-buat_tugas', $kelas->id) }}" method="POST">
            <input type="hidden" value="{{ csrf_token() }}" name="_token"/>
            <div class="panel-body">
                <h4 class="text-muted">Buat Tugas Baru</h4>
                <hr/>
                <div class="form-group">
                    <input type="text" name="judul_tugas" placeholder="Judul tugas" class="form-control" value="{{ old('judul_tugas') }}"/>
                </div>
                <div class="form-group">
                    <textarea name="deskripsi_tugas" id="deskripsi_tugas" rows="5" placeholder="Deskripsi" class="form-control">{{ old('deskripsi_tugas') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="batas_akhir">Batas akhir dikumpulkan:</label>
                    <input type="date" name="batas_akhir" id="batas_akhir" class="form-control" value="{{ old('batas_akhir') }}"/>
                </div>
            </div>
            <div class="panel-footer">
                <div class="form-group">
                    <input type="hidden" value="{{ $kelas->id }}" name="kelas_id"/>
                    <input type="hidden" value="tugas" name="type"/>
                    <button type="submit" class="btn btn-primary">Publish</button>
                </div>
            </div>
        </form>
    </div>
@stop