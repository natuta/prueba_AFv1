@extends('errors::illustrated-layout')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('message', __('Han sido muchas peticiones, dame un respiro y vuelve a casa'))
@section('image')
    <div style="background-image: url({{ asset('/backgrounds/fondocoolerror.jfif') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    </div>
@endsection
