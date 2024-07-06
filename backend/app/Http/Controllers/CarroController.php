<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carro;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use Illuminate\Auth\AuthenticationException;

class CarroController extends Controller
{
    // Listar todos os carros
    public function index()
    {
        $carros = Carro::all();
        return response()->json($carros);
    }

    // Mostrar um carro específico
    public function show($id)
    {
        $carro = Carro::findOrFail($id);
        return response()->json($carro);
    }

    // Criar um novo carro
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'ano' => 'required|integer',
            'cor' => 'required|string|max:50',
            'placa' => 'required|string|max:20|unique:carros',
            'preco_diaria' => 'required|numeric',
            'foto_url' => 'nullable|url',
            'empresa_id' => 'required|integer|exists:empresas,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $carro = Carro::create($request->all());
            return response()->json($carro, 201);
        } catch (AuthenticationException $e) {
          return response()->json([
              'message' => 'Erro de autenticação. Por favor, faça login novamente.',
              'error' => $e->getMessage()
          ], 401);
      } catch (QueryException $e) {
            return response()->json([
                'message' => 'Erro ao tentar cadastrar o carro. Verifique os dados e tente novamente.',
                'error' => $e->getMessage()
            ], 500);
        } catch (\Exception $e) {
          return response()->json([
              'message' => 'Ocorreu um erro inesperado. Por favor, tente novamente mais tarde.',
              'error' => $e->getMessage()
          ], 500);
      }
    }

    // Atualizar um carro existente
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'ano' => 'required|integer',
            'cor' => 'required|string|max:50',
            'placa' => 'required|string|max:20|unique:carros,placa,' . $id,
            'preco_diaria' => 'required|numeric',
            'foto_url' => 'nullable|url',
            'empresa_id' => 'required|integer|exists:empresas,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $carro = Carro::findOrFail($id);
            $carro->update($request->all());
            return response()->json($carro);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Erro ao tentar atualizar o carro. Verifique os dados e tente novamente.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Deletar um carro
    public function destroy($id)
    {
        try {
            $carro = Carro::findOrFail($id);
            $carro->delete();
            return response()->json(null, 204);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Erro ao tentar deletar o carro. Verifique os dados e tente novamente.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
