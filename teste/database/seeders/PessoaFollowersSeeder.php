<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PessoaFollowersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pessoaIds = [1, 2, 3];

        DB::table('pessoas_followers')->insert([
            ['pessoa_id' => $pessoaIds[0], 'follower_id' => $pessoaIds[1]],
            ['pessoa_id' => $pessoaIds[0], 'follower_id' => $pessoaIds[2]]
        ]);
    }
}
