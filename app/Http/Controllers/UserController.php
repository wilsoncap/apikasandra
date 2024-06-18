<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
