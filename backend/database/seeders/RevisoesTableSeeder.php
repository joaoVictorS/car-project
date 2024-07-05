<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RevisoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('revisoes')->insert([
            'carro_id' => 1,
            'data_revisao' => '2023-01-01',
            'descricao' => 'Revisão geral',
            'proxima_revisao' => '2023-06-01'
        ]);
    }
}
