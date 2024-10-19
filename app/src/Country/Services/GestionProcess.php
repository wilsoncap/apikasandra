<?php

namespace App\src\Country\Services;
use App\src\Country\Services\ProcessBuenosAires;
use App\src\Country\Services\ProcessCali;
use App\src\Country\Services\ProcessLima;

class GestionProcess{

    protected $process = [];

    public function __construct()
    {
        // Instancias de procesos almacenadas en un array
        $this->process = [
            'buenos_aires' => new ProcessBuenosAires(),
            'cali' => new ProcessCali(),
            'lima' => new ProcessLima(),
        ];

    }


     // Método para obtener el proceso según el ID de la ciudad
     public function getProcess($ciudadId)
     {
         if (array_key_exists($ciudadId, $this->process)) {
             return $this->process[$ciudadId];
         }
 
         // Devuelve null o lanza una excepción si la ciudad no existe
         return null;
     }
}
