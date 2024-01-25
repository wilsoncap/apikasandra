<?php

namespace App\Http\Controllers;

use App\Models\Departament;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class DepartamentController extends Controller
{
   
    public function index()
    {
        $departament = Departament::all();
        return response()->json($departament);
    }

 
    public function store(Request $request)
    {
        $rules = ['name'=> 'required|string|min:1|max:100'];
        $valiator = Validator::make($request->input(), $rules);
        if ($valiator->fails()) {
            return response()->json([
                'status'=>false,
                'error' => $valiator->errors()->all()
            ],400);
        }

        $departament = new Departament($request->input());
        $departament->save();
        return response()->json([
            'status'=>true,
            'error' => 'Departament created successfully'
        ],200);

    }


    public function show(Departament $departament)
    {
        return response()->json(['status'=>true, 'departament'=>$departament]);
    }

   
    public function update(Request $request, Departament $departament)
    {
        $rules = ['name'=> 'required|string|min:1|max:100'];
        $valiator = Validator::make($request->input(), $rules);
        if ($valiator->fails()) {
            return response()->json([
                'status'=>false,
                'error' => $valiator->errors()->all()
            ],400);
        }

        $departament->update($request->input());
        return response()->json([
            'status'=>true,
            'error' => 'Departament updated successfully'
        ],200);
    }

   
    public function destroy(Departament $departament)
    {
        $departament->delete();
        return response()->json([
            'status'=>true,
            'error' => 'Departament deleted successfully'
        ],200);

    }
}
