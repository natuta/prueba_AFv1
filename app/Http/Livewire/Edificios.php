<?php

namespace App\Http\Livewire;

use App\Models\Ciudad;
use App\Models\Departamento;
use App\Models\Edificio;
use Livewire\Component;

class Edificios extends Component
{
    public $ciudades;
    public $edificios;

    //public $nombre;
    //public $descripcion;
    public $edificio_id;

    public function mount(){
        $this->ciudades =  Ciudad::all();
        $this->edificios = collect();
    }

    public function render()
    {
        return view('livewire.edificios',['departamentos'=>Departamento::with('edificio')]);
    }

    public function updatedCity($value){
        $this->edificios = Edificio::where('ciudad_id',$value)->get();
        $this->edificio_id = $this->edificios->first()->id_edificio ?? null;
    }
}
