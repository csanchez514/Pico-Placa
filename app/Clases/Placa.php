<?php

namespace App\Clases;

class Placa 
{
    public $placa;
    public $fecha;
    public $hora;
    
    Public function SetDatos ($Placa_entrada, $Hora_entrada, $Fecha_entrada)
    {
        $this->placa = $Placa_entrada;
        $this->fecha = $Fecha_entrada;
        $this->hora = $Hora_entrada;
    }
    public function VerDia()
    {
        //Función para saber el día de la semana basandose en una fecha
        $dias = array('', 'Lunes','Martes','Miercoles','Jueves','Viernes','Sabado', 'Domingo');
        return $dias[date('N', strtotime($this->fecha))];
    
    }
    public function VerificarFecha ()
    {
        //Función que verifica si el día de la semana de la fecha está dentro de los días factibles del pico y placa
        $diasemana = $this->VerDia();
        if($diasemana == "Domingo" or $diasemana == "Sabado")
        {
            // Retorna FALSO si no es un día con pico y placa
            return FALSE;
        }
        else{
            // Retorna VERDADERO si es un día con pico y placa            
            return TRUE;
        }
    }
    public function VerificarHora ()
    {
        //Variables para saber las hora de pico y placa
        $HoraInicioTemprano = strtotime('07:00');
        $HoraInicioTarde = strtotime('16:00');
        $HoraFinalTemprano = strtotime('09:30');
        $HoraFinalTarde= strtotime('19:30');
        $hora_entrada = strtotime($this->hora);
   
        if( ($hora_entrada >= $HoraInicioTemprano and $hora_entrada <= $HoraFinalTemprano) or 
        ($hora_entrada >= $HoraInicioTarde and $hora_entrada <= $HoraFinalTarde) )
        {
            //Hora con pico y placa
            return TRUE;
        }
        else{
           // Hora sin pico y placa'
            return FALSE;
        }
    }
    public function VerRestriccion()
    {
        //Función para saber si tiene permitido transitar
        if($this->VerificarFecha())
        {
            if($this->VerificarHora())
            {
                $diasemana = $this->VerDia();
                $NumPlaca = substr($this->placa,-1);
                //Dependiendo del día de la semana se restringe la circulación por medio del último dígito de la placa
                switch ($diasemana) {
                    case 'Lunes':
                        if($NumPlaca== 1 or $NumPlaca== 2){
                            return true; 
                        }
                        break;
                    case 'Martes':
                        if($NumPlaca== 3 or $NumPlaca== 4){
                            return true; 
                        }
                        break;
                    case 'Miercoles':
                        if($NumPlaca== 5 or $NumPlaca== 6){
                            return true; 
                        }
                        break;
                    case 'Jueves':
                        if($NumPlaca== 7 or $NumPlaca== 8){
                            return true; 
                        }
                        break;
                    case 'Viernes':
                        if($NumPlaca== 9 or $NumPlaca== 0){
                            return true; 
                        }
                        break;
                }
            }

        }
        return false;
        
    }
  
}