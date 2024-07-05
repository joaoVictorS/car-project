<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carros')->insert([
            'marca' => 'Toyota',
            'modelo' => 'Corolla',
            'ano' => 2020,
            'cor' => 'Preto',
            'placa' => 'ABC-1234',
            'preco_diaria' => 150.00,
            'foto_url' => 'https://example.com/toyota-corolla.jpg',
            'empresa_id' => 1,
            'disponivel' => true
        ]);
    }
}
