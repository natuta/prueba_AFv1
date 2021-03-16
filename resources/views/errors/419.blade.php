@extends('errors::illustrated-layout')

@section('title', __('Page Expired'))
@section('code', '419')
@section('message', __('La pagina ha expirado, vuelve a casa'))
@section('image')
    <div style="background-image: url({{ asset('/backgrounds/fondocoolerror.jfif') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    </div>
@endsection
