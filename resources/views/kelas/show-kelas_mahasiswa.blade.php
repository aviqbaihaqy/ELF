@extends('kelas.layout.ruang_kelas')

@section('content')
    @include('kelas.partials.menu-content')
    @include('kelas.streams.index', $streams)
@stop