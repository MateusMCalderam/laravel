<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Notas;

class KeepinhoAulaController extends Controller
{
    public function index()
    {
        $notes = Notas::all();

        return view('keepinho/aula/index', [
            'teste' => 'teste',
            'notes' => $notes
        ]);
        
    }
    public function create(Request $r)
    {
        Notas::create($r->all());
        return redirect()->route('keep.list');
    }
    public function editar(Notas $nota, Request $r)
    {
        if ($r->isMethod('put')) {
            $nota = Notas::find($r->id);
            $nota->texto = $r->texto;
            $nota->save();
            return redirect()->route('keep.aula.list');
        }
        return view('keepinho.aula.editar', [
            'nota' => $nota
        ]);
    }

    // public function create(Request $r)
    // {
    //     $r->validate([
    //         'texto' => 'required|string|max:255',
    //     ]);

    //     Notas::create(['texto' => $r->texto]);
    //     return redirect()->route('keep.list')->with('success', 'Nota adicionada com sucesso!');
    // }

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
