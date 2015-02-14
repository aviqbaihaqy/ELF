@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register user baru</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="/auth/register">

                            @include ('auth.partials.register-form', [
                                'owner_id_title' => 'NIM',
                                'owner_id_deskripsi' => 'Nomor Induk Mahasiswa',
                                'status_daftar' => 'mahasiswa'
                            ])

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop