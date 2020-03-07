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
    public function ventana()
    {
        return view('placa');
    }
    public function index()
    {
        return view('licenceplate');
    }
    public function Verificar(Request $request)
    {
        $placa = new Placa();
        $placa -> SetDatos($request->input('placa'),$request->input('hora'),$request->input('fecha'));
        $cad = "";
        $language = $request->input('language');
        if ($language =='es') {
            if ($placa-> VerRestriccion()) {
                $cad = 'El vehículo con placa: '.$placa->placa.' en la hora '.$placa->hora.' en la fecha '.$placa->fecha.' está en pico y placa';
                return redirect()->back()->with('error', $cad);
            }
            else{
                $cad = 'El vehículo con placa: '.$placa->placa.' en la hora '.$placa->hora.' en la fecha '.$placa->fecha.' no está en pico y placa';
                return redirect()->back()->with('message', $cad); 
            }
        }
        elseif ($language =='en') {
            if ($placa-> VerRestriccion()) {
                $cad = 'The vehicle with the licence plate : '.$placa->placa.' at the time '.$placa->hora.' on the date '.$placa->fecha.' cannot be on the road';
                return redirect()->back()->with('error', $cad);
            }
            else{
                $cad = 'The vehicle with the licence plate : '.$placa->placa.' at the time '.$placa->hora.' on the date '.$placa->fecha.' can be on the road';
                return redirect()->back()->with('message', $cad); 
            }
        }


       
    }

}
