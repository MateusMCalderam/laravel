<?php

namespace Database\Seeders;
use Date;
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
            'titulo' => 'Titulo 1',
            'texto' => 'Exemplo Nota 1',
            'created_at' => Date::now()
        ]);
        DB::table('notas')->insert([
            'titulo' => 'Titulo 2',
            'texto' => 'Exemplo Nota 2',
            'created_at' => Date::now()
        ]);
    }
}
