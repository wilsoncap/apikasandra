<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class AcademicOffersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function academicOffers(Request $request){
        try {

            


            $consulta = DB::table("apiksandra.municipal_university_offers as muo")
            ->join("apiksandra.academic_offers as ao", "ao.id", "=", "muo.ofert_academ_id")
            ->join("apiksandra.study_categories as sc", "sc.id", "=", "ao.categoria_estudio_id")
            ->join("apiksandra.univerty_municipalities as um", "um.id", "=", "muo.univer_municip_id")
            ->join("apiksandra.universities as u", "u.id", "=", "um.universidad_id")
            ->join("apiksandra.municipalities as m","m.id", "=", "um.municipio_id")
            ->select(
                "muo.jornadas",
                "muo.modalidad",
                "muo.precio_aproxim",
                "muo.semestres",
                "ao.nombre_oferta",
                "sc.nombre_categoria_estudio",
                "um.longitud",
                "um.latitud",
                "um.telefono",
                "um.direccion",
                "u.nombre_universidad",
                "u.url_universidad",
                "u.url_logo",
                "u.tipo",
                "u.convenios",
                "u.descuentos",
                "m.nom_municipio"
            )
            ->where("ao.nombre_oferta", "like", "%".$request->offer."%")
            ->get();

            return response()->json($consulta);
        } catch (Exception $e) {
            dd('error...', $e);
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function searchOffersAcademis(Request $request){

        try {
            $consulta = DB::table('apiksandra.municipal_university_offers as muo')
            ->join('apiksandra.academic_offers as ao', "ao.id", "=", "muo.ofert_academ_id")
            ->join("apiksandra.study_categories as sc", "sc.id", "=", "ao.categoria_estudio_id")
            ->join("apiksandra.univerty_municipalities as um", "um.id", "=", "muo.univer_municip_id")
            ->join("apiksandra.universities as u", "u.id", "=", "um.universidad_id")
            ->join("apiksandra.municipalities as m","m.id", "=", "um.municipio_id")
            ->select(
                'muo.jornadas',
                'muo.modalidad',
                'muo.precio_aproxim',
                'muo.semestres',
                'ao.nombre_oferta',
                'sc.nombre_categoria_estudio',
                'um.longitud',
                'um.latitud',
                'um.telefono',
                'um.direccion',
                'u.nombre_universidad',
                'u.url_universidad',
                'u.url_logo',
                'u.tipo',
                'u.convenios',
                'u.descuentos',
                'm.nom_municipio'
            )
            ->get();

            View::share("datos", $consulta);
            View::share("buscar", true);
            return view("prueba");
        } catch (Exception $e) {
            dd("err", $e);
        }

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
