<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Activos fijos/Privilegios') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 ">
        <div class="card pt-3 bg-transparents">
            <div class="card-title text-center">
                <h3>
                    Gestionar roles y permisos
                </h3>
            </div>
            <div class="card-content ">
                <div class="row">
                    <div class="col s6">
                        <div class="card bg-indigo-500 rounded-full">
                            <div class="card-content">
                                <div class="center-align">
                                    <a href="{{route('roles.index')}}" type="button">Administrar Roles </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s6">
                        <div class="card">
                            <div class="card-content">
                                <div class="center-align">
                                    <a href="#" type="button">Administrar Permisos </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </div>

            </div>
        </div>
    </div>

</x-app-layout>
