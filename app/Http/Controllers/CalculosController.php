<?php

namespace App\Http\Controllers;

class CalculosController extends Controller
{
    public function somar($x, $y)
    {
        return $x + $y;
    }

    public function subtrair($x, $y)
    {
        return $x - $y;
    }
    
    public function multiplicar($x, $y)
    {
        return $x * $y;
    }

    public function dividir($x, $y)
    {
        return $x / $y;
    }
    
    public function quadrado($x)
    {
        return $x ** 2;
    }

}
