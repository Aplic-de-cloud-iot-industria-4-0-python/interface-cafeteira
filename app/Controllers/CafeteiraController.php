<?php

namespace App\Controllers;

class CafeteiraController extends BaseController
{
    public function index(): string
    {
        return view('cafeteira');
    }

    public function ligar()
    {
        dd("aaaaa");
    }

    public function desligar()
    {
        dd("teste");
    }
}
