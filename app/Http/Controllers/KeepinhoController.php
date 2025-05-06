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

    public function create(Request $r)
    {
        $r->validate([
            'texto' => 'required|string|max:255',
        ]);

        Notas::create(['texto' => $r->texto]);
        return redirect()->route('keep.list')->with('success', 'Nota adicionada com sucesso!');
    }

    public function delete(Request $r, $id)
    {
        $nota = Notas::find($id);

        if ($nota) {
            $nota->delete();
            return redirect()->route('keep.list')->with('success', 'Nota apagada com sucesso!');
        } else {
            return redirect()->route('keep.list')->with('error', 'Nota não encontrada!');
        }
    }

}
