<?php

namespace App\Http\Controllers;

use App\Models\Transacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Transacao::all();
    }

    /**
     * Display a listing of the resource.
     */
    public function indexFiltered(Request $request)
    {
        $request->headers->set('Accept', 'application/JSON');

        Validator::make($request->all(), [
            'categoria' => 'nullable|exclude_if:categoria,null|integer',
            'usuario'   => 'nullable|integer',
            'tipo'      => 'nullable|integer|in:0,1'
        ])->validate();

        $query = Transacao::all();
        if ($request->categoria){
            if ($request->categoria == 'null'){
                $query = $query->where('id_categoria', null);
            }
            else{
                $query = $query->where('id_categoria', $request->categoria);
            }
        }
        if ($request->usuario){
            $query = $query->where('id_usuario', $request->usuario);
        }
        if (!is_null($request->tipo)){
            $query = $query->where('tipo', $request->tipo);
        }

        return $query->all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->headers->set('Accept', 'application/JSON');

        Validator::make($request->all(), [
            'usuario'   => 'required|integer|exists:\App\Models\Usuario,id',
            'tipo'      => 'required|integer|in:0,1',
            'valor'     => 'required|numeric|gte:0',
            'categoria' => 'nullable|integer|exists:\App\Models\Categoria_Transacao,id'
        ])->validate();

        return Transacao::create(['id_usuario'      => $request->usuario,
                                'tipo'            => $request->tipo,
                                'valor'           => $request->valor,
                                'id_categoria'    => $request->categoria]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transacao $transacao)
    {
        return $transacao->delete();
    }
}
