<h4>+ Tambah kelas</h4>
<div class="row">
    <div class="col-lg-6">
        <form action="{{ route('kelas.cari') }}" method="POST">
            <input type="hidden" value="{{ csrf_token() }}" name="_token"/>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Masukan kode kelas" name="kode_kelas" value="{{ old('kode_kelas') }}">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit">Cari !</button>
                                </span>
            </div>
        </form>
    </div>
</div>
<p class="text-muted"><small>Kamu bisa mencari kelas yang akan kamu ikuti dengan menggunakan kode kelas yang di berikan oleh dosen pemilik kelas, gunakan tombol diatas untuk mencari kelas!</small></p>
<br/>
@if (Session::has('hasil_cari') && ($kelas = Session::get('hasil_cari')))
    <div class="row">
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <div class="caption">
                    <h3>{{ $kelas->nama_kelas }}</h3>
                    <p>{{ $kelas->deskripsi }}. </p>
                    <p><span class="text-muted"><small>Dosen: {{$kelas->dosen->nama}}</small></span></p>
                    <p><a href="#" class="btn btn-primary" role="button"  data-toggle="modal" data-target=".bs-example-modal-sm">Detail</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Small modal -->
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">{{ $kelas->nama_kelas }}</h4>
                </div>
                <div class="modal-body">
                    <p>Kamu akan bergabung ke kelas ini?</p>
                    <p>Dosen: {{ $kelas->dosen->nama }}</p>
                </div>
                @if (Auth::user()->hasKelas($kelas->id))
                    <div class="modal-footer">
                        <span>Kamu sudah ikut kelas ini. </span>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                @else
                    <form action="{{ route('kelas.join') }}" method="POST">
                        <div class="modal-footer">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                            <input type="hidden" name="kode_kelas" value="{{ $kelas->id }}"/>
                            <button type="submit" class="btn btn-primary">Gabung ke kelas</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endif