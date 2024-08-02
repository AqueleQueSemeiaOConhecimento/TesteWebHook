<?php

namespace Database\Seeders;

use App\Models\Pessoa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PessoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   

        DB::table('pessoas')->insert([
            [
                'is_online' => false,
                'nome' => 'Matheus Araujo de Melo',
                'email' => 'd3rr3tido@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'is_online' => false,
                'nome' => 'Bia',
                'email' => 'biavieiraguollo@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'is_online' => false,
                'nome' => 'Scaner601',
                'email' => 'scaner601@gmail.com',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
