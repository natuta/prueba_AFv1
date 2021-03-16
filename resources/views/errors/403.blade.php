@extends('errors::illustrated-layout')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __('Parece que no estas autorizado para realizar esta accion. Vuelve a casa.')))
@section('image')
    <div style="background-image: url({{ asset('/backgrounds/fondocoolerror.jfif') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    </div>
@endsection
