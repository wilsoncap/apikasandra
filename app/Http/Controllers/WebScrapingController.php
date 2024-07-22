<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\src\Most_In_Demand_Careers\Services\GoutteService;
use Exception;

class WebScrapingController extends Controller
{
    protected $goutteService;

    public function __construct(GoutteService $goutteService)
    {
        $this->goutteService = $goutteService;
    }

    public function scrape()
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
                        array_push($carees, $caree);
                    }
                }
            }

            return response()->json(['carees' => $carees]);

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
}
