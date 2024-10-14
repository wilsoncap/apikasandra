<?php 


namespace App\src\Vehicle\Repositories;

use App\src\Vehicle\DTOs\VehicleDTO;
use App\src\Vehicle\Models\Vehicle;

class VehicleRepository{


    public function storeVehicle(VehicleDTO $vehicleDTO){
       return Vehicle::create([
          'price'=> $vehicleDTO->price,
          'brand'=> $vehicleDTO->brand,
          'type'=> $vehicleDTO->type
       ]);
    }
}