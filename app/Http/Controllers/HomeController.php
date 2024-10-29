<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $bienvenida = "¡Holaaa!";

        return view('home', [
            'bienvenida' => $bienvenida,
        ]);
    }
}
