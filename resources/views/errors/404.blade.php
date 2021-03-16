@extends('errors::illustrated-layout')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Parece que te has perdido, vuelve a casa'))

@section('image')
    <div style="background-image: url({{ asset('/backgrounds/fondocoolerror.jfif') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    </div>
@endsection

