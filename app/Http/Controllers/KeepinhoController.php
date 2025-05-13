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
            'titulo' => 'required|string|max:255',
        ]);

        Notas::create(['texto' => $r->texto, 'titulo' => $r->titulo]);
        return redirect()->route('keep.list')->with('success', 'Nota adicionada com sucesso!');
    }

    public function update (Request $r) {
        $nota = Notas::find($r->id);

        $r->validate([
            'texto' => 'required|string|max:255',
            'titulo' => 'required|string|max:255',
        ]);

        $nota->texto = $r->texto;
        $nota->titulo = $r->titulo;
        $nota->save();
        return redirect()->route('keep.list');
    }
    public function form (Request $r, $id = false) {
        if ($id) {
            $nota = Notas::find($r->id);
            
            return view('keepinho.form', [
                'nota' => $nota
            ]);
        }
        return view('keepinho.form', [
            'nota' => []
        ]);
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
