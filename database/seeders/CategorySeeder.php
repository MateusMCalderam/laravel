<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        function random_color() {
            $r = mt_rand(0, 100); 
            $g = mt_rand(0, 100); 
            $b = mt_rand(0, 100); 
        
            return sprintf("%02x%02x%02x", $r, $g, $b);
        }

        Category::create(['name' => "Variedades", "color" => random_color()]);
        Category::create(['name' => "Economia", "color" => random_color()]);
        Category::create(['name' => "Lazer", "color" => random_color()]);
        Category::create(['name' => "Esporte", "color" => random_color()]);
        Category::create(['name' => "Política", "color" => random_color()]);
    }
}
