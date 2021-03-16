<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use Illuminate\Http\Request;

class BitacoraController extends Controller
{
    public function __construct()
    {
        //$this->middleware('can:bitacoras.manage');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bitacora = Bitacora::all()->sortByDesc('fecha');
        return view('bitacoras.index', ['bitacoras' => $bitacora]);
    }

    public function Exportar2(){
        $bit = Bitacora::all();
        $file = \PDF::loadView('bitacoras.exportar',['bitacoras'=>$bit]);

        return $file->download('Registro_Bitacora.pdf');
    }


}
