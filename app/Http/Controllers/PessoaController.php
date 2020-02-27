<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pessoa;

class PessoaController extends Controller
{
    public function listPessoa()
    {
        return Pessoa::all();
    }

    public function showPessoa($id)
    {
        $Pessoa = Pessoa::find($id);

        if ($Pessoa) {
            return response()->success($Pessoa);
        } else {
            $data = "Pessoa não encontrada, verifique o id novamente.";
            return response()->error($data, 400);
        }
    }

    public function createPessoa(Request $request)
    {

        $Pessoa = new Pessoa;

        $Pessoa->cpf = $request->cpf;
        $Pessoa->nome = $request->nome;
        $Pessoa->telefone = $request->telefone;
        $Pessoa->endereco = $request->endereco;
        $Pessoa->email = $request->email;
        $Pessoa->is_cliente_plus = $request->is_cliente_plus;
        $Pessoa->save();

        return response()->success($Pessoa);
    }

    public function updatePessoa(Request $request, $id)
    {

        $Pessoa = Pessoa::find($id);

        if ($Pessoa) {

            if ($request->cpf)
                $Pessoa->cpf = $request->cpf;
            if ($request->nome)
                $Pessoa->nome = $request->nome;
            if ($request->telefone)
                $Pessoa->telefone = $request->telefone;
            if ($request->endereco)
                $Pessoa->endereco = $request->endereco;
            if ($request->email)
                $Pessoa->email = $request->email;
            if ($request->is_cliente_plus)
                $Pessoa->is_cliente_plus = $request->is_cliente_plus;

            $Pessoa->save();
            return response()->success($Pessoa);
        } else {
            $data = "Pessoa não encontrada, verifique o id novamente.";
            return response()->error($data, 400);
        }
    }

    public function deletePessoa($id)
    {

        Pessoa::destroy($id);

        return response()->json(['Pessoa deletada']);
    }
}
