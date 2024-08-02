<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    public function update(Request $request, $externoId)
    {

        $pessoa = Pessoa::find($externoId);

        if (!$pessoa) {
            return response()->json(['error' => 'Pessoa não encontrada'], 404);
        }

        $pessoa->is_online = $request->input('is_online');

        $pessoa->save();

        return response()->json(['message' => 'pessoa atualizada com sucesso']);

    }
}
