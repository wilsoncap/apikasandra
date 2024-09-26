<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\src\Products\Services\ProductsImport;

use App\Contracts\UserServiceInterface;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService){
        $this->userService = $userService;
    }

    public function create(Request $request){
        return view('User.create');
    }


    public function store(Request $request){
        $this->userService->createUser($request->all());
        return view('User.create');
    }


    public function file(){
        return view('User.file');
    }


    public function import(Request $request)
    {
        try {
            //dd('request', $request);
            Excel::import(new ProductsImport, $request->file('excel_file'));
            return redirect()->back()->with('success', 'Datos importados correctamente.');

        } catch (\Throwable $th) {
            dd('error', $th);
        }
        
    }
}
