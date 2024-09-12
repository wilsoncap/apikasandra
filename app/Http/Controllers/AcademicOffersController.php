<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\WebScrapingController;
use App\Mail\PruebaMail;
use App\src\Most_In_Demand_Careers\Services\GoutteService;
use Illuminate\Support\Facades\Mail;

class AcademicOffersController extends Controller
{
    protected $goutteService;

    public function __construct(GoutteService $goutteService)
    {
        $this->goutteService = $goutteService;
    }
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

            //Mail::to('prueba@prueba.com')->send(new PruebaMail);

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

    private function scrape()
    {
        try {

            $pages = [
                [
                    "url" => "https://www.canalinstitucional.tv/carreras-con-mas-demanda-colombia",
                    "filter" => "li span"
                ],
                [
                    "url" => "https://www.revistapym.com.co/articulos/comunicacion/70947/las-profesiones-mas-demandadas-en-colombia-para-2024",
                    "filter" => "li strong"
                ]
            ];

            $carees = [];
            foreach ($pages as $key => $value) {
                if ($this->validationUrl($value["url"])) {
                    $dataWeb = $this->dataUrl($value["url"], $value["filter"]);
                    foreach ($dataWeb as $key => $caree) {
                        array_push($carees, str_replace(":", "", $caree));
                    }
                }
            }

            return  $carees;

        } catch (Exception $e) {
            return response()->json(-1);
        }
        
    }

    private function dataUrl($url, $filtro){
        $crawler = $this->goutteService->scrape($url);

        $spans = $crawler->filter($filtro)->each(function ($node) {
            return $node->text();
        });

        $spans = array_unique($spans);
        return  $spans;
    }


    private function validationUrl($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($http_code == 200) {
            return true;
        }
            
        return false;
    }

    public function searchOffersAcademis(Request $request){

        try {
            $carrerasEnDemanda = $this->scrape();
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
            View::share("carrerasEnDemanda", $carrerasEnDemanda);
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
