@extends('errors::illustrated-layout')

@section('title', __('Server Error'))
@section('code', '500')
@section('message', __('Uff! Error del servior, dejame echar un vistazo. Vuelve a casa'))
@section('image')
    <div style="background-image: url({{ asset('/backgrounds/fondocoolerror.jfif') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    </div>
@endsection
