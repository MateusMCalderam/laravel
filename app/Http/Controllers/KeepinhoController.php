<?php

namespace App\Http\Controllers;


use App\Http\Requests\NotaRequest;
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

    public function create(NotaRequest $r)
    {
        $dados = $r->validated();
        Notas::create($dados);
        return redirect()->route('keep.list')->with('success', 'Nota adicionada com sucesso!');
    }

    public function update (Request $r) {
        $nota = Notas::find($r->id);

        $r->validate([
            'titulo' => 'required|min:3',
            'texto' => 'required|max:255',
        ]);
        $nota->fill($r->all());
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
