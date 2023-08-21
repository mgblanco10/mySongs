<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    public function index()
    {
        return '<h1>Hola mundo desde el controlador</h1>';

    }
}
