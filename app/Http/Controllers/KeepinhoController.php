<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Notas;

class KeepinhoController extends Controller
{
    public function index()
    {
        $notes = Notas::all();

        return view('keepinho/index', [
            'teste' => 'teste',
            'notes' => $notes
        ]);
        
    }
}
