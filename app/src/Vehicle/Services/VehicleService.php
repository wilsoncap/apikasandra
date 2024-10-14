<?php

namespace App\src\Vehicle\Services;
use App\src\Vehicle\DTOs\VehicleDTO;
use App\src\Vehicle\Repositories\VehicleRepository;


class VehicleService{

    private $vehicleRepository;

    public function __construct(VehicleRepository $vehicleRepository)
    {
        $this->vehicleRepository = $vehicleRepository;
    }


    public function store(VehicleDTO $VehicleDTO){
        return $this->vehicleRepository->storeVehicle($VehicleDTO);
    }
}