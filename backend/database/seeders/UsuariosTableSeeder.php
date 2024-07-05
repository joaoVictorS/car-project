<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'nome' => 'João Teste',
            'email' => 'joaoteste@example.com',
            'senha' => Hash::make('12345678'),
            'tipo' => 'cliente',
            'telefone' => '123456789',
            'endereco' => 'Rua Exemplo, 123, Cidade, Estado'
        ]);

        DB::table('usuarios')->insert([
            'nome' => 'Maria Funcionário',
            'email' => 'mariafunc@example.com',
            'senha' => Hash::make('12345678'),
            'tipo' => 'funcionario',
            'telefone' => '987654321',
            'endereco' => 'Avenida Exemplo, 456, Cidade, Estado'
        ]);
    }
}
