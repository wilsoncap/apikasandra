<?php

namespace App\src\Country\Http\Controllers;
use App\src\Country\Services\GestionProcess;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    protected $gestionProcess;

    public function __construct(GestionProcess $gestionProcess)
    {
        $this->gestionProcess = $gestionProcess;
    }


    public function executeProcess($ciudadId)
    {
        // Obtenemos el proceso desde el servicio
        $proceso = $this->gestionProcess->getProcess($ciudadId);
        if ($proceso) {
            return $proceso->execute();
        } else {
            return "No existe un proceso para esta ciudad.";
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        dd('ya estoy en el controlador');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
