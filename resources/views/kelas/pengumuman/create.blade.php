@extends('kelas.layout.ruang_kelas')

@section('content')

    @include('kelas.partials.menu-content')

    <div class="panel panel-default">
        <form action="{{ route('kelas.store-buat_pengumuman', $kelas->id) }}" method="POST">
            <input type="hidden" value="{{ csrf_token() }}" name="_token"/>
            <div class="panel-body">
                <h4 class="text-muted">Buat Pengumuman</h4>
                <div class="form-group">
                    <textarea name="content" id="" rows="5" class="form-control" placeholder="Tulis Pengumuman disini.."></textarea>
                </div>
            </div>
            <div class="panel-footer">
                <div class="form-group">
                    <input type="hidden" value="{{ $kelas->id }}" name="kelas_id"/>
                    <input type="hidden" value="pengumuman" name="type"/>
                    <button type="submit" class="btn btn-primary">Publish</button>
                </div>
            </div>
        </form>
    </div>
@stop