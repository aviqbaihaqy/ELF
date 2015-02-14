<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ELF - Project</title>

    <!-- Bootstrap-->
    <link rel="stylesheet" href="{{ asset('packages/bootstrap/dist/css/bootstrap.min.css') }}"/>
    {{--<link rel="stylesheet" href="{{ asset('packages/bootstrap/dist/css/bootstrap-theme.min.css') }}"/>--}}

    <link href="/css/app.css" rel="stylesheet">

</head>
<body>

    @include('partials.navbar')

    <!--Error Message -->
    @if (count($errors))
        <div class="container">
            <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ $errors->first() }}
            </div>
        </div>
    @endif

    <div class="container">
        <!-- Head -->
        <div class="jumbotron" style="text-align: center">
            <h1>{{ $kelas->nama_kelas }}</h1>
            <p>Dosen: {{ $kelas->dosen->nama }} - {{ $kelas->deskripsi }}</p>
        </div>

        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body">Sidebar</div>
                </div>
            </div>

            <!-- Content -->
            <div class="col-md-9">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('packages/jquery/jquery-2.1.1.min.js') }}"></script>
    <script src="{{ asset('packages/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</body>
</html>
