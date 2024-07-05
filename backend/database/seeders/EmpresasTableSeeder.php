<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empresas')->insert([
            'nome' => 'Empresa Exemplo',
            'cnpj' => '12.345.678/0001-99',
            'endereco' => 'Rua Exemplo, 789, Cidade, Estado',
            'telefone' => '55512345678'
        ]);
    }
}
