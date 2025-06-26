<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

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
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $arquivo = $request->file('imagem');

        if ($arquivo) {
            $path = $arquivo->store('fotos', 'public');

            Produto::create([
                'nome' => $request->input('nome'),
                'preco' => $request->input('preco'),
                'descricao' => $request->input('descricao'),
                'imagem' => $path,
            ]);

            return redirect()->route('produtos.index');
        } else {
            return back()->withErrors(['imagem' => 'Nenhuma imagem foi enviada.']);
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    
 public function indexCarrinho(Request $request)
    {
        $ids = $request->session()->get('carrinho', []);

        $produtos = Produto::whereIn('id', $ids)->get();

        return view('produtos.carrinho', [
            'produtos' => $produtos
        ]);
    }

    public function removeCarrinho(Request $request, $id)
    {
        $ids = $request->session()->get('carrinho', []);

        // Remove todas as ocorrências do ID
        $ids = array_filter($ids, function ($item) use ($id) {
            return $item != $id;
        });

        $request->session()->put('carrinho', array_values($ids));

        return redirect()->route('carrinho.index');
    }

    public function storeCarrinho(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);

        $ids = $request->session()->get('carrinho', []);

        if (!in_array($id, $ids)) {
            $ids[] = $id;
            $request->session()->put('carrinho', $ids);
        }

        return redirect()->route('carrinho.index');
    }
}
