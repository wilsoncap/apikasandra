<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ActitudeTest;
use App\Models\HumanIntelligence;
use Exception;

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
        try {
            $answers = array_keys($request->all());
            $answerTrue = [];
           for ($i=1; $i <= count($answers) - 1 ; $i++) {
                if (strpos($answers[$i], "verdadero")) {
                   $intelligence = explode("_", $answers[$i]);
                   array_push($answerTrue, $intelligence[0]);
                }
           }
           
           $countAnswer = array_count_values($answerTrue);
           $humanIntelligencesId = array_filter($countAnswer, function ($valor) {
            return $valor >= 8;
           });
           dd('prueba: ', $humanIntelligencesId);
           $humanIntelligencesId = array_keys($humanIntelligencesId);
    
           $humanIntelligences = HumanIntelligence::whereIn('id', $humanIntelligencesId)
                                                    ->with('academicOferrs')
                                                    ->get();
    
           return response()->json($humanIntelligences);
        } catch (Exception $e) {
            dd('error: ', $e);
        }
       
    }

    public function testOne(){
        $testOne = DB::table('questions_aptitudes AS qa')
                        ->join('actitude_tests AS at', 'at.id', '=', 'qa.actitude_test_id')
                        ->join('questions AS q', 'q.id', '=', 'qa.question_id')
                        ->leftJoin('answers AS a', 'a.question_id', '=', 'q.id')
                        ->select('at.human_intelligence_id', 'q.id' ,'q.question_description', 'a.description')
                        ->get()->toArray();

        $test = ActitudeTest::find(1);
        $prueba = $test->questions;
        $fila = [];
        $data = [];
        foreach ($test->questions as $question) {
            $answers = $question->answers;
            foreach ($answers as $answer){
                $fila['qId'] = $answer['question_id'];
                $fila['description'] = $answer['description'];
                $fila['correct'] = $answer['correct'];
                array_push($data, $fila);
            }
        }

        return view("test.test_one", compact('prueba', 'data'));
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
