<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $produtos = Produto::all();
        return view('produtos.index', [
            'produtos' => $produtos
        ]);
    }

    public function indexPublic()
    {   
        $produtos = Produto::all();
        return view('produtos.public', [
            'produtos' => $produtos
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produtos.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric|min:0',
            'descricao' => 'nullable|string',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'nome' => $validated['nome'],
            'preco' => $validated['preco'],
            'descricao' => $validated['descricao'] ?? null,
        ];

        if ($request->hasFile('imagem')) {
            $data['imagem'] = $request->file('imagem')->store('fotos', 'public');
        }

        Produto::create($data);

        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }
    
    public function edit(string $id)
    {
        $produto = Produto::findOrFail($id);
    
        return view('produtos.form', [
            'produto' => $produto
        ]);
    }
    
    public function update(Request $request, string $id)
    {
        $produto = Produto::findOrFail($id);

        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric|min:0',
            'descricao' => 'nullable|string',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'nome' => $validated['nome'],
            'preco' => $validated['preco'],
            'descricao' => $validated['descricao'] ?? null,
        ];

        if ($request->hasFile('imagem')) {
            if ($produto->imagem && Storage::exists($produto->imagem)) {
                Storage::delete($produto->imagem);
            }

            $data['imagem'] = $request->file('imagem')->store('fotos', 'public');
        }
        $produto->update($data);

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    
    public function destroy(string $id)
    {
        $produto = Produto::findOrFail($id);
    
        if ($produto->imagem && Storage::disk('public')->exists($produto->imagem)) {
            Storage::disk('public')->delete($produto->imagem);
        }
    
        $produto->delete();
    
        return redirect()->route('produtos.index')->with('success', 'Produto removido com sucesso!');
    }

  
}
