<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlugueisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alugueis')->insert([
            'carro_id' => 1,
            'usuario_id' => 1,
            'data_inicio' => '2023-07-01',
            'data_fim' => '2023-07-10',
            'valor_total' => 1500.00,
            'local_retirada' => 'Rua Exemplo, 123, Cidade, Estado',
            'local_devolucao' => 'Avenida Exemplo, 456, Cidade, Estado'
        ]);
    }
}
