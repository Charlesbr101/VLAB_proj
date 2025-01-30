<?php

namespace App\Http\Controllers;

use App\Models\Categoria_Transacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriaTransacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Categoria_Transacao::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->headers->set('Accept', 'application/JSON');
    
        Validator::make($request->all(), [
            'nome' => ['required','regex:#^(?:[^\W\d_]| )+$#','max:255','unique:\App\Models\Categoria_Transacao,nome']
        ])->validate();
    
        return Categoria_Transacao::create(['nome' => $request->nome]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria_Transacao $categoria_transacao)
    {
        return $categoria_transacao->delete();
    }
}
