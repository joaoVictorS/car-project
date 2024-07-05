<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carro;

class CarroController extends Controller
{
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'marca' => 'required|string|max:255',
      'modelo' => 'required|string|max:255',
      'ano' => 'required|integer',
      'cor' => 'required|string|max:50',
      'placa' => 'required|string|max:20|unique:carros',
      'preco_diaria' => 'required|numeric',
      'foto_url' => 'nullable|url',
      'empresa_id' => 'required|integer|exists:empresas,id',
    ]);

    $carro = Carro::create([
      'marca' => $request->marca,
      'modelo' => $request->modelo,
      'ano' => $request->ano,
      'cor' => $request->cor,
      'placa' => $request->placa,
      'preco_diaria' => $request->preco_diaria,
      'foto_url' => $request->foto_url,
      'empresa_id' => $request->empresa_id,
      'disponivel' => true,
    ]);

    return response()->json($carro, 201);
  }
}
