<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{

    public function index(Request $request)
    {
        $ids = $request->session()->get('carrinho', []);

        $produtos = Produto::whereIn('id', $ids)->get();

        return view('produtos.carrinho', [
            'produtos' => $produtos
        ]);
    }

    
    public function store(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);

        $ids = $request->session()->get('carrinho', []);
        
        if (!in_array($id, $ids)) {
            $ids[] = $id;
            $request->session()->put('carrinho', $ids);
        }
        
        return redirect()->route('carrinho.index');
    }
    
    public function remove(Request $request, $id)
    {
        $ids = $request->session()->get('carrinho', []);

        $ids = array_filter($ids, function ($item) use ($id) {
            return $item != $id;
        });

        $request->session()->put('carrinho', array_values($ids));

        return redirect()->route('carrinho.index');
    }
}
