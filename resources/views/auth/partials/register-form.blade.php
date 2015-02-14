<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
    <label class="col-md-4 control-label">{{ $owner_id_title }}</label>
    <div class="col-md-6">
        <input type="text" class="form-control" name="owner_id" value="{{ old('owner_id') }}" placeholder="{{ $owner_id_deskripsi }}">
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Alamat E-Mail</label>
    <div class="col-md-6">
        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Alamat email kamu">
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Password</label>
    <div class="col-md-6">
        <input type="password" class="form-control" name="password" placeholder="Buat password baru">
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Confirm Password</label>
    <div class="col-md-6">
        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmasi password">
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <input type="hidden" name="status_daftar" value="{{ $status_daftar }}"/>
        <button type="submit" class="btn btn-primary">
            Register
        </button>
    </div>
</div>