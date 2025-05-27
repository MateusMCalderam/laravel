<?php

namespace App\Http\Controllers;

use App\Http\Requests\AutenticateRequest;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(){
        return view('auth.index');
    }
    public function create(AutenticateRequest $req){
        User::create($req->all());

        return redirect()->route('autenticate');
    }

    public function login(Request $req){

        if ($req->isMethod('POST')) {
            if (Auth::attempt($req->only('email', 'password'))) {
                return redirect()->route('autenticate');
            }
        }

        return view('auth.login');
    }
}
