<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class EmpresaController extends Controller
{
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'nome' => 'required|string|max:255',
      'cnpj' => 'required|string|max:20|unique:empresas',
      'endereco' => 'required|string|max:255',
      'telefone' => 'required|string|max:20',
    ]);

    if ($validator->fails()) {
      return response()->json(['errors' => $validator->errors()], 422);
    }

    try {
      $empresa = Empresa::create([
        'nome' => $request->nome,
        'cnpj' => $request->cnpj,
        'endereco' => $request->endereco,
        'telefone' => $request->telefone,
      ]);

      return response()->json($empresa, 201);
    } catch (QueryException $e) {

      return response()->json([
        'message' => 'Erro ao tentar cadastrar a empresa. Verifique os dados e tente novamente.',
        'error' => $e->getMessage()
      ], 500);
    }
  }
}
