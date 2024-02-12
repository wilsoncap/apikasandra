<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestAptitudeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function resultTest(Request $request){
        dd('data: ', $request);
    }

    public function testOne(){



        
        $testOne = DB::table('questions_aptitudes AS qa')
                        ->join('actitude_tests AS at', 'at.id', '=', 'qa.actitude_test_id')
                        ->join('questions AS q', 'q.id', '=', 'qa.question_id')
                        ->leftJoin('answers AS a', 'a.question_id', '=', 'q.id')
                        ->select('at.human_intelligence_id', 'q.id' ,'q.question_description', 'a.description')
                        ->get();
        $answers = [];
        foreach ($testOne as $key => $value) {
            if (!is_null($value->description)) {
                $answers[$key] = $value->description;
            }
            continue;
        }

        //dd('data: ', $answers);
       /* $testOneAnidado = $testOne->toJson();
        
        $jsonTestAnidado = $testOne->map(function ($testOne){
            return[
                'test' => $testOne->human_intelligence_id,
                'question' => $testOne->question_description
                //'answer' => $testOne->answer
            ];
        });


        dd('data: ', $jsonTestAnidado);*/

        return view("test.test_one", compact('testOne', 'answers'));
    }

    public function testTwo(){
        return view("test.test_two");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function testAptitud(){

        return view("test.index");
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
