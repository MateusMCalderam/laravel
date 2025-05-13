<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('notas')->insert([
            'texto' => 'Exemplo Nota 1'
        ]);
        DB::table('notas')->insert([
            'texto' => 'Exemplo Nota 2'
        ]);
    }
}
