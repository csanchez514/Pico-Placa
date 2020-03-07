<?php
namespace App\Http\Controllers;

use App\Clases\Placa;
use Illuminate\Http\Request;

class PlacaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('placa');
    }
    public function Verificar(Request $request)
    {
        $placa = new Placa();
       

        $placa -> SetDatos($request->input('placa'),$request->input('hora'),$request->input('fecha'));
        if ($placa-> VerRestriccion()) {
            echo('El vehículo está en pico y placa');
        }
        else{
            echo('El vehículo no está en pico y placa');
        }
       
    }

}
