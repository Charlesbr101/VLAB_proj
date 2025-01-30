<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->headers->set('Accept', 'application/JSON');

        Validator::make($request->all(), [
            'nome'  => ['required','regex:#^(?:[^\W\d_]| )+$#','max:255'],
            'cpf'   => 'required|regex:([0-9]{3}[\.]?[0-9]{3}[\.]?[0-9]{3}[-]?[0-9]{2})|unique:\App\Models\Usuario,cpf',
            'email' => 'required|email:rfc|max:255|unique:\App\Models\Usuario,email',
            'senha' => 'required'
        ])->validate();

        return Usuario::create(['nome'          => $request->nome,
                                'cpf'           => $request->cpf,
                                'email'         => $request->email,
                                'senha'         => $request->senha]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        $request->headers->set('Accept', 'application/JSON');

        Validator::make($request->all(), [
            'nome'  => ['required', "exclude_if:nome,$usuario->nome",'regex:#^(?:[^\W\d_]| )+$#','max:255'],
            'cpf'   => "required|exclude_if:cpf,$usuario->cpf|regex:([0-9]{3}[\.]?[0-9]{3}[\.]?[0-9]{3}[-]?[0-9]{2})|unique:\App\Models\Usuario,cpf",
            'email' => "required|exclude_if:email,$usuario->email|email:rfc|max:255|unique:\App\Models\Usuario,email",
            'senha' => "required"
        ])->validate();

        return $usuario->update(['nome'          => $request->nome,
                                'cpf'           => $request->cpf,
                                'email'         => $request->email,
                                'senha'         => $request->senha]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        return $usuario->delete();
    }
}
