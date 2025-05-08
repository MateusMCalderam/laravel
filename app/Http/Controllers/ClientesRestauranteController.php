<?php

namespace App\Http\Controllers;

use App\Models\ClientesRestaurante;
use Illuminate\Http\Request;

class ClientesRestauranteController extends Controller
{
    public function index()
    {
        $clientes = ClientesRestaurante::all();

        return view('clientes_restaurante/index', [
            'clientes' => $clientes
        ]);
        
    }

    public function create(Request $r)
    {   
        if ($r->isMethod('GET')) {
            return view('clientes_restaurante/form', [
                'cliente' => null
            ]);
        }

        // $valid = $r->validate([
        //     'name' => 'required|string|max:255',
        //     'cidade' => 'required|string|max:255',
        //     'estado' => 'required|string|max:255',
        //     'endereco' => 'required|string|max:255',
        //     'telefone' => 'required|number|max:255',
        // ]);
        // dd($valid);

        ClientesRestaurante::create($r->all());
        return redirect()->route('restaurante.list');
    }

    public function update($id,Request $r)
    {
        $cliente = ClientesRestaurante::find($id);
        if ($r->isMethod('GET')) {
            
            return view('clientes_restaurante/form', [
                'cliente' => $cliente,
            ]);
        }

        // $valid = $r->validate([
        //     'name' => 'required|string|max:255',
        //     'cidade' => 'required|string|max:255',
        //     'estado' => 'required|string|max:255',
        //     'endereco' => 'required|string|max:255',
        //     'telefone' => 'required|number|max:255',
        // ]);
        // dd($valid);
        $cliente = ClientesRestaurante::find($id);

        $cliente->update($r->all());

        return redirect()->route('restaurante.list');
    }

    public function delete(Request $r, $id)
    {
        $nota = ClientesRestaurante::find($id);

        if ($nota) {
            $nota->delete();
            return redirect()->route('restaurante.list')->with('success', 'Nota apagada com sucesso!');
        } else {
            return redirect()->route('restaurante.list')->with('error', 'Nota não encontrada!');
        }
    }

}
